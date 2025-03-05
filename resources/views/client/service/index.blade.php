@extends('client.layouts.master')
@section('title', 'Dịch vụ - ' . $service->name)
@section('content')
    <style>
        .gallery-item {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            opacity: 0;
            border-radius: 0px !important;
            transform: translateY(20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .gallery-item:hover .overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .overlay h4 {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .overlay .btn {
            transition: 0.3s;
        }

        .overlay .btn:hover {
            transform: scale(1.05);
        }
    </style>
    <div class="position-relative">
        @include('client.components.breadcrumb', [
            'title' => 'Dịch vụ',
            'subtitle' => $service->name,
            'name' => 'Dịch vụ',
            'url' => url('dich-vu', $service->slug),
        ])
        <section>
            <div class="container py-5 ">
                <div class="row">
                    <div class="col-lg-8" data-aos="fade-right">
                        <h1 class=" fw-bold fs-1 text-primary mb-1">{{ $service->name }}</h1>
                        <hr class="hr-title mt-0 mb-4">
                        {!! $service->content !!}
                        <div class="d-flex align-items-center my-4">
                            <button class="btn btn-primary rounded-pill scrollToContact"><i class="ti ti-mail-share me-2"></i>
                                Yêu
                                cầu tư vấn</button>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-left">
                        <div class="position-relative service-right">
                            <img src="{{ asset($service->thumbnail) }}" class="service-img" alt="" width="100%"
                                height="100%">
                            <div class="overlay"></div>
                            <div class="play-yt-icon cursor-pointer" data-bs-toggle="modal" data-bs-target="#videoModal">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="mb-4 d-flex flex-column align-items-center">
                <h1 class="fw-bold fs-1 text-primary " data-aos="fade-up">Quy trình làm việc</h1>
                <p class="text-center text-muted" data-aos="fade-up">Khám phá cách chúng tôi hợp tác với bạn để biến ý tưởng
                    thành hiện
                    thực một cách hiệu quả và sáng tạo.</p>
            </div>
            <div class="workflow" id="workflow" data-aos="fade-up">
                <div class="step" id="step1">
                    <i class="fas fa-search icon"></i>
                    <h4 class="step-title text-white">Bước 1</h4>
                    <p class="description">Thu thập yêu cầu từ khách hàng.</p>
                </div>
                <div class="arrow fs-1 d-none d-md-block">&#x2192;</div>
                <div class="step" id="step2">
                    <i class="fas fa-chart-line icon"></i>
                    <h4 class="step-title text-white">Bước 2</h4>
                    <p class="description">Phân tích thông tin & hình thành ý tưởng.</p>
                </div>
                <div class="arrow fs-1 d-none d-md-block">&#x2192;</div>
                <div class="step" id="step3">
                    <i class="fas fa-pencil-ruler icon"></i>
                    <h4 class="step-title text-white">Bước 3</h4>
                    <p class="description">Xây dựng nội dung & kế hoạch chi tiết.</p>
                </div>
                <div class="arrow fs-1 d-none d-md-block">&#x2192;</div>
                <div class="step" id="step4">
                    <i class="fas fa-cogs icon"></i>
                    <h4 class="step-title text-white">Bước 4</h4>
                    <p class="description">Kiểm thử & triển khai.</p>
                </div>
                <div class="arrow fs-1 d-none d-md-block">&#x2192;</div>
                <div class="step" id="step5">
                    <i class="fas fa-headset icon"></i>
                    <h4 class="step-title text-white">Bước 5</h4>
                    <p class="description">Kết thúc & tổng kết dự án.</p>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row" data-aos="fade-up">
                    @if (isset($service->newsMany) && count($service->newsMany) > 0)
                        <div class="mb-4 d-flex flex-column align-items-center">
                            <h1 class="text-center fw-bold fs-1 text-primary mb-1">Sản phẩm của chúng tôi
                            </h1>
                            <p class="text-center text-muted">Chúng tôi luôn nỗ lực mang lại cho khách hàng những sản phẩm
                                tốt
                                nhất, hiệu quả nhất</p>
                        </div>
                        <div id="lightgallery" class="owl-carousel owl-theme">
                            @foreach ($service->newsMany as $news)
                                <div class="gallery-item">
                                    <a href="{{ asset($news->thumbnail) }}" data-src="{{ asset($news->thumbnail) }}" data-sub-html="<h4>{{ $news->title }}</h4>">
                                        <img src="{{ asset($news->thumbnail) }}" class="img-fluid" alt="Sản phẩm" />
                                    </a>
                                    <div class="overlay">
                                        <h4 class="text-white">{{$news->title}}</h4>
                                        <div class="d-flex gap-2">
                                            <a href="{{ asset('blog/'. $news->category->slug . '/' . $news->slug) }}" class="btn btn-primary btn-sm rounded-pill"><i
                                            class="ti ti-scan-eye me-2"></i>Xem bài viết</a>
                                            <a href="{{ asset($news->thumbnail) }}" class="rounded-pill btn btn-light btn-sm view-image"><i
                                            class="ti ti-zoom-pan me-2"></i>Xem ảnh</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="z-index: 1"></button>
                </div>
                <div class="modal-body p-2">
                    <div class="ratio ratio-16x9">
                        <iframe id="videoFrame" src="https://www.youtube.com/embed/{{ $service->url }}?autoplay=1"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('client.components.home.contact')
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            var owl = $("#lightgallery");

            owl.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    },
                }
            });

            lightGallery(document.getElementById("lightgallery"), {
                selector: ".view-image",
                zoom: false,
                fullScreen: false,
                showInlineComments:false,
                showComments: false,
                share: false,
                counter: false,
                download: false,
                rotate: false,
                flipHorizontal: false,
                flipVertical: false,
                toggleThumb: false,
                thumbnail: true,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var videoSrc = $("#videoFrame").attr("src");
            $("#videoModal").on("hidden.bs.modal", function() {
                $("#videoFrame").attr("src", "");
            });
            $("#videoModal").on("shown.bs.modal", function() {
                $("#videoFrame").attr("src", videoSrc);
            });
        });
    </script>
@endpush

