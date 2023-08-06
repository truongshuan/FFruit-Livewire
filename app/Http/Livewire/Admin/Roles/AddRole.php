<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Http\Requests\RoleRequest;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AddRole extends Component
{
    public $name, $selectedPermissions = [];
    protected function rules()
    {
        return (new RoleRequest('add'))->rules();
    }

    /**
     * @param mixed $fields
     *
     * @return [type]
     */
    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules(), (new RoleRequest('add'))->messages());
    }

    /**
     * Summary of store
     * @return void
     */
    public function store()
    {
        $validatedData = $this->validate($this->rules(), (new RoleRequest('add'))->messages());
        $validatedData['selectedPermissions'] = $this->selectedPermissions;

        $role = Role::create(['name' => $validatedData['name'], 'guard_name' => 'admin']);
        $role->syncPermissions($validatedData['selectedPermissions']);

        $this->dispatchBrowserEvent('added');
        $this->reset();
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
