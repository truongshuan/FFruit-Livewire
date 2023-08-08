@extends('client.layouts.master')
@section('title', 'Đơn hàng của tôi')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>FFruit</p>
                    <h1>Đơn hàng của tôi</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<!-- my order section -->
<livewire:client.my-orders />
<!-- end my order section -->
@endsection