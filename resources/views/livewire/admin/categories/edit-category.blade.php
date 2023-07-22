@section('title', 'Edit Category')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Sửa danh mục sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <!-- General Form Elements -->
                        <form action="#" wire:submit.prevent='submit()'>
                            <div class="row mb-3">
                                <label for="inputText" class="mb-2">Tiêu đề</label>
                                <div class="col-sm-10">
                                    <input wire:model='title' wire:keyup='generateSlug' type="text"
                                        class="form-control">
                                    @error('title')
                                    <span class="text-danger mt-2 fw-semibold ">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="mb-2">Slug</label>
                                <div class="col-sm-10">
                                    <input wire:model='slug' type="text" class="form-control">
                                    @error('slug')
                                    <span class="text-danger mt-2 fw-semibold ">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3" wire:ignore>
                                <label for="inputPassword">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea class="" id="editor" wire:model.defer='desc'></textarea>
                                </div>
                            </div>
                            @error('desc')
                            <span class="text-danger mt-2 fw-semibold">{{ $message }}</span>
                            @enderror
                            <div class="row mb-3 mt-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
    </section>
</main><!-- End #main -->
@push('scripts')
<script>
    window.addEventListener('edited', event => {
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Sửa dữ liệu thành công',
                showConfirmButton: false,
                timer: 1000
              })
     });
</script>
@endpush