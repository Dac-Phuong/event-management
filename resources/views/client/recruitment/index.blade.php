@extends('client.layouts.master')
@section('title', 'Tuyển dụng')
@section('content')
    <div>
        @include('client.components.breadcrumb', ['title' => 'Tuyển dụng', 'subtitle' => 'Tuyển dụng'])
        <div class="container py-5">
            <div class="row ">
                <div class="col-md-9">
                    @if (count($recruitment) > 0)
                        @foreach ($recruitment as $item)
                            <div class="col-md" data-aos="fade-right">
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4 overflow-hidden card-hover">
                                            <a href="{{ 'recruitment/' . $item->slug }}">
                                                <img class="card-img card-img-left" height="100%"
                                                    src="{{ asset($item->thumbnail) }}" alt="Card image">
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <a href="{{ 'recruitment/' . $item->slug }}"
                                                    class="text-decoration-none text-black">
                                                    <h5 class="card-title">{{ $item->title }}</h5>
                                                </a>
                                                <p class="card-text mb-2"
                                                    style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                    {!! nl2br(e($item->description)) !!}
                                                </p>
                                                <p class="card-text mb-0"><small class="text-muted">Số lượng:
                                                        {{ $item->number }}</small></p>
                                                <p class="card-text mb-0 "><small class="text-muted">Trạng thái: <span
                                                            class="fw-semibold text-{{ $item->status == '1' ? 'primary' : 'danger' }}">
                                                            {{ $item->status == '1' ? 'Đang mở' : 'Đã đóng' }}</small></p>
                                                <p class="card-text"><small class="text-muted"> Ngày hết hạn:
                                                        {{ \Carbon\Carbon::parse($item->expired_at)->format('d/m/Y') }}</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $recruitment->links('pagination::custom') }}
                    @else
                        @include('client.components.empty')
                    @endif
                </div>
                <div class="col-md-3" data-aos="fade-left">
                    <div class="card">
                        <div class="card-body p-2">
                            <div class="list-group">
                                <div class="demo-inline-spacing">
                                    <ul class="list-group mt-0">
                                        <li class="list-group-item d-flex align-items-center">
                                            <h5 class="mb-0">Danh sách dịch vụ</h5>
                                        </li>
                                        @if (isset($services) && count($services) > 0)
                                            @foreach ($services as $item)
                                                <li class="list-group-item d-flex align-items-center">
                                                    <a href="{{ 'service/' . $item->slug }}" class="text-list text-hover">
                                                        <i class="ti ti-arrow-badge-right me-1"></i>
                                                        {{ $item->name }}
                                                    </a>

                                                </li>
                                            @endforeach
                                        @else
                                            <p class="text-primary">Chưa có tin nổi bật</p>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                   {{-- <div class="card mt-4">
                     <img src="https://bizmanmedia.vn/wp-content/uploads/2024/05/banner-doc-web-01-01-1.png" width="100%" height="100%"
                        alt="" srcset="">
                   </div> --}}
                </div>
            </div>
        </div>
        @include('client.components.home.contact')
    </div>
@endsection
