<style>
    #button-scroll-to-top {
        position: fixed;
        display: none;
        cursor: pointer;
        z-index: 999;
    }

    #button-scroll-to-top .avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }

    #button-scroll-to-top:hover .avatar {
        transform: scale(1.1);
        /* Hiệu ứng hover */
    }

    @media (max-width: 768px) {
        #button-contact-vr {
            position: fixed;
            bottom: 20px;
            right: 10px;
            z-index: 999;
        }

        #button-scroll-to-top {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button-contact {
            position: absolute;
            bottom: 60px;
            right: 0;
            opacity: 0;
            transform: scale(0);
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        #toggle-button {
            width: 50px;
            height: 50px;
            background-color: #166CB0;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            position: fixed;
            justify-content: center;
            font-size: 24px;
            cursor: pointer;
            right: 33px;
            bottom: 20px;
            transition: transform 0.3sease;
        }

        #button-contact-vr.active .button-contact {
            opacity: 1;
            transform: scale(1);
        }

        /* Xoay nút toggle khi mở */
        #button-contact-vr.active #toggle-button {
            transform: rotate(45deg);
        }

        /* Hiệu ứng từng button xuất hiện */
        #button-contact-vr.active .button-contact:nth-child(2) {
            transition-delay: 0.1s;
        }

        #button-contact-vr.active .button-contact:nth-child(3) {
            transition-delay: 0.2s;
        }

        #button-contact-vr.active .button-contact:nth-child(4) {
            transition-delay: 0.3s;
        }

        #button-contact-vr.active .button-contact:nth-child(5) {
            transition-delay: 0.4s;
        }
    }
