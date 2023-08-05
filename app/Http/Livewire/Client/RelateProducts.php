<?php

namespace App\Http\Livewire\Client;

use App\Http\Traits\Cart;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class RelateProducts extends Component
{
    use Cart;
    public $product_id;

    /**
     * Summary of mount
     * @param mixed $id
     * @return void
     */
    public function mount($id)
    {
        $this->product_id = $id;
    }

    /**
     * Summary of addItem
     * @param Product $product
     * @return void
     */
    public function addItem(Product $product): void
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

    /**
     * Summary of render
     * @return Factory|View
     */
    public function render(): View|Factory
    {
        $product = Product::where('id', $this->product_id)->first();

        $relate_products = Product::where('category_id', $product->category_id)
            ->with('category:id,title')
            ->where('id', '!=', $product->id)
            ->latest('created_at')
            ->take(3)
            ->get(['id', 'name', 'slug', 'path_image', 'price', 'sale_price', 'category_id', 'created_at']);

        return view('livewire.client.relate-products', compact('relate_products'));
    }
}
