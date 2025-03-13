@extends('client.layouts.master')
@section('title', 'Tin tức - Tin tức sự kiện')
@section('content')
    <div>
        @include('client.components.breadcrumb', [
            'title' => 'Tin tức sự kiện',
            'url' => url('blog/' . $data['category']->slug),
            'name' => $data['category']->name,
            'subtitle' => $data['news']->title,
        ])
        <div class="container py-5">
            <div class="row ">
                <div class="col-md-9" data-aos="fade-right">
                    <div class="card mb-5 p-3" style="height: 450px; border-radius: 12px">
                        <div class="position-relative" style="height: 83%">
                            <img src="{{ $data['news']->thumbnail }}" width="100%" height="100%" style="border-radius:12px"
                                alt="">
                            <div class="position-absolute top-0 start-0 bg-primary text-white px-2 py-1"
                                style="border-radius: 12px 0 12px 0">{{ $data['category']->name }}</div>

                        </div>
                        <h4 class="card-title mt-3 mb-1">{{ $data['news']->title }}</h4>
                        <div class="d-flex flex-wrap">
                            <p class="card-text me-3"><small class="text-muted">Người viết:
                                    {{ $data['news']->author->name ?? 'Admin' }} </small></p>
                            <p class="card-text d-flex align-items-center me-3"><small class="text-muted"><i
                                        class="ti ti-clock-hour-9 me-1"></i>
                                    {{ \Carbon\Carbon::parse($data['news']->created_at)->format('d/m/Y') }}</small></p>
                            <p class="d-flex align-items-center"><small class="text-muted"><i class="ti ti-eye me-1"></i>
                                    {{ number_format($data['news']->views) }} Lượt xem</small></p>
                        </div>
                    </div>
                    <div class="news-content">{!! $data['news']->description !!}</div>
                    <div class="d-flex align-items-center mb-3">
                        @if (!empty($data['news']->tags))
                            <p class="mb-0"><i class="ti ti-tag me-1"></i>Tags:
                                @foreach ($data['news']->tags as $tag)
                                    <a href="{{ url('tag/' . $tag->slug) }}"
                                        class="badge bg-label-primary rounded-pill me-2 fw-bold">{{ $tag->name }}</a>
                                @endforeach
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-left">
                    <div class="card">
                        <img src="https://bizmanmedia.vn/wp-content/uploads/2024/05/banner-doc-web-01-01-1.png"
                            width="100%" alt="" srcset="">
                    </div>
                    @include('client.components.category', ['categories' => $data['categories']])
                    @include('client.components.outstanding', ['feature' => $data['feature']])
                </div>
            </div>
        </div>
        @include('client.components.home.contact')
    </div>
@endsection
