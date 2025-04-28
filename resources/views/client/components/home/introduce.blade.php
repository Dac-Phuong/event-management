<style>
    /* Base styles */
    .ent-container {
        position: relative;
        overflow: hidden;
    }

    .ent-container::after {
        content: '';
        position: absolute;
        bottom: 50px;
        left: -70px;
        width: 800px;
        height: 800px;
        background-image: url('{{ asset('assets/files/img/trong-dong.png') }}');
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 50%;
        z-index: -1;
    }

    /* Header section */
    .icdx {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        padding: 10px;
        margin-bottom: 20px;
    }

    .icdx img {
        width: 100%;
        height: auto;
    }

    /* Content styles */
    .mtx {
        font-size: 17px;
        line-height: 1.8;
        color: #4a5568;
        margin-bottom: 30px;
        font-weight: 400;
    }

    /* Mission goals section */
    .mission-goal-new {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        padding: 0;
        list-style: none;
    }

    .mission-goal-new li {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 130px;
    }

    .imfx {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        margin: 0 auto;
        overflow: hidden;
        border: 5px solid white;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
    }

    .imfx:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }

    .imfx img {
        width: 100%;
        height: 100%;
    }

    .mission-goal-new .owl-item {
        width: auto !important;
    }

    .mission-goal-new li {
        width: 150px;
        margin: 0 5px;
    }

    .owl-carousel .owl-stage-outer {
        max-width: 800px;
    }

    .owl-stage {
        padding: 20px 0;
    }

    .mission-goal-new .owl-nav {
        position: absolute;
        top: 43%;
        width: 100%;
        transform: translateY(-50%);
        display: flex;
        justify-content: space-between;
        pointer-events: none;
    }

    .mission-goal-new .owl-nav button {
        background: #ffffff;
        border: 1px solid #ddd;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        font-size: 20px;
        color: #333;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: auto;
        /* cho phép click */
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .mission-goal-new .owl-nav button:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: #fff;
    }

    .mission-goal-new .owl-nav .owl-prev {
        margin-left: -20px;
    }

    .mission-goal-new .owl-nav .owl-next {
        margin-right: -20px;
    }

    .mission-goal-new .owl-nav {
        display: none;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .mission-goal-new {
            gap: 20px;
        }

        .mission-goal-new li {
            width: 120px;
        }

        .imfx {
            width: 120px;
            height: 120px;
            padding: 15px;
        }
    }

    @media (max-width: 768px) {
        .text-gradient {
            font-size: 28px;
        }

        .mtx {
            font-size: 16px;
        }

        .mission-goal-new {
            gap: 15px;
        }

        .mission-goal-new li {
            width: 100px;
        }

        .imfx {
            width: 100px;
            height: 100px;
            padding: 12px;
        }

        .ent-container::after {
            content: '';
            position: absolute;
            top: 40px;
            right: 0;
            left: auto;
            width: 800px;
            height: 800px;
            background-color: rgba(25, 5, 141, 0.05);
            border-radius: 50%;
            z-index: -1;
        }
    }

    @media (max-width: 576px) {
        .mission-goal-new {
            gap: 10px;
        }

        .mission-goal-new li {
            width: 80px;
        }

        .imfx {
            width: 80px;
            height: 80px;
            padding: 10px;
        }
    }
</style>

