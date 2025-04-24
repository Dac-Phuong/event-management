<div class="projects-section">
    {{-- <div class="scroll-text scroll-text2"
        style="
           top:-50px;
        --d: 3; --y: 40; background: linear-gradient(90deg, #111 20%, #1E64A5, #111); opacity: 1;">
        <div><span>ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP
                ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP</span></div>
        <div><span>ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP
                ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP</span></div>
    </div> --}}
    <div class="svg-divider">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                opacity=".25" fill="#1E64A5"></path>
            <path
                d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                opacity=".5" fill="#1E64A5"></path>
            <path
                d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                fill="#1E64A5"></path>
        </svg>
    </div>
    <div class="section container">
        <div class="center-content section-title my-5" data-aos="fade-left" data-aos-delay="200">
            <h2 class="text-gradient middle-content stroke-text">
                Các dự án tiêu biểu </h2>
            <div class="divider"></div>
            <p>Những sự kiện ấn tượng mà chúng tôi đã tổ chức thành công cho khách hàng trong nhiều lĩnh vực khác nhau.
            </p>
        </div>
        <div class="projects-grid">
            @foreach ($projects as $project)
                <div class="project-card" data-aos="zoom-in" data-aos-delay="300">
                    <div class="project-media">
                        <img src="{{ $project->thumbnail }}" class="project-image" alt="Sunshine Complex">
                        <div class="play-button" data-video-id="{{ $project->url }}">
                            <i class="fas fa-play"></i>
                        </div>
                        <span class="project-badge" data-aos="fade-up"
                            data-aos-delay="200">{{ $project->category->name }}</span>
                    </div>
                    <div class="project-content">
                        <h3 class="project-title">{{ $project->title }}</h3>
                        <p class="project-description">{{ $project->content }}</p>
                        <div class="project-meta">
                            <a href="{{ url('/du-an/' . $project->category->slug . '/' . $project->slug) }}"
                                class="read-more">Xem dự án <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="section-cta" data-aos="fade-left" data-aos-delay="200">
            <a href="{{ url('du-an') }}" class="cta-button">Xem tất cả dự án <i
                    class="fas fa-long-arrow-alt-right"></i></a>
        </div>
    </div>
</div>
<div class="modal fade p-0" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div style="position: absolute; top: 20px; right: 20px; cursor: pointer;" class="close-video">
        <i class="ti ti-x text-white fs-3"></i>
    </div>
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent">
            <div class="modal-body p-0">
                <div class="video-container">
                    <iframe src="" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- 
<div class="scroll-text scroll-text2"
    style="
          --d: -3;
          --y: -25;
          top: 35px;
          background: linear-gradient(90deg, #111 20%, #1E64A5, #111);
          opacity: 1;
        ">
    <div>
        <span>ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON
            GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON
            GROUP  ANH SON GROUP  </span>
    </div>
    <div>
        <span>ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON
            GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON
            GROUP  ANH SON GROUP  </span>
    </div>
</div> --}}
@push('scripts')
    <script>
        $('.play-button').click(function() {
            const videoId = $(this).attr('data-video-id');
            $('.video-container iframe').attr('src', `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`);
            $("#videoModal").modal("show");
            $('body').css('overflow', 'hidden');
        });

        $('.close-video').click(function() {
            $("#videoModal").modal("hide");
            $('.video-container iframe').attr('src', '');
            $('body').css('overflow', 'auto');
        });

        // Close modal when clicking outside
        $('.video-modal').click(function(e) {
            if ($(e.target).is('.video-modal')) {
                $("#videoModal").modal("hide");
                $('.video-container iframe').attr('src', '');
                $('body').css('overflow', 'auto');
            }
        });
    </script>
@endpush
