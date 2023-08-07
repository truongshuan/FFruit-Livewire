<div class="latest-news mt-80 mb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <h3 class="text-center text-warning">Bộ lọc </h3>
                    <div class="row mb-2">
                        <div class="col-md-6 mb-4 mb-sm-0">
                            <select wire:model='queryByCategory' class="custom-select text-center h6">
                                <option value="" selected>Chọn danh mục sản phẩm</option>
                                @foreach ($topics as $topic)
                                <option value="{{$topic->id}}">{{$topic->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input wire:model.debounce.150ms='searchTerm' type="text" class="form-control"
                                id="searchTerm" placeholder="Tìm kiếm...">
                        </div>
                    </div>
                    {{-- <ul>
                        <li class="active" data-filter="*">Tất cả</li>
                        @foreach ($categories as $category)
                        <li data-filter=".{{$category->slug}}">{{$category->title}}</li>
                        @endforeach
                    </ul> --}}
                    <div class="d-flex justify-content-center align-items-center">
                        <span class="mr-3">Sắp xếp theo: </span>
                        <div class="form-check d-flex align-items-center mr-2">
                            <input wire:model="sortBy" class="form-check-input " type="radio" name="exampleRadios"
                                id="5" value="newest">
                            <label class="form-check-label" for="5">
                                Mới nhất
                            </label>
                        </div>
                        <div class="form-check d-flex align-items-center mr-2">
                            <input wire:model="sortBy" class="form-check-input " type="radio" name="exampleRadios"
                                id="6" value="oldest">
                            <label class="form-check-label" for="6">
                                Cũ nhất
                            </label>
                        </div>
                        <button wire:click="clearSortBy" class="btn btn-warning">Làm mới</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @for($i = 1; $i<= 6; $i++) <div wire:loading.delay class="col-lg-4 col-md-6">
                <div class="single-latest-news">
                    <a href="">
                        <div class="skeleton-image"></div>
                    </a>
                    <div class="news-text-box">
                        <div class="skeleton-title-post"></div>
                        <div class="skeleton-author"></div>
                        <div class="skeleton-category"></div>
                        <div href="" class="skeleton-btn-post"></div>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    <div wire:loading.remove class="row">
        @foreach ($posts as $post)
        <div class="col-lg-4 col-md-6">
            <div class="single-latest-news">
                <a href="{{ route('new_detail', ['slug'=> $post->slug]) }}">
                    <div class="latest-news-bg"
                        style="background-image: url({{ Storage::disk('posts')->url($post->thumbnail) }})"></div>
                </a>
                <div class="news-text-box">
                    <h3><a href="{{ route('new_detail', ['slug'=> $post->slug]) }}">
                            {{$post->title}}</a></h3>
                    <p class="blog-meta">
                        <span class="author"><i class="fas fa-user"></i> Admin - - Đăng {{
                            $post->created_at->locale('vi_VN')->diffForHumans() }}</span>
                        <span class="date"><i class="fas fa-calendar"></i>
                            {{ $post->created_at->format('d/m/Y')}}
                        </span>
                    </p>
                    <p class="excerpt d-inline-block text-truncate" style="max-width: 100%;">
                        Bài viết thuộc chủ đề: <b>{{ $post->topic->title }}</b>
                    </p>
                    <a href="{{ route('new_detail', ['slug'=> $post->slug]) }}" class="read-more-btn">Đọc thêm<i
                            class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div wire:loading.remove class="row">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    {{ $posts->links('custom-pagination-livewire') }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>