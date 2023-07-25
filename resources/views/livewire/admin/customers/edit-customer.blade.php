@section('title', 'Add Category')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Phân Quyền</h1>
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
                        <form action="#" wire:submit.prevent='store()'>
                            <div class="row mb-3">
                                <label>Thêm Vai Trò</label>
                                <div class="form-group mt-2" wire:ignore>
                                    <select name="roles[]" class="form-control" multiple wire:model="role">
                                        @foreach($roles as $role => $name)
                                        <option value="{{ $role }}" {{ in_array($role, $userRole) ? 'selected' : '' }}>
                                            {{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('')
                                <span class="text-danger mt-2 fw-semibold">{{ $message }}</span>
                                @enderror
                                <div class="row mb-3 mt-3">
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Gửi</button>
                                    </div>
                                </div>
                        </form><!-- End General Form Elements -->
                    </div>
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
                title: 'Thêm quyền thành công',
                showConfirmButton: false,
                timer: 1000
              })
     });
</script>
@endpush