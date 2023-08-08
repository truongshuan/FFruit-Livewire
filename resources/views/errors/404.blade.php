@extends('client.layouts.master')
@section('title', '404')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>FFruit</p>
                    <h1>404 - Not Found</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<!-- error section -->
<div class="full-height-section error-section">
    <div class="full-height-tablecell">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="error-text">
                        <i class="far fa-sad-cry"></i>
                        <h1>Không tìm thấy trang !</h1>
                        <p>Trang bạn yêu cầu không tồn tại</p>
                        <a href="/" class="boxed-btn">Trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end error section -->
@endsection