@extends('client.layouts.master')
@section('title', $data['category']->name)
@section('content')
    <div class="mb-3">
        <section class="post-wrapper-top jt-shadow heading-top clearfix" style="">
            <div class="container-fluid" style="padding: 10px 5%;">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>{{ $data['category']->name }}</h1>
                        <ul class="breadcrumb">
                            <span><a class="link" href="/">Trang Chủ</a></span>
                            <span class="dark">/</span>
                            <li class="active">{{ $data['category']->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <div class="filter-block hidden-sm hidden-xs" style="padding: 80px 0px;">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="timeline-2">
                        <div class="timeline-container">
                            <div class="timeline-card"><a class="{{ request()->is('du-an') ? 'active' : '' }}" href="{{ url('/du-an') }}" href="{{ url('/du-an') }}"
                                    style="cursor: pointer;">Tất cả</a></div>
                            @foreach ($data['categories'] as $category)
                                <div class="timeline-card"><a class="{{ request()->is('du-an/' . $category->slug) ? 'active' : '' }}" href="{{ url('/du-an/' . $category->slug) }}"
                                        style="cursor: pointer;">{{ $category->name }}</a></div>
                            @endforeach
                            <div class="liner"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="global home_service_calatogue top30">
            <div class="home-service-cate home-service-catalogue-wrapper top30">
                @if (count($data['project']) > 0)
                    <div class="grid-box-2">
                        @foreach ($data['project'] as $item)
                            <div class="service-with-imagez">
                                <div class="box-img"><img src="{{ $item->thumbnail }}" alt="{{ $item->title }}"
                                        class="home-service-img">
                                    <div class="service-title-block">
                                        <div class="service-name portforlio-page"> <a
                                                href="{{ url('/du-an/' . $data['category']->slug . '/' . $item->slug) }}">
                                                {{ $item->title }}
                                            </a></div>
                                        <div class="service-desc">
                                            <div><span>Tác giả</span> : <span>{{ $item->author->name ?? 'Admin' }}</span>
                                            </div>
                                        </div>
                                        <div class="service-desc"></div>
                                    </div> <span><span><a href="{{ asset($item->thumbnail) }}"
                                                data-thumb="{{ asset($item->thumbnail) }}" data-fancybox="album622"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="mx-auto justify-center">
                        @include('client.components.empty')
                    </div>
                @endif
            </div>
            <div class="mx-auto mt-4 d-flex justify-content-center">
                {{ $data['project']->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
