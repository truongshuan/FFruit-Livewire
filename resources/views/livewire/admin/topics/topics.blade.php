<main id="main" class="main">
    <div class="pagetitle">
        <h1>Chủ đề bài viết</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/dashboard">Dashboard</a>
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
                            <div class="d-flex justify-content-center align-items-center ">
                                <button wire:click.prevent='export'
                                    class="btn btn-dark btn-sm d-block me-3">Export</button>
                                <a href="{{ route('addTopic',) }}" class="btn btn-primary btn-sm ">Thêm</a>
                            </div>
                        </div>
                        <!-- Default Table -->
                        <table class="table">
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
                                        Tiêu đề
                                        <a href="#" wire:click="sortBy('title')">
                                            <i
                                                class=" {{ $sortColumnName === 'title' && $sortDirection === 'asc' ? 'text-secondary' : 'text-primary' }}   bi bi-arrow-down-short"></i>
                                            <i
                                                class=" {{ $sortColumnName === 'title' && $sortDirection === 'desc' ? 'text-secondary' : 'text-primary' }} bi bi-arrow-up-short "></i>
                                        </a>
                                    </th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Ngày tạo
                                        <a href="#" wire:click="sortBy('created_at')">
                                            <i
                                                class=" {{ $sortColumnName === 'created_at' && $sortDirection === 'asc' ? 'text-secondary' : 'text-primary' }} bi bi-arrow-up-short "></i>
                                            <i
                                                class=" {{ $sortColumnName === 'created_at' && $sortDirection === 'desc' ? 'text-secondary' : 'text-primary' }}   bi bi-arrow-down-short"></i>
                                        </a>
                                    </th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($topics as $topic)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input wire:model='selectedRow' value="{{ $topic-> id}}"
                                                class="form-check-input" type="checkbox" id="{{ $topic-> id}}">
                                            <label class="form-check-label" for="{{ $topic-> id}}">
                                            </label>
                                        </div>
                                    </th>
                                    <th scope="row">{{ $topic->id }}</th>
                                    <td>{{ $topic->title }}</td>
                                    <td>
                                        <p class="d-inline-block text-truncate" style="width: 150px">
                                            {!! $topic->content!!}
                                        </p>
                                    </td>
                                    <td>
                                        <livewire:toggle-button :model="$topic" :key="$topic->id" />
                                    </td>
                                    <td>{{ $topic->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('editTopic', ['id'=> $topic->id]) }}"
                                            class="btn btn-secondary btn-sm">Sửa</a>
                                        <button wire:click.prevent='deleteConfirm({{ $topic->id }})'
                                            class="btn btn-danger btn-sm">Xóa</button>
                                    </td>
                                </tr>
                                @empty
                                <tr scope="row">
                                    <th colspan="7">
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
                            {{ $topics->links() }}
                        </div>
                        <!-- End Default Table  Example -->
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
                'Đã được xóa thành công!',
                'success'
            )
        });
</script>
@endpush