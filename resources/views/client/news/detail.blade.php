@extends('client.layouts.master')
@section('title', 'Blog')
@section('content')
    <div>
        <section class="post-wrapper-top jt-shadow heading-top clearfix" style="">
            <div class="container-fluid" style="padding: 10px 5%;">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="breadcrumb-title">{{ $data['news']->title }}</h1>
                        <ul class="breadcrumb">
                            <span><a class="link" href="/">Trang Chủ</a></span>
                            <span class="dark">/</span>
                            <li class="active">{{ $data['news']->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row mt-4">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card shadow p-3" style="height: 450px; border-radius: 12px;background: rgba(30, 30, 30, 0.7);">
                        <img src="{{ $data['news']->thumbnail }}" width="100%" height="83%" style="border-radius:12px"
                            alt="">
                        <h4 class="card-title text-uppercase mt-3 mb-1">{{ $data['news']->title }}</h4>
                        <div class="d-flex flex-wrap">
                            <p class="me-3"><small class="text-secondary">Người viết:
                                    {{ $data['news']->author->name ?? 'Admin' }} </small></p>
                            <p class="d-flex align-items-center me-3"><small class="text-secondary"><i
                                        class="ti ti-clock-hour-9 me-1"></i>
                                    {{ \Carbon\Carbon::parse($data['news']->created_at)->format('d/m/Y') }}</small></p>
                            <p class="d-flex align-items-center"><small class="text-secondary"><i
                                        class="ti ti-eye me-1"></i>
                                    {{ number_format($data['news']->views) }} Lượt xem</small></p>
                        </div>
                    </div>
                    <div class="detail_box wrap article mt-3">
                        <div class="article-content">
                            {!! $data['news']->description !!}
                        </div>
                    </div>
                    @if (!empty($data['news']->tags) && count($data['news']->tags) > 0)
                        <div class="d-flex align-items-center mb-3">
                            <p class="mb-0"><i class="ti ti-tag me-1"></i>Tags:
                                @foreach ($data['news']->tags as $tag)
                                    <a href="{{ url('tag/' . $tag->slug) }}"
                                        class="badge rounded-pill me-2 fw-bold text-white"
                                        style="background: #DD6325;">{{ $tag->name }}</a>
                                @endforeach
                            </p>
                        </div>
                    @endif
                </div>
                @include('client.components.sidebar', ['data' => $data['sidebar']])
            </div>
        </div>
    </div>
@endsection
