<?php

namespace App\Http\Livewire\Client;

use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class CartList extends Component
{
    public array $cart = [];
    public int $total = 0;
    public array $quantities = [];
    public bool $selectAll = false;
    public array $selectedRow = [];

    protected $listeners = ['refreshCart' => 'render'];

    public function mount(): void
    {
        $cart = session('cart', []);
        // Khởi tạo mảng số lượng ban đầu từ dữ liệu giỏ hàng
        foreach ($cart as $product) {
            $this->quantities[$product['product']->id] = $product['quantity'];
        }
    }

    /**
     * Update quantity product for cart
     * @param $id
     * @return void
     */
    public function updateQuantity($id): void
    {
        $cart = session('cart', []);
        if (isset($this->quantities[$id])) {
            $quantity = $this->quantities[$id];
        }
        if (isset($cart[$id])) {
            if ($quantity <= 0) {
                unset($cart[$id]);
            } else {
                $cart[$id]['quantity'] = $quantity;
            }
        }
        session(['cart' => $cart]);
        flash()
            ->options([
                'timeout' => 1500,
                'position' => 'top-center',
            ])
            ->addSuccess('Cập nhật thành công!');
        $this->emit('refreshCartList');
    }

    public function remove(int $id): void
    {
        $cart = session('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session(['cart' => $cart]);

        $this->emit('refreshCartList');
        flash()
            ->options([
                'timeout' => 1500,
                'position' => 'top-center',
            ])
            ->addSuccess('Xóa thành công!');
    }


    /**
     * @param $value
     * @return void
     */
    public function updatedSelectAll($value): void
    {
        if ($value) {
            $this->selectedRow = array_keys(session('cart', []));
        } else {
            $this->reset(['selectedRow', 'selectAll']);
        }
    }

    /**
     * @return void
     */
    public function deleteRow(): void
    {
        $cart = session('cart', []);
        if (!empty($cart)) {
            $newCart = array_diff_key($cart, array_flip($this->selectedRow));
            session(['cart' => $newCart]);
            $this->emit('refreshCartList');
            flash()
                ->options([
                    'timeout' => 1500,
                    'position' => 'top-center',
                ])
                ->addSuccess('Xóa thành công!');
        }
        return;
    }


    /**
     * @return void
     */
    public function clearAllCart(): void
    {
        if (empty(session('cart'))) {
            flash()->options([
                'timeout' => 1500,
                'position' => 'top-center',
            ])->addError('Không có sản phẩm nào!');
        } else {
            session(['cart' => []]);
            $this->emit('refreshCartList');
            flash()
                ->options([
                    'timeout' => 1500,
                    'position' => 'top-center',
                ])
                ->addSuccess('Xóa toàn bộ thành công!');
        }
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $cart = session('cart', []);
        $this->cart = collect($cart)->map(function ($item) {
            $item['product'] = Product::find($item['product']->id);
            if ($item['product']->sale_price > 0) {
                $item['subtotal'] = $item['product']->sale_price * $item['quantity'];
            } else {
                $item['subtotal'] = $item['product']->price * $item['quantity'];
            }
            return $item;
        })->all();

        // Lọc những item được chọn trong mảng cart
        $selectedCart = collect($this->cart)->filter(function ($item) {
            return in_array($item['product']->id, $this->selectedRow);
        });
        // Tính tổng tiền những item được chọn
        $total = $selectedCart->sum('subtotal');

        // Tổng số lượng item trong giỏ hàng
        $totalQuantity = collect($this->cart)->sum(function ($item) {
            return $item['quantity'];
        });

        return view('livewire.client.cart-list', [
            'cart' => $this->cart,
            'totalQuantity' => $totalQuantity,
            'totalbill' => $total
        ]);
    }
}
