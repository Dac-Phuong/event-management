    <div class="container-fluid py-5 position-relative">
        <div class="container">
            <div class="row align-items-center position-relative">
                <!-- Image Column -->
                <div class="col-lg-6 position-relative p-0 " data-aos="fade-right">
                    <img src="https://www.sapo.vn/Themes/Portal/Default/Images/aboutus/img-su-menh-1.png?v=2"
                        alt="Business meeting" class="img-fluid rounded intro-card-img" width="100%">
                    <div class="play-icon cursor-pointer" data-bs-toggle="modal" data-bs-target="#videoModal">
                        <div id="phone-vr" class="button-contact btn-viber" >
                            <div class="phone-vr">
                                <div class="phone-vr-circle-fill"></div>
                                <div class="phone-vr-img-circle">
                                    <div class="play">
                                        <i class="fas fa-play text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Column -->
                <div class="col-lg-6 bg-white p-3 p-md-5 mt-3 mt-md-0 content-overlay"
                    style="right: 120px; border-radius: 12px;" data-aos="fade-left">
                    <h1 class=" fw-bold fs-2 text-primary mb-2">GIỚI THIỆU VỀ TẬP ĐOÀN ANH SƠN</h1>
                    <hr class="hr-title mt-0 mb-4">
                    <h5 class=" mb-2">CÔNG TY CỔ PHẦN TẬP ĐOÀN TẬP ĐOÀN ANH SƠN</h5>
                    <p class="mb-2">
                        Thành lập từ năm 2006, đến nay đã gần 20 năm trưởng thành và phát triển, công ty Cổ phần Quảng
                        cáo –
                        Xây dựng và Thương Mại Anh Sơn đã
                        đạt được những kết quả kinh doanh khá ấn tượng.
                    </p>
                    <p class="mb-2">
                        Là nhà tư vấn giải pháp - Đối tác chiến lược về Truyền thông &amp; sự kiện cho các khách hàng
                        trong
                        nước và
                        quốc tế tại khu vực Đông Nam Á. TẬP ĐOÀN ANH SƠN cũng vinh dự là đại diện duy nhất của Việt Nam
                        chiến thắng
                        Cúp Vàng giải thưởng Event Marketing Awards 2023 hạng mục Best Arts &amp; Cultural Event, là
                        agency
                        đầu tiên
                        của Việt Nam 2 lần nhận Cúp Vàng của giải thưởng Quốc tế Stevie Awards tại Mỹ (NewYork, USA)
                        hạng
                        mục
                        Chiến dịch truyền thông/PR xuất sắc (năm 2018 và năm 2020) và Giải Bạc Global Eventex Awards
                        hạng
                        mục Sự
                        kiện – Văn hóa năm 2019.
                    </p>
                    <div class="d-flex flex-warp align-items-center mt-4">
                        <a href="{{ url('/introduce') }}" class="btn btn-primary rounded-pill me-4">Xem thêm <i
                                class="ti ti-arrow-right" style="margin-left: 5px"></i></a>
                        <a href="javascript:void(0);" class="btn btn-primary rounded-pill scrollToContact"><i
                                class="ti ti-mail-share me-2"></i> Yêu cầu tư vấn</a>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header p-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                style="z-index: 1"></button>
                        </div>
                        <div class="modal-body p-2">
                            <div class="ratio ratio-16x9">
                                <iframe id="videoFrame" src="" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#videoModal").on("shown.bs.modal", function() {
                    var videoUrl = "https://www.youtube.com/embed/xfiI2MZPgMQ?autoplay=1&mute=1";
                    $("#videoFrame").attr("src", videoUrl);
                });

                $("#videoModal").on("hidden.bs.modal", function() {
                    $("#videoFrame").attr("src", "");
                });
            });
        </script>
    @endpush
