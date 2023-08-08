<div class="row">
    @foreach ($relate_products as $item)
    <div wire:key="item-{{ $item->id }}" class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
        <div class="single-product-item">
            <div class="product-image">
                <a href="{{ route('detail', ['slug'=> $item->slug]) }}">
                    <img loading="lazy" src="{{ Storage::disk('s3')->url($item->path_image) }}"
                        alt="{{ $item->slug}}" />
                </a>
            </div>
            <h3>{{ $item->name}}</h3>
            <p class="product-price"><span>{{$item->category->title}}</span></p>
            @if ($item->sale_price > 0)
            <div class="d-flex justify-content-center">
                <p class="mr-2 fw-normal h6" style="text-decoration-line: line-through;">
                    {{number_format($item->price, 0,
                    ',','.') . '
                    VND' }}</p>
                <p class=" h5 text-warning">{{number_format($item->sale_price, 0, ',','.') . ' VND' }}</p>
            </div>
            @else
            <p class="h5">{{number_format($item->price, 0, ',','.') . ' VND' }}</p>
            @endif
            <a wire:click='addItem({{$item}})' class="cart-btn"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ</a>
        </div>
    </div>
    @endforeach
</div>