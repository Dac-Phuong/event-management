<style>
    /* banner */
    /* #hero-animation {
        height: 700px;
    } */

    .slider-container {
        margin: 0 auto;
    }

    .swiper-main {
        margin-bottom: 20px;
    }

    .swiper-main .swiper-slide {
        position: relative;
        height: 700px !important;
        overflow: hidden;
    }

    .swiper-main img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .swiper-main .swiper-slide-active img {
        transform: scale(1.05);
    }

    .slide-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 2;
        padding: 30px;
        min-height: 260px;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
        color: white;
        text-align: center;
        transform: translateY(100%);
        transition: transform 0.5s ease;
    }

    .swiper-main .swiper-slide-active .slide-content {
        transform: translateY(0);
    }

    .swiper-thumbs {
        height: 80px;
        width: 80%;
        margin: 0 auto;
    }

    .swiper-thumbs .swiper-slide {
        opacity: 0.4;
        overflow: hidden;
        border-radius: 8px;
        cursor: pointer;
        width: 60px !important;
        height: 60px !important;
        margin: 0 5px;
        transition: all 0.3s ease;
    }

    .swiper-thumbs .swiper-slide-thumb-active {
        opacity: 1;
        border: 2px solid #ff6b00;
        transform: scale(1.1);
    }

    .swiper-thumbs img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .view-more-btn {
        color: white;
        border: none;
        padding: 8px 24px;
        border-radius: 20px;
        transition: all 0.3s;
        opacity: 0;
        transform: translateY(20px);
    }

    .swiper-main .swiper-slide-active .view-more-btn {
        animation: fadeInUp 0.5s ease 0.3s forwards;
    }

    .view-more-btn:hover {
        transform: translateY(-2px);
    }

    .banner-item {
        position: relative;
        display: inline-block;
    }

    .banner-overlay {
        background: rgba(0, 0, 0, 0.5);
        border-radius: 10px;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        visibility: hidden;
    }

    .banner-item:hover .banner-overlay {
        opacity: 1;
        visibility: visible;
    }
