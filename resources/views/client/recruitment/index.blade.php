@extends('client.layouts.master')
@section('title', 'Tuyển dụng')
@section('content')
    <div>
         <section class="post-wrapper-top jt-shadow heading-top clearfix" style="">
            <div class="container-fluid" style="padding: 10px 5%;">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>Tuyển dụng</h1>
                        <ul class="breadcrumb">
                            <span><a class="link" href="/">Trang Chủ</a></span>
                            <span class="dark">/</span>
                            <li class="active">Tuyển dụng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    @if (count($recruitment) > 0)
                        @foreach ($recruitment as $item)
                            <div class="shadow mb-3 rounded-3 card-hover" style="background: rgba(30, 30, 30, 0.7);">
                                <div class="row g-0">
                                    <div class="col-md-4 overflow-hidden card-hover">
                                        <a href="{{ 'tuyen-dung/' . $item->slug }}">
                                            <img class="card-img card-img-left hover-zoom" height="100%"
                                                src="{{ asset($item->thumbnail) }}" alt="Card image" style="border-radius: 10px 0 0 10px">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body" style="padding: 10px; 15px">
                                            <a href="{{ 'tuyen-dung/' . $item->slug }}"
                                                class="text-decoration-none text-black">
                                                <h5 class="card-title fs-5 text-white">{{ $item->title }}</h5>
                                            </a>
                                            <p class="mb-2"
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                {!! nl2br(e($item->description)) !!}
                                            </p>
                                            <p class="mb-0"><small class="text-gray">Số lượng:
                                                    {{ $item->number }}</small></p>
                                            <p class="mb-0 "><small class="text-gray">Trạng thái: <span
                                                        class="fw-semibold text-{{ $item->status == '1' ? 'primary' : 'danger' }}">
                                                        {{ $item->status == '1' ? 'Đang mở' : 'Đã đóng' }}</small></p>
                                            <p class="text-white"><small class="text-gray"> Ngày hết hạn:
                                                    {{ \Carbon\Carbon::parse($item->expired_at)->format('d/m/Y') }}</small>
                                            </p>
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
                @include('client.components.sidebar', ['data' => $data['sidebar']])
            </div>
        </div>
    </div>
@endsection