<section class="py-5 py-lg-5 ent-container position-relative" id="about" data-aos="fade-up" data-aos-duration="1000">
    <div class="container mb-5">
        <div class="px-0 px-lg-3">
            <div class="icdx" data-aos="fade-right" data-aos-duration="800">
                <img src="{{ asset('assets/files/icons/uXziFML.png') }}" class="lazyloading" data-was-processed="true">
            </div>
            <h2 class="text-gradient display-4 fw-bold mb-3" data-aos="fade-right" data-aos-duration="1000">
                GIỚI THIỆU VỀ CÔNG TY <br />
                CỔ PHẦN TẬP ĐOÀN ANH SƠN GROUP
            </h2>
            <div class="divider m-0" data-aos="fade-left" data-aos-duration="1200"></div>
            <div class="mtx mt-4" data-aos="fade-up" data-aos-duration="1400">
                <p style="color: var(--text-gray)">
                    {!! $introduce['introduce_content'] !!}
                </p>
            </div>

            <ul class="mission-goal-new owl-carousel" data-aos="fade-up" data-aos-duration="1600">
                <li data-aos="zoom-in" data-aos-duration="1800">
                    <div class="imfx">
                        <a href="{{ asset('assets/files/certification/1.jpg') }}" class="popup-image">
                            <img src="{{ asset('assets/files/certification/1.jpg') }}" alt="Gold Award 2020"
                                alt="Gold Award 2020" class="lazyloading" data-was-processed="true">
                        </a>
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2000">
                    <div class="imfx">
                        <a href="{{ asset('assets/files/certification/2.jpg') }}" class="popup-image">
                            <img src="{{ asset('assets/files/certification/2.jpg') }}" alt="Bronze Award"
                                class="lazyloading" data-was-processed="true">
                        </a>
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2200">
                    <div class="imfx">
                        <a href="{{ asset('assets/files/certification/3.jpg') }}" class="popup-image">
                            <img src="{{ asset('assets/files/certification/3.jpg') }}" alt="Gold Award"
                                class="lazyloading" data-was-processed="true">
                        </a>
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2400">
                    <div class="imfx">
                        <a href="{{ asset('assets/files/certification/4.jpg') }}" class="popup-image">
                            <img src="{{ asset('assets/files/certification/4.jpg') }}" alt="Silver Award 2020"
                                class="lazyloading" data-was-processed="true">
                        </a>
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2600">
                    <div class="imfx">
                        <a href="{{ asset('assets/files/certification/5.jpg') }}" class="popup-image">
                            <img src="{{ asset('assets/files/certification/5.jpg') }}" alt="Gold Award 2020"
                                class="lazyloading" data-was-processed="true">
                        </a>
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2600">
                    <div class="imfx">
                        <a href="{{ asset('assets/files/certification/6.jpg') }}" class="popup-image">
                            <img src="{{ asset('assets/files/certification/6.jpg') }}" alt="Gold Award 2020"
                                class="lazyloading" data-was-processed="true">
                        </a>
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2600">
                    <div class="imfx">
                        <a href="{{ asset('assets/files/certification/7.jpg') }}" class="popup-image">
                            <img src="{{ asset('assets/files/certification/7.jpg') }}" alt="Gold Award 2020"
                                class="lazyloading" data-was-processed="true">
                        </a>
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2600">
                    <div class="imfx">
                        <a href="{{ asset('assets/files/certification/8.jpg') }}" class="popup-image">
                            <img src="{{ asset('assets/files/certification/8.jpg') }}" alt="Gold Award 2020"
                                class="lazyloading" data-was-processed="true">
                        </a>
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2600">
                    <div class="imfx">
                        <a href="{{ asset('assets/files/certification/9.jpg') }}" class="popup-image">
                            <img src="{{ asset('assets/files/certification/9.jpg') }}" alt="Gold Award 2020"
                                class="lazyloading" data-was-processed="true">
                        </a>
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2600">
                    <div class="imfx">
                        <a href="{{ asset('assets/files/certification/10.jpg') }}" class="popup-image">
                            <img src="{{ asset('assets/files/certification/10.jpg') }}" alt="Gold Award 2020"
                                class="lazyloading" data-was-processed="true">
                        </a>
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2600">
                    <div class="imfx">
                        <a href="{{ asset('assets/files/certification/11.jpg') }}" class="popup-image">
                            <img src="{{ asset('assets/files/certification/11.jpg') }}" alt="Gold Award 2020"
                                class="lazyloading" data-was-processed="true">
                        </a>
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2600">
                    <div class="imfx">
                        <a href="{{ asset('assets/files/certification/12.jpg') }}" class="popup-image">
                            <img src="{{ asset('assets/files/certification/12.jpg') }}" alt="Gold Award 2020"
                                class="lazyloading" data-was-processed="true">
                        </a>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</section>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.mission-goal-new').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                dots: false,
                autoplay: true,
                autoWidth: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 5
                    }
                }
            });
            $('.mission-goal-new').magnificPopup({
                delegate: 'a.popup-image',
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
@endpush
