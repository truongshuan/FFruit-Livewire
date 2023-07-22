@extends('admin.layouts.master')
@section('content')
@include('admin.layouts.sidebar')
{{ $slot }}
<!-- End #main -->
@endsection