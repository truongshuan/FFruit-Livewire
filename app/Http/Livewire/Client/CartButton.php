<?php

namespace App\Http\Livewire\Client;

use App\Http\Traits\Cart;
use App\Models\Product;
use Livewire\Component;

class CartButton extends Component
{
    use Cart;
    public $quantity;
    public $product;

    public function submitQuantity(Product $product): void
    {
        $this->addToCart($this->product, $this->quantity);
        flash()
            ->options([
                'timeout' => 1500,
                'position' => 'top-center',
            ])
            ->addSuccess('Thêm vào giỏ hàng thành công!');
        $this->emit('refreshCartList');
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.client.cart-button');
    }
}
