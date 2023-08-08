<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Http\Requests\RoleRequest;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditRole extends Component
{
    public $name, $role_id, $selectedPermissions = [];

    protected function rules()
    {
        return (new RoleRequest('edit'))->rules($this->role_id);
    }

    /**
     * @param mixed $fields
     *
     * @return [type]
     */
    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules(), (new RoleRequest('edit'))->messages());
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
        $validatedData = $this->validate($this->rules(), (new RoleRequest('edit'))->messages());
        $validatedData['selectedPermissions'] = $this->selectedPermissions;

        $role = Role::find($this->role_id);
        $role->name = $validatedData['name'];
        $role->syncPermissions($validatedData['selectedPermissions']);

        flash()
            ->options([
                'timeout' => 1500,
                'position' => 'top-right',
            ])
            ->addSuccess('Sửa thành công!');
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