</style>
<section id="hero-animation" class="d-flex align-items-center justify-content-center">
    <div class="slider-container w-100 h-100">
        <div class="swiper swiper-main w-100 h-100">
            <div class="swiper-wrapper">
                @if (isset($banner) && count($banner) > 0)
                    @foreach ($banner as $item)
                        <div
                            class="swiper-slide d-flex flex-column align-items-center justify-content-center w-100 h-100 text-center">
                            <img src="{{ $item['thumbnail'] }}" alt="{{ $item['thumbnail'] }}" height="100%"
                                class="img-fluid">
                            {{-- <div class="slide-content">
                                <h2 class="fs-1 text-shadow text-white">{{ $item['title'] }}</h2>
                                <p class="mb-3 fs-6 text-white m-auto text-description">{{ $item['description'] }}</p>
                            </div> --}}
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        $(document).ready(function() {
            const mainSwiper = new Swiper('.swiper-main', {
                spaceBetween: 10,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
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

{{-- <div class="section container-carousel overflow-hidden">
        <div class="general-title"></div>
        <div class="new-container-scroll-text">
            <div class="scroll-text scroll-text2"
                style="
              --d: 0;
              --y: 0;
              background: linear-gradient(90deg, #111 20%, #1E64A5, #111);
              opacity: 1;
            ">
                <div>
                    <span>ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH
                        SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH
                        SON GROUP  ANH SON GROUP  </span>
                </div>
                <div>
                    <span>ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH
                        SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH
                        SON GROUP  ANH SON GROUP  </span>
                </div>
            </div>
            <div class="scroll-text scroll-text1"
                style="
              --d: -3;
              --y: 0;
              background: linear-gradient(90deg, #111 20%, #fff, #111);
              opacity: 1;
            ">
                <div>
                    <span>EVENT AGENCY  EVENT AGENCY  EVENT AGENCY  EVENT AGENCY  EVENT
                        AGENCY  EVENT AGENCY  EVENT AGENCY  EVENT AGENCY  EVENT
                        AGENCY  EVENT AGENCY  </span>
                </div>
                <div>
                    <span>EVENT AGENCY  EVENT AGENCY  EVENT AGENCY  EVENT AGENCY  EVENT
                        AGENCY  EVENT AGENCY  EVENT AGENCY  EVENT AGENCY  EVENT
                        AGENCY  EVENT AGENCY  </span>
                </div>
            </div>
            <div class="scroll-text scroll-text2"
                style="
              --d: 0;
              --y: 0;
              background: linear-gradient(90deg, #111 20%, #1E64A5, #111);
              opacity: 1;
            ">
                <div>
                    <span>ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH
                        SON GROUP  ANH SON GROUP  ANH SON GROUP  THIEN AN AGENCY  ANH
                        SON GROUP  ANH SON GROUP  </span>
                </div>
                <div>
                    <span>ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH SON GROUP  ANH
                        SON GROUP  ANH SON GROUP  ANH SON GROUP  THIEN AN AGENCY  ANH
                        SON GROUP  ANH SON GROUP  </span>
                </div>
            </div>
        </div>
        <div id="" class="max-width hide"
            style="
            display: flex;
            position: relative;
            margin: 0px auto;
            height: 500px;
            justify-content: center;
          ">
            <div class=""
                style="
              display: flex;
              align-items: center;
              position: absolute;
              left: 0;
              top: 0;
            ">
                <div class=""
                    style="font-family: &#39;Archivo Black&#39;, &#39;Helvetica Neue&#39;, sans-serif; font-size: 270px; font-weight: bold; -webkit-text-stroke: 3px #1E64A538; margin: 0px auto; text-align: center; text-transform: uppercase; color: #fff; -webkit-text-fill-color: transparent; display: none; align-items: center; justify-content: center;">
                    #
                </div>
            </div>
            <div class=""
                style="
              display: flex;
              align-items: flex-start;
              flex-direction: column;
              justify-content: center;
            ">
                <span style="font-size: 40px; font-weight: normal">WE'RE A CREATIVE EVENT AGENCY</span>
                <div
                    style="
                font-size: 26px;
                font-weight: bold;
                text-transform: lowercase;
              ">
                    <span>INNOVATION </span><span
                        style="
                  -webkit-text-fill-color: transparent;
                  -webkit-text-stroke: 0px #f5f5f5;
                  background: linear-gradient(
                    90deg,
                    #bd3107,
                    #f1811b,
                    #1E64A5,
                    #bd3107
                  );
                  background-size: 1000px 100%;
                  -webkit-background-clip: text;
                ">CREATION
                    </span><span>RESPONSIBILITY </span><span
                        style="
                  -webkit-text-fill-color: transparent;
                  -webkit-text-stroke: 0px #f5f5f5;
                  background: linear-gradient(
                    90deg,
                    #bd3107,
                    #f1811b,
                    #1E64A5,
                    #bd3107
                  );
                  background-size: 1000px 100%;
                  -webkit-background-clip: text;
                ">TECHNOLOGY
                    </span><span>EXPERIENCED </span>
                </div>
                <div class="sub-title"
                    style="
                font-weight: bold;
                color: #fff;
                text-transform: lowercase;
                font-size: 14px;
              ">
                    <div class="center-content">
                        <div class="middle-content stroke-text"
                            style="
                    background: linear-gradient(
                      45deg,
                      #bd3107,
                      #bd3107 5%,
                      #1E64A5 12.5%,
                      #bd3107 25%,
                      #1E64A5 37.5%,
                      #bd3107 50%,
                      #1E64A5 62.5%,
                      #bd3107 75%,
                      #1E64A5 87.5%,
                      #bd3107 92%,
                      #bd3107
                    );
                    font-size: 70px;
                    background-size: 300% auto;
                    animation: shine 5s linear infinite;
                    -webkit-background-clip: text;
                    background-clip: text;
                    -webkit-text-fill-color: transparent;
                  ">
                            keep moving forward
                        </div>
                    </div>
                    <span
                        style="
                  font-size: 40px;
                  -webkit-text-fill-color: transparent;
                  -webkit-text-stroke: 0px #f5f5f5;
                  background: linear-gradient(
                    90deg,
                    #bd3107,
                    #f1811b,
                    #1E64A5,
                    #bd3107
                  );
                  background-size: 1000px 100%;
                  -webkit-background-clip: text;
                ">#together
                    </span>
                    <span style="font-size: 40px; /* font-weight: normal;">turning ideas into reality</span>
                    <div>
                        <span style="font-size: 25px">YOUR CREATIVE &amp; TECHNOLOGY TRANSFORMATION PARTNER
                            IS</span><span
                            style="
                    font-size: 25px;
                    -webkit-text-fill-color: transparent;
                    -webkit-text-stroke: 0px #f5f5f5;
                    background: linear-gradient(
                      90deg,
                      #bd3107,
                      #f1811b,
                      #1E64A5,
                      #bd3107
                    );
                    background-size: 1000px 100%;
                    -webkit-background-clip: text;
                  ">
                            HERE</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
