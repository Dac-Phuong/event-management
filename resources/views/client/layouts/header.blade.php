<style>
    /* Hiệu ứng hover cho submenu */
    .navbar-nav .dropdown:hover>.dropdown-menu {
        display: block;
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-menu {
        display: none;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.3s ease-in-out;
    }

    .mobile-menu {
        display: none;
    }

    .navbar {
        background: transparent;
        transition: all 0.3s ease-in-out;
    }

    .navbar.scrolled {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transform: translateY(0);
    }

    .nav-item:after {
        content: "";
        display: block;
        width: 70%;
        height: 2px;
        margin: 0 auto;
        background: #fff;
        transform: scaleX(0);
        transition: transform 0.3s ease-in-out;
    }

    .nav-item.active:after {
        transform: scaleX(1);
    }

    /* Mobile Menu */
    @media (max-width: 990px) {
        .mobile-menu {
            display: block;
        }

        .navbar-toggler {
            background: #166CB0;
        }

        .nav-link {
            color: #000 !important;
        }

        .nav-item:after {
            content: "";
            display: block;
            width: 25%;
            height: 2px;
            margin-left: 0px;
            background: #fff;
            transform: scaleX(0);
            transition: transform 0.3s ease-in-out;
        }

        .navbar-collapse {
            display: none !important;
        }
    }
</style>

<nav class="navbar navbar-expand-lg fixed-top navbar-active">
    <div class="container">

        <a href="{{ url('/') }}" class="app-brand-link">
            @if (!empty($config->value))
                <img width="60" height="60" style="object-fit: contain" src="{{ asset($config->value ?? '') }}"
                    alt="Logo">
            @endif
        </a>
        <button class="navbar-toggler mobile-menu" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#mobileMenu">
            <i class="ti ti-menu-2 text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link color fs-5" href="{{ url('/') }}">Trang chủ</a>
                </li>
                <li class="nav-item {{ request()->is('gioi-thieu') ? 'active' : '' }}">
                    <a class="nav-link color fs-5" href="{{ url('gioi-thieu') }}">Giới thiệu</a>
                </li>
                <li class="nav-item dropdown {{ request()->is('dich-vu/*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="nav-link color dropdown-toggle fs-5">Dịch vụ</a>
                    <ul class="dropdown-menu">
                        @foreach ($services as $service)
                            <li><a class="dropdown-item"
                                    href="{{ url('dich-vu', $service->slug) }}">{{ $service->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown {{ request()->is('du-an/*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="nav-link color dropdown-toggle fs-5">Dự án</a>
                    <ul class="dropdown-menu">
                        @foreach ($projects as $project)
                            <li><a class="dropdown-item"
                                    href="{{ url('du-an', $project->slug) }}">{{ $project->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown {{ request()->is('blog/*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="nav-link color dropdown-toggle fs-5">Blog</a>
                    <ul class="dropdown-menu">
                        @foreach ($news as $new)
                            <li><a class="dropdown-item" href="{{ url('blog', $new->slug) }}">{{ $new->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('tuyen-dung') ? 'active' : '' }}"><a class="nav-link color fs-5"
                        href="{{ url('tuyen-dung') }}">Tuyển dụng</a></li>
            </ul>
            <ul class="navbar-nav flex-row align-items-center ms-auto">

                <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-1">
                    <a class="nav-link color dropdown-toggle hide-arrow" style="cursor: pointer;">
                        <i class="ti ti-lg ti-sun"></i>
                    </a>
                    <ul class="dropdown-menu ">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                <span class="align-middle"><i class="ti ti-sun me-3"></i>Sáng</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                <span class="align-middle"><i class="ti ti-moon-stars me-3"></i>Tối</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                <span class="align-middle"><i class="ti ti-device-desktop-analytics me-3"></i>Hệ
                                    thống</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);"
                        class="btn btn-primary rounded-pill waves-effect waves-light scrollToContact">
                        <i class="ti ti-mail-share"></i>
                        <span class="d-none d-md-block" style="margin-left: 5px">Yêu cầu tư vấn</span>
                    </a>
                </li>
        </div>
    </div>
</nav>
<!-- Offcanvas Mobile Menu -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header pb-2">
        <a href="{{ url('/') }}" class="app-brand-link">
            <img width="60" height="60" style="object-fit: contain" src="{{ asset($config->value) }}"
                alt="Logo">
        </a>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body pt-0">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link m-0 color fs-5" href="{{ url('/') }}">Trang chủ</a>
            </li>
            <li class="nav-item {{ request()->is('gioi-thieu') ? 'active' : '' }}">
                <a class="nav-link m-0 color fs-5" href="{{ url('gioi-thieu') }}">Giới thiệu</a>
            </li>
            <li class="nav-item dropdown {{ request()->is('dich-vu/*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="nav-link m-0 color dropdown-toggle fs-5">Dịch vụ</a>
                <ul class="dropdown-menu">
                    @foreach ($services as $service)
                        <li><a class="dropdown-item"
                                href="{{ url('dich-vu', $service->slug) }}">{{ $service->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item dropdown {{ request()->is('du-an/*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="nav-link m-0 color dropdown-toggle fs-5">Dự án</a>
                <ul class="dropdown-menu">
                    @foreach ($projects as $project)
                        <li><a class="dropdown-item"
                                href="{{ url('du-an', $project->slug) }}">{{ $project->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item dropdown {{ request()->is('blog/*') ? 'active' : '' }}">
                <a href="javascript:void(0);"s class="nav-link m-0 color dropdown-toggle fs-5">Blog</a>
                <ul class="dropdown-menu">
                    @foreach ($news as $new)
                        <li><a class="dropdown-item" href="{{ url('blog', $new->slug) }}">{{ $new->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item {{ request()->is('tuyen-dung') ? 'active' : '' }}"><a class="nav-link m-0 color fs-5"
                    href="{{ url('tuyen-dung') }}">Tuyển dụng</a></li>
        </ul>
        <a href="javascript:void(0);"
            class="btn btn-primary rounded-pill waves-effect waves-light mt-3 scrollToContact"
            data-bs-dismiss="offcanvas">
            <i class="ti ti-mail-share"></i>
            <span class="" style="margin-left: 5px">Yêu cầu tư vấn</span>
        </a>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#menuToggle').click(function() {
                $('#navbarNav').slideToggle();
            });

            $('.dropdown').hover(
                function() {
                    $(this).find('.dropdown-menu').stop(true, true).slideDown(300);
                },
                function() {
                    $(this).find('.dropdown-menu').stop(true, true).slideUp(300);
                }
            );

            function checkScroll() {
                const navbar = $('.navbar');
                const topBar = $('.top-bar');
                const navbarLink = $('.nav-link');
                if ($(window).scrollTop() > 100) {
                    navbar.addClass('scrolled');
                    navbarLink.addClass('color')
                    topBar.hide();
                } else {
                    navbar.removeClass('scrolled');
                    navbarLink.removeClass('color');
                    topBar.show();
                }
            }

            checkScroll();

            $(window).scroll(function() {
                checkScroll();
            });
        });
    </script>
@endpush
