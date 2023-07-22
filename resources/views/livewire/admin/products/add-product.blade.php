@section('title', 'Add Product')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Thêm mới sản phẩm </h1>
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
                        <!-- General Form Elements -->
                        <form action="#" wire:submit.prevent='submit' class="mt-2" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="inputText" class="mb-2">Tên sản phẩm</label>
                                <div class="">
                                    <input wire:model='name' wire:keyup='generateSlug' type="text" class="form-control">
                                    @error('name')
                                    <span class="text-danger mt-2 fw-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="mb-2">Slug</label>
                                <div class="">
                                    <input wire:model='slug' type="text" class="form-control">
                                    @error('slug')
                                    <span class="text-danger mt-2 fw-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber">Đơn giá</label>
                                <div class="0">
                                    <input wire:model='price' type="number" class="form-control">
                                    @error('price')
                                    <span class="text-danger mt-2 fw-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber">Giá khuyến mãi</label>
                                <div class="0">
                                    <input wire:model='sale_price' type="number" value="0" class="form-control">
                                    @error('sale_price')
                                    <span class="text-danger mt-2 fw-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="">
                                    <select wire:model='category_id' class="form-select mt-2"
                                        aria-label="Default select example">
                                        <option value="null" selected disabled>-- Danh mục -- </option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger mt-2 fw-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword">Mô tả</label>
                                <div class="" wire:ignore>
                                    <textarea id="editor" wire:model.defer='description'></textarea>
                                </div>
                            </div>
                            @error('description')
                            <span class="text-danger mt-2 fw-semibold">{{ $message }}</span>
                            @enderror
                            <div class="row mb-3">
                                <label for="inputNumber">Tải hình ảnh</label>
                                <div class="">
                                    <input type="file" wire:model='path_image' class="form-control" id="formFile">
                                    @error('path_image')
                                    <span class="text-danger mt-2 fw-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
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
    window.addEventListener('added', event => {
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Thêm dữ liệu thành công',
                showConfirmButton: false,
                timer: 1000
              })
     });
</script>
@endpush