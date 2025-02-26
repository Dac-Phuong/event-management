@extends('client.layouts.master')
@section('title', 'Trang chủ')
@section('content')
    <div data-bs-spy="scroll" class="scrollspy-example">
        @include('client.components.home.banner')
        @include('client.components.home.introduce')
        @include('client.components.home.journey')
        @include('client.components.home.certification')
        @include('client.components.home.gallery')
        @include('client.components.home.service')
        @include('client.components.home.reviews')
        @include('client.components.home.contact')
    </div>
@endsection
