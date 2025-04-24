@extends('client.layouts.master')
@section('title', 'Dịch vụ - ' . $service->name)
@section('content')
    <section class="post-wrapper-top jt-shadow heading-top clearfix">
        <div class="container-fluid" style="padding: 10px 5%;">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>{{ $service->name }}</h1>
                    <ul class="breadcrumb">
                        <span><a class="link" href="/">Trang Chủ</a></span>
                        <span class="dark">/</span>
                        <li class="active">{{ $service->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="position-relative pb-5">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card bg-black mb-5 p-0 position-relative" style="height: 450px; border-radius: 12px">
                        <img src="{{ $service->thumbnail }}" width="100%" height="100%" style="border-radius:12px"
                            alt="">
                        <div class="play-button" data-video-id="{{ $service->url }}" style="opacity: 1 !important;">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="news-content" style="color: var(--text-gray)">
                        {!! $service->content !!}
                    </div>
                </div>
                @include('client.components.sidebar', ['data' => $data['sidebar']])
            </div>
        </div>
    </div>
    <div class="svg-divider">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                opacity=".25" fill="#1E64A5"></path>
            <path
                d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                opacity=".5" fill="#1E64A5"></path>
            <path
                d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                fill="#1E64A5"></path>
        </svg>
    </div>
    {{-- Quy trình làm việc --}}
    <div class="timeline-progress-mobile">
        <div class="timeline-progress-mobile-fill"></div>
    </div>

    <div class="horizontal-timeline">
        <div class="center-content section-title pb-5" data-aos="zoom-in" data-aos-delay="200">
            <h2 class="text-gradient middle-content stroke-text">
                Quy Trình Làm Việc</h2>
            <div class="divider"></div>
            <p data-aos="fade-left" data-aos-delay="300" class="text-center m-auto" style="max-width: 700px">Một hành trình
                sáng
                tạo được thiết kế tỉ mỉ để mang lại kết quả xuất sắc</p>
        </div>
        <div class="position-relative">
            <div class="container">
                <div class="timeline-line" style="translate: none;rotate: none;scale: none;transform: translate(0px, 0px);">
                </div>
                <div class="timeline-progress"></div>
                <div class="row timeline-steps">
                    <div class="col-md-3 mb-3">
                        <div class="step" data-aos="fade-up" data-aos-delay="100">
                            <div class="step-card" data-step="1">
                                <div class="step-number">1</div>
                                <div class="step-icon">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <h3 class="step-title">Ý Tưởng</h3>
                                <p class="step-content">
                                    Khám phá và xác định ý tưởng sáng tạo độc đáo cho sự kiện của bạn. Chúng tôi cùng bạn
                                    xây
                                    dựng khái niệm sự kiện hấp dẫn và khác biệt.
                                </p>
                                <span class="step-badge">Ideation</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bước 2 -->
                    <div class="col-md-3 mb-3">
                        <div class="step" data-aos="fade-up" data-aos-delay="200">
                            <div class="step-card" data-step="2">
                                <div class="step-number">2</div>
                                <div class="step-icon">
                                    <i class="fas fa-drafting-compass"></i>
                                </div>
                                <h3 class="step-title">Thiết Kế</h3>
                                <p class="step-content">
                                    Phát triển thiết kế sự kiện với các yếu tố thẩm mỹ và chức năng. Chúng tôi tạo dựng
                                    không
                                    gian sự kiện phù hợp với yêu cầu và mong đợi của bạn.
                                </p>
                                <span class="step-badge">Design</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bước 3 -->
                    <div class="col-md-3 mb-3">
                        <div class="step" data-aos="fade-up" data-aos-delay="300">
                            <div class="step-card" data-step="3">
                                <div class="step-number">3</div>
                                <div class="step-icon">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                <h3 class="step-title">Tổ Chức</h3>
                                <p class="step-content">
                                    Triển khai và quản lý sự kiện với sự chuẩn bị kỹ lưỡng. Đội ngũ chuyên nghiệp của chúng
                                    tôi
                                    đảm bảo mọi chi tiết được thực hiện hoàn hảo.
                                </p>
                                <span class="step-badge">Execution</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bước 4 -->
                    <div class="col-md-3 mb-3">
                        <div class="step" data-aos="fade-up" data-aos-delay="400">
                            <div class="step-card" data-step="4">
                                <div class="step-number">4</div>
                                <div class="step-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <h3 class="step-title">Đánh Giá</h3>
                                <p class="step-content">
                                    Đánh giá sự thành công của sự kiện và thu thập phản hồi từ khách hàng. Chúng tôi phân
                                    tích
                                    kết quả để cải thiện và tối ưu hóa sự kiện trong tương lai.
                                </p>
                                <span class="step-badge">Evaluation</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- video --}}
    <div class="modal fade p-0" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div style="position: absolute; top: 20px; right: 20px; cursor: pointer;" class="close-video">
            <i class="ti ti-x text-white fs-3"></i>
        </div>
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-transparent">
                <div class="modal-body p-0">
                    <div class="video-container">
                        <iframe src="" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end video --}}

    @include('client.components.contact')
@endsection
@push('scripts')
    <script>
        $('.play-button').click(function() {
            const videoId = $(this).attr('data-video-id');
            $('.video-container iframe').attr('src', `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`);
            $("#videoModal").modal("show");
            $('body').css('overflow', 'hidden');
        });

        $('.close-video').click(function() {
            $("#videoModal").modal("hide");
            $('.video-container iframe').attr('src', '');
            $('body').css('overflow', 'auto');
        });

        // Close modal when clicking outside
        $('.video-modal').click(function(e) {
            if ($(e.target).is('.video-modal')) {
                $("#videoModal").modal("hide");
                $('.video-container iframe').attr('src', '');
                $('body').css('overflow', 'auto');
            }
        });
    </script>
@endpush
