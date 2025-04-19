<footer id="footer" class="footer">
    <div class="upper_footer" style="background: rgba(0, 0, 0, 0.95);">
        <div class="container pb-5">
            <div class="row gx-0 gy-6 g-lg-10">
                <div class="col-lg-5">
                    <h2 class="footer-title fs-5 mb-6">
                        THÔNG TIN LIÊN HỆ
                    </h2>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-3">
                            <i class="fas fa-building me-2 footer-text"></i>
                            <span class="footer-text">Tên công ty: <span class="footer-link m-0 base-name">Công Ty TNHH
                                    Dịch Vụ ABC</span></span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-map-marker-alt me-2 footer-text"></i>
                            <span class="footer-text"> Địa chỉ: <span class="footer-link m-0 contact-address">Tân Triều
                                    - Thanh Trì - Hà Nội</span> </span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-phone-alt me-2 footer-text"></i>
                            <span class="footer-text">Hotline: <span class="footer-link m-0 contact-phone">0123 456
                                    789</span></span>
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-envelope me-2 footer-text"></i>
                            <span class="footer-text">
                                <span>Email: <span class="footer-link m-0 contact-email">info@example.com</span></span>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <h2 class="footer-title fs-5 mb-6 text-uppercase">Dịch vụ</h2>
                    <ul class="list-unstyled">
                        @foreach ($services as $service)
                            <li class="mb-3">
                                <a href="{{ url('/dich-vu/' . $service->slug) }}"
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
                            <a href="{{ url('/gioi-thieu') }}" class="footer-link">Giới thiệu</a>
                        </li>
                        <li class="mb-3">
                            <a href="#" class="footer-link">Dịch vụ</a>
                        </li>
                        <li class="mb-3">
                            <a href="{{ url('/du-an') }}" class="footer-link">Dự án</a>
                        </li>
                        <li class="mb-3">
                            <a href="{{ url('/blog') }}" class="footer-link">Blog</a>
                        </li>
                        <li class="mb-3">
                            <a href="{{ url('/tuyen-dung') }}" class="footer-link">Tuyển dụng</a>
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
                                    <button class="btn btn-primary" type="button" id="button-addon2"
                                        style="height: 47px"><i class="fas fa-paper-plane"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="social-links mt-2">
                            <a class="social-fanpage" target="_blank" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="social-zalo" target="_blank" href="#"><span
                                    style="font-size: 12px;">Zalo</span></a>
                            <a class="social-youtube" target="_blank" href="#"><i class="fab fa-youtube"></i></a>
                            <a class="social-telegram" target="_blank" href="#"><i
                                    class="fab fa-telegram"></i></a>
                            <a class="social-tiktok" target="_blank" href="#"><i class="fab fa-tiktok"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="copyrights" class="lower_footer">
            <div class="container-fluid" style="border-top: 1px solid #444;">
                <div class="copyright-text">
                    <p style="margin: 0px; text-align: center">
                        © Bản quyền thuộc về: Công ty Cổ Phần Tập đoàn Anh Sơn.
                    </p>
                </div>
            </div>
        </div>
</footer>
<div class="floating-right-sidebar" style="visibility: visible">
    <div class="item hidden-sm top-border"></div>
    <div class="item collapsable-item">
        <a target="_blank" class="additional-floating-sidebar-button-9"
            href="https://www.facebook.com/thienanagency">
            <img style="height: 35px" src="{{ asset('assets/files/default/facebook.png') }}" alt="chat_icon" />
        </a>
        <div class="description">Facebook</div>
    </div>
    <div class="item collapsable-item">
        <a role="button" aria-label="info@thienanagency.com" class="additional-floating-sidebar-button-10"
            href="mailto:info@thienanagency.com">
            <img style="height: 35px" src="{{ asset('assets/files/default/letter-3.png') }}" alt="chat_icon" />
        </a>
        <div class="description">info@thienanagency.com</div>
    </div>
    <div class="item collapsable-item">
        <a target="_blank" class="additional-floating-sidebar-button-2" href="https://zalo.me/0911407447">
            <img style="height: 35px" src="{{ asset('assets/files/default/zalo-3.png') }}" alt="chat_icon" />
        </a>
        <div class="description">Zalo: 0911.407.447</div>
    </div>
    <div class="item collapsable-item">
        <a role="button" aria-label="Hotline: 0911.407.447" class="additional-floating-sidebar-button-6"
            href="tel:0911407447">
            <img style="height: 35px" src="{{ asset('assets/files/default/call-3.png') }}" alt="chat_icon" />
        </a>
        <div class="description">Hotline: 0911.407.447</div>
    </div>
</div>
<a id="btn-scroll-to-top" href="#" class="hide-m show"> <i
        class="ti ti-arrow-up text-white mt-2 fs-4"></i></a>
