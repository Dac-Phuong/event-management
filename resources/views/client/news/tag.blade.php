@extends('client.layouts.master')
@section('title', $tag->name)
@section('content')
    <div>
        <section class="post-wrapper-top jt-shadow heading-top clearfix" style="">
            <div class="container-fluid" style="padding: 10px 5%;">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>BLOG-TAG: {{ $tag->name }}</h1>
                        <ul class="breadcrumb">
                            <span><a class="link" href="/">Trang Chủ</a></span>
                            <span class="dark">/</span>
                            <li class="active">{{ $tag->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="row row-flex">
                        <div class="col-xs-12 blogcate-title-block">
                            <a>Tin tức</a>
                        </div>
                        @foreach ($data as $item)
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 blog-item">
                                <div class="blog-cate-img position-relative overflow-hidden">
                                    <a href="{{ isset($item->category) ? url('/blog/' . $item->category->slug . '/' . $item->slug) :'#' }}">
                                        <img data-src="{{ $item->thumbnail ?? '' }}" src="{{ $item->thumbnail ??'' }}"
                                            style="height: 200px; border-radius: 8px;"
                                            class="blog-cate-img-item lozad border-none rounded-2" data-loaded="true">
                                    </a>
                                    <div class="blog-cate-content ">
                                        <h5 class="blog-cate-title"><a
                                                href="{{ isset($item->category) ? url('/blog/' . $item->category->slug . '/' . $item->slug) :'#' }}">{{ $item->title ?? '' }}</a>
                                        </h5>
                                        <p class="blog-cate-brief">{{ $item->content ?? ''}}</p>
                                        <div class="blog-carousel-meta">
                                            <a href="{{ isset($item->category) ? url('/blog/' . $item->category->slug) :'#' }}" class="post-category"
                                                style="">{{ $item->name ?? '' }}</a>
                                            <span class="post-created-at"
                                                style="font-size:11px;font-weight: bold;color:#DD6325;">{{$item->category->name ?? ''}} •&nbsp;
                                                {{ \Carbon\Carbon::parse($item->created_at ?? '')->format('d/m/Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                        <div class="mx-auto mt-4 d-flex justify-content-center">
                            {{ $data->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                @include('client.components.sidebar', ['data' => $data['sidebar']])
            </div>
        </div>
    </div>
@endsection
