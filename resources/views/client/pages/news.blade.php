@extends('client.layouts.master')
@section('title', 'Tin tức')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Organic Information</p>
                    <h1>Tin tức</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- latest news -->
<livewire:client.posts>
    <!-- end latest news -->
    @endsection