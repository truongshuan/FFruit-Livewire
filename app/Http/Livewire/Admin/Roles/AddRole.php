<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AddRole extends Component
{
    public $name, $selectedPermissions = [];
    protected $rules = [
        'name' => 'required|unique:roles,name',
        'selectedPermissions' => 'required',
    ];

    /**
     * @param mixed $fields
     *
     * @return [type]
     */
    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules);
    }

    /**
     * Summary of store
     * @return void
     */
    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['selectedPermissions'] = $this->selectedPermissions;

        $role = Role::create(['name' => $validatedData['name']]);
        $role->syncPermissions($validatedData['selectedPermissions']);

        $this->dispatchBrowserEvent('added');
    }

    /**
     * Summary of render
     * @return mixed
     */
    public function render()
    {
        $permissions = Permission::all();

        return view('livewire.admin.roles.add-role', compact('permissions'))->layout('livewire.admin.layouts.base');
    }
}
