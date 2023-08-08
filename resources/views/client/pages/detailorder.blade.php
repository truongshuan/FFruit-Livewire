@extends('client.layouts.master')
@section('title', 'Đơn chi tiết số ' . $order->id)
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>FFruit</p>
                    <h1>Chi tiết đơn hàng mã số - {{$order->id}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<!-- my order section -->
<div class="latest-news" style="margin: 35px 0px">
    <div class="container">
        <div class="row">
            <h3 class="mt-3 text-warning">Cùng xem đơn hàng của bạn nhé!</h3>
            <div class="col-sm-12">
                <div class="d-flex justify-content-start align-items-center">
                    <h5>Người đặt:</h5>
                    <p class="" style="margin-left: 10px;">{{ $order->customer->name}}</p>
                </div>
                <div class="d-flex justify-content-start">
                    <h5>Địa chỉ: </h5>
                    <p class="" style="margin-left: 10px;"> {{ $order->shipping_address}}</p>
                </div>
                <div class="d-flex justify-content-start">
                    <h5>Ghi chú: </h5>
                    <p class="" style="margin-left: 10px;">{{ $order->note }}</p>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền sản phẩm</th>
                            <th scope="col">Danh mục</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $item)
                        @php
                        static $i = 0;
                        @endphp
                        <tr>
                            <th scope="row">
                                {{++$i}}
                            </th>
                            <td>
                                <img src="{{ Storage::disk('s3')->url($item->products['path_image']) }}"
                                    alt="{{ $item->products['slug']}}" width="90" />
                            </td>
                            <td>
                                {{ $item->products['name']}}
                            </td>
                            <td>
                                {{number_format($item->price, 0, ',','.') . ' VND' }}
                            </td>
                            <td>
                                {{ $item->quantity}}
                            </td>
                            <td>
                                {{number_format($item->price * $item->quantity, 0, ',','.') . ' VND'}}
                            </td>
                            <td>
                                {{$item->products->category->title}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="/shops" class="text-dark">Tiếp tục mua sắm</a>
                                    <h4 class="text-warning ">Tổng tiền: {{number_format($order->total_price,0, ',','.')
                                        . ' VND'}} </h4>
                                </div>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end my order section -->
@endsection