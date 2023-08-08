@section('title', 'Edit Role')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Sửa </h1>
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
                                <label for="inputText" class="mb-2">Tên</label>
                                <div class="">
                                    <input wire:model='name' type="text" placeholder="Tên" class="form-control">
                                    @error('name')
                                    <span class="text-danger mt-2 fw-semibold ">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="mb-2">Thêm quyền</label>
                                <div class="form-group">
                                    <strong>Permission:</strong>
                                    <br />
                                    @foreach($permissions as $permission)
                                    <label>{{ Form::checkbox('permission[]', $permission->id, in_array($permission->id,
                                        $selectedPermissions),
                                        array('class' => 'name', 'wire:model' => 'selectedPermissions')) }}
                                        {{ $permission->name }}
                                    </label>
                                    @endforeach
                                </div>
                                @error('selectedPermissions')
                                <span class="text-danger mt-2 fw-semibold ">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn btn-primary" type="submit">Gửi</button>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
    </section>
</main><!-- End #main -->