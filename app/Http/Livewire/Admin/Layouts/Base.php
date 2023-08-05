<?php

namespace App\Http\Livewire\Admin\Layouts;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Base extends Component
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application [type]
     */
    public function render(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('livewire.admin.layouts.base');
    }
}
