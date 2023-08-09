<?php

namespace App\Http\Livewire\Client;

use App\Events\UserRegistration;
use App\Http\Helpers\VnPay;
use App\Http\Requests\CheckoutRequest;
use App\Mail\CheckoutMail;
use App\Mail\ThankEmail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Checkout extends Component
{
    public $customer_name, $customer_email, $customer_phone, $shipping_address, $note, $total_price, $status, $user_id, $payment;
    public $carts = [];
    public $total = 0;
    public $chooseAddress;

    public function mount()
    {
        $this->customer_name = Auth::user()->name;
        $this->customer_email = Auth::user()->email;
        if ($this->chooseAddress == 'new') {
            $this->shipping_address = '';
        } else {
            $this->shipping_address = Auth::user()->address;
        }
    }
    public function updatedChooseAddress($value)
    {
        if ($value === 'new') {
            $this->shipping_address = '';
        } else {
            $this->shipping_address = Auth::user()->address;
        }
    }


    public function rules()
    {
        return (new CheckoutRequest)->rules();
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules(), (new CheckoutRequest)->messages(), (new CheckoutRequest)->attributes());
    }

    public function store()
    {
        $validateData = $this->validate($this->rules(), (new CheckoutRequest)->messages(), (new CheckoutRequest)->attributes());
        $validateData['user_id'] = Auth::user()->id;
        $validateData['total_price'] = $this->total;

        if ($this->payment === 'vnpay') {
            $validateData['status'] = '1';
            $validateData['payment_method'] = $this->payment;
            DB::beginTransaction();
            try {
                $order = Order::create($validateData);
                foreach ($this->carts as $cart => $item) {
                    $orderDetail = new OrderDetail([
                        'order_id' => $order->id,
                        'product_id' => $item['product']['id'],
                        'price' => $item['product']['sale_price'] > 0 ? $item['product']['sale_price']  : $item['product']['price'],
                        'quantity' => $item['quantity'],
                    ]);
                    $order->orderDetail()->save($orderDetail);
                    $this->removeItemFromCart($item['product']['id']);
                }
                // Gui mail
                Mail::to($validateData['customer_email'])->send(new CheckoutMail($validateData, $order->id, 'VNPAY'));
                Mail::to($validateData['customer_email'])->send(new ThankEmail('Cảm ơn bạn vì đã thanh toán', 'Hãy đánh giá nếu bạn hài lòng'));
                // Commit db
                DB::commit();
                // Payment
                VnPay::vnpay('active', $order->id, $this->total);
                // Unset form
                $this->reset();
                $this->carts = [];
                $this->emit('refreshCartList');
                event(new UserRegistration('order'));
            } catch (\Throwable $e) {
                DB::rollback();
                flash()
                    ->options([
                        'timeout' => 1500,
                        'position' => 'top-center',
                    ])
                    ->addError('Đã xảy ra lỗi khi đặt hàng!');
                $this->emit('refreshCartList');
            }
        } else {
            DB::beginTransaction();
            try {
                $validateData['status'] = '0';
                $validateData['payment_method'] = $this->payment;
                $order = Order::create($validateData);
                foreach ($this->carts as $cart => $item) {
                    $orderDetail = new OrderDetail([
                        'order_id' => $order->id,
                        'product_id' => $item['product']['id'],
                        'price' => $item['product']['sale_price'] > 0 ? $item['product']['sale_price']  : $item['product']['price'],
                        'quantity' => $item['quantity'],
                    ]);
                    $order->orderDetail()->save($orderDetail);
                    $this->removeItemFromCart($item['product']['id']);
                }
                // Gui mail
                Mail::to($validateData['customer_email'])->send(new CheckoutMail($validateData, $order->id, 'COD'));
                Mail::to($validateData['customer_email'])->send(new ThankEmail('Cảm ơn bạn vì đã thanh toán', 'Hãy đánh giá nếu bạn hài lòng'));
                // Commit db
                DB::commit();
                flash()
                    ->options([
                        'timeout' => 1500,
                        'position' => 'top-center',
                    ])
                    ->addSuccess('Đặt hàng thành công!');
                // Unset form
                $this->reset();
                $this->carts = [];
                $this->emit('refreshCartList');
                event(new UserRegistration('order'));
            } catch (\Throwable $e) {
                DB::rollback();
                flash()
                    ->options([
                        'timeout' => 1500,
                        'position' => 'top-center',
                    ])
                    ->addError('Đã xảy ra lỗi khi đặt hàng!');
                $this->emit('refreshCartList');
            }
        }
    }

    public function removeItemFromCart($productId)
    {
        $rootCart = session('cart');
        foreach ($rootCart as $key => $item) {
            if ($item['product']['id'] == $productId) {
                unset($rootCart[$key]);
                break;
            }
        }
        session(['cart' => $rootCart]);
        $this->emit('refreshCartList');
    }


    public function render()
    {
        if (empty(session('cart'))) {
            session(['checkoutCart' => []]);
        } else {
            $this->carts = session('checkoutCart');
            if (!empty($this->carts)) {
                $this->total = $this->carts->sum('subtotal');
            }
        }

        return view('livewire.client.checkout', ['carts' => $this->carts, 'total' => $this->total]);
    }
}
