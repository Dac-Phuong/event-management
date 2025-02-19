  <section id="landingContact" class="section-py landing-contact">
      <div class="container">
          <div data-aos="zoom-out">
              <div class="text-center mb-4">
                  <span class="badge bg-label-primary">Liên hệ với chúng tôi</span>
              </div>
              <h4 class="text-center mb-1">
                  <span class="position-relative fw-extrabold z-1">Chúng ta hãy làm việc</span>
                  cùng nhau
              </h4>
              <p class="text-center mb-12 pb-md-4">Có bất kỳ câu hỏi hoặc yêu cầu tư vấn nào không? Chỉ cần viết cho
                  chúng tôi một
                  tin nhắn</p>
          </div>
          <div class="row g-6">
              <div class="col-lg-5 mt-2" data-aos="zoom-in">
                  <div class="contact-img-box position-relative border p-2 h-100">
                      <img src="../../assets/img/front-pages/icons/contact-border.png" alt="contact border"
                          class="contact-border-img position-absolute d-none d-lg-block scaleX-n1-rtl">
                      <img src="../../assets/img/front-pages/landing-page/contact-customer-service.png"
                          alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl">
                      <div class="p-4 pb-2">
                          <div class="row g-4">
                              <div class="col-md-6 col-lg-12 col-xl-6">
                                  <div class="d-flex align-items-center">
                                      <div class="badge bg-label-primary rounded p-1_5 me-3"><i
                                              class="ti ti-mail ti-lg"></i></div>
                                      <div>
                                          <p class="mb-0">Email</p>
                                          <h6 class="mb-0">
                                              <a href="mailto:example@gmail.com" class="text-heading"
                                                  id="contact-email">example@gmail.com</a>
                                          </h6>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6 col-lg-12 col-xl-6">
                                  <div class="d-flex align-items-center">
                                      <div class="badge bg-label-success rounded p-1_5 me-3"><i
                                              class="ti ti-phone-call ti-lg"></i></div>
                                      <div>
                                          <p class="mb-0">Phone</p>
                                          <h6 class="mb-0"><a href="tel:+1234-568-963"
                                                  class="text-heading contact-phone">+1234 568
                                                  963</a></h6>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-7 mt-2" data-aos="zoom-in">
                  <div class="card h-100">
                      <div class="card-body">
                          <h4 class="mb-2">Gửi tin nhắn</h4>
                          <p class="mb-6">
                              Nếu bạn muốn thảo luận bất cứ điều gì liên quan đến các dịch vụ truyền thông,<br
                                  class="d-none d-lg-block">
                              quan hệ đối tác, bạn đã đến đúng nơi.
                          </p>
                          <form id="contact-form">
                              <div class="row g-4">
                                  <div class="col-md-6">
                                      <label class="form-label" for="contact-form-fullname">Họ và tên hoặc tên doanh
                                          nghiệp</label>
                                      <input type="text" class="form-control" id="contact-form-fullname"
                                          name="fullname" required placeholder="Nhập họ và tên">
                                  </div>
                                  <div class="col-md-6">
                                      <label class="form-label" for="contact-form-phone">Số điện thoại</label>
                                      <input type="text" id="contact-form-phone" name="phone" required
                                          class="form-control" placeholder="Nhập số điện thoại">
                                  </div>

                                  <div class="col-md-6">
                                      <label class="form-label" for="contact-form-email">Địa chỉ Email</label>
                                      <input type="email" id="contact-form-email" name="email" required
                                          class="form-control" placeholder="Nhập địa chỉ Email">
                                  </div>
                                  <div class="col-md-6">
                                      <label class="form-label" for="contact-form-service">Dịch vụ cần tư vấn</label>
                                      <select class="form-select" id="contact-form-service" required name="service_email">
                                          <option selected disabled>--Chọn dịch vụ--</option>
                                      </select>
                                  </div>
                                  <div class="col-12">
                                      <label class="form-label" for="contact-form-message">Nội dung</label>
                                      <textarea id="contact-form-message" name="message" class="form-control" rows="7" required
                                          placeholder="Viết một tin nhắn"></textarea>
                                  </div>
                                  <div class="col-12">
                                      <button type="submit" class="btn btn-primary rounded-pill waves-light">
                                          <i class="ti ti-send me-2"></i>Gửi yêu cầu tư vấn</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  @push('scripts')
      <script>
          $(document).ready(function() {
              $("#contact-form").submit(function(e) {
                  e.preventDefault();
                  let formData = new FormData($("#contact-form")[0]);
                  formData.append('_token', '{{ csrf_token() }}');
                  $.ajax({
                      url: "{{ route('send.contact') }}",
                      type: "POST",
                      data: formData,
                      dataType: 'json',
                      contentType: false,
                      processData: false,
                      success: function(res) {
                          if (res.error_code == 0) {
                              toastr.success('Vui lòng chờ phản hồi sau ít phút','Gửi yêu cầu thành công!');
                              $("#contact-form")[0].reset();
                          } else {
                              toastr.error(res.message);
                          }
                      }
                  });
              });

          });
      </script>
  @endpush
