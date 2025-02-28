<section id="landingPricing" class="section-py">
    <div class="journey">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div data-aos="fade-up">
                        <h2 class="text-primary mb-1 fw-bold fs-2 text-uppercase">
                            Với gần 20 năm chinh phục những con số ấn tượng
                        </h2>
                        <hr class="hr-title mt-0 mb-4 m-auto m-md-0">
                    </div>
                    <div class="statistics">
                        <div class="card card-border-shadow-primary h-100" data-aos="fade-up">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary">
                                            <i class="fas fa-users"></i>
                                        </span>
                                    </div>
                                    <h4 class="mb-0 count" data-count="200000">0</h4>
                                </div>
                                <p class="mb-1">Khách hàng trên toàn quốc</p>
                            </div>
                        </div>
                        <div class="card card-border-shadow-primary h-100" data-aos="fade-up">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary">
                                            <i class="ti ti-gift"></i>
                                        </span>
                                    </div>
                                    <h4 class="mb-0 count" data-count="1000">0</h4>
                                </div>
                                <p class="mb-1">Tham gia sự kiện lớn</p>
                            </div>
                        </div>
                        <div class="card card-border-shadow-primary h-100" data-aos="fade-up">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary">
                                            <i class="ti ti-users-plus"></i>
                                        </span>
                                    </div>
                                    <h4 class="mb-0 count" data-count="100">0</h4>
                                </div>
                                <p class="mb-1">Nhân sự chất lượng cao</p>
                            </div>
                        </div>
                        <div class="card card-border-shadow-primary h-100" data-aos="fade-up">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="avatar me-4">
                                        <span class="avatar-initial rounded bg-label-primary">
                                            <i class="ti ti-user-star"></i>
                                        </span>
                                    </div>
                                    <h4 class="mb-0 count" data-count="30">0</h4>
                                </div>
                                <p class="mb-1">Đối tác trên toàn quốc</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <div class="card w-100 h-100 p-2" data-aos="fade-up">
                        <iframe src="https://www.google.com/maps/" id="map-iframe" frameborder="0"
                            style="border-radius: 12px; z-index: 1; min-height: 500px ;" width="100%" height="100%">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script>
        $.fn.countTo = function(options) {
            return this.each(function() {
                let settings = $.extend({
                    from: 0,
                    to: $(this).data('count'),
                    speed: 2000,
                    refreshInterval: 50
                }, options);

                let $this = $(this),
                    loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops,
                    value = settings.from,
                    loopCount = 0;

                let interval = setInterval(() => {
                    value += increment;
                    loopCount++;
                    $this.text(formatNumber(Math.floor(value)) + "+");
                    if (loopCount >= loops) {
                        clearInterval(interval);
                        $this.text(formatNumber(settings.to) + "+");
                    }
                }, settings.refreshInterval);
            });
        };

        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        $(document).ready(function() {
            let observer = new IntersectionObserver(entries => {
                if (entries[0].isIntersecting) {
                    $(".count").each(function() {
                        $(this).countTo();
                    });
                    observer.disconnect();
                }
            }, {
                rootMargin: '0px 0px -200px 0px'
            });

            observer.observe(document.getElementById('landingPricing'));
        });
    </script>
@endpush
