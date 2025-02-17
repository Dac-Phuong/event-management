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
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ '/assets/img/favicon/favicon.ico' }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ '/assets/vendor/fonts/fontawesome.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/fonts/tabler-icons.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/fonts/flag-icons.css' }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ '/assets/css/demo.css' }}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ '/assets/vendor/css/rtl/core.css' }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ '/assets/vendor/css/rtl/theme-default.css' }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ '/assets/vendor/css/pages/front-page.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/css/pages/front-page-landing.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/swiper/swiper.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/toastr/toastr.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/animate-css/animate.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/animate-on-scroll/animate-on-scroll.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/css/pages/cards-advance.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/css/aos.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/css/gg-map.css' }}" />
    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ '/css/style.css' }}" />
    <!-- Helpers -->
    <script src="{{ '/assets/vendor/js/helpers.js' }}"></script>
    <script src="{{ '/assets/vendor/js/template-customizer.js' }}"></script>
    <script src="{{ '/assets/js/config.js' }}"></script>

</head>
@php
    $services = \App\Models\Service::where('status', 1)->get();
    $news = \App\Models\NewsCategory::where('status', 1)->get();
    $projects = \App\Models\ProjectCategory::where('status', 1)->get();
    $config = \App\Models\Configs::where('key', 'base_logo')->first();
@endphp
<body>
    <!-- Layout wrapper -->
    <div>
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
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- Vendors JS -->
    <script src="{{ '/assets/vendor/libs/jquery/jquery.js' }}"></script>
    <script src="{{ '/assets/js/gg-map.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/swiper/swiper.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/dropzone/dropzone.js' }}"></script>
    <script src="{{ '/assets/vendor/js/bootstrap.js' }}"></script>
    <script src="{{ '/assets/vendor/js/aos.js' }}"></script>
    <script src="{{ '/assets/vendor/js/dropdown-hover.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/animate-on-scroll/animate-on-scroll.js' }}"></script>
    <!-- Main JS -->
    <script src="{{ '/assets/js/main.js' }}"></script>
    <!-- Page JS -->
    <script src="{{ '/assets/js/dashboards-analytics.js' }}"></script>
    <script src="{{ '/assets/js/tables-datatables-advanced.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/toastr/toastr.js' }}"></script>
    <script>
        AOS.init();
        const formatDateTime = (dateTime) => {
            const date = new Date(dateTime);
            const day = date.getDate().toString().padStart(2, '0');
            const month = date.toLocaleString('vi-VN', {
                month: 'short'
            }).replace('.', '');
            const year = date.getFullYear();
            const hours = date.getHours().toString().padStart(2, '0');
            const minutes = date.getMinutes().toString().padStart(2, '0');
            return `${day} ${month} ${year} lúc ${hours}:${minutes}`;
        }
    </script>
    <script>
        $(document).ready(function() {
            function getConfig() {
                $.ajax({
                    url: '/get-config',
                    method: 'GET',
                    success: function(res) {
                        if (res.error_code == 0) {
                            $('.contact-phone').text(res.data.contact_phone).attr('href',`tel:${res.data.contact_phone || '0913588534'}`)
                            $('#contact-phone').attr('href', `tel:${res.data.contact_phone || '0913588534'}`)
                            $('.base-name').text(res.data.base_name || 'Công ty Cổ Phần Tập đoàn Anh Sơn')
                            $('.contact-address').text(res.data.contact_address || 'Số 27 phố Mai Phúc, phường Phúc Đồng, quận Long Biên, Hà Nội')
                            $('.social-zalo').attr('href', `${res.data.social_zalo || '#'}`)
                            $('.social-fanpage').attr('href', `${res.data.social_fanpage || '#'}`)
                            $('.social-telegram').attr('href', `${res.data.social_telegram || '#'}`)
                            $('.social-youtube').attr('href', `${res.data.social_youtube || '#'}`)
                            $('#contact-email').text(res.data.contact_email).attr('href',`mailto:${res.data.contact_email || 'pro@anhsongroup.com'}`)
                            $('.contact-email').text(res.data.contact_email || 'pro@anhsongroup.com')
                            $('#logo').attr('src', res.data.base_logo)
                            $('#map-iframe').attr('src', `https://www.google.com/maps/d/embed?mid=${res.data.base_map_id}&z=5&center=14.0583,108.2772`);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }

                })
            }
            getConfig()
        })
        $(document).ready(function() {
            $(".scrollToContact").click(function() {
                $("html, body").animate({
                    scrollTop: $("#landingContact").offset().top
                }, 200);
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
