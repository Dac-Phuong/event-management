<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ '/assets/' }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Đăng nhập quản trị</title>

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
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/@form-validation/umd/styles/index.min.css' }}" />
    <link rel="stylesheet" href="{{ '/assets/vendor/libs/toastr/toastr.css' }}" />

    <!-- Page -->
    <link rel="stylesheet" href="{{ '/assets/vendor/css/pages/page-auth.css' }}" />
    <script src="{{ '/assets/vendor/js/helpers.js' }}"></script>
    <script src="{{ '/assets/vendor/js/template-customizer.js' }}"></script>
    <script src="{{ '/assets/js/config.js' }}"></script>
</head>

<body>
    <!-- Content -->

    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                    <img src="{{ '/assets/img/illustrations/auth-login-illustration-light.png' }}"
                        alt="auth-login-cover" class="img-fluid my-5 auth-illustration"
                        data-app-light-img="illustrations/auth-login-illustration-light.png"
                        data-app-dark-img="illustrations/auth-login-illustration-dark.png" />

                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <h3 class="mb-1">Chào mừng đến với trang quản trị ! 👋</h3>
                    <p class="mb-4">Vui lòng đăng nhập vào tài khoản của bạn</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('post_login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Địa chỉ Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Nhập địa chỉ Email" autofocus />
                        </div>
                        <div class="form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Mật khẩu</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 mt-3 ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me"> Nhớ mật khẩu </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary d-grid w-100">Đăng nhập</button>
                    </form>

                    <div class="divider my-4">
                        <div class="divider-text">or</div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                            <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                            <i class="tf-icons fa-brands fa-google fs-5"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                            <i class="tf-icons fa-brands fa-twitter fs-5"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->

    <script src="{{ '/assets/vendor/libs/jquery/jquery.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/popper/popper.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/toastr/toastr.js' }}"></script>
    <!-- endbuild -->
    <!-- Vendors JS -->
    <script src="{{ '/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js' }}"></script>
    <script src="{{ '/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js' }}"></script>
    <!-- Page JS -->
    <script src="{{ '/assets/js/pages-auth.js' }}"></script>
    <script src="{{ '/assets/js/main.js' }}"></script>
    <script>
        @if (Session::has('error'))
            toastr.options = {
                closeButton: true,
                progressBar: true,
            };
            toastr.error("{!! Session::get('error') !!}");
        @endif

        @if (Session::has('success'))
            toastr.options = {
                closeButton: true,
                progressBar: true,
            };
            toastr.success("{!! Session::get('success') !!}");
        @endif
    </script>
</body>

</html>
