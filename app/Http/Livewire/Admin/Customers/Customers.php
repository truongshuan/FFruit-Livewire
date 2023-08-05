<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Exports\CustomerExport;
use App\Models\User;
use Illuminate\Http\Response;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Customers extends Component
{
    use WithPagination;
    public int $perPage = 5;
    public string $searchTerm = '';
    public string $sortColumnName =  'created_at';
    public string $sortDirection = 'desc';
    public $selectedRow = [];
    public bool $selectedPageRow = false;
    protected string $paginationTheme = 'bootstrap';
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
    public function sortBy(mixed $columnName): void
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
     * @return void [type]
     */
    public function updatedselectedPageRow(mixed $value): void
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
    public function updatingSearchTerm(): void
    {
        $this->resetPage();
    }

    /**
     * Function export data file excel
     * @return Response|BinaryFileResponse [type]
     */
    public function export(): \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return (new CustomerExport($this->selectedRow))->download('Customers.xlsx');
    }
    public function getCustomers(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
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
    public function render(): mixed
    {
        $customers = $this->getCustomers();

        return view('livewire.admin.customers.customers', compact('customers'))->layout('livewire.admin.layouts.base');
    }
}
