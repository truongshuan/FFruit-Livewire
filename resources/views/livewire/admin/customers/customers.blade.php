@section('title', 'Users')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Danh sách khách hàng</h1>
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
                                <input wire:model.debounce.150ms="searchTerm" type="text" class="form-control"
                                    placeholder="search...">
                            </div>
                            <button wire:click.prevent='export'
                                class="btn btn-success btn-sm d-block me-3">Export</button>
                        </div>
                        <!-- Default Table -->
                        <table class="table table-striped">
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
                                        <a href="#" wire:click="sortBy('name')">
                                            <i
                                                class=" {{ $sortColumnName === 'name' && $sortDirection === 'asc' ? 'text-secondary' : 'text-primary' }}   bi bi-arrow-down-short"></i>
                                            <i
                                                class=" {{ $sortColumnName === 'name' && $sortDirection === 'desc' ? 'text-secondary' : 'text-primary' }} bi bi-arrow-up-short "></i>
                                        </a>
                                    </th>
                                    <th scope="col">Email</th>
                                    {{-- <th scope="col">Số điện thoại</th> --}}
                                    <th scope="col">Vai trò</th>
                                    <th scope="col">Ngày đăng ký
                                        <a href="#" wire:click="sortBy('created_at')">
                                            <i
                                                class=" {{ $sortColumnName === 'created_at' && $sortDirection === 'asc' ? 'text-secondary' : 'text-primary' }}   bi bi-arrow-down-short"></i>
                                            <i
                                                class=" {{ $sortColumnName === 'created_at' && $sortDirection === 'desc' ? 'text-secondary' : 'text-primary' }} bi bi-arrow-up-short "></i>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customers as $customer)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input wire:model='selectedRow' value="{{ $customer-> id}}"
                                                class="form-check-input" type="checkbox" id="{{ $customer-> id}}">
                                            <label class="form-check-label" for="{{ $customer-> id}}">
                                            </label>
                                        </div>
                                    </th>
                                    <th scope="row">
                                        {{ $customer->id}}
                                    </th>
                                    <td>{{ $customer->name}}</td>
                                    <td>{{ $customer->email}}</td>
                                    {{-- <td>{{ $customer->id}}</td> --}}
                                    <td>
                                        Admin
                                        {{-- <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                checked="">
                                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                        </div> --}}
                                    </td>
                                    <td>
                                        {{ $customer->created_at->format('d/m/Y') }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th colspan="7">
                                        Không tìm thấy dữ liệu
                                    </th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="text-center mt-3 mb-4">
                            {{ $customers->links() }}
                        </div>
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>