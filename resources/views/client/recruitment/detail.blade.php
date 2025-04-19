@extends('client.layouts.master')

@section('title', $recruitment->title)

@section('content')
    <section class="post-wrapper-top jt-shadow heading-top clearfix" style="">
        <div class="container-fluid" style="padding: 10px 5%;">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>{{$recruitment->title}}</h1>
                    <ul class="breadcrumb">
                        <span><a class="link" href="/">Trang Chủ</a></span>
                        <span class="dark">/</span>
                        <li class="active">{{$recruitment->title}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card mb-5 p-3" style="height: 450px; border-radius: 12px;background: rgba(30, 30, 30, 0.7);">
                    <img src="{{ $recruitment->thumbnail }}" width="100%" height="83%" style="border-radius:12px"
                        alt="">
                    <h4 class="card-title mt-3 mb-1">{{ $recruitment->title }}</h4>
                    <div class="d-flex flex-wrap">
                        <p class="me-3"><small class="text-secondary">Người viết:
                                {{ $recruitment->author->name ?? 'Admin' }} </small></p>
                        <p class="d-flex align-items-center me-3"><small class="text-secondary"><i
                                    class="ti ti-clock-hour-9 me-1"></i>
                                {{ \Carbon\Carbon::parse($recruitment->created_at)->format('d/m/Y') }}</small></p>
                        <p class="d-flex align-items-center"><small class="text-secondary"><i class="ti ti-eye me-1"></i>
                                {{ number_format($recruitment->views) }} Lượt xem</small></p>
                    </div>
                </div>
                <div class="news-content">{!! $recruitment->content !!}</div>
                @if (isset($recruitment->url) && $recruitment->status == 1)
                    <a href="{{ $recruitment->url }}" target="_blank" class="btn btn-primary rounded-pill"> <i
                            class="ti ti-share-3 me-2"></i>Ứng tuyển ngay</a>
                @endif
            </div>
            @include('client.components.sidebar', ['data' => $data['sidebar']])
        </div>
    </div>
@endsection
