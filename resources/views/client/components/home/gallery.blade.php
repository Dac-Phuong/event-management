<section>
    <style>
        .gallery-items {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
        }

        .gallery-items img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }

        .gallery-items:hover img {
            transform: scale(1.1);
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .gallery-items:hover .overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .overlay h4 {
            margin-bottom: 10px;
        }

        .overlay .btn {
            transition: 0.3s;
        }

        .overlay .btn:hover {
            transform: scale(1.05);
        }
    </style>
    <div class="pb-5">
        <div class="row m-0" data-aos="fade-up">
            <div class="mb-4 d-flex flex-column align-items-center">
                <h1 class="text-center fw-bold fs-2 text-primary mb-1 text-uppercase">
                    Thiết kế ấn tượng
                </h1>
                <hr class="hr-title mt-0 mb-4">
            </div>
            <div class="position-relative" data-aos="fade-up">
                <div id="lightgallery" class="owl-carousel owl-theme">
                    @foreach ($gallery as $item)
                        <div class="gallery-items">
                            <img src="{{ asset($item->thumbnail) }}" class="img-fluid"
                                alt="Slider"/>
                            <div class="overlay">
                                <h4 class="text-white px-3">{{$item->title}}</h4>
                                <div class="d-flex gap-2">
                                    <a href="{{ asset('blog/'. $item->category->slug . '/' . $item->slug) }}" class="btn btn-primary btn-sm shadow-sm rounded-pill"><i
                                            class="ti ti-scan-eye me-2"></i>Xem bài viết</a>
                                    <a href="{{ asset($item->thumbnail) }}"
                                        class="btn btn-light btn-sm shadow-sm view-image rounded-pill"><i
                                            class="ti ti-zoom-pan me-2"></i>Xem ảnh</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>

@push('scripts')
    <script>
        $(document).ready(function() {
            var owl = $("#lightgallery");
            owl.owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true, 
                nav: false,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    },
                },
            });
            lightGallery(document.getElementById("lightgallery"), {
                thumbnail: true,
                selector: ".view-image",
            });
        });
    </script>
@endpush
