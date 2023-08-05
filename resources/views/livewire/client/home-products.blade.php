<div class="row">
    @foreach ($products as $product)
    <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
        <div class="single-product-item">
            <div class="product-image">
                <a href="{{ route('detail', ['slug'=> $product->slug]) }}">
                    <img src="{{ Storage::disk('products')->url($product->path_image) }}"
                        alt="{{ $product->slug}}" /></a>
            </div>
            <h3>{{ $product->name}}</h3>
            <p class="product-price"><span>{{$product->category->title}}</span></p>
            <div class="d-flex justify-content-center">
                <p class="mr-2 fw-normal h6" style="text-decoration-line: line-through;">
                    {{number_format($product->price, 0,
                    ',','.') . '
                    VND' }}</p>
                <p class=" h5 text-warning">{{number_format($product->sale_price, 0, ',','.') . ' VND' }}</p>
            </div>
            <a wire:click='addItem({{$product}})' class="cart-btn"><i class="fas fa-shopping-cart"></i> Add
                to
                Cart</a>
        </div>
    </div>
    @endforeach
</div>