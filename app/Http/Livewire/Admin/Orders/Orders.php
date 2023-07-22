<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;

class Orders extends Component
{
    /**
     * @return [type]
     */
    public function render()
    {
        return view('livewire.admin.orders.orders')->layout('livewire.admin.layouts.base');
    }
}
