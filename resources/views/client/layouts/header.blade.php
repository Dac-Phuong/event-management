<style>
    body {
        top: 0px !important;
        padding: 0px !important;
    }

    .header-top {
        min-height: 40px;
        /* background: #f5f5f5; */
        box-shadow: rgba(0, 0, 0, 0.2) 0px 1px 5px;
        background: var(--primary-color);
    }

    .flex-row {
        align-items: center;
        display: flex;
        flex-flow: row nowrap;
        justify-content: space-between;
        width: 100%;
    }

    .nav {
        align-items: center;
        display: inline-block;
        display: flex;
        flex-flow: row wrap;
        width: 100%;
    }

    .hb_left li:first-child {
        border-right: 1px solid var(--text-white);
        padding-right: 10px;
        margin-right: 10px;
        line-height: 15px;
    }

    .hb_left li {
        list-style: none;
        color: var(--text-white);
    }

    .nav-small.nav>li.html {
        font-size: .75em;
    }

    .hb_left {
        display: flex;
        flex-wrap: wrap;
        margin: 0;
        padding: 0;
        height: 40px;
        align-items: center;
    }

    .hb_left li a {
        font-size: 13px;
        color: var(--text-white);
    }

    .icon_email {
        background: url("https://newdaymedia.com.vn/wp-content/uploads/2023/10/icon_mail.png") no-repeat center center;
        width: 19px;
        height: 15px;
        display: inline-block;
        vertical-align: middle;
        margin-right: 5px;
    }

    .nav-small.nav>li.html {
        font-size: .75em;
    }

    .nav>li {
        list-style: none;
        margin: 0 7px;
        padding: 0;
        transition: background-color .3s;
    }

    .html_topbar_right {
        display: flex !important;
        align-items: center;
    }

    .skiptranslate iframe {
        display: none !important;
    }

    .goog-te-combo {
        width: 140px !important;
    }

    .skiptranslate span {
        display: none !important;
    }

    /* Tạo một hiệu ứng select box đẹp và chuyên nghiệp */
    select.goog-te-combo {
        color: black;
        font-size: 14px;
        border: 1px solid var(--primary-color);
        border-radius: 6px;
        padding: 3px 6px;
        width: 200px;
        cursor: pointer;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        transition: all 0.3s ease-in-out;
    }



    /* Tạo hiệu ứng focus */
    select.goog-te-combo:focus {
        outline: none;
        /* Loại bỏ outline mặc định */
        border: 1px solid var(--primary-color);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        /* Shadow mạnh hơn khi focus */
    }

    select.goog-te-combo {
        position: relative;
        padding-right: 35px;
    }
