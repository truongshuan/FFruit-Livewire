<?php

namespace App\Http\Livewire\Client;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyOrders extends Component
{
    public $order_id;
    protected $listeners = ['cancelconfirmed' => 'cancel'];
    public function deleteConfirm(int $id): void
    {
        $this->order_id = $id;
        $order = Order::where('id', $this->order_id)->first();
        $createdAt = Carbon::parse($order->created_at);
        $now = Carbon::now();
        $diffInDays = $createdAt->diffInDays($now);

        if ($diffInDays > 5) {
            flash()
                ->options([
                    'timeout' => 1500,
                    'position' => 'top-right',
                ])
                ->addWarning('Đơn hàng đã vượt quá số ngày được hủy!');
        } else {
            $this->dispatchBrowserEvent('show-confirm');
        }
    }

    public function cancel(): void
    {
        Order::where('id', $this->order_id)->update(['status' => '3']);
        $this->dispatchBrowserEvent('cancelled');
    }

    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();

        return view('livewire.client.my-orders', compact('orders'));
    }
}
