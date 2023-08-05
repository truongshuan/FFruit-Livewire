<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class CartCount extends Component
{
    public int $totalQuantity = 0;

    protected $listeners = ['refreshCartList' => 'updateCount'];

    public function mount(): void
    {
        $this->totalQuantity = $this->getCartListTotalQuantity();
    }

    public function updateCount(): void
    {
        $this->totalQuantity = $this->getCartListTotalQuantity();
    }

    private function getCartListTotalQuantity(): int
    {
        $cartList = collect(session('cart', []));
        return $cartList->sum('quantity');
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.client.cart-count', ['totalQuantity' => $this->totalQuantity]);
    }
}
