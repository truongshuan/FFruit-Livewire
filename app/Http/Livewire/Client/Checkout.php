<?php

namespace App\Http\Livewire\Client;

use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Checkout extends Component
{
    public $customer_name, $customer_email, $customer_phone, $shipping_address, $note, $total_price, $status, $user_id;
    public $carts = [];
    public $total = 0;

    public function mount()
    {
        $this->customer_name = Auth::user()->name;
        $this->customer_email = Auth::user()->email;
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
        $validateData['status'] = '0';
        $validateData['total_price'] = $this->total;

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
        } catch (\Throwable $e) {
            DB::rollback();
            flash()
                ->options([
                    'timeout' => 1500,
                    'position' => 'top-center',
                ])
                ->addError('Đã xảy ra lỗi khi đặt hàng!');
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
