@section('title', 'Products')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Danh sách sản phẩm</h1>
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
                                    <select wire:model='perPage' class="ms-3" aria-label="Default select example">
                                        <option selected value="5">5</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                                <input wire:model.debounce.150ms='searchTerm' type="text" class="form-control"
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
                                </select>
                            </div>
                            <div class="d-flex justify-content-center align-items-center ">
                                <button wire:click.prevent='export'
                                    class="btn btn-dark btn-sm d-block me-1 ms-2">Export</button>
                                <button wire:click='cleanUpOldTempImages'
                                    class="btn btn-dark btn-sm d-block me-1">Clean</button>
                                <a href="{{ route('addProduct') }}" class="btn btn-primary btn-sm ">Thêm</a>
                            </div>
                        </div>
                        <!-- Default Table -->
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <div class="form-check">
                                            <input wire:model='selectedPageRow' class="form-check-input" type="checkbox"
                                                id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                            </label>
                                        </div>
                                    </th>
                                    <th scope="col">#</th>
                                    <th scope="col">
                                        Tên
                                        <span>
                                            <a href="#" wire:click="sortBy('name')">
                                                <i
                                                    class=" {{ $sortColumnName === 'name' && $sortDirection === 'asc' ? 'text-secondary' : 'text-primary' }}   bi bi-arrow-down-short"></i>
                                                <i
                                                    class=" {{ $sortColumnName === 'name' && $sortDirection === 'desc' ? 'text-secondary' : 'text-primary' }} bi bi-arrow-up-short "></i>
                                            </a>
                                        </span>
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
                                    <th scope="col">Giá khuyến mãi
                                        <span>
                                            <a href="#" wire:click="sortBy('sale_price')">
                                                <i
                                                    class=" {{ $sortColumnName === 'sale_price' && $sortDirection === 'asc' ? 'text-secondary' : 'text-primary' }}   bi bi-arrow-down-short"></i>
                                                <i
                                                    class=" {{ $sortColumnName === 'sale_price' && $sortDirection === 'desc' ? 'text-secondary' : 'text-primary' }} bi bi-arrow-up-short "></i>
                                            </a>
                                        </span>
                                    </th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Ngày tạo
                                        <span>
                                            <a href="#" wire:click="sortBy('created_at')">
                                                <i
                                                    class=" {{ $sortColumnName === 'created_at' && $sortDirection === 'asc' ? 'text-secondary' : 'text-primary' }}   bi bi-arrow-down-short"></i>
                                                <i
                                                    class=" {{ $sortColumnName === 'created_at' && $sortDirection === 'desc' ? 'text-secondary' : 'text-primary' }} bi bi-arrow-up-short "></i>
                                            </a>
                                        </span>
                                    </th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input wire:model='selectedRow' value="{{ $product->id}}"
                                                class="form-check-input" type="checkbox" id="{{ $product->id }}">
                                            <label class="form-check-label" for="{{ $product->id }}">
                                            </label>
                                        </div>
                                    </th>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category ? $product->category['title'] : '-' }}</td>
                                    <th scope="row">
                                        <img src="{{ $product->getImageUrl() }}" alt="{{ $product->name}}"
                                            class="rounded" width="100px">
                                    </th>
                                    <td>{{ number_format($product->price, 0, '.', ',') }} đ</td>
                                    <td>{{ number_format($product->sale_price, 0, '.', ',') }} đ</td>
                                    <td>
                                        {!! $product->description !!}
                                    </td>
                                    <td>{{ $product->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('editProduct', ['id'=>$product->id]) }}"
                                            class="btn btn-secondary btn-sm">Sửa</a>
                                        <button wire:click.prevent='deleteConfirm({{ $product->id }})'
                                            class="btn btn-danger btn-sm">Xóa</button>
                                    </td>
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
                        <div class="text-center mt-3 mb-4">
                            {{ $products->links() }}
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
@push('scripts')
<script>
    window.addEventListener('show-delete-confirm', event => {
            Swal.fire({
                title: 'Bạn có chắc muốn xóa?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có!',
                cancelButtonText: 'Hủy'
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
            })
        });
        window.addEventListener('deleted', event => {
            Swal.fire(
                'Đã xóa',
                'Danh mục đã được xóa thành công!',
                'success'
                )
        });
</script>
@endpush