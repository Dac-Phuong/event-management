<div class="">
    <section class="contact-section">
        <div class="floating-shape shape-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
        <div class="container">
            <div class="center-content section-title my-5">
                <h2 class="text-gradient middle-content stroke-text mx-2" data-aos="zoom-in" data-aos-duration="1000">LIÊN
                    HỆ VỚI CHÚNG TÔI</h2>
                <div class="divider" data-aos="zoom-in" data-aos-duration="1000"></div>
                <p class="text-center m-auto" style="max-width: 700px;" data-aos="fade-up" data-aos-duration="1000">Hãy
                    liên hệ với Tập đoàn Anh Sơn Group để được tư vấn về các dịch vụ phù hợp với doanh nghiệp của
                    bạn</p>
            </div>
            <div class="contact-container">
                <div class="row g-0">
                    <div class="col-lg-5">
                        <div class="contact-info" data-aos="fade-up" data-aos-duration="1000">
                            <h3>Thông Tin Liên Hệ</h3>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Địa Chỉ</h4>
                                    <p class="contact-address">Số 27 phố Mai Phúc, phường Phúc Đồng, quận Long Biên, Hà
                                        Nội</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Điện Thoại</h4>
                                    <p><a class="contact-phone" href="#">0</a></p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Email</h4>
                                    <p><a id="contact-email" href="mailto:info@anhson.com">info@anhson.com</a></p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Giờ Làm Việc</h4>
                                    <p>Thứ 2 - Thứ 7: 8:00 - 17:30</p>
                                </div>
                            </div>

                            <div class="social-links">
                                <a class="social-fanpage" target="_blank" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="social-zalo" target="_blank" href="#"><span
                                        style="font-size: 12px;">Zalo</span></a>
                                <a class="social-youtube" target="_blank" href="#"><i
                                        class="fab fa-youtube"></i></a>
                                <a class="social-telegram" target="_blank" href="#"><i
                                        class="fab fa-telegram"></i></a>
                                <a class="social-tiktok" target="_blank" href="#"><i
                                        class="fab fa-tiktok"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="contact-form" data-aos="fade-up" data-aos-duration="1000">
                            <form id="contactForm" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="fullname" class="form-label">Họ và tên<span>*</span></label>
                                            <input type="text" class="form-control m-0" id="fullname" name="fullname">
                                        <div class="invalid-feedback" id="fullname-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email <span>*</span></label>
                                            <input type="email" class="form-control m-0" id="email" name="email">
                                            <div class="invalid-feedback" id="email-error"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="tel" class="form-control m-0" id="phone" name="phone">
                                    <div class="invalid-feedback" id="phone-error"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="contact-form-service" class="form-label">Dịch vụ <span>*</span></label>
                                    <select class="form-control m-0" id="contact-form-service" name="service_email">
                                        <option value="" selected disabled>-- Chọn dịch vụ --</option>
                                    </select>
                                    <div class="invalid-feedback" id="service-error"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="message" class="form-label">Nội dung <span>*</span></label>
                                    <textarea class="form-control m-0 p-3" id="message" name="message" rows="5"></textarea>
                                    <div class="invalid-feedback" id="message-error"></div>
                                </div>

                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="agree" name="agree">
                                    <label class="form-check-label" for="agree">Tôi đồng ý với <a
                                            href="#">chính sách bảo mật</a> của công ty</label>
                                    <div class="invalid-feedback" id="agree-error"></div>
                                </div>

                                <div class="text-center text-lg-start">
                                    <button type="submit" id="submit-button" class="cta-button" data-aos="zoom-in"
                                        data-aos-duration="1000">
                                        Gửi Thông Tin <i class="fas fa-paper-plane me-2"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#contactForm").submit(function(e) {
                e.preventDefault();
                let formData = new FormData($("#contactForm")[0]);
                formData.append('service_name', $("#contactForm option:selected").text());
                formData.append('_token', '{{ csrf_token() }}');
                const submitButton = $("#submit-button");
                submitButton.prop("disabled", true).html(
                    '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Đang gửi...'
                );
                $.ajax({
                    url: "{{ route('send.contact') }}",
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        $(".invalid-feedback").removeClass("d-block");
                        $(".form-control").removeClass("is-invalid").removeClass("is-valid");
                        submitButton.prop("disabled", false).html(
                            '<i class="ti ti-send me-2"></i>Gửi yêu cầu tư vấn');
                        if (res.error_code == -1) {
                            let errors = res.data;
                            for (const key in errors) {
                                $("#" + key + "-error").html(errors[key]).addClass("d-block");
                                $("#contactForm-" + key).addClass("is-invalid");
                            }
                        } else if (res.error_code == 0) {
                            toastr.success('Vui lòng chờ phản hồi sau ít phút',
                                'Gửi yêu cầu thành công!');
                            $("#contactForm")[0].reset();
                            $(".form-control").addClass("is-valid");
                        } else {
                            toastr.error('Đã có lỗi xảy ra, vui lòng thử lại sau',
                                'Gửi yêu cầu tư vấn');
                        }
                    }
                });
            });

            $("#contactForm input, #contactForm textarea").focus(function() {
                $(this).removeClass("is-invalid");
                $(".invalid-feedback").removeClass("d-block");
            });
        });
    </script>
@endpush
