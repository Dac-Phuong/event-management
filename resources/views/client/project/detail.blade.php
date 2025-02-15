@extends('client.layouts.master')
@section('title', $data['project']->title)
@section('content')
    <div>
        @include('client.components.breadcrumb', [
            'title' => 'Dự án',
            'url' => url('project/' . $data['category']->slug),
            'name' => $data['category']->name,
            'subtitle' => $data['project']->title,
        ])
        <div class="container py-5">
            <div class="row ">
                <div class="col-md-9" data-aos="fade-right">
                    <div class="card mb-5 p-3" style="height: 450px; border-radius: 12px">
                        <div class="position-relative card-img" style="height: 83%">
                            <img src="{{ $data['project']->thumbnail }}" width="100%" height="100%"
                                style="border-radius:12px" alt="">
                            <div class="position-absolute top-0 start-0 bg-primary text-white px-2 py-1"
                                style="border-radius: 12px 0 12px 0; z-index: 1;">
                                {{ $data['category']->name }}
                            </div>
                            <div class="overlay"></div>
                            <div class="play-icon cursor-pointer" data-bs-toggle="modal" data-bs-target="#videoModal">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                        <h4 class="card-title mt-3 mb-1">{{ $data['project']->title }}</h4>
                        <div class="d-flex flex-wrap">
                            <p class="card-text me-3"><small class="text-muted">Người viết:
                                    {{ $data['project']->author->name ?? 'Admin' }} </small></p>
                            <p class="card-text d-flex align-items-center me-3"><small class="text-muted"><i
                                        class="ti ti-clock-hour-9 me-1"></i>
                                    {{ \Carbon\Carbon::parse($data['project']->created_at)->format('d/m/Y') }}</small></p>
                            <p class="d-flex align-items-center"><small class="text-muted"><i class="ti ti-eye me-1"></i>
                                    {{ number_format($data['project']->views) }} Lượt xem</small></p>
                        </div>
                    </div>
                    <div class="news-content">{!! $data['project']->description !!}</div>
                </div>
                <div class="col-md-3" data-aos="fade-left">
                    <div class="card">
                        <img src="https://bizmanmedia.vn/wp-content/uploads/2024/05/banner-doc-web-01-01-1.png"
                            width="100%" alt="" srcset="">
                    </div>
                    <div class="card mt-4">
                        <div class="card-header pb-0">
                            <h5 class="card-title text-uppercase">Dự án nổi bật</h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                @if (count($data['feature']) > 0)
                                    @foreach ($data['feature'] as $item)
                                        <a href="{{ $item->slug }}" class="text-decoration-none mb-2">
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
        @include('client.project.modal')
        @include('client.components.home.contact')
    </div>
@endsection
