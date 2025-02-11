<section id="hero-animation" class="d-flex align-items-center justify-content-center vh-100">
    <div class="slider-container w-100 h-100">
        <div class="swiper swiper-main w-100 h-100">
            <div class="swiper-wrapper">
                @foreach ($banner as $item)
                    <div class="swiper-slide d-flex flex-column align-items-center justify-content-center w-100 h-100 text-center">
                        <img src="{{ $item['thumbnail'] }}" alt="{{ $item['thumbnail'] }}" height="100%" class="img-fluid">
                        <div class="slide-content">
                            <h2 class="text-white fs-2 text-shadow">{{ $item['title'] }}</h2>
                            <p class="text-white mb-3 fs-5 m-auto text-description">{{ $item['description'] }}</p>
                            <button class="btn btn-primary next-slide">Xem thêm</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

 @push('scripts')
     <script>
         $(document).ready(function() {
             const mainSwiper = new Swiper('.swiper-main', {
                 spaceBetween: 10,
                 navigation: {
                     nextEl: '.swiper-button-next',
                     prevEl: '.swiper-button-prev',
                 },
                 effect: 'fade',
                 fadeEffect: {
                     crossFade: true
                 },
                 autoplay: {
                     delay: 5000,
                     disableOnInteraction: false,
                 }
             });

             mainSwiper.on('slideChange', function() {
                 const activeSlide = $(mainSwiper.slides[mainSwiper.activeIndex]);
                 const imageUrl = activeSlide.find('img').attr('src');
             });
             $(document).on('click', '.next-slide', function() {
                 if (mainSwiper.activeIndex === mainSwiper.slides.length - 1) {
                     mainSwiper.slideTo(0);
                 } else {
                     mainSwiper.slideNext();
                 }
             });
         });
     </script>
 @endpush
