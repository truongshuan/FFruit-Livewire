<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Exports\OrderExport;
use App\Jobs\SendMailThank;
use App\Models\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Response;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Orders extends Component
{
    use WithPagination;
    public int $perPage = 5;
    public string $searchTerm = '';
    public string $sortColumnName =  'created_at';
    public string $sortDirection = 'desc';
    public $selectedRow = [];
    public bool $selectedPageRow = false;
    public string $selectByStatus = '';
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
    public function updatedselectedPageRow($value): void
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
    public function updatingSearchTerm(): void
    {
        $this->resetPage();
    }

    public function updateStatus($status, $id)
    {
        $order = Order::find($id);
        $order->update(['status' => (string) $status]);
        $message = match ($status) {
            4 => 'Đơn hàng của bạn đã được xác nhận. 🤗',
            1 => 'Đơn hàng của bạn đã được thanh toán. 🤗',
            3 => 'Đơn hàng của bạn đã bị hủy.',
            2 => 'Đơn hàng của bạn đã hoàn thành. 🤗',
            default => '',
        };
        SendMailThank::dispatch($order->customer_email, $message)->onQueue('emails');
        flash()->addSuccess('Cập nhật thành công');
    }


    /**
     * Function export data file excel
     * @return Response|BinaryFileResponse [type]
     */
    public function export(): Response|BinaryFileResponse
    {
        return (new OrderExport($this->selectedRow))->download('Orders.xlsx');
    }

    /**
     * Summary of getOrders
     * @return LengthAwarePaginator
     */
    public function getOrders(): LengthAwarePaginator
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
     * @return mixed [type]
     */
    public function render(): mixed
    {
        $orders = $this->getOrders();

        return view('livewire.admin.orders.orders', compact('orders'))->layout('livewire.admin.layouts.base');
    }
}
