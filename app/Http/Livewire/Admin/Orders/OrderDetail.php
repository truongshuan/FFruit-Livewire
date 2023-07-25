<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\OrderDetail as ModelsOrderDetail;
use Livewire\Component;

class OrderDetail extends Component
{
    public $selectedRow = [];
    public $selectedPageRow = false;
    public $order_id;

    /**
     * Get id order
     * @param mixed $id
     * @return void
     */
    public function mount($id)
    {
        $this->order_id = $id;
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
            $this->selectedRow = $this->getProductOrder()->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRow', 'selectedPageRow']);
        }
    }

    /**
     * Summary of getProductOrder
     * @return
     */
    public function getProductOrder()
    {
        return
            ModelsOrderDetail::where('order_id', $this->order_id)
            ->with(['products.category' => function ($query) {
                $query->select('id', 'title');
            }])
            ->select('id', 'order_id', 'product_id', 'quantity', 'price')
            ->get();
    }

    public function render()
    {
        $id = $this->order_id;
        $order_detail = $this->getProductOrder();
        return view('livewire.admin.orders.order-detail', ['id' => $id, 'orderDetail' => $order_detail])->layout('livewire.admin.layouts.base');
    }
}
