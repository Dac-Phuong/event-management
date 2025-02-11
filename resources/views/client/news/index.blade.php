@extends('client.layouts.master')
@section('title', 'Tin tức - Tin tức sự kiện')
@section('content')
    <div>
        @include('client.components.breadcrumb', [
            'title' => 'Tin tức sự kiện',
            'subtitle' => $data['category']->name,
        ])
        <div class="container py-5">
            <div class="row ">
                <div class="col-md-9" data-aos="fade-right">
                    @if (count($data['news']) > 0)
                        @foreach ($data['news'] as $item)
                            <div class="col-md">
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4 overflow-hidden card-hover">
                                            <a href="{{ $data['category']->slug . '/' . $item->slug }}">
                                                <img class="card-img card-img-left" height="100%"
                                                    src="{{ asset($item->thumbnail) }}" alt="Card image">
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <a href="{{ $data['category']->slug . '/' . $item->slug }}"
                                                    class="text-decoration-none text-black">
                                                    <h5 class="card-title">{{ $item->title }}</h5>
                                                </a>
                                                <p class="card-text"
                                                    style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                    {!! nl2br(e($item->content)) !!}
                                                </p>
                                                <p class="card-text"><small class="text-muted"><i
                                                            class="ti ti-calendar-stats me-2"></i>
                                                        {{ $item->created_at }}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $data['news']->links('pagination::custom') }}
                    @else
                        @include('client.components.empty')
                    @endif
                </div>
                <div class="col-md-3" data-aos="fade-left">
                    <img src="https://bizmanmedia.vn/wp-content/uploads/2024/05/banner-doc-web-01-01-1.png" width="100%"
                        alt="" srcset="">
                    <div class="card mt-4">
                        <div class="card-header pb-0">
                            <h5 class="card-title text-uppercase">Tin tức nổi bật</h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                @if (count($data['feature']) > 0)
                                    @foreach ($data['feature'] as $item)
                                        <a href="{{ $data['category']->slug . '/' . $item->slug }}"
                                            class="text-decoration-none mb-2">
                                            <div class="d-flex w-100 justify-content-between">
                                                <img class="card-img " height="70" width="50"
                                                    src="{{ asset($item->thumbnail) }}" alt="Card image"
                                                    style="width: 80px; ">
                                                <div style="margin-left: 10px">
                                                    <h5 class="card-title fs-6 text-uppercase m-0"
                                                        style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                        {{ $item->title }}</h5>
                                                    <p class="card-text"><small class="text-muted"><i
                                                                class="ti ti-calendar-stats me-2"></i>
                                                            {{ $item->created_at }}</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                @else
                                    <p class="text-primary">Chưa có tin nổi bật</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('client.components.home.contact')
    </div>
@endsection
