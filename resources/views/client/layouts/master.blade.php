<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <title>@yield('title', 'Trang chủ')</title>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="Anhsongroup" />
    <meta name="geo.region" content="VN" />
    <meta property="og:url" content="https://anhsongroup.com/" />
    <meta property="og:title" content="Anhsongroup" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:site_name" content="Anhsongroup" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="Công ty tổ chức sự kiện tại Hà Nội" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ '/assets/img/favicon/favicon.ico' }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet">


    <!-- Icons -->
    <link rel="stylesheet" href="{{ '/assets/vendor/fonts/fontawesome.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/fonts/tabler-icons.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/fonts/flag-icons.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/swiper/swiper.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/toastr/toastr.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/css/aos.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/css/gg-map.css' }}" />
    <link rel="stylesheet" href="{{ '/css/dflip.min.css' }}" />

    <link href="{{ '/assets/css/bootstrap.min.css' }}" rel="stylesheet" type="text/css" />
    <link href="{{ '/assets/css/fonts.min.css' }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" as="style" href="{{ '/assets/css/animate.min.css' }}" />
    <link rel="stylesheet" as="style" href="{{ '/assets/css/font-awesome.min.css' }}" />
    <link rel="stylesheet" as="style" href="{{ '/assets/css/settings.css' }}" />
    <link rel="stylesheet" as="style" href="{{ '/assets/css/layers.min.css' }}" />
    <link rel="stylesheet" as="style" href="{{ '/assets/css/jquery.mmenu.all.css' }}" />
    <link rel="stylesheet" as="style" href="{{ '/assets/css/jquery.fancybox.min.css' }}" />
    <link rel="stylesheet" as="style" href="{{ '/assets/css/pnotify.custom.min.css' }}" />

    <link href="{{ '/assets/css/style.css' }}" rel="stylesheet" />
    <link href="{{ '/assets/css/frontend-lite.min.css' }}" rel="stylesheet" />
    <link href="{{ '/assets/css/post-2354.css' }}" rel="stylesheet" />
    <link href="{{ '/assets/css/post-2627.css' }}" rel="stylesheet" />
    <link href="{{ '/assets/css/post-4363.css' }}" rel="stylesheet" />
    <link href="{{ '/assets/css/custom.css' }}" rel="stylesheet" />
    <link href="{{ '/assets/css/core.min.css' }}" rel="stylesheet" type="text/css" />
    <link href="{{ '/assets/css/style.min.css' }}" rel="stylesheet" />
    <link href="{{ '/assets/css/style.scss' }}" rel="stylesheet" />
    <link href="{{ '/assets/css/setting.css' }}" rel="stylesheet" />
    <link href="{{ '/assets/css/style(1).css' }}" rel="stylesheet" />
</head>
@php
    $services = \App\Models\Service::where('status', 1)->get();
    $config = \App\Models\Configs::where('key', 'base_logo')->first();
    $projects = \App\Models\ProjectCategory::where('status', 1)->get();
@endphp

<body>
    <div style="overflow: hidden">
        <header>
            @include('client.layouts.header')
        </header>
        <main class="main-content">
            @yield('content')
        </main>
        <footer>
            @include('client.layouts.footer')
        </footer>
    </div>
    <script src="{{ '/assets/js/jquery.min.js' }}"></script>
    <script src="{{ '/assets/js/three.min.js' }}" async></script>
    <script src="{{ '/assets/vendor/js/aos.js' }}" async></script>
    <script src="{{ '/assets/vendor/libs/toastr/toastr.js' }}" async></script>
    <script src="{{ '/assets/js/compatibility.js' }}" async></script>
    <script src="{{ '/assets/js/mockup.min.js' }}" async></script>
    <script src="{{ '/assets/js/pdf.min.js' }}" async></script>
    <script src="{{ '/assets/js/pdf.worker.min.js' }}" async></script>
    <script src="{{ '/assets/js/dflip.min.js' }}" async></script>
    <script src="{{ '/assets/vendor/libs/swiper/swiper.js' }}"></script>

    <script src="{{ '/assets/js/scroll.to.top.js' }}" async></script>
    <script src="{{ '/assets/vendor/js/bootstrap.js' }}" async></script>
    <script src="{{ '/assets/js/mouse-cursor-point.js' }}" async></script>
    <script src="{{ '/assets/js/lodash.min.js' }}" async></script>
    <script src="{{ '/assets/js/menu.min.js' }}" async></script>
    <script src="{{ '/assets/js/owl.carousel-2.3.4.js' }}"></script>
    <script src="{{ '/assets/js/lozad.min.js' }}" async></script>
    <script src="{{ '/assets/js/custom.js' }}"></script>
    <script src="{{ '/assets/js/client.js' }}" async></script>
    @stack('scripts')
</body>

</html>
