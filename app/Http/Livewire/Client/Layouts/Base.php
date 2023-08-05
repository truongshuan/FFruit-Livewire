<?php

namespace App\Http\Livewire\Client\Layouts;

use Livewire\Component;

class Base extends Component
{
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.client.layouts.base');
    }
}
