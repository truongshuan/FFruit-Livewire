<?php

namespace App\Http\Traits;

use App\Models\Product;

trait Cart
{
    public function addToCart(Product $product, $quantity = 1): void
    {
        $cart = session('cart', []);

        $productId = $product->id;
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product' => $product,
                'quantity' => $quantity,
            ];
        }
        session(['cart' => $cart]);
    }
}
