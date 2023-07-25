@section('title', 'Order detail')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Danh sách sản phẩm đơn hàng {{ $id }}</h1>
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
                        <h5 class="card-title">Sản phẩm có trong đơn hàng</h5>
                        <div class="w-full d-flex justify-content-between">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="d-flex justify-content-center align-items-center me-4">
                                    <label for="">Show</label>
                                    <select wire:model='perPage' class="ms-3" aria-label="Default select example">
                                        <option selected value="5">5</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                                {{-- <input wire:model.debounce.150ms='searchTerm' type="text" class="form-control"
                                    placeholder="Search...">
                                <select wire:model='queryByCategory' class="form-select ms-2"
                                    aria-label="Default example">
                                    <option value="" selected>-- Lọc theo danh mục -- </option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">
                                        <p class="d-inline-block text-truncate">
                                            {{$category->title}}
                                        </p>
                                    </option>
                                    @endforeach
                                </select> --}}
                            </div>
                            <div class="d-flex justify-content-center align-items-center ">
                                {{-- <button wire:click.prevent='export'
                                    class="btn btn-dark btn-sm d-block me-1 ms-2">Export</button> --}}
                            </div>
                        </div>
                        <!-- Default Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <div class="form-check">
                                                <input wire:model='selectedPageRow' class="form-check-input"
                                                    type="checkbox" id="gridCheck1">
                                                <label class="form-check-label" for="gridCheck1">
                                                </label>
                                            </div>
                                        </th>
                                        <th scope="col">#</th>
                                        <th scope="col">
                                            Tên sản phẩm
                                        </th>
                                        <th scope="col">
                                            Danh mục
                                        </th>
                                        <th scope="col">Hình ảnh
                                        </th>
                                        <th scope="col">Đơn giá
                                            <span>
                                                <a href="#" wire:click="sortBy('price')">
                                                    <i
                                                        class=" {{ $sortColumnName === 'price' && $sortDirection === 'asc' ? 'text-secondary' : 'text-primary' }}   bi bi-arrow-down-short"></i>
                                                    <i
                                                        class=" {{ $sortColumnName === 'price' && $sortDirection === 'desc' ? 'text-secondary' : 'text-primary' }} bi bi-arrow-up-short "></i>
                                                </a>
                                            </span>
                                        </th>
                                        <th scope="col">Ngày tạo
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orderDetail as $item)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input wire:model='selectedRow' value="{{ $item->id}}"
                                                    class="form-check-input" type="checkbox" id="{{ $item->id }}">
                                                <label class="form-check-label" for="{{ $item->id }}">
                                                </label>
                                            </div>
                                        </th>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->products->name }}</td>
                                        <td>
                                            {{$item->products->category->title}}
                                        </td>
                                        <th scope="row">
                                            <img src="{{ $item->products->getImageUrl() }}"
                                                alt="{{ $item->products->name}}" class="rounded" width="100px">
                                        </th>
                                        <td>{{ number_format($item->price, 0, '.', ',') }} VND</td>
                                        <td>{{ $item->products->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                    @empty
                                    <tr scope="row">
                                        <th colspan="9">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title text-center">Không có dữ liệu !</h5>
                                                </div>
                                        </th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-3 mb-4">
                            {{ $orderDetail->links() }}
                        </div>
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
<!-- End #main -->