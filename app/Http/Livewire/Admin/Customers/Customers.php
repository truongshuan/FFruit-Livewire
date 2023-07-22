<?php

namespace App\Http\Livewire\Admin\Customers;

use Livewire\Component;

class Customers extends Component
{
    public function render()
    {
        return view('livewire.admin.customers.customers')->layout('livewire.admin.layouts.base');
    }
}
