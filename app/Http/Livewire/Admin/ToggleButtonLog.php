<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ToggleButtonLog extends Component
{
    public function enable()
    {
        session()->put('model_log', 'active');
    }
    public function disable()
    {
        session()->put('model_log', 'disable');
    }
    public function render()
    {
        return view('livewire.admin.toggle-button-log');
    }
}
