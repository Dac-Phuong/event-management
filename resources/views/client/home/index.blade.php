@extends('client.layouts.master')
@section('title', 'Trang chủ')
@section('content')
    <div data-bs-spy="scroll" class="scrollspy-example">
        @include('client.components.home.banner')
        @include('client.components.home.gallery')
        @include('client.components.home.service')
        @include('client.components.home.project')
        @include('client.components.home.review')
        @include('client.components.contact')
    </div>
@endsection
