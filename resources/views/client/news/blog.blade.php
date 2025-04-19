@extends('client.layouts.master')
@section('title', 'Blog')
@section('content')
    <div>
        <section class="post-wrapper-top jt-shadow heading-top clearfix" style="">
            <div class="container-fluid" style="padding: 10px 5%;">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>Blog</h1>
                        <ul class="breadcrumb">
                            <span><a class="link" href="/">Trang Chủ</a></span>
                            <span class="dark">/</span>
                            <li class="active">Blog</li>
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
                            <a>Tin mới nhất</a>
                        </div>
                        @foreach ($data['news'] as $index => $item)
                            <div
                                class="{{ $index == 0 ? 'col-xs-12 col-sm-12 col-md-8 col-lg-8' : 'col-xs-6 col-sm-6 col-md-4 col-lg-4' }} blog-item">
                                <div class="blog-cate-img position-relative {{ $index == 0 ? 'h-100' : '' }}">
                                    <a href="{{ url('/blog/' . $item->category->slug . '/' . $item->slug) }}">
                                        <img data-src="{{ $item->thumbnail }}" src="{{ $item->thumbnail }}"
                                            style="{{ $index == 0 ? '' : 'height: 200px;' }} border-radius: 8px;"
                                            class="blog-cate-img-item lozad border-none rounded-2" data-loaded="true">
                                    </a>

                                    <div class="blog-cate-content {{ $index == 0 ? 'first' : '' }}">
                                        <h5 class="blog-cate-title"><a
                                                href="{{ url('/blog/' . $item->category->slug . '/' . $item->slug) }}">{{ $item->title }}</a>
                                        </h5>
                                        <p class="blog-cate-brief">{{ $item->content }}.</p>
                                        <div class="blog-carousel-meta">
                                            <a href="{{ url('/blog/' . $item->category->slug) }}" class="post-category"
                                                style="">{{ $item->category->name }}</a>
                                            <span class="post-created-at"
                                                style="font-size:11px;font-weight: bold;color:#969696;">•&nbsp;
                                                {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                    @foreach ($data['category'] as $item)
                        <div class="row row-flex top20">
                            <div class="col-xs-12 blogcate-title-block">
                                <a href="{{ url('blog/' . $item->slug) }}">{{ $item->name }}</a>
                                <a class="pull-right" href="{{ url('blog/' . $item->slug) }}">Tất cả <i
                                        class="ti ti-arrow-narrow-right"></i></a>
                            </div>
                            @foreach ($item->news as $news)
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 blog-item">
                                    <div class="blog-cate-img ">
                                        <a href="{{ url('/blog/' . $news->category->slug . '/' . $news->slug) }}">
                                            <img data-src="{{ $news->thumbnail }}" src="{{ $news->thumbnail }}"
                                                alt="{{ $news->title }}" class="blog-cate-img-item lozad"
                                                data-loaded="true"></a>
                                    </div>
                                    <div class="blog-cate-content">
                                        <h3 class="blog-cate-title"><a
                                                href="{{ url('/blog/' . $news->category->slug . '/' . $news->slug) }}">{{ $news->title }}</a>
                                        </h3>
                                        <p class="blog-cate-brief">{{ $news->content }}.</p>
                                        <div class="blog-carousel-meta">
                                            <a href="{{ url('/blog/' . $news->category->slug) }}" class="post-category"
                                                style="">{{ $news->category->name }}</a>
                                            <span class="post-created-at"
                                                style="font-size:11px;font-weight: bold;color:#969696;">•&nbsp;
                                                {{ \Carbon\Carbon::parse($news->created_at)->format('d/m/Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                @include('client.components.sidebar', ['data' => $data['sidebar']])
            </div>
        </div>
    </div>
@endsection
