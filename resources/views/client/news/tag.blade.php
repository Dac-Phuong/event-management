@extends('client.layouts.master')
@section('title', 'Tin tức - Tin tức sự kiện')
@section('content')
    <div>
        @include('client.components.breadcrumb', [
            'title' => 'Tin tức sự kiện',
            'subtitle' => $tag->name,
        ])
        <div class="container py-5">
            <div class="row ">
                <div class="col-md-9">
                    @if (!empty($data) && count($data) > 0)
                        @foreach ($data as $item)
                            <div class="col-md" data-aos="fade-right">
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4 overflow-hidden card-hover">
                                            <a
                                                href="{{ isset($item->category) ? url('blog/' . $item->category->slug . '/' . $item->slug) : '#' }}">
                                                <img class="card-img card-img-left" height="100%"
                                                    src="{{ asset(isset($item->thumbnail) ? $item->thumbnail : 'images/no-image.png') }}"
                                                    alt="Card image">
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <a href="{{ isset($item->category) ? url('blog/' . $item->category->slug . '/' . $item->slug) : '#' }}"
                                                    class="text-decoration-none text-black">
                                                    <h5 class="card-title">{{ $item->title ?? '' }}</h5>
                                                </a>
                                                <p class="card-text mb-1"
                                                    style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                    {!! nl2br(e($item->content ?? '')) !!}
                                                </p>
                                                <p class="card-text mb-0"><small class="text-muted">Tác giả:
                                                        {{ $item->author->name ?? 'Admin' }}</small></p>
                                                <p class="card-text"><small class="text-muted">Thời gian:
                                                        {{ \Carbon\Carbon::parse($item->created_at ?? '')->format('d/m/Y') }}</small>
                                                </p>
                                                </small></p>
                                                <div class="d-flex align-items-center mb-3">
                                                    @if (!empty($item->tags))
                                                        <p class="mb-0">
                                                            @foreach ($item->tags as $tag)
                                                                <a href="{{ url('tag/' . $tag->slug) }}"
                                                                    class="badge bg-label-primary rounded-pill me-2 fw-bold">{{ $tag->name }}</a>
                                                            @endforeach
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $data->links('pagination::custom') }}
                    @else
                        @include('client.components.empty')
                    @endif
                </div>
                <div class="col-md-3" data-aos="fade-left">
                    <div class="card">
                        <img src="https://bizmanmedia.vn/wp-content/uploads/2024/05/banner-doc-web-01-01-1.png"
                            width="100%" alt="" srcset="">
                    </div>
                    @include('client.components.category', ['categories' => $categories])
                    @include('client.components.outstanding', ['feature' => $feature])
                </div>
            </div>
        </div>
        @include('client.components.home.contact')
    </div>
@endsection

