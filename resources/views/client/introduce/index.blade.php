@extends('client.layouts.master')
@section('title', 'Giới thiệu')
@section('content')
    <style>
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .modal-body {
            padding: 1.5rem;
        }

        .location-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #696868;
        }

        .location-header i {
            font-size: 1.5rem;
            color: #FF5722;
            margin-right: 0.75rem;
        }

        .location-header h5 {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
        }

        .article-compact {
            display: flex;
            margin-bottom: 1rem;
            background: rgba(30, 30, 30, 0.7);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .article-compact:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .article-image {
            width: 110px;
            min-width: 100px;
            object-fit: fill;
            height: 100%;
        }

        .article-content {
            padding: 0.75rem;
            flex: 1;
        }

        .article-title {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 0.3rem;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-meta {
            display: flex;
            align-items: center;
            font-size: 0.75rem;
            margin-bottom: 0.3rem;
            padding: 0.2rem 0;
        }

        .article-meta i {
            font-size: 0.7rem;
            margin-right: 0.3rem;
            color: #DD6325 ;
        }

        .article-excerpt {
            font-size: 0.8rem;
            margin-bottom: 0;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.4;
        }

        .category-badge {
            display: inline-block;
            padding: 0.2rem 0.5rem;
            font-size: 0.7rem;
            font-weight: 500;
            border-radius: 30px;
            margin-right: 0.5rem;
            color: white;
            background: #DD6325 
        }

        .filter-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .filter-btn {
            padding: 0.3rem 0.8rem;
            font-size: 0.8rem;
            border-radius: 30px;
            background: #f0f0f0;
            border: none;
            color: #555;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #FF5722;
            color: white;
        }

        .articles-container {
            max-height: 400px;
            overflow-y: auto;
            padding-right: 0.5rem;
        }

        .articles-container::-webkit-scrollbar {
            width: 5px;
        }

        .articles-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .articles-container::-webkit-scrollbar-thumb {
            background: #ddd;
            border-radius: 10px;
        }

        .articles-container::-webkit-scrollbar-thumb:hover {
            background: #ccc;
        }

        .btn-close-custom {
            background-color: #f0f0f0;
            color: #555;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1.2rem;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-close-custom:hover {
            background-color: #e0e0e0;
        }

        .location-info {
            background-color: rgba(30, 30, 30, 0.7);
            border-radius: 10px;
            padding: 0.8rem;
            margin-bottom: 1rem;
            font-size: 0.85rem;
            color: #fff;
            display: flex;
            align-items: center;
        }

        .location-info i {
            font-size: 1.2rem;
            margin-right: 0.5rem;
            color: #FF9800;
        }
    </style>
    <div class="introduce">
        @include('client.components.video')
        <div class="container introduce">
            <div class="section-about" id="about">
                <div class="container-about">
                    <section class="stats" data-aos="fade-up" data-aos-duration="1000">
                        <div class="container stats-container">
                            <div class="stat-item">
                                <div class="stat-number" data-target="15">0</div>
                                <div class="stat-text">Năm Kinh Nghiệm</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number" data-target="500">0+</div>
                                <div class="stat-text">Dự Án Lớn Nhỏ</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number" data-target="1000">0+</div>
                                <div class="stat-text">Khách Hàng</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number" data-target="50">0</div>
                                <div class="stat-text">Nhân Sự Chất Lượng Cao</div>
                            </div>
                        </div>
                    </section>
                    <section class="about section-padding" id="about" data-aos="fade-up" data-aos-duration="1000">
                        <div class="media-pattern pattern-top-right"></div>
                        <div class="container about-container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="about-content" data-aos="fade-right" data-aos-duration="1000">
                                        <h2 class="text-gradient middle-content mb-1 p-0 text-uppercase">Giới thiệu về chúng
                                            tôi!</h2>
                                        <div class="divider mb-3 m-0"></div>
                                        {!! isset($settings['introduce_content']) ? $settings['introduce_content'] : '' !!}
                                        <a target="_blank" href="{{ url('/profile') }}" class="cta-button mb-3">Hồ sơ năng
                                            lực <i class="fas fa-arrow-right" style="margin-left: 10px"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-center">
                                    <div class="about-image" data-aos="fade-left" data-aos-duration="1000">
                                        <img src="{{ asset(isset($settings['introduce_image_1']) ? $settings['introduce_image_1'] : 'assets/files/img/img-model.png') }}"
                                            alt="Tập đoàn Anh Son" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <section class="container-wrapper">
                    <div class="text-content" data-aos="fade-up" data-aos-duration="1000">
                        <div class="position-relative">
                            <h2 class="text-gradient middle-content stroke-text mb-1">NHỮNG NƠI ANH
                                SƠN
                                GROUP
                                ĐÃ ĐẾN</h2>
                            <div class="divider mb-3 m-0"></div>
                            <div class="mb-3">
                                <p class="text-gray">Khám phá hành trình của chúng tôi qua các tỉnh thành Việt Nam</p>
                            </div>
                        </div>
                        <div class="location-list" data-aos="fade-up" data-aos-duration="1000">
                            @foreach ($location_news as $location)
                                <span class="location" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-location="{{ $location->name }}" data-news='@json($location->locationNews->pluck('news'))'>
                                    {{ $location->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <!-- Bản đồ bên phải -->
                    <div class="map-box" data-aos="fade-left" data-aos-duration="1000">
                        <img src="{{ asset('assets/files/banners/ban-do.png') }}" alt="Bản đồ hành trình" class="map-image">
                    </div>
                </section>
                <div class="our-team">
                    <div class="container py-5" style="padding-right: 0px !important;">
                        @foreach ($our_team as $team)
                            <div class="center-content position-relative" data-aos="fade-up" data-aos-duration="1000">
                                <h2 class="text-gradient middle-content stroke-text">
                                    {{ $team->name }}</h2>
                                <div class="divider "></div>
                                <p class="mt-2 text-center m-auto" style="max-width: 700px">
                                    {!! $team->description !!}
                                </p>
                            </div>
                            <div class="row pt-5">
                                @foreach ($team->userProfile as $users)
                                    <div class="row mb-5 align-items-center intro-card position-relative" data-aos="fade-up"
                                        data-aos-duration="1000">
                                        @if ($loop->iteration % 2 != 0)
                                            <div class="col-md-6 our-team-card">
                                                <div class="p-0 md-p-4"
                                                    style="border-radius: 12px; z-index: 1; background: #111111;">
                                                    <img src="{{ $users->avatar }}" alt=""
                                                        class="profile-picture w-100"
                                                        style="height: 500px; border-radius: 12px;">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 py-3 px-4 mt-3 mt-md-0 card-info">
                                                <h2 class="text-uppercase mt-2">{{ $users->user->name }}</h2>
                                                <p class="text-secondary ">{{ $users->position }}</p>
                                                <div class="mb-4">
                                                    {!! $users->content !!}
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-6 order-md-2 our-team-card">
                                                <div class="p-0 md-p-4"
                                                    style="border-radius: 12px; z-index: 1; background: #111111;">
                                                    <img src="{{ $users->avatar }}" alt=""
                                                        class="profile-picture w-100"
                                                        style="height: 500px; border-radius: 12px;">
                                                </div>
                                            </div>
                                            <div
                                                class="col-md-6 card-content order-md-1 p-3 pt-md-0 pb-md-5 align-items-center">
                                                <div class="text-white mt-4 py-3 px-4 card-info-1">
                                                    <h2 class="text-uppercase mt-2">{{ $users->user->name }}</h2>
                                                    <p class="text-secondary">{{ $users->position }}</p>
                                                    <div class="mb-4" style="color: #aaa;">
                                                        {!! $users->content !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Vision & Mission Section -->
        <section class="vm-section" data-aos="fade-up" data-aos-duration="1000">
            <div class="center-content position-relative">
                <h2 class="text-gradient middle-content stroke-text"> Tầm nhìn & Sứ mệnh</h2>
                <div class="divider "></div>
                <p class="mt-2 text-center m-auto" style="max-width:800px">
                    Tập đoàn Anh Sơn cam kết trở thành sứ giả truyền tải văn hóa Việt Nam ra thế giới, lan tỏa bản sắc dân tộc và kết nối du khách quốc tế khám phá vẻ đẹp đất nước. Chúng tôi không ngừng sáng tạo và đổi mới để mang đến giá trị bền vững cho cộng đồng.
                </p>
            <div class="container position-relative py-5" style="z-index: 2;" data-aos="fade-up"
                data-aos-duration="1000">
                <div class="d-flex flex-wrap justify-content-between gap-4">
                    <!-- TẦM NHÌN -->
                    <div class="d-flex flex-column align-items-center p-1 text-white"
                        style="flex: 1 1 30%; border-radius:12px; min-width: 280px; padding:4px;
                            border-radius: 15px;
                            background-image: linear-gradient(var(--rotate), #ff7900, #111 50%);
                            animation: spin 15s linear infinite;"
                        data-aos="zoom-in" data-aos-duration="1000">
                        <div class="w-100 h-100 p-4" style="border-radius:12px; background-color: rgba(30, 30, 30, 1);">
                            <div class="icon-circle mb-3">
                                <i class="fas fa-award"></i>
                            </div>
                            <h4 class="section-title text-center fs-3">Tầm nhìn</h4>
                            <p class="section-content text-center">
                                Trở thành sứ giả của văn hóa Việt Nam trên thị trường quốc tế.<br>
                                <span class="highlight">“Cùng văn hóa Việt Nam vươn xa”</span> – lan tỏa bản sắc dân tộc,
                                kết
                                nối du khách năm châu khám phá Việt Nam.
                            </p>
                        </div>
                    </div>

                    <!-- GIÁ TRỊ CỐT LÕI -->
                    <div class="d-flex flex-column align-items-center p-1 text-white"
                        style="flex: 1 1 30%; background-color: rgba(30, 30, 30, 1); border-radius:12px; min-width: 280px;
                            padding:4px;
                            border-radius: 15px;
                            background-image: linear-gradient(var(--rotate), #ff7900, #111 50%);
                            animation: spin 15s linear infinite;"
                        data-aos="zoom-in" data-aos-duration="1000">
                        <div class="w-100 h-100 p-4" style="border-radius:12px; background-color: rgba(30, 30, 30, 1);">
                            <div class="icon-circle mb-3">
                                <i class="fas fa-users-cog"></i>
                            </div>
                            <h4 class="section-title text-center fs-3">Giá trị cốt lõi</h4>
                            <p class="section-content text-center">
                                <strong>Am hiểu văn hóa Việt Nam</strong><br>
                                Trân trọng, gìn giữ bản sắc dân tộc và không ngừng học hỏi để mang đến những góc nhìn văn
                                hóa
                                chân thực.
                                <br><br>
                                <strong>Sáng tạo</strong><br>
                                Kết hợp tinh hoa truyền thống với hiện đại, tạo nên những trải nghiệm độc đáo.
                                <br><br>
                                <strong>Trách nhiệm & Uy tín</strong><br>
                                Cam kết chất lượng, đề cao trách nhiệm và sự tín nhiệm để mang lại giá trị bền vững.
                            </p>
                        </div>
                    </div>

                    <!-- SỨ MỆNH -->
                    <div class="d-flex flex-column align-items-center p-1 text-white"
                        style="flex: 1 1 30%; background-color: rgba(30, 30, 30, 1); border-radius:12px; min-width: 280px;
                         padding:4px;
                            border-radius: 15px;
                            background-image: linear-gradient(var(--rotate), #ff7900, #111 50%);
                            animation: spin 15s linear infinite;"
                        data-aos="zoom-in" data-aos-duration="1000">
                        <div class="w-100 h-100 p-4" style="border-radius:12px; background-color: rgba(30, 30, 30, 1);">
                            <div class="icon-circle mb-3">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                            <h4 class="section-title text-center fs-3">Sứ mệnh</h4>
                            <p class="section-content text-center">
                                Anh Sơn Group cam kết tôn vinh văn hóa Việt Nam qua nghệ thuật và du lịch, mang đến góc nhìn
                                chân thực, sáng tạo và nghệ thuật.
                                <br><br>
                                Mang đến hiệu quả truyền thông và thúc đẩy phát triển du lịch cho mỗi vùng đất của Việt Nam.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="location-header">
                        <i class="fas fa-map-marker-alt"></i>
                        <h5>Hà Nội</h5>
                    </div>

                    <div class="location-info">
                        <i class="fas fa-info-circle"></i>
                        <div>Các dự án của Anh Sơn Group đã thực hiện tại Hà Nội</div>
                    </div>

                    <div class="articles-container">
                        <!-- Article 1 -->
                        <div class="article-compact">
                            <img src="/placeholder.svg?height=100&width=100" alt="Lễ hội Văn hóa Hà Nội"
                                class="article-image">
                            <div class="article-content">
                                <h3 class="article-title">Lễ hội Văn hóa Hà Nội 2023 - Hành trình di sản</h3>
                                <div class="article-meta">
                                    <i class="far fa-calendar-alt"></i>
                                    <span>15/08/2023</span>
                                    <span class="ms-2 category-badge category-event">Sự kiện</span>
                                </div>
                                <p class="article-excerpt">Anh Sơn Group tự hào đồng hành cùng Lễ hội Văn hóa Hà Nội 2023,
                                    mang đến những trải nghiệm văn hóa độc đáo và đậm đà bản sắc dân tộc.</p>
                            </div>
                        </div>

                        <!-- Article 2 -->
                        <div class="article-compact">
                            <img src="/placeholder.svg?height=100&width=100" alt="Triển lãm Di sản Văn hóa"
                                class="article-image">
                            <div class="article-content">
                                <h3 class="article-title">Triển lãm Di sản Văn hóa Thăng Long</h3>
                                <div class="article-meta">
                                    <i class="far fa-calendar-alt"></i>
                                    <span>02/05/2023</span>
                                    <span class="ms-2 category-badge category-culture">Văn hóa</span>
                                </div>
                                <p class="article-excerpt">Triển lãm giới thiệu những giá trị văn hóa đặc sắc của Thăng
                                    Long - Hà Nội qua các thời kỳ lịch sử.</p>
                            </div>
                        </div>

                        <!-- Article 3 -->
                        <div class="article-compact">
                            <img src="/placeholder.svg?height=100&width=100" alt="Đêm hội Phố cổ" class="article-image">
                            <div class="article-content">
                                <h3 class="article-title">Đêm hội Phố cổ Hà Nội - Hồi sinh không gian văn hóa truyền thống
                                </h3>
                                <div class="article-meta">
                                    <i class="far fa-calendar-alt"></i>
                                    <span>10/10/2022</span>
                                    <span class="ms-2 category-badge category-tourism">Du lịch</span>
                                </div>
                                <p class="article-excerpt">Chương trình nghệ thuật đặc sắc tái hiện không gian văn hóa
                                    truyền thống của Phố cổ Hà Nội.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end p-3">
                    <button type="button" class="cta-button" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // Kiểm tra xem phần tử đã vào vùng hiển thị chưa
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top < window.innerHeight && rect.bottom > 0
            );
        }

        // Hàm chạy đếm số
        function animateCounter($el) {
            const target = parseInt($el.data('target'));
            const duration = 2000;
            const start = 0;
            const startTime = performance.now();

            function update(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const value = Math.floor(progress * (target - start) + start);
                $el.text(value.toLocaleString() + '+');

                if (progress < 1) {
                    requestAnimationFrame(update);
                }
            }

            requestAnimationFrame(update);
        }

        $(document).ready(function() {
            const $counters = $('.stat-number');
            const counted = new Set();

            $(window).on('scroll', function() {
                $counters.each(function() {
                    const $this = $(this);
                    if (!counted.has(this) && isElementInViewport(this)) {
                        animateCounter($this);
                        counted.add(this);
                    }
                });
            });
            $(window).trigger('scroll');
        });

        $('.location').on('click', function() {
            const locationName = $(this).data('location');
            const newsList = $(this).data('news');
            console.log(newsList);

            $('#exampleModal .location-header h5').text(locationName);
            $('#exampleModal .location-info div').text(
                `Các dự án của Anh Sơn Group đã thực hiện tại ${locationName}`);

            const $articlesContainer = $('#exampleModal .articles-container');
            $articlesContainer.empty();
            $.each(newsList, function(i, news) {
                const createdAt = new Date(news[0].created_at).toLocaleDateString('vi-VN');
                const thumbnail = news[0].thumbnail || '/placeholder.svg?height=100&width=100';
                const category = news[0].category?.name || '';
                const article = `
                <div class="article-compact">
                    <a href="/blog/${news[0].category?.slug}/${news[0].slug}">
                        <img src="${thumbnail}" alt="${news[0].title}" class="article-image">
                    </a>
                    <div class="article-content">
                        <h3 class="article-title"><a href="/blog/${news[0].category?.slug}/${news[0].slug}">${news[0].title}</a></h3>
                        <div class="article-meta">
                            <i class="far fa-calendar-alt"></i>
                            <span>${createdAt}</span>
                            <span class="ms-2 category-badge">${category}</span>
                        </div>
                        <p class="article-excerpt">${news[0].content}...</p>
                    </div>
                </div>
            `;

                $articlesContainer.append(article);
            });
        });
    </script>
@endpush
