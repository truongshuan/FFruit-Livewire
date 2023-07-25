<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditRole extends Component
{
    public $name, $role_id, $selectedPermissions = [];

    protected $rules = [
        'name' => 'required',
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
     * @param int $id
     *
     * @return [type]
     */
    public function mount(int $id)
    {
        $role = Role::find($id);
        if ($role) {
            $this->name = $role->name;
            $this->role_id = $role->id;
            $this->selectedPermissions = $role->permissions()->pluck('id')->toArray();
        } else {
            redirect()->to('dashboard/roles');
        }
    }

    /**
     * Summary of store
     * @return void
     */
    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['selectedPermissions'] = $this->selectedPermissions;

        $role = Role::find($this->role_id);
        $role->name = $validatedData['name'];
        $role->syncPermissions($validatedData['selectedPermissions']);
        $role->save();

        $this->dispatchBrowserEvent('edited');
    }

    /**
     * Summary of render
     * @return mixed
     */
    public function render()
    {
        $permissions = Permission::all();

        return view('livewire.admin.roles.edit-role', compact('permissions'))->layout('livewire.admin.layouts.base');
    }
}
