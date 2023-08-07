<div class="product-section mt-80 mb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <h3 class="text-center text-warning">Bộ lọc </h3>
                    <div class="row mb-2">
                        <div class="col-md-6 mb-4 mb-sm-0">
                            <select wire:model='queryByCategory' class="custom-select text-center h6">
                                <option value="" selected>Chọn danh mục sản phẩm</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
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
                            <input wire:model="sortBy" class="form-check-input" type="radio" name="exampleRadios"
                                id="exampleRadios1" value="az">
                            <label class="form-check-label" for="exampleRadios1">
                                A - Z
                            </label>
                        </div>
                        <div class="form-check d-flex align-items-center mr-2">
                            <input wire:model="sortBy" class="form-check-input " type="radio" name="exampleRadios"
                                id="exampleRadios2" value="za">
                            <label class="form-check-label" for="exampleRadios2">
                                Z - A
                            </label>
                        </div>
                        <div class="form-check d-flex align-items-center mr-2">
                            <input wire:model="sortBy" class="form-check-input " type="radio" name="exampleRadios"
                                id="exampleRadios3" value="price_asc">
                            <label class="form-check-label" for="exampleRadios3">
                                Giá tăng đần
                            </label>
                        </div>
                        <div class="form-check d-flex align-items-center mr-2">
                            <input wire:model="sortBy" class="form-check-input " type="radio" name="exampleRadios"
                                id="4" value="price_desc">
                            <label class="form-check-label" for="4">
                                Giá giảm dần
                            </label>
                        </div>
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
        <div class="row product-lists">
            @for($i = 1; $i <= 6; $i++) <div wire:loading.delay class="col-lg-4 col-md-6 text-center product-skeleton">
                <div class="single-product-item skeleton">
                    <div class="product-image skeleton-image">
                        <a href="">
                            <img src="" alt="" />
                        </a>
                    </div>
                    <div class="skeleton-title"></div>
                    <p class="skeleton-category"><span></span></p>
                    <p class="skeleton-price"></p>
                    <div class="btn-skeleton"></div>
                </div>
        </div>
        @endfor
    </div>
    <div wire:loading.remove class="row product-lists">
        @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 text-center">
            <div class="single-product-item">
                <div class="product-image">
                    <a href="{{ route('detail', ['slug'=> $product->slug]) }}">
                        <img loading="lazy" src="{{ Storage::disk('products')->url($product->path_image) }}"
                            alt="{{ $product->slug}}" />
                    </a>
                </div>
                <h3>{{ $product->name}}</h3>
                <p class="product-price"><span>{{$product->category->title}}</span></p>
                @if ($product->sale_price > 0)
                <div class="d-flex justify-content-center">
                    <p class="mr-2 fw-normal h6" style="text-decoration-line: line-through;">
                        {{number_format($product->price, 0,
                        ',','.') . '
                        VND' }}</p>
                    <p class=" h5 text-warning">{{number_format($product->sale_price, 0, ',','.') . ' VND' }}</p>
                </div>
                @else
                <p class="h5">{{number_format($product->price, 0, ',','.') . ' VND' }}</p>
                @endif
                <a wire:click='addItem({{ $product }})' class="cart-btn"><i class="fas fa-shopping-cart"></i>Thêm
                    vào giỏ</a>
            </div>
        </div>
        @endforeach
    </div>
    <div wire:loading.remove class="row">
        <div class="col-lg-12 text-center">
            {{ $products->links('custom-pagination-livewire') }}
        </div>
    </div>
</div>
</div>