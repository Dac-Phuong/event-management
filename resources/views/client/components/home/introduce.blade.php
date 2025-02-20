    <section class="pt-5">
        <div class="container-fluid position-relative">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <!-- Image Column -->
                    <div class="col-lg-6 position-relative p-0 " data-aos="fade-right">
                        <img src="{{ asset(isset($introduce['introduce_image']) ? $introduce['introduce_image'] : 'assets/files/img/img-su-menh-1.png') }}"
                            alt="Business meeting" class="img-fluid rounded intro-card-img" width="100%">
                        <div class="play-icon cursor-pointer" data-bs-toggle="modal" data-bs-target="#videoModal">
                            <div id="phone-vr" class="button-contact btn-viber">
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
                        <p class="mb-2">
                            {!! isset($introduce['introduce_content']) ? $introduce['introduce_content'] : '' !!}
                        </p>
                        <div class="d-flex flex-warp align-items-center mt-4">
                            <a href="{{ url('/gioi-thieu') }}" class="btn btn-primary rounded-pill me-4">Xem thêm <i
                                    class="ti ti-arrow-right" style="margin-left: 5px"></i></a>
                            <a href="javascript:void(0);" class="btn btn-primary rounded-pill scrollToContact"><i
                                    class="ti ti-mail-share me-2"></i> Yêu cầu tư vấn</a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header p-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    style="z-index: 1"></button>
                            </div>
                            <div class="modal-body p-2">
                                <div class="ratio ratio-16x9">
                                    <iframe id="videoFrame"
                                        src="https://www.youtube.com/embed/{{ isset($introduce['introduce_youtube_id']) ? $introduce['introduce_youtube_id'] : '' }}?autoplay=1&mute=1"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            var videoSrc = $("#videoFrame").attr("src");
            $("#videoModal").on("hidden.bs.modal", function() {
                $("#videoFrame").attr("src", "");
            });
            $("#videoModal").on("shown.bs.modal", function() {
                $("#videoFrame").attr("src", videoSrc);
            });
        </script>
    @endpush
