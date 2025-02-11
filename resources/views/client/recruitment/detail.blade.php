@extends('client.layouts.master')

@section('title', 'Chi tiết tuyển dụng')

@section('content')
    @include('client.components.breadcrumb', [
        'title' => 'Tuyển dụng',
        'subtitle' => $recruitment->title,
        'name' => 'Tuyển dụng',
        'url' => url('recruitment'),
    ])
    <div class="container py-5">
        <div class="row ">
            <div class="col-md-9" data-aos="fade-right">
                <div class="card mb-5 p-3" style="height: 450px; border-radius: 12px">
                    <img src="{{ $recruitment->thumbnail }}" width="100%" height="83%" style="border-radius:12px"
                        alt="">
                    <h4 class="card-title mt-3 mb-1">{{ $recruitment->title }}</h4>
                    <div class="d-flex">
                        <p class="card-text"><small class="text-muted"><i class="ti ti-calendar-stats me-2"></i>
                                Ngày hết hạn: {{ \Carbon\Carbon::parse($recruitment->expired_at)->format('d/m/Y') }}</small>
                        </p>
                        <p class="card-text" style="margin-left: 30px;"><small class="text-muted"><i
                                    class="ti ti-eye me-2"></i>
                                {{ $recruitment->views }} Lượt xem</small></p>
                    </div>
                </div>
                <div class="news-content">{!! $recruitment->content !!}</div>
                @if (isset($recruitment->url) && $recruitment->status == 1)
                    <a href="{{ $recruitment->url }}" target="_blank" class="btn btn-primary"> <i class="ti ti-share-3 me-2"></i>Ứng tuyển ngay</a>
                @else
                    <a href="{{ url('contact') }}" class="btn btn-primary">Liên hệ</a>
                @endif
            </div>
            <div class="col-md-3" data-aos="fade-left">
                <div class="card">
                    <img src="https://bizmanmedia.vn/wp-content/uploads/2024/05/banner-doc-web-01-01-1.png" width="100%"
                        alt="" srcset="">
                </div>
                <div class="card mt-4">
                    <div class="card-header pb-0">
                        <h5 class="card-title text-uppercase">Tin tức nổi bật</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            {{-- @if (count($data['feature']) > 0)
                                @foreach ($data['feature'] as $item)
                                    <a href="{{ $item->slug }}" class="text-decoration-none mb-2">
                                        <div class="d-flex w-100 justify-content-between">
                                            <img class="card-img " height="70" width="50"
                                                src="{{ asset($item->thumbnail) }}" alt="Card image" style="width: 80px; ">
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
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('client.components.home.contact')
@endsection
