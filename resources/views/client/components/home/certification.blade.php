<section>
    <style>
        .owl-carousel .item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            margin: 5px;
        }

        .owl-carousel .item img {
            width: 100%;
            height: 200px;
            object-fit: contain;
            padding: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .owl-dots {
            display: none !important;
        }

        .custom-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            transform: translateY(-50%);
            display: flex;
            justify-content: space-between;
            pointer-events: none;
            z-index: 1;
        }

        .custom-nav button {
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            pointer-events: all;
            margin-right: 20px;
            transition: background 0.3s ease-in-out;
        }

        .modal-img {
            width: 100%;
            max-height: 80vh;
            object-fit: contain;
        }

        .modal .btn-close {
            box-shadow: none !important;
            position: absolute;
        }

        .gallery-item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
            padding: 10px;
        }
    </style>
    <div class="container pb-5">
        <div class="row" data-aos="fade-up">
            <div class="mb-4 d-flex flex-column align-items-center">
                <h1 class="text-center fw-bold fs-2 text-primary mb-1 text-uppercase">
                    Bằng khen & xác lập kỷ lục
                </h1>
                <hr class="hr-title mt-0 mb-4">
            </div>
            <div class="position-relative">
                <div id="certification" class="owl-carousel owl-theme p-3">
                    @foreach ($certification as $item)
                        <div class="item gallery-item rounded shadow-sm card my-2">
                            <div class="show-image" data-img="{{ asset($item->thumbnail) }}">
                                <img src="{{ asset($item->thumbnail) }}" alt="Ảnh " class="img-fluid ">
                            </div>
                            <div class="px-2">
                                <a href="{{ asset('blog/'. $item->category->slug . '/' . $item->slug) }}" class="text-decoration-none">
                                    <h4 class="fs-6 text-hover text-center">{{ $item->title }}</h4>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Nút Next / Prev -->
                <div class="custom-nav">
                    <button id="prevBtn" class="bg-primary"><i
                            class="ti ti-chevron-left fs-3"></i></button>
                    <button id="nextBtn" class="bg-primary"><i class="ti ti-chevron-right fs-3"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-transparent" style="box-shadow: none !important;">
                <div class="modal-header p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="z-index: 1"></button>
                </div>
                <div class="modal-body p-2">
                    <img id="modalImage" class="modal-img" src="" alt="Ảnh lớn">
                </div>
            </div>
        </div>
    </div>

</section>

@push('scripts')
    <script>
        $(document).ready(function() {
            var owl = $("#certification");
            owl.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000, 
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    },
                }
            });

            // Nút điều khiển thủ công
            $("#prevBtn").click(function() {
                owl.trigger("prev.owl.carousel");
            });
            $("#nextBtn").click(function() {
                owl.trigger("next.owl.carousel");
            });

            $(".show-image").click(function(event) {
                event.preventDefault();
                var imgSrc = $(this).attr("data-img");
                $("#modalImage").attr("src", imgSrc);
                $("#imageModal").modal("show");
            });

        });
    </script>
@endpush