</style>
<footer class="landing-footer bg-body footer-text">
    <div class="footer-top position-relative overflow-hidden z-1 pb-0">
        <div class="container pb-5">
            <div class="row gx-0 gy-6 g-lg-10">
                <div class="col-lg-5">
                    <h2 class="footer-title fs-5 mb-6">
                        THÔNG TIN LIÊN HỆ
                    </h2>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-3">
                            <i class="fas fa-building me-2 footer-text"></i>
                            <span class="footer-text">Tên công ty: <p class="footer-link m-0 base-name"></p></span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-map-marker-alt me-2 footer-text"></i>
                            <span class="footer-text"> Địa chỉ: <p class="footer-link m-0 contact-address"></p> </span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-phone-alt me-2 footer-text"></i>
                            <span class="footer-text">Hotline: <p class="footer-link m-0 contact-phone"></p></span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-envelope me-2 footer-text"></i>
                            <span class="footer-text">
                                <span>Email: <p class="footer-link m-0 contact-email"></p></span>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <h2 class="footer-title fs-5 mb-6 text-uppercase">Dịch vụ</h2>
                    <ul class="list-unstyled">
                        @foreach ($services as $service)
                            <li class="mb-3">
                                <a href="{{ url('dich-vu', $service->slug) }}"
                                    class="footer-link">{{ $service->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <h2 class="footer-title mb-6 fs-5 text-uppercase">Liên kết trang</h2>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <a href="{{ url('/') }}" class="footer-link">Trang chủ</a>
                        </li>
                        <li class="mb-3">
                            <a href="{{ url('gioi-thieu') }}" class="footer-link">Giới thiệu</a>
                        </li>
                        <li class="mb-3">
                            <a href="#" class="footer-link">Dịch vụ</a>
                        </li>
                        <li class="mb-3">
                            <a href="{{ url('tuyen-dung') }}" class="footer-link">Tuyển dụng</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h2 class="footer-title mb-6 fs-5 text-uppercase">Liên hệ</h2>
                    <div>
                        <div class="mb-3">
                            <form action="#" id="form-subscribe">
                                <p class="footer-text">Nhận tư vấn miễn phí và các ưu đãi hấp dẫn nhất bằng cách đăng ký
                                    ngay với chúng tôi!</p>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Email của bạn"
                                        name="email" aria-label="Email của bạn" aria-describedby="button-addon2"
                                        required>
                                    <button class="btn btn-primary" type="button" id="button-addon2"><i
                                            class="ti ti-send"></i></button>
                                </div>
                            </form>

                        </div>
                        <ul class="example-2">
                            <li class="icon-content">
                                <a href="#" class="social-fanpage" aria-label="facebook" data-social="facebook">
                                    <div class="filled"></div>
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100"
                                        height="100" viewBox="0 0 48 48">
                                        <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"></path>
                                        <path fill="#fff"
                                            d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z">
                                        </path>
                                    </svg>
                                </a>
                                <div class="tooltip">Facebook</div>
                            </li>
                            <li class="icon-content">
                                <a href="#" class="social-zalo" aria-label="Zalo" data-social="zalo">
                                    <div class="filled"></div>
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100"
                                        height="100" viewBox="0 0 48 48">
                                        <path fill="#2962ff"
                                            d="M15,36V6.827l-1.211-0.811C8.64,8.083,5,13.112,5,19v10c0,7.732,6.268,14,14,14h10	c4.722,0,8.883-2.348,11.417-5.931V36H15z">
                                        </path>
                                        <path fill="#eee"
                                            d="M29,5H19c-1.845,0-3.601,0.366-5.214,1.014C10.453,9.25,8,14.528,8,19	c0,6.771,0.936,10.735,3.712,14.607c0.216,0.301,0.357,0.653,0.376,1.022c0.043,0.835-0.129,2.365-1.634,3.742	c-0.162,0.148-0.059,0.419,0.16,0.428c0.942,0.041,2.843-0.014,4.797-0.877c0.557-0.246,1.191-0.203,1.729,0.083	C20.453,39.764,24.333,40,28,40c4.676,0,9.339-1.04,12.417-2.916C42.038,34.799,43,32.014,43,29V19C43,11.268,36.732,5,29,5z">
                                        </path>
                                        <path fill="#2962ff"
                                            d="M36.75,27C34.683,27,33,25.317,33,23.25s1.683-3.75,3.75-3.75s3.75,1.683,3.75,3.75	S38.817,27,36.75,27z M36.75,21c-1.24,0-2.25,1.01-2.25,2.25s1.01,2.25,2.25,2.25S39,24.49,39,23.25S37.99,21,36.75,21z">
                                        </path>
                                        <path fill="#2962ff" d="M31.5,27h-1c-0.276,0-0.5-0.224-0.5-0.5V18h1.5V27z">
                                        </path>
                                        <path fill="#2962ff"
                                            d="M27,19.75v0.519c-0.629-0.476-1.403-0.769-2.25-0.769c-2.067,0-3.75,1.683-3.75,3.75	S22.683,27,24.75,27c0.847,0,1.621-0.293,2.25-0.769V26.5c0,0.276,0.224,0.5,0.5,0.5h1v-7.25H27z M24.75,25.5	c-1.24,0-2.25-1.01-2.25-2.25S23.51,21,24.75,21S27,22.01,27,23.25S25.99,25.5,24.75,25.5z">
                                        </path>
                                        <path fill="#2962ff"
                                            d="M21.25,18h-8v1.5h5.321L13,26h0.026c-0.163,0.211-0.276,0.463-0.276,0.75V27h7.5	c0.276,0,0.5-0.224,0.5-0.5v-1h-5.321L21,19h-0.026c0.163-0.211,0.276-0.463,0.276-0.75V18z">
                                        </path>
                                    </svg>
                                </a>
                                <div class="tooltip">Zalo</div>
                            </li>
                            <li class="icon-content">
                                <a href="#" class="social-telegram" aria-label="Telegram" data-social="telegram">
                                    <div class="filled"></div>
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100"
                                        height="100" viewBox="0 0 48 48">
                                        <linearGradient id="BiF7D16UlC0RZ_VqXJHnXa_oWiuH0jFiU0R_gr1" x1="9.858"
                                            x2="38.142" y1="9.858" y2="38.142"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#33bef0"></stop>
                                            <stop offset="1" stop-color="#0a85d9"></stop>
                                        </linearGradient>
                                        <path fill="url(#BiF7D16UlC0RZ_VqXJHnXa_oWiuH0jFiU0R_gr1)"
                                            d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z">
                                        </path>
                                        <path
                                            d="M10.119,23.466c8.155-3.695,17.733-7.704,19.208-8.284c3.252-1.279,4.67,0.028,4.448,2.113	c-0.273,2.555-1.567,9.99-2.363,15.317c-0.466,3.117-2.154,4.072-4.059,2.863c-1.445-0.917-6.413-4.17-7.72-5.282	c-0.891-0.758-1.512-1.608-0.88-2.474c0.185-0.253,0.658-0.763,0.921-1.017c1.319-1.278,1.141-1.553-0.454-0.412	c-0.19,0.136-1.292,0.935-1.745,1.237c-1.11,0.74-2.131,0.78-3.862,0.192c-1.416-0.481-2.776-0.852-3.634-1.223	C8.794,25.983,8.34,24.272,10.119,23.466z"
                                            opacity=".05"></path>
                                        <path
                                            d="M10.836,23.591c7.572-3.385,16.884-7.264,18.246-7.813c3.264-1.318,4.465-0.536,4.114,2.011	c-0.326,2.358-1.483,9.654-2.294,14.545c-0.478,2.879-1.874,3.513-3.692,2.337c-1.139-0.734-5.723-3.754-6.835-4.633	c-0.86-0.679-1.751-1.463-0.71-2.598c0.348-0.379,2.27-2.234,3.707-3.614c0.833-0.801,0.536-1.196-0.469-0.508	c-1.843,1.263-4.858,3.262-5.396,3.625c-1.025,0.69-1.988,0.856-3.664,0.329c-1.321-0.416-2.597-0.819-3.262-1.078	C9.095,25.618,9.075,24.378,10.836,23.591z"
                                            opacity=".07"></path>
                                        <path fill="#fff"
                                            d="M11.553,23.717c6.99-3.075,16.035-6.824,17.284-7.343c3.275-1.358,4.28-1.098,3.779,1.91	c-0.36,2.162-1.398,9.319-2.226,13.774c-0.491,2.642-1.593,2.955-3.325,1.812c-0.833-0.55-5.038-3.331-5.951-3.984	c-0.833-0.595-1.982-1.311-0.541-2.721c0.513-0.502,3.874-3.712,6.493-6.21c0.343-0.328-0.088-0.867-0.484-0.604	c-3.53,2.341-8.424,5.59-9.047,6.013c-0.941,0.639-1.845,0.932-3.467,0.466c-1.226-0.352-2.423-0.772-2.889-0.932	C9.384,25.282,9.81,24.484,11.553,23.717z">
                                        </path>
                                    </svg>
                                </a>
                                <div class="tooltip">Telegram</div>
                            </li>
                            <li class="icon-content">
                                <a href="#" class="social-youtube" aria-label="Youtube" data-social="youtube">
                                    <div class="filled"></div>
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100"
                                        height="100" viewBox="0 0 48 48">
                                        <path fill="#FF3D00"
                                            d="M43.2,33.9c-0.4,2.1-2.1,3.7-4.2,4c-3.3,0.5-8.8,1.1-15,1.1c-6.1,0-11.6-0.6-15-1.1c-2.1-0.3-3.8-1.9-4.2-4C4.4,31.6,4,28.2,4,24c0-4.2,0.4-7.6,0.8-9.9c0.4-2.1,2.1-3.7,4.2-4C12.3,9.6,17.8,9,24,9c6.2,0,11.6,0.6,15,1.1c2.1,0.3,3.8,1.9,4.2,4c0.4,2.3,0.9,5.7,0.9,9.9C44,28.2,43.6,31.6,43.2,33.9z">
                                        </path>
                                        <path fill="#FFF" d="M20 31L20 17 32 24z"></path>
                                    </svg>
                                </a>
                                <div class="tooltip">Youtube</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="footer-bottom py-3">
                <div
                    class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
                    <div class="mb-2 mb-md-0 m-auto">
                        <span class="footer-bottom-text">©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                        </span>
                        <span class="footer-bottom-text text-white">Bản quyền thuộc về: Công ty Cổ Phần Tập đoàn Anh
                            Sơn.</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="button-contact-vr">
            <div id="toggle-button" class="shadow d-block d-md-none d-flex justify-content-center align-items-center">
                <i class="ti ti-plus"></i>
            </div>
            <div id="popup-vr" class="button-contact">
                <div class="phone-vr">
                    <div class="phone-vr-circle-fill"></div>
                    <div class="phone-vr-img-circle">
                        <a target="_blank" href="#" class="social-fanpage">
                            <img src="{{ asset('assets/files/icons/facebook-icon.webp') }}" class="lazyloading"
                                data-was-processed="true">
                        </a>
                    </div>
                </div>
            </div>
            <div id="zalo-vr" class="button-contact">
                <div class="phone-vr">
                    <div class="phone-vr-circle-fill"></div>
                    <div class="phone-vr-img-circle">
                        <a target="_blank" href="#" class="social-zalo">
                            <img src="{{ asset('assets/files/icons/zalo-icon.png') }}" class="lazyloading"
                                data-was-processed="true">
                        </a>
                    </div>
                </div>
            </div>
            <div id="phone-vr" class="button-contact btn-viber">
                <div class="phone-vr">
                    <div class="phone-vr-circle-fill"></div>
                    <div class="phone-vr-img-circle">
                        <a target="_blank" href="#" id="contact-phone">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="603.000000pt"
                                height="603.000000pt" viewBox="0 0 603.000000 603.000000"
                                preserveAspectRatio="xMidYMid meet"
                                style=" width: 25px; height: 25px;filter: brightness(0) invert(1) !important;">
                                <g transform="translate(0.000000,603.000000) scale(0.100000,-0.100000)" fill="#0e63d8"
                                    stroke="none">
                                    <path d="M2807 5929 c-844 -61 -1631 -493 -2135 -1171 -530 -716 -707 -1616
                                    -487 -2483 185 -729 668 -1379 1320 -1775 104 -64 325 -172 455 -223 474 -187
                                    1032 -243 1547 -156 812 137 1531 614 1978 1315 75 117 180 315 230 434 85
                                    199 161 472 196 700 26 171 37 547 20 712 -63 611 -287 1145 -674 1608 -513
                                    614 -1246 986 -2052 1040 -169 11 -229 11 -398 -1z m388 -968 c553 -82 984
                                    -281 1310 -606 295 -294 489 -674 599 -1170 55 -253 55 -232 9 -244 -82 -21
                                    -73 -32 -108 140 -42 201 -85 356 -139 494 -249 637 -705 1034 -1391 1210
                                    -127 33 -372 75 -434 75 -30 0 -31 2 -31 44 0 87 -6 85 185 57z m-944 -352
                                    c83 -28 182 -134 313 -336 63 -98 131 -235 151 -307 22 -76 16 -165 -15 -226
                                    -26 -52 -125 -151 -225 -226 -128 -95 -155 -139 -155 -251 1 -157 102 -337
                                    352 -626 165 -191 347 -341 471 -390 73 -28 169 -28 222 0 22 12 94 72 160
                                    133 150 140 210 174 310 174 124 0 252 -76 491 -294 142 -130 186 -185 210
                                    -267 28 -96 4 -142 -147 -280 -211 -194 -373 -279 -599 -314 -101 -16 -312 -5
                                    -415 20 -385 94 -777 370 -1171 821 -184 211 -308 381 -424 583 -329 573 -329
                                    1107 -1 1495 41 50 168 163 269 241 73 56 137 72 203 50z m1074 -181 c529
                                    -123 927 -444 1154 -929 74 -157 138 -376 164 -560 l5 -36 -55 -7 c-31 -4 -57
                                    -5 -59 -3 -2 2 -11 44 -19 93 -35 202 -110 415 -210 591 -233 415 -631 679
                                    -1148 763 -59 10 -110 20 -114 23 -3 3 -2 30 1 60 l7 54 92 -14 c51 -7 133
                                    -23 182 -35z m-25 -523 c430 -164 694 -442 789 -831 16 -65 32 -131 35 -145 5
                                    -23 1 -27 -42 -42 -59 -21 -72 -21 -72 1 0 40 -61 257 -92 330 -115 264 -351
                                    466 -688 587 -52 18 -95 37 -94 42 1 4 7 29 14 55 15 56 12 56 150 3z m-35
                                    -469 c104 -51 202 -135 271 -231 45 -64 114 -201 114 -229 0 -13 -97 -54 -104
                                    -45 -1 2 -19 39 -39 81 -20 43 -49 97 -65 121 -71 102 -185 190 -298 227 -35
                                    12 -64 26 -64 31 0 6 5 31 11 56 12 45 12 45 48 39 20 -3 77 -25 126 -50z">
                                    </path>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div id="youtube-vr" class="button-contact">
                <div class="phone-vr">
                    <div class="phone-vr-circle-fill"></div>
                    <div class="phone-vr-img-circle">
                        <a target="_blank" href="#" class="social-youtube">
                            <img src="{{ asset('assets/files/icons/icon-youtube.webp') }}" width="25"
                                height="25" class="lazyloading" data-was-processed="true">
                        </a>
                    </div>
                </div>
            </div>
            <div id="button-scroll-to-top" class="button-contact">
                <div class="avatar avatar-md me-2" id="scroll-to-top">
                    <span class="avatar-initial rounded-circle bg-primary"> <i
                            class="ti ti-square-rounded-arrow-up fs-3 text-white"></i></span>
                </div>
            </div>
        </div>
</footer>
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#scroll-to-top").click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 600);
                return false;
            });
            $("#toggle-button").click(function() {
                if ($("#button-contact-vr").hasClass("active")) {
                    $("#button-contact-vr").removeClass("active");
                } else {
                    $("#button-contact-vr").addClass("active");
                }
            });

        });
    </script>
@endpush
