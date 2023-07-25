<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public $role_id = 0;
    protected $listeners = ['deleteConfirmed' => 'detroy'];

    /**
     * Function show popup confirm delete data
     * @param int $id
     *
     * @return [type]
     */
    public function deleteConfirm(int $id)
    {
        $this->role_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirm');
    }

    /**
     * detroy data
     * @param none
     * @return void
     */
    public function detroy()
    {
        if ($this->role_id == 0) {
            dd($this->role_id);
        }
        $role = Role::find($this->role_id);
        $role->delete();
        $this->role_id = 0;

        $this->dispatchBrowserEvent('deleted');
    }
    public function render()
    {
        $roles = Role::all();
        return view('livewire.admin.roles.roles', compact('roles'))->layout('livewire.admin.layouts.base');
    }
}
