<section>
    <div class="container pb-5">
        <div class="row" data-aos="fade-up">
            <div class="mb-4 d-flex flex-column align-items-center">
                <h1 class="text-center fw-bold fs-2 text-primary mb-1 text-uppercase">
                    Thiết kế ấn tượng
                </h1>
                <hr class="hr-title mt-0 mb-4">
            </div>
            <div class="position-relative">
                <div id="lightgallery" class="owl-carousel owl-theme">
                    <a href="{{asset('assets/files/gallery/1.JPG')}}"
                        data-src="{{asset('assets/files/gallery/1.JPG')}}">
                        <img src="{{asset('assets/files/gallery/1.JPG')}}" class="img-fluid" style="height: 400px; border-radius: 12px;"
                            alt="Slide 1" />
                    </a>
                    <a href="{{asset('assets/files/gallery/2.JPG')}}"
                        data-src="{{asset('assets/files/gallery/2.JPG')}}">
                        <img src="{{asset('assets/files/gallery/2.JPG')}}" class="img-fluid" style="height: 400px; border-radius: 12px;"
                            alt="Slide 2" />
                    </a>
                    <a href="{{asset('assets/files/gallery/3.JPG')}}"
                        data-src="{{asset('assets/files/gallery/3.JPG')}}">
                        <img src="{{asset('assets/files/gallery/3.JPG')}}" class="img-fluid" style="height: 400px; border-radius: 12px;"
                            alt="Slide 3" />
                    </a>
                    <a href="{{asset('assets/files/gallery/4.JPG')}}"
                        data-src="{{asset('assets/files/gallery/4.JPG')}}">
                        <img src="{{asset('assets/files/gallery/4.JPG')}}" class="img-fluid" style="height: 400px; border-radius: 12px;"
                            alt="Slide 4" />
                    </a>
                    <a href="{{asset('assets/files/gallery/5.JPG')}}"
                        data-src="{{asset('assets/files/gallery/5.JPG')}}">
                        <img src="{{asset('assets/files/gallery/5.JPG')}}" class="img-fluid" style="height: 400px; border-radius: 12px;"
                            alt="Slide 5" />
                    </a>
                    <a href="{{asset('assets/files/gallery/6.JPG')}}"
                        data-src="{{asset('assets/files/gallery/6.JPG')}}">
                        <img src="{{asset('assets/files/gallery/6.JPG')}}" class="img-fluid" style="height: 400px; border-radius: 12px;"
                            alt="Slide 6" />
                    </a>
                    <a href="{{asset('assets/files/gallery/7.JPG')}}"
                        data-src="{{asset('assets/files/gallery/7.JPG')}}">
                        <img src="{{asset('assets/files/gallery/7.JPG')}}" class="img-fluid" style="height: 400px; border-radius: 12px;"
                            alt="Slide 7" />
                    </a>
                </div>
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
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
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
                        items: 3
                    },
                },
            });

            lightGallery(owl[0], {
                selector: "a",
            });
        });
    </script>
@endpush

