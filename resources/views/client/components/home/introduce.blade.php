<div class="container-fluid py-5 position-relative">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class=" fw-bold fs-2 text-primary mb-2">GIỚI THIỆU VỀ TẬP ĐOÀN ANH SƠN</h1>
                <hr class="hr-title mt-0 mb-4">
                <h5 class=" mb-2">CÔNG TY CỔ PHẦN TẬP ĐOÀN TẬP ĐOÀN ANH SƠN</h5>
                <p class="mb-2">
                    Thành lập từ năm 2006, đến nay đã gần 20 năm trưởng thành và phát triển, công ty Cổ phần Quảng cáo –
                    Xây dựng và Thương Mại Anh Sơn đã
                    đạt được những kết quả kinh doanh khá ấn tượng.
                </p>
                <p class="mb-2">
                    Là nhà tư vấn giải pháp - Đối tác chiến lược về Truyền thông &amp; sự kiện cho các khách hàng trong
                    nước và
                    quốc tế tại khu vực Đông Nam Á. TẬP ĐOÀN ANH SƠN cũng vinh dự là đại diện duy nhất của Việt Nam
                    chiến thắng
                    Cúp Vàng giải thưởng Event Marketing Awards 2023 hạng mục Best Arts &amp; Cultural Event, là agency
                    đầu tiên
                    của Việt Nam 2 lần nhận Cúp Vàng của giải thưởng Quốc tế Stevie Awards tại Mỹ (NewYork, USA) hạng
                    mục
                    Chiến dịch truyền thông/PR xuất sắc (năm 2018 và năm 2020) và Giải Bạc Global Eventex Awards hạng
                    mục Sự
                    kiện – Văn hóa năm 2019.
                </p>
                <a href="{{ url('/introduce') }}" class="btn btn-primary mt-2">Xem thêm <i class="ti ti-arrow-right"
                        style="margin-left: 2px"></i></a>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="position-relative video-container">
                    <img width="100%"
                        src="https://anhsongroup.com/images/sukien_porfolio/huu_%20nghi_%20viet_%20lao_%202012.jpg"
                        alt="Video Thumbnail" class="video-thumbnail">
                    <div class="play-icon" data-bs-toggle="modal" data-bs-target="#videoModal">
                        <i class="fas fa-play"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
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
            $(".play-icon").click(function() {
                var videoUrl = "https://www.youtube.com/embed/xfiI2MZPgMQ?autoplay=1"; 
                $("#videoFrame").attr("src", videoUrl);
            });

            $("#videoModal").on("hidden.bs.modal", function() {
                $("#videoFrame").attr("src", "");
            });
        });
    </script>
@endpush