</style>
<header class="header">
    <div id="top-bar" class="header-top hide-for-sticky nav-dark">
        <div class="flex-row container">
            <div class="flex-col hide-for-medium flex-left">
                <ul class="nav nav-left medium-nav-center nav-small  nav-divided">
                    <li class="html custom html_topbar_left">
                        <ul class="hb_left">
                            <li>
                                <a href="/">
                                    <i class="ti ti-mail"></i>
                                    <span class="contact-email">Email: pro@anhsongroup.com</span>
                                </a>
                            </li>
                            <li>
                                <i class="ti ti-phone"></i>
                                <span>Hotline: </span>
                                <a href="tel:+0913588534" class="hb-phone contact-phone">+0913588534 </a>
                                <a href="tel:" class="hb-phone"> </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="flex-col hide-for-medium flex-center">
                <ul class="nav nav-center nav-small  nav-divided">
                </ul>
            </div>

            <div class="flex-col hide-for-medium flex-right">
                <ul class="nav top-bar-nav nav-right nav-small  nav-divided">
                    <li class="html custom html_topbar_right">
                        <p class="m-0" style="color: var(--text-white);">
                            <i class="ti ti-language"></i>
                            <span>Ngôn ngữ: &nbsp;</span>
                        </p>
                        <div id="google_element"></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-6 col-lg-2">
                <div class="logo">
                    @include('client.components.logo')
                </div>
            </div>
            <!-- Mobile menu toggle -->
            <div class="col-6 d-lg-none text-end">
                <div class="mobile-menu-toggle">
                    <i class="fas fa-bars" style="color: #1E64A5; font-size: 24px;"></i>
                </div>
            </div>
            <!-- Desktop Navigation -->
            <div class="col-lg-8 desktop-menu">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/gioi-thieu') }}">Giới thiệu</a>
                                </li>
                                  <li class="nav-item">
                                    <a class="nav-link" target="_blank" href="{{ url('profile') }}">Profile</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Dịch vụ
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach ($services as $service)
                                            <li class="m-0"><a class="dropdown-item"
                                                    href="{{ url('dich-vu/' . $service->slug) }}">{{ $service->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Dự án
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach ($projects as $project)
                                            <li class="m-0"><a class="dropdown-item"
                                                    href="{{ url('du-an', $project->slug) }}">{{ $project->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                              
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('tuyen-dung') }}">Tuyển dụng</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Search and Language -->
            <div class="col-lg-2 d-none d-lg-flex justify-content-end align-items-center">
                <a href="#" class="search-icon" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <i class="fas fa-search"></i>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu">
    <div class="mobile-menu-header">
        <div class="mobile-logo">
            @include('client.components.logo')
        </div>
        <div class="mobile-close">
            <i class="fas fa-times"></i>
        </div>
    </div>
    <div class="mobile-menu-content">
        <div class="mobile-menu-footer">
            <div class="mobile-language">
                <span class="active">VI</span> | <span>EN</span>
            </div>
            <div class="mobile-search">
                <input class="mobile-search-input" type="text" placeholder="Tìm kiếm...">
                <button><i class="fas fa-search"></i></button>
            </div>
        </div>
        <ul class="mobile-nav">
            <li class="mobile-nav-item">
                <a href="{{ url('/gioi-thieu') }}" class="mobile-nav-link">Giới thiệu</a>
            </li>
            <li class="mobile-nav-item">
                <a href="{{ url('/profile') }}" class="mobile-nav-link">Profile</a>
            </li>
            <li class="mobile-nav-item">
                <a href="#" class="mobile-nav-link">Dịch vụ</a>
                <span class="mobile-dropdown-toggle"><i class="fas fa-chevron-down"></i></span>
                <ul class="mobile-dropdown-menu">
                    @foreach ($services as $service)
                        <li><a class="mobile-dropdown-item"
                                href="{{ url('dich-vu/' . $service->slug) }}">{{ $service->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="mobile-nav-item">
                <a href="#" class="mobile-nav-link">Dự án</a>
                <span class="mobile-dropdown-toggle"><i class="fas fa-chevron-down"></i></span>
                <ul class="mobile-dropdown-menu">
                    @foreach ($projects as $project)
                        <li><a class="mobile-dropdown-item"
                                href="{{ url('du-an/' . $project->slug) }}">{{ $project->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="mobile-nav-item">
                <a href="{{ url('/blog') }}" class="mobile-nav-link">Blog</a>
            </li>
            <li class="mobile-nav-item">
                <a href="{{ url('/tuyen-dung') }}" class="mobile-nav-link">Tuyển dụng</a>
            </li>
        </ul>
    </div>

</div>

<!-- Overlay -->
<div class="overlay"></div>

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title mb-2" id="searchModalLabel">Nhập từ khóa tìm kiếm</h3>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="search-input-group">
                    <div class="input-group">
                        <input type="text" class="form-control search-input" placeholder="Tìm kiếm..."
                            aria-label="Search" aria-describedby="button-addon2"
                            style="border: 1px solid var(--primary-color)">
                        <button class="btn btn-primary" type="button" id="button-addon2"
                            style="height: 46px;width: 75px;">
                            <i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="search-result-container">
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function loadGoogleTranslate() {
            new google.translate.TranslateElement({
                pageLanguage: 'vi',
                includedLanguages: 'vi,en',
                autoDisplay: false
            }, 'google_element');
        }
        loadGoogleTranslate()
    </script>
    <script>
        $(document).ready(function() {
            $('#button-addon2').click(function() {
                var query = $('.search-input').val().trim();
                var resultsContainer = $(".search-result-container");
                resultsContainer.empty().show().append(`
                    <li class="list-group-item result-item d-flex justify-content-center">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </li>
                `);
                $.ajax({
                    url: "{{ route('news.search') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        keyword: query
                    },
                    success: function(response) {
                        resultsContainer.empty();
                        if (response.data.length > 0) {
                            $.each(response.data, function(key, value) {
                                resultsContainer.append(`
                                <a href="blog/${value.category.slug}/${value.slug}" class="search-result-item">
                                    <div class="search-result-thumb">
                                    <img src="${value.thumbnail}" alt="${value.title}">
                                    </div>
                                    <div class="search-result-content">
                                    <h3 class="search-result-title">${value.title}</h3>
                                    <div class="search-result-meta">
                                        <i class="far fa-calendar-alt"></i>
                                        <span>${formatDate(value.created_at)}</span>
                                    </div>
                                    </div>
                                </a>
                                `);
                            });
                        } else {
                            resultsContainer.append(
                                '<p class="text-center">Không có kết quả tìm kiếm</p>');
                        }
                    }
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                        resultsContainer.empty().append(
                            '<p class="text-center">Có lỗi xảy ra. Vui lòng thử lại sau.</p>'
                        );
                    }
                });
            });
        });

        function formatDate(dateString) {
            var date = new Date(dateString);
            var day = ("0" + date.getDate()).slice(-2);
            var month = ("0" + (date.getMonth() + 1)).slice(-2);
            var year = date.getFullYear();
            return day + "/" + month + "/" + year;
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.mobile-search-input').click(function(event) {
                event.stopPropagation();
                $('.mobile-menu').removeClass('active');
                $('.overlay').removeClass('active');
                $('body').css('overflow', '');
                $('#searchModal').modal('show');
            });

            // Mobile menu toggle
            $('.mobile-menu-toggle').click(function() {
                $('.mobile-menu').addClass('active');
                $('.overlay').addClass('active');
                $('body').css('overflow', 'hidden');
            });

            // Close mobile menu
            $('.mobile-close, .overlay').click(function() {
                $('.mobile-menu').removeClass('active');
                $('.overlay').removeClass('active');
                $('body').css('overflow', '');
            });

            // Mobile dropdown toggle
            $('.mobile-dropdown-toggle').click(function() {
                $(this).toggleClass('active');
                $(this).next('.mobile-dropdown-menu').slideToggle(300);
            });

            // Language selector
            $('.language-selector span, .mobile-language span').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            });

            // Handle window resize
            $(window).resize(function() {
                if ($(window).width() > 991) {
                    $('.mobile-menu').removeClass('active');
                    $('.overlay').removeClass('active');
                    $('body').css('overflow', '');
                }
            });

            // Add smooth animation to mobile menu items
            $('.mobile-nav-item').each(function(index) {
                $(this).css({
                    'animation-delay': (index * 0.1) + 's'
                });
            });

            // Add active class to current page
            var currentLocation = window.location.href;
            $('.nav-link, .mobile-nav-link').each(function() {
                if ($(this).attr('href') === currentLocation) {
                    $(this).addClass('active');
                }
            });

            // Header scroll effect
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('.header').addClass('scrolled');
                    $('#top-bar').addClass('d-none');
                } else {
                    $('.header').removeClass('scrolled');
                    $('#top-bar').removeClass('d-none');
                }
            });
        });
    </script>
@endpush
