<div class="projects-section">
    <div class="scroll-text scroll-text2"
        style="
           top:-50px;
        --d: 3; --y: 40; background: linear-gradient(90deg, #111 20%, #ff7900, #111); opacity: 0.3;">
        <div><span>ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP
                ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP</span></div>
        <div><span>ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP
                ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP</span></div>
    </div>
    <div class="section container">
        <div class="center-content section-title my-5" data-aos="fade-left" data-aos-delay="200">
            <h2 class="text-gradient middle-content stroke-text">
                Các dự án tiêu biểu </h2>
            <div class="divider"></div>
            <p>Anh Sơn Group đã thực hiện các dự án trong nhiều lĩnh vực
                khác nhau</p>
        </div>
        <div class="projects-grid">
            @foreach ($projects as $project)
                <div class="project-card" data-aos="zoom-in" data-aos-delay="300">
                    <div class="project-media">
                        <img src="{{ $project->thumbnail }}" class="project-image" alt="Sunshine Complex">
                        <div class="play-button" data-video-id="{{ $project->url }}">
                            <i class="fas fa-play"></i>
                        </div>
                        <span class="project-badge" data-aos="fade-up" data-aos-delay="200">{{ $project->category->name }}</span>
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

<div class="scroll-text scroll-text2"
    style="
          --d: -3;
          --y: -25;
          top: 35px;
          background: linear-gradient(90deg, #111 20%, #ff7900, #111);
          opacity: 0.3;
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
</div>
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
