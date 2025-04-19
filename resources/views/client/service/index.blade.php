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

        /* Quy trình làm việc */
        .horizontal-timeline {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-top: 50px;
        }

        .timeline-header {
            text-align: center;
            margin-bottom: 60px;
            padding: 0 40px;
        }

        .timeline-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
            background: linear-gradient(90deg, var(--primary-color), #f5a623);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .timeline-subtitle {
            color: var(--text-secondary);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .timeline-line {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg,
                    rgba(221, 99, 37, 0.2),
                    var(--primary-color),
                    rgba(221, 99, 37, 0.2));
            z-index: 1;
            transform: scaleX(0);
            transform-origin: left center;
        }

        .timeline-progress {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary-color);
            z-index: 2;
            transform: scaleX(0);
            transform-origin: left center;
        }

        .timeline-steps {
            display: flex;
            position: relative;
            flex-wrap: wrap;
            z-index: 3;
        }


        .step-card {
            background: linear-gradient(145deg, #1e1e1e, #252525);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            transform-style: preserve-3d;
            transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            opacity: 1;
            border: 1px solid var(--card-border);
        }

        .step-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at center, var(--accent-glow) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .step-card.active {
            opacity: 1;
            transform: translateY(0) rotateY(0);
        }

        .step-card.highlight {
            transform: translateY(-20px) scale(1.05);
            box-shadow: 0 30px 70px rgba(221, 99, 37, 0.3);
        }

        .step-card.highlight::before {
            opacity: 0.3;
        }

        .step-number {
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
            color: white;
            border: 5px solid var(--bg-color);
            z-index: 4;
            box-shadow: 0 10px 25px rgba(221, 99, 37, 0.4);
            transition: all 0.4s ease;
        }

        .step-card.highlight .step-number {
            transform: translateX(-50%) scale(1.2);
            background: var(--primary-light);
            box-shadow: 0 0 20px var(--primary-light);
        }

        .step-icon {
            width: 70px;
            height: 70px;
            background: rgba(221, 99, 37, 0.1);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 25px;
            transition: all 0.4s ease;
            transform-style: preserve-3d;
        }

        .step-card.highlight .step-icon {
            background: rgba(221, 99, 37, 0.2);
            color: var(--primary-light);
        }

        .step-title {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--text-color);
            position: relative;
            display: inline-block;
        }

        .step-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 3px;
            transition: all 0.4s ease;
        }

        .step-card.highlight .step-title::after {
            width: 70px;
            background: var(--primary-light);
        }

        .step-content {
            color: var(--text-secondary);
            line-height: 1.8;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .step-badge {
            display: inline-block;
            background: rgba(221, 99, 37, 0.15);
            color: var(--primary-color);
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.4s ease;
        }

        .step-card.highlight .step-badge {
            background: rgba(245, 124, 61, 0.25);
            color: var(--primary-light);
        }

        .nav-arrows {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 20px;
            z-index: 10;
        }

        .nav-arrow {
            width: 50px;
            height: 50px;
            background: rgba(30, 30, 30, 0.7);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-color);
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid var(--card-border);
            backdrop-filter: blur(5px);
        }

        .nav-arrow:hover {
            background: var(--primary-color);
            transform: scale(1.1);
        }

        .timeline-progress-mobile {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: rgba(221, 99, 37, 0.2);
            z-index: 100;
        }

        .timeline-progress-mobile-fill {
            height: 100%;
            width: 0;
            background: var(--primary-color);
            transition: width 0.3s ease;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .timeline-steps .col-md-3 {
                width: 100%;
                margin: 0 auto;
            }
        }

        @media (max-width: 992px) {
            body {
                overflow-x: auto;
                overflow-y: auto;
                height: auto;
            }
            .timeline-line{
                display: none;
            }
            .timeline-line,
            .timeline-progress {
                top: 0;
                left: 50px;
                width: 4px;
                height: 100%;
                transform: scaleY(0);
                transform-origin: top center;
                display: none
            }

            .timeline-steps {
                flex-direction: column;
                padding: 0px;
                width: 100%;
            }

            .step {
                width: 100%;
            }

            .step-card {
                transform: translateX(15px) rotateX(30deg);
            }

            .step-card.active {
                transform: translateX(0) rotateX(0);
            }

            .step-number {
                left: -80px;
                top: 50%;
                transform: translateY(-50%);
            }

            .nav-arrows {
                display: none;
            }

            .timeline-progress-mobile {
                display: block;
            }
        }

        @media (max-width: 576px) {
            .timeline-title {
                font-size: 2.2rem;
            }


            .step-number {
                left: -24px;
                width: 50px;
                height: 50px;
                font-size: 1rem;
            }

            .step-icon {
                width: 60px;
                height: 60px;
                font-size: 1.8rem;
            }

            .step-title {
                font-size: 1.4rem;
            }
        }
        .svg-divider {
            position: relative;
            height: 120px;
            width: 100%;
            background: #111;
            overflow: hidden;
        }

        .svg-divider svg {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100%;
        }

        .svg-divider.top svg {
            top: 0;
            bottom: auto;
            transform: rotate(180deg);
        }
    </style>
    <section class="post-wrapper-top jt-shadow heading-top clearfix" >
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
                    <div class="news-content">
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
                opacity=".25" fill="#ff7900"></path>
            <path
                d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                opacity=".5" fill="#ff7900"></path>
            <path
                d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                fill="#ff7900"></path>
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
                <div class="timeline-line"
                    style="translate: none;rotate: none;scale: none;transform: translate(0px, 0px);">
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
