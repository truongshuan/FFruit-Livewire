<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Exports\CustomerExport;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Customers extends Component
{
    use WithPagination;
    public $perPage = 5;
    public $searchTerm = '';
    public $sortColumnName =  'id';
    public $sortDirection = 'asc';
    public $selectedRow = [];
    public $selectedPageRow = false;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['searchTerm' => ['except' => '']];

    /**
     * Function into swap sortdirection
     * @return string
     */
    public function swapSortDirection(): string
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
    /**
     * Function sort data
     * @param mixed $columnName
     *
     * @return void
     */
    public function sortBy($columnName): void
    {
        if ($this->sortColumnName === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortColumnName = $columnName;
    }

    /**
     * Selected rows data
     * @param mixed $value
     *
     * @return [type]
     */
    public function updatedselectedPageRow($value)
    {
        if ($value) {
            $this->selectedRow = $this->getCustomers()->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRow', 'selectedPageRow']);
        }
    }

    /**
     * Reset pagination when searching
     * @return void
     */
    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    /**
     * Function export data file excel
     * @param none
     * @return [type]
     */
    public function export()
    {
        return (new CustomerExport($this->selectedRow))->download('Customers.xlsx');
    }
    public function getCustomers()
    {
        return
            User::query()
            ->when($this->searchTerm, function ($query) {
                return $query->search(trim($this->searchTerm));
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
    }

    /**
     * Summary of render view
     * @return mixed
     */
    public function render()
    {
        $customers = $this->getCustomers();

        return view('livewire.admin.customers.customers', compact('customers'))->layout('livewire.admin.layouts.base');
    }
}
