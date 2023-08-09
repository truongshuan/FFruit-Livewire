<div class="latest-news" style="margin: 35px 0px">
    <div class="container">
        <div class="row">
            <h3 class="mt-3 mb-3">Danh sách đơn hàng của bạn</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col">Phương thức thanh toán</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        @php
                        $i = 1;
                        @endphp
                        <tr>
                            <th scope="row">
                                {{$i++}}
                            </th>
                            <td>
                                {{$order->customer_name}}
                            </td>
                            <td>
                                {{$order->customer_email}}
                            </td>
                            <td>
                                {{$order->customer_phone}}
                            </td>
                            <td>
                                {{ $order->created_at->format('d/m/Y') }}
                            </td>
                            <td>
                                <p style="text-transform: uppercase">{{ $order->payment_method }}</p>
                            </td>
                            <td>
                                @switch($order->status)
                                @case($order->status === 0)
                                Đang chờ
                                @break
                                @case($order->status == 1)
                                Đã thanh toán
                                @break
                                @case($order->status == 2)
                                Hoàn thành
                                @break
                                @case($order->status == 3)
                                Đã hủy
                                @break
                                @case($order->status == 4)
                                Xác nhận
                                @break
                                @default
                                Đang chờ
                                @endswitch
                            </td>
                            <td>
                                <a href="{{ route('order.detail', ['id'=>$order->id]) }}" class="btn-warning btn">Chi
                                    tiết</a>
                                <button {{ $order->status == 3 ? 'disabled' : '' }} {{ $order->status == 2 ? 'disabled'
                                    : '' }} wire:click.prevent='deleteConfirm({{
                                    $order->id }})' class="btn-danger btn">Hủy</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="7">
                                <h4 class="text-center ">Bạn chưa tham gia mua hàng lần nào !</h4>
                            </th>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('show-confirm', event => {
            Swal.fire({
                title: 'Bạn có chắc muốn hủy đơn hàng?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#f28123',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng',
                cancelButtonText: 'Hủy'
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('cancelconfirmed')
                }
            })
        });
        window.addEventListener('cancelled', event => {
            Swal.fire(
                'Hủy đơn hàng thành công',
                'success'
                )
        });
</script>