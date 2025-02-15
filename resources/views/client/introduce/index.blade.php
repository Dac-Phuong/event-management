@extends('client.layouts.master')
@section('title', 'Giới thiệu')
@section('content')
    <div>
        @include('client.components.breadcrumb', ['title' => 'Giới thiệu', 'subtitle' => 'Giới thiệu'])
        @include('client.components.home.contact')
    </div>
@endsection
