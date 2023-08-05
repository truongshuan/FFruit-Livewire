<?php

namespace App\Http\Livewire\Client;

use App\Http\Traits\Cart;
use App\Models\Product;
use Livewire\Component;

class HomeProducts extends Component
{
    use Cart;

    public function addItem(Product $product)
    {
        $this->addToCart($product);
        flash()
            ->options([
                'timeout' => 1500,
                'position' => 'top-center',
            ])
            ->addSuccess('Thêm vào giỏ hàng thành công!');
        $this->emit('refreshCartList');
    }

    public function render()
    {
        $products = Product::where('sale_price', '>', 0)
            ->with('category:id,title,slug')
            ->latest('created_at')
            ->take(3)
            ->get();

        return view('livewire.client.home-products', compact('products'));
    }
}
