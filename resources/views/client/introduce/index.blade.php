@extends('client.layouts.master')
@section('title', 'Giới thiệu')
@section('content')
    <div class="introduce">
        @include('client.components.breadcrumb', ['title' => 'Giới thiệu', 'subtitle' => 'Giới thiệu'])
        @include('client.components.introduce.index')
        @include('client.components.introduce.history')
        @include('client.components.introduce.our-team')
        @include('client.components.introduce.our-mission')
        @include('client.components.home.contact')
    </div>
@endsection
