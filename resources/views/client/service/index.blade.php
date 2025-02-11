@extends('client.layouts.master')
@section('title', 'Dịch vụ - ' . $service->title)
@section('content')
    <div class="position-relative">
        @include('client.components.breadcrumb', [
            'title' => 'Dịch vụ',
            'subtitle' => $service->title,
            'name' => 'Dịch vụ',
            'url' => url('service', $service->slug),
        ])
        <div class="container py-5 ">
            <div class="row">
                <div class="col-lg-8" data-aos="fade-right">
                    <h1 class=" fw-bold fs-1 text-primary mb-1 text-uppercase">{{ $service->title }}</h1>
                    <hr class="hr-title mt-0 mb-4">
                    {!! $service->content !!}
                    <div class="d-flex align-items-center mt-5">
                        <button class="btn btn-primary"><i class="ti ti-mail-share me-2"></i> Yêu cầu tư vấn</button>
                    </div>
                </div>
            </div>
            <div class="bg_abouts_right" >
                <img decoding="async" class="img-bg__category img-fluid ls-is-cached lazyloaded lazy-load-active"
                    src="https://newdaymedia.com.vn/wp-content/uploads/2023/09/1615784999-441-graphic-design.jpg"
                    alt=""
                    data-src="https://newdaymedia.com.vn/wp-content/uploads/2023/09/1615784999-441-graphic-design.jpg"><br>
                <img decoding="async" class="img-category ls-is-cached lazyloaded lazy-load-active"
                    src="https://newdaymedia.com.vn/wp-content/uploads/2023/09/bg-services.png" alt=""
                    data-src="https://newdaymedia.com.vn/wp-content/uploads/2023/09/bg-services.png">
            </div>
        </div>
        @include('client.components.home.contact')
    @endsection
