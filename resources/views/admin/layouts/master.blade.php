<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <title>{{ $title ?? 'Admin page' }}</title>
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
    <link rel="stylesheet" href="{{ '/assets/vendor/css/rtl/core.css' }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ '/assets/vendor/css/rtl/theme-default.css' }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ '/assets/css/demo.css' }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/node-waves/node-waves.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/typeahead-js/typeahead.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/apex-charts/apex-charts.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/swiper/swiper.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/@form-validation/umd/styles/index.min.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/toastr/toastr.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/quill/katex.css' }}">
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/quill/editor.css' }}">
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/select2/select2.css' }}">
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/dropzone/dropzone.css' }}">
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/flatpickr/flatpickr.css' }}">
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/tagify/tagify.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/css/upload-image.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/css/sweetalert.css' }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ '/assets/vendor/css/pages/cards-advance.css' }}" />
    <link rel="stylesheet" href="{{ '/css/style.css' }}" />
    <!-- Helpers -->
    <script src="{{ '/assets/vendor/js/helpers.js' }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ '/assets/vendor/js/template-customizer.js' }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ '/assets/js/config.js' }}"></script>
    <script src="{{ '/assets/js/ckeditor.js' }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            {{-- @persist('menu') --}}
            @include('admin.layouts.menu')
            {{-- @endpersist --}}
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('admin.layouts.header')
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('main')
                    </div>
                    <!-- / Content -->
                    <!-- Footer -->
                    @include('admin.layouts.footer')
                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js /assets/vendor/js/core.js -->

    <script src="{{ '/assets/vendor/libs/jquery/jquery.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/popper/popper.js' }}"></script>
    <script src="{{ '/assets/vendor/js/bootstrap.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/node-waves/node-waves.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/hammer/hammer.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/i18n/i18n.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/typeahead-js/typeahead.js' }}"></script>
    <script src="{{ '/assets/vendor/js/menu.js' }}"></script>

    <!-- endbuild -->
    <!-- Vendors JS -->
    <script src="{{ '/assets/vendor/libs/apex-charts/apexcharts.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/quill/katex.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/quill/quill.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/select2/select2.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/dropzone/dropzone.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/jquery-repeater/jquery-repeater.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/flatpickr/flatpickr.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/tagify/tagify.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/toastr/toastr.js' }}"></script>

    <!-- Main JS -->
    <script src="{{ '/assets/js/main.js' }}"></script>
    <script src="{{ '/assets/js/upload-image.js' }}"></script>
    <script src="{{ '/assets/js/app-ecommerce-product-add.js' }}"></script>
    <!-- Page JS -->
    <script src="{{ '/assets/js/dashboards-analytics.js' }}"></script>
    <script src="{{ '/assets/js/sweetalert.js' }}"></script>
    <script src="{{ '/assets/js/tables-datatables-advanced.js' }}"></script>
    @yield('script_page')
    <script>
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

        function toSlug(str) {
            // Chuyển hết sang chữ thường
            str = str.toLowerCase();
            // xóa dấu
            str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
            str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
            str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
            str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
            str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
            str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
            str = str.replace(/(đ)/g, 'd');
            // Xóa ký tự đặc biệt
            str = str.replace(/([^0-9a-z-\s])/g, '');
            // Xóa khoảng trắng thay bằng ký tự -
            str = str.replace(/(\s+)/g, '-');
            // Xóa ký tự - liên tiếp
            str = str.replace(/-+/g, '-');
            // xóa phần dự - ở đầu
            str = str.replace(/^-+/g, '');
            // xóa phần dư - ở cuối
            str = str.replace(/-+$/g, '');
            // return
            return str;
        }
    </script>
    @stack('scripts')
</body>

</html>
