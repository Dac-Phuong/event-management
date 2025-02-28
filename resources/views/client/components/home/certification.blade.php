<section>
    <style>
        .owl-carousel .item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            border: 1px solid #ccc;
        }

        .owl-carousel .item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            padding: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .owl-carousel .item:hover img {
            transform: scale(1.05);
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
            transition: background 0.3s ease-in-out;
        }

        .custom-nav button:hover {
            background: black;
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
                <div id="certification" class="owl-carousel owl-theme">
                    <div class="item" data-img="{{ asset('/assets/files/certification/1.jpg') }}">
                        <img src="{{ asset('/assets/files/certification/1.jpg') }}" alt="Ảnh 1">
                    </div>
                    <div class="item" data-img="{{ asset('/assets/files/certification/2.jpg') }}">
                        <img src="{{ asset('/assets/files/certification/2.jpg') }}" alt="Ảnh 2">
                    </div>
                    <div class="item" data-img="{{ asset('/assets/files/certification/3.jpg') }}">
                        <img src="{{ asset('/assets/files/certification/3.jpg') }}" alt="Ảnh 3">
                    </div>
                    <div class="item" data-img="{{ asset('/assets/files/certification/4.jpg') }}">
                        <img src="{{ asset('/assets/files/certification/4.jpg') }}" alt="Ảnh 4">
                    </div>
                    <div class="item" data-img="{{ asset('/assets/files/certification/5.jpg') }}">
                        <img src="{{ asset('/assets/files/certification/5.jpg') }}" alt="Ảnh 5">
                    </div>
                    <div class="item" data-img="{{ asset('/assets/files/certification/6.jpg') }}">
                        <img src="{{ asset('/assets/files/certification/6.jpg') }}" alt="Ảnh 6">
                    </div>
                    <div class="item" data-img="{{ asset('/assets/files/certification/7.jpg') }}">
                        <img src="{{ asset('/assets/files/certification/7.jpg') }}" alt="Ảnh 7">
                    </div>
                    <div class="item" data-img="{{ asset('/assets/files/certification/8.jpg') }}">
                        <img src="{{ asset('/assets/files/certification/8.jpg') }}" alt="Ảnh 8">
                    </div>
                    <div class="item" data-img="{{ asset('/assets/files/certification/9.jpg') }}">
                        <img src="{{ asset('/assets/files/certification/9.jpg') }}" alt="Ảnh 9">
                    </div>
                    <div class="item" data-img="{{ asset('/assets/files/certification/10.jpg') }}">
                        <img src="{{ asset('/assets/files/certification/10.jpg') }}" alt="Ảnh 10">
                    </div>
                    <div class="item" data-img="{{ asset('/assets/files/certification/11.jpg') }}">
                        <img src="{{ asset('/assets/files/certification/11.jpg') }}" alt="Ảnh 11">
                    </div>
                    <div class="item" data-img="{{ asset('/assets/files/certification/12.jpg') }}">
                        <img src="{{ asset('/assets/files/certification/12.jpg') }}" alt="Ảnh 12">
                    </div>
                </div>
                <!-- Nút Next / Prev -->
                <div class="custom-nav">
                    <button id="prevBtn" class="bg-primary" style="margin-left: -15px"><i
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
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            });

            $("#prevBtn").click(function() {
                owl.trigger("prev.owl.carousel");
            });
            $("#nextBtn").click(function() {
                owl.trigger("next.owl.carousel");
            });
            $(".owl-carousel .item").click(function(event) {
                event.preventDefault();
                var imgSrc = $(this).attr("data-img");
                $("#modalImage").attr("src", imgSrc);
                $("#imageModal").modal("show");
            });
        });
    </script>
@endpush
