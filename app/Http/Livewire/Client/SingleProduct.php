<?php

namespace App\Http\Livewire\Client;

use App\Http\Traits\Cart;
use App\Models\Product;
use Livewire\Component;

class SingleProduct extends Component
{
    use Cart;
    public $slug, $quantity;

    public function mount(string $slug): void
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)
            ->select('id', 'name', 'slug', 'path_image', 'price', 'sale_price', 'description', 'category_id', 'created_at')
            ->with('category:id,title')
            ->first();
        return view('livewire.client.single-product', compact('product'))->layout('livewire.client.layouts.base');
    }
}
