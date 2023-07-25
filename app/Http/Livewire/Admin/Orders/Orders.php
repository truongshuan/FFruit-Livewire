<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Exports\OrderExport;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;
    public $perPage = 5;
    public $searchTerm = '';
    public $sortColumnName =  'id';
    public $sortDirection = 'asc';
    public $selectedRow = [];
    public $selectedPageRow = false;
    public $selectByStatus = '';
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
            $this->selectedRow = $this->getOrders()->pluck('id')->map(function ($id) {
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
        return (new OrderExport($this->selectedRow))->download('Orders.xlsx');
    }

    public function getOrders()
    {
        return
            Order::query()
            ->when($this->searchTerm, function ($query) {
                return $query->search(trim($this->searchTerm));
            })
            ->when($this->selectByStatus, function ($query) {
                if ($this->selectByStatus == -1) {
                    return $query->where('status', '0');
                } else {
                    return $query->where('status', $this->selectByStatus);
                }
            })
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
    }

    /**
     * @return [type]
     */
    public function render()
    {
        $orders = $this->getOrders();

        return view('livewire.admin.orders.orders', compact('orders'))->layout('livewire.admin.layouts.base');
    }
}
