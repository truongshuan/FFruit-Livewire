<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\OrderDetail as ModelsOrderDetail;
use Livewire\Component;

class OrderDetail extends Component
{
    public int $perPage = 5;
    public  $selectedRow = [];
    public bool $selectedPageRow = false;
    public string $sortColumnName =  'created_at';
    public string $sortDirection = 'desc';
    public int $order_id;

    /**
     * Get id order
     * @param int $id
     * @return void
     */
    public function mount(int $id): void
    {
        $this->order_id = $id;
    }


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
    public function sortBy(string $columnName): void
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
    public function updatedselectedPageRow(bool $value): void
    {
        if ($value) {
            $this->selectedRow = $this->getProductOrder()->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRow', 'selectedPageRow']);
        }
    }

    /**
     * Summary of getProductOrder
     * @return mixed
     */
    public function getProductOrder(): mixed
    {
        return
            ModelsOrderDetail::where('order_id', $this->order_id)
            ->with(['products.category' => function ($query) {
                $query->select('id', 'title');
            }])
            ->select('id', 'order_id', 'product_id', 'quantity', 'price')
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
    }


    /**
     * @return mixed
     */
    public function render(): mixed
    {
        $id = $this->order_id;
        $order_detail = $this->getProductOrder();

        return view('livewire.admin.orders.order-detail', ['id' => $id, 'orderDetail' => $order_detail])->layout('livewire.admin.layouts.base');
    }
}
