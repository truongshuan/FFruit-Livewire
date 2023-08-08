@extends('client.layouts.master')
@section('title', $product->name)
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Xem chi tiết</p>
                    <h1>{{$product->name}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- single product -->
<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="single-product-img">
                    <img src="{{ Storage::disk('s3')->url($product->path_image) }}" alt="{{$product->name}}">
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3>{{$product->name}}</h3>
                    <p class="single-product-pricing"><span>
                            @if ($product->sale_price > 0)
                            <div class="d-flex justify-content-start">
                                <p class="mr-2 font-weight-bold"
                                    style="text-decoration-line: line-through; font-size: 20px">
                                    {{number_format($product->price, 0,
                                    ',','.') . '
                                    VND' }}</p>
                                <p class="text-warning font-weight-bold" style="font-size: 20px">
                                    {{number_format($product->sale_price, 0,
                                    ',','.') . ' VND'
                                    }}</p>
                            </div>
                            @else
                            <p class="font-weight-bold" style="font-size: 20px">{{number_format($product->price, 0,
                                ',','.') . '
                                VND' }}</p>
                            @endif
                        </span></p>
                    <p>{!! $product->description !!}</p>
                    <div class="single-product-form">
                        <livewire:client.cart-button :product="$product"
                            wire:quantitySubmitted="handleQuantitySubmitted" />
                        <p><strong>Danh mục: </strong>{{$product->category->title}}</p>
                    </div>
                    <h4>Share:</h4>
                    <ul class="product-share">
                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single product -->

<!-- more products -->
<div class="more-products mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Sản phẩm</span> có liên quan</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                        beatae optio.</p>
                </div>
            </div>
        </div>
        <livewire:client.relate-products :id='$product->id' />
    </div>
</div>
<!-- end more products -->
@endsection