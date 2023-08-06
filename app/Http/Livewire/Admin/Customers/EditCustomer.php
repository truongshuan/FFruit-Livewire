<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditCustomer extends Component
{
    public $customer_id, $role;

    /**
     * Dislay data to blade
     * @param int $id
     * @return
     */
    public function mount(int $id)
    {
        $customer = Admin::find($id);
        if ($customer) {
            $this->customer_id = $customer->id;
            $userRole = Admin::find($this->customer_id)->roles->pluck('name')->toArray();
            $this->role = $userRole;
        } else {
            return redirect()->to('admin/customers');
        }
    }


    /**
     * Save role to customer
     * @param none
     * @return void
     */
    public function store(): void
    {
        $customer = Admin::find($this->customer_id);
        DB::table('model_has_roles')->where('model_id', $this->customer_id)->delete();
        $customer->assignRole($this->role);
        $this->dispatchBrowserEvent('edited');
    }


    /**
     * Summary of render
     * @return mixed
     */
    public function render(): mixed
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRole = Admin::find($this->customer_id)->roles->pluck('name', 'name')->all();

        return view('livewire.admin.customers.edit-customer', compact('roles', 'userRole'))->layout('livewire.admin.layouts.base');
    }
}
