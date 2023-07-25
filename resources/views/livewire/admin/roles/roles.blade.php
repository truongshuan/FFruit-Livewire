@section('title', 'Categories')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Quản lý Quyền & Vai trò</h1>
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
                            </div>
                            <div class="d-flex justify-content-center align-items-center ">
                                <a href="{{ route('addRole') }}" class="btn btn-primary btn-sm ">Thêm</a>
                            </div>
                        </div>
                        <!-- Default Table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">
                                            Vai trò
                                        </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role)
                                    <tr>
                                        <th>
                                            {{ $role->id}}
                                        </th>
                                        <th>
                                            {{ $role->name}}
                                        </th>
                                        <th>
                                            <a class="btn btn-secondary"
                                                href="{{ route('editRole', ['id'=> $role->id]) }}">Sửa</a>
                                            <button wire:click.prevent='deleteConfirm({{ $role->id }})'
                                                class="btn btn-danger">Xóa</button>
                                        </th>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="4">
                                            Không có dữ liệu
                                        </th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
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
                'Danh mục đã được xóa thành công!',
                'success'
                )
        });
</script>
@endpush