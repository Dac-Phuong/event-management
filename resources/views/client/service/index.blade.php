@extends('client.layouts.master')
@section('title', 'Dịch vụ - ' . $service->name)
@section('content')
    <div class="position-relative">
        @include('client.components.breadcrumb', [
            'title' => 'Dịch vụ',
            'subtitle' => $service->name,
            'name' => 'Dịch vụ',
            'url' => url('service', $service->slug),
        ])
        <div class="container py-5 ">
            <div class="row">
                <div class="col-lg-8" data-aos="fade-right">
                    <h1 class=" fw-bold fs-1 text-primary mb-1 text-uppercase">{{ $service->name }}</h1>
                    <hr class="hr-title mt-0 mb-4">
                    {!! $service->content !!}
                    <div class="d-flex align-items-center mt-5">
                        <button class="btn btn-primary rounded-pill scrollToContact"><i class="ti ti-mail-share me-2"></i> Yêu
                            cầu tư vấn</button>
                    </div>
                </div>
            </div>
        </div>
        @include('client.components.home.contact')
    @endsection
