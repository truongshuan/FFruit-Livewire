@section('title', 'Orders')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Đơn hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/dashboard">Home</a>
                </li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách</h5>
                        <div class="w-full d-flex justify-content-between">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="d-flex justify-content-center align-items-center me-4">
                                    <label for="">Show</label>
                                    <select wire:model='perPage' class="ms-1 " aria-label="">
                                        <option value="5" selected>5</option>
                                        <option value="15">15</option>
                                        <option value="25">25</option>
                                    </select>
                                </div>
                                <input wire:model.debounce.150ms="searchTerm" type="text" class="form-control"
                                    placeholder="search...">
                                <select wire:model='selectByStatus' style="width: 130px" class="ms-2 form-select"
                                    id="mySelect" aria-label="Default example">
                                    <option selected value="">Trạng thái</option>
                                    <option value="-1">Đang chờ</option>
                                    <option value="1">Thanh toán</option>
                                    <option value="2">Hoàn thành</option>
                                    <option value="3">Đã hủy</option>
                                    <option value="4">Xác nhận</option>
                                </select>
                            </div>
                            <button wire:click.prevent='export'
                                class="btn btn-success btn-sm d-block me-3">Export</button>
                        </div>
                        <!-- Default Table -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <div class="form-check">
                                                <input wire:model='selectedPageRow' value="" class="form-check-input"
                                                    type="checkbox" id="checkAll">
                                            </div>
                                        </th>
                                        <th scope="col">#</th>
                                        <th scope="col">
                                            Họ tên
                                            <a href="#" class="d-inline-block" wire:click="sortBy('customer_name')">
                                                <i
                                                    class=" {{ $sortColumnName === 'customer_name' && $sortDirection === 'asc' ? 'text-secondary' : 'text-primary' }} bi bi-arrow-up-short "></i>
                                                <i
                                                    class=" {{ $sortColumnName === 'customer_name' && $sortDirection === 'desc' ? 'text-secondary' : 'text-primary' }}   bi bi-arrow-down-short"></i>
                                            </a>
                                        </th>
                                        <th scope="col">Tổng tiền
                                            <a href="#" class="d-inline-block" wire:click="sortBy('total_price')">
                                                <i
                                                    class=" {{ $sortColumnName === 'total_price' && $sortDirection === 'asc' ? 'text-secondary' : 'text-primary' }} bi bi-arrow-up-short "></i>
                                                <i
                                                    class=" {{ $sortColumnName === 'total_price' && $sortDirection === 'desc' ? 'text-secondary' : 'text-primary' }}   bi bi-arrow-down-short"></i>
                                            </a>
                                        </th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Ghi chú</th>
                                        <th scope="col">HTTT</th>
                                        <th scope="col">Trạng thái<span>
                                        <th scope="col">
                                            Ngày đặt
                                            <a href="#" class="d-inline-block" wire:click="sortBy('create_at')">
                                                <i
                                                    class=" {{ $sortColumnName === 'create_at' && $sortDirection === 'asc' ? 'text-secondary' : 'text-primary' }} bi bi-arrow-up-short "></i>
                                                <i
                                                    class=" {{ $sortColumnName === 'create_at' && $sortDirection === 'desc' ? 'text-secondary' : 'text-primary' }}   bi bi-arrow-down-short"></i>
                                            </a>
                                        </th>
                                        <th scope="col">Cập nhật</th>
                                        <th scope="col">Chi tiết<span>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input wire:model='selectedRow' value="{{ $order->id}}"
                                                    class="form-check-input" type="checkbox" id="{{ $order->id}}">
                                                <label class="form-check-label" for="{{ $order->id}}">
                                                </label>
                                            </div>
                                        </th>
                                        <th scope="row">
                                            {{ $order->id}}
                                        </th>
                                        <td>{{ $order->customer_name}}</td>
                                        <td>{{ number_format($order->total_price, 0, '.', ',') }} VND</td>
                                        <td>{{ $order->customer_email}}</td>
                                        <td>{{ $order->shipping_address}}</td>
                                        <td>
                                            {{ $order->note}}
                                        </td>
                                        <td>
                                            <p style="text-transform: uppercase">{{ $order->payment_method}}</p>
                                        </td>
                                        <td>
                                            @switch($order->status)
                                            @case($order->status === 0)
                                            <span class="badge bg-secondary">Đang chờ</span>
                                            @break
                                            @case($order->status == 1)
                                            <span class="badge bg-primary">Đã thanh toán</span>
                                            @break
                                            @case($order->status == 2)
                                            <span class="badge bg-success">Hoàn thành</span>
                                            @break
                                            @case($order->status == 3)
                                            <span class="badge bg-danger">Đã hủy</span>
                                            @break
                                            @case($order->status == 4)
                                            <span class="badge bg-warning">Xác nhận</span>
                                            @break
                                            @default
                                            <span class="badge bg-secondary">Đang chờ</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            {{ $order->created_at->format('d/m/Y') }}
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button data-bs-target="#exampleModal" type="button" class="btn btn-dark"
                                                data-bs-toggle="modal"><i class="bi bi-folder"></i></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Thông tin đơn
                                                                hàng số: {{ $order->id }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <span class="mb-3">Tên người đặt: {{ $order->customer->name
                                                                }}</span>
                                                            <h5 class="text-primary mt-3">Đổi trạng thái</h5>
                                                            <div class="d-flex">
                                                                <button data-bs-dismiss="modal"
                                                                    wire:click.prevent="updateStatus(4, {{ $order->id }})"
                                                                    class="btn btn-success btn-sm">Xác
                                                                    nhận</button>
                                                                <button data-bs-dismiss="modal"
                                                                    wire:click.prevent="updateStatus(1, {{ $order->id }})"
                                                                    class="ms-1 btn btn-primary btn-sm">Thanh
                                                                    toán</button>
                                                                <button data-bs-dismiss="modal"
                                                                    wire:click.prevent="updateStatus(3, {{ $order->id }})"
                                                                    class="ms-1 btn btn-danger btn-sm">Hủy</button>
                                                                <button data-bs-dismiss="modal"
                                                                    wire:click.prevent="updateStatus(2, {{ $order->id }})"
                                                                    class="ms-1 btn btn-warning btn-sm">Hoàn
                                                                    thành</button>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Đóng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('orderDetail', ['id'=>$order->id]) }}"
                                                class="btn btn-primary btn-sm">Chi tiết</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="11">
                                            <span class="">
                                                Không tìm thấy đơn hàng !
                                            </span>
                                        </th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-3 mb-4">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
<!-- End #main -->