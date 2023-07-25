@section('title', 'Edit Post')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Sửa bài viết</h1>
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
                        <form action="#" wire:submit.prevent='submit' enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="inputText" class="mb-2">Tiêu đề</label>
                                <div class="col-sm-10">
                                    <input wire:model='title' wire:keyup='generateSlug' type="text"
                                        class="form-control">
                                    @error('title')
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
                                <div class="">
                                    <select wire:model='topic_id' class="form-select mt-2"
                                        aria-label="Default select example">
                                        <option value="null" selected disabled>-- Danh mục -- </option>
                                        @foreach ($topcics as $topic)
                                        <option value="{{$topic->id}}">{{ $topic->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('topic_id')
                                    <span class="text-danger mt-2 fw-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3" wire:ignore>
                                <label for="inputPassword">Nội dung bài viết</label>
                                <div class="col-sm-10">
                                    <textarea wire:model.defer='content' id="editor"></textarea>
                                </div>
                            </div>
                            @error('content')
                            <span class="text-danger mt-2 fw-semibold">{{ $message }}</span>
                            @enderror
                            <div class="row mb-3">
                                <label for="inputNumber">Tải hình ảnh</label>
                                <div class="">
                                    <input wire:model='new_thumbnail' class="form-control" type="file" id="formFile">
                                    @error('new_thumbnail')
                                    <span class="text-danger mt-2 fw-semibold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
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