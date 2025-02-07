@extends('client.layouts.master')
@section('content')
    <div data-bs-spy="scroll" class="scrollspy-example">
        <!-- Hero: Start -->
        @include('client.components.banner')
        <!-- Hero: End -->
        <!-- Useful features: Start -->
        <section id="landingFeatures" class="section-py landing-features">
            <div class="container">
                <div class="text-center mb-4">
                    <span class="badge bg-label-primary">Useful Features</span>
                </div>
                <h4 class="text-center mb-1">
                    <span class="position-relative fw-extrabold z-1">Everything you need
                        <img src="../../assets/img/front-pages/icons/section-title-icon.png" alt="laptop charging"
                            class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
                    </span>
                    to start your next project
                </h4>
                <p class="text-center mb-12">Not just a set of tools, the package includes ready-to-deploy
                    conceptual application.</p>
                <div class="features-icon-wrapper row gx-0 gy-6 g-sm-12">
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box " data-aos="fade-down">
                        <div class="text-center mb-4">
                            <img src="../../assets/img/front-pages/icons/laptop.png" alt="laptop charging">
                        </div>
                        <h5 class="mb-2">Quality Code</h5>
                        <p class="features-icon-description">Code structure that all developers will easily
                            understand and fall in love with.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box" data-aos="fade-right">
                        <div class="text-center mb-4">
                            <img src="../../assets/img/front-pages/icons/rocket.png" alt="transition up">
                        </div>
                        <h5 class="mb-2">Continuous Updates</h5>
                        <p class="features-icon-description">Free updates for the next 12 months, including new
                            demos and features.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box" data-aos="fade-down">
                        <div class="text-center mb-4">
                            <img src="../../assets/img/front-pages/icons/paper.png" alt="edit">
                        </div>
                        <h5 class="mb-2">Stater-Kit</h5>
                        <p class="features-icon-description">Start your project quickly without having to remove
                            unnecessary features.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-4">
                            <img src="../../assets/img/front-pages/icons/check.png" alt="3d select solid">
                        </div>
                        <h5 class="mb-2">API Ready</h5>
                        <p class="features-icon-description">Just change the endpoint and see your own data loaded
                            within seconds.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-4">
                            <img src="../../assets/img/front-pages/icons/user.png" alt="lifebelt">
                        </div>
                        <h5 class="mb-2">Excellent Support</h5>
                        <p class="features-icon-description">An easy-to-follow doc with lots of references and code
                            examples.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-4">
                            <img src="../../assets/img/front-pages/icons/keyboard.png" alt="google docs">
                        </div>
                        <h5 class="mb-2">Well Documented</h5>
                        <p class="features-icon-description">An easy-to-follow doc with lots of references and code
                            examples.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Useful features: End -->

        <!-- Real customers reviews: Start -->
        <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">
            <!-- What people say slider: Start -->
            <div class="container">
                <div class="row align-items-center gx-0 gy-4 g-lg-5 pb-md-5">
                    <div class="col-md-6 col-lg-5 col-xl-3">
                        <div class="mb-4">
                            <span class="badge bg-label-primary ">Đánh giá của khách hàng thực tế</span>
                        </div>
                        <h4 class="mb-1">
                            <span class="position-relative fw-extrabold z-1">Mọi người nói gì
                                <img src="../../assets/img/front-pages/icons/section-title-icon.png" alt="laptop charging"
                                    class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
                            </span>
                        </h4>
                        <p class="mb-5 mb-md-12">
                            Xem những gì khách hàng của chúng tôi phải<br class="d-none d-xl-block">
                            nói về kinh nghiệm của họ.
                        </p>
                        <div class="landing-reviews-btns">
                            <button id="reviews-previous-btn"
                                class="btn btn-label-primary reviews-btn me-4 scaleX-n1-rtl waves-effect" type="button">
                                <i class="ti ti-chevron-left ti-md"></i>
                            </button>
                            <button id="reviews-next-btn"
                                class="btn btn-label-primary reviews-btn scaleX-n1-rtl waves-effect" type="button">
                                <i class="ti ti-chevron-right ti-md"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7 col-xl-9">
                        <div class="swiper-reviews-carousel overflow-hidden">
                            <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden"
                                id="swiper-reviews">
                                <div class="swiper-wrapper" id="swiper-wrapper-30303de297100296" aria-live="off"
                                    style="cursor: grab; transition-duration: 0ms; transform: translate3d(-542.667px, 0px, 0px); transition-delay: 0ms;">
                                    <div class="swiper-slide" role="group" aria-label="6 / 6" data-swiper-slide-index="5"
                                        style="width: 271.333px;">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-4">
                                                    <img src="../../assets/img/front-pages/branding/logo-6.png"
                                                        alt="client logo" class="client-logo img-fluid">
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam
                                                    nemo mollitia, ad eum
                                                    officia numquam nostrum repellendus consequuntur!
                                                </p>
                                                <div class="text-warning mb-4">
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-3 avatar-sm">
                                                        <img src="../../assets/img/avatars/1.png" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Sara Smith</h6>
                                                        <p class="small text-muted mb-0">Founder of Continental</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slide-prev" role="group" aria-label="1 / 6"
                                        data-swiper-slide-index="0" style="width: 271.333px;">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-4">
                                                    <img src="../../assets/img/front-pages/branding/logo-1.png"
                                                        alt="client logo" class="client-logo img-fluid">
                                                </div>
                                                <p>
                                                    “Vuexy is hands down the most useful front end Bootstrap theme
                                                    I've ever used. I can't wait
                                                    to use it again for my next project.”
                                                </p>
                                                <div class="text-warning mb-4">
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-3 avatar-sm">
                                                        <img src="../../assets/img/avatars/1.png" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Cecilia Payne</h6>
                                                        <p class="small text-muted mb-0">CEO of Airbnb</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slide-active" role="group" aria-label="2 / 6"
                                        data-swiper-slide-index="1" style="width: 271.333px;">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-4">
                                                    <img src="../../assets/img/front-pages/branding/logo-2.png"
                                                        alt="client logo" class="client-logo img-fluid">
                                                </div>
                                                <p>
                                                    “I've never used a theme as versatile and flexible as Vuexy.
                                                    It's my go to for building
                                                    dashboard sites on almost any project.”
                                                </p>
                                                <div class="text-warning mb-4">
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-3 avatar-sm">
                                                        <img src="../../assets/img/avatars/2.png" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Eugenia Moore</h6>
                                                        <p class="small text-muted mb-0">Founder of Hubspot</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slide-next" role="group" aria-label="3 / 6"
                                        data-swiper-slide-index="2" style="width: 271.333px;">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-4">
                                                    <img src="../../assets/img/front-pages/branding/logo-3.png"
                                                        alt="client logo" class="client-logo img-fluid">
                                                </div>
                                                <p>
                                                    This template is really clean &amp; well documented. The docs
                                                    are really easy to understand and
                                                    it's always easy to find a screenshot from their website.
                                                </p>
                                                <div class="text-warning mb-4">
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-3 avatar-sm">
                                                        <img src="../../assets/img/avatars/3.png" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Curtis Fletcher</h6>
                                                        <p class="small text-muted mb-0">Design Lead at Dribbble
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" role="group" aria-label="4 / 6"
                                        data-swiper-slide-index="3" style="width: 271.333px;">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-4">
                                                    <img src="../../assets/img/front-pages/branding/logo-4.png"
                                                        alt="client logo" class="client-logo img-fluid">
                                                </div>
                                                <p>
                                                    All the requirements for developers have been taken into
                                                    consideration, so I’m able to build
                                                    any interface I want.
                                                </p>
                                                <div class="text-warning mb-4">
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-3 avatar-sm">
                                                        <img src="../../assets/img/avatars/4.png" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Sara Smith</h6>
                                                        <p class="small text-muted mb-0">Founder of Continental</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" role="group" aria-label="5 / 6"
                                        data-swiper-slide-index="4" style="width: 271.333px;">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-4">
                                                    <img src="../../assets/img/front-pages/branding/logo-5.png"
                                                        alt="client logo" class="client-logo img-fluid">
                                                </div>
                                                <p>
                                                    “I've never used a theme as versatile and flexible as Vuexy.
                                                    It's my go to for building
                                                    dashboard sites on almost any project.”
                                                </p>
                                                <div class="text-warning mb-4">
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                    <i class="ti ti-star-filled"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-3 avatar-sm">
                                                        <img src="../../assets/img/avatars/5.png" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Eugenia Moore</h6>
                                                        <p class="small text-muted mb-0">Founder of Hubspot</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                                    aria-controls="swiper-wrapper-30303de297100296"></div>
                                <div class="swiper-button-prev" tabindex="0" role="button"
                                    aria-label="Previous slide" aria-controls="swiper-wrapper-30303de297100296">
                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- What people say slider: End -->
        </section>
        <!-- Real customers reviews: End -->
        <!-- Our great team: Start -->
        <section id="landingTeam" class="section-py landing-team">
            <div class="container">
                <div class="text-center mb-4">
                    <span class="badge bg-label-primary">Đội ngũ tuyệt vời của chúng tôi</span>
                </div>
                <h4 class="text-center mb-1">
                    <span class="position-relative fw-extrabold z-1">Supported
                        <img src="../../assets/img/front-pages/icons/section-title-icon.png" alt="laptop charging"
                            class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
                    </span>
                    by Real People
                </h4>
                <p class="text-center mb-md-11 pb-0 pb-xl-12">Who is behind these great-looking interfaces?</p>
                <div class="row gy-12 mt-5">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card mt-3 mt-lg-0 shadow-none">
                            <div
                                class="bg-label-primary border border-bottom-0 border-label-primary position-relative team-image-box">
                                <img src="../../assets/img/front-pages/landing-page/team-member-1.png"
                                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl"
                                    alt="human image">
                            </div>
                            <div class="card-body border border-top-0 border-label-primary text-center">
                                <h5 class="card-title mb-0">Sophie Gilbert</h5>
                                <p class="text-muted mb-0">Project Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card mt-3 mt-lg-0 shadow-none">
                            <div
                                class="bg-label-info border border-bottom-0 border-label-info position-relative team-image-box">
                                <img src="../../assets/img/front-pages/landing-page/team-member-2.png"
                                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl"
                                    alt="human image">
                            </div>
                            <div class="card-body border border-top-0 border-label-info text-center">
                                <h5 class="card-title mb-0">Paul Miles</h5>
                                <p class="text-muted mb-0">UI Designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card mt-3 mt-lg-0 shadow-none">
                            <div
                                class="bg-label-danger border border-bottom-0 border-label-danger position-relative team-image-box">
                                <img src="../../assets/img/front-pages/landing-page/team-member-3.png"
                                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl"
                                    alt="human image">
                            </div>
                            <div class="card-body border border-top-0 border-label-danger text-center">
                                <h5 class="card-title mb-0">Nannie Ford</h5>
                                <p class="text-muted mb-0">Development Lead</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card mt-3 mt-lg-0 shadow-none">
                            <div
                                class="bg-label-success border border-bottom-0 border-label-success position-relative team-image-box">
                                <img src="../../assets/img/front-pages/landing-page/team-member-4.png"
                                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl"
                                    alt="human image">
                            </div>
                            <div class="card-body border border-top-0 border-label-success text-center">
                                <h5 class="card-title mb-0">Chris Watkins</h5>
                                <p class="text-muted mb-0">Marketing Manager</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Our great team: End -->

        <!-- FAQ: Start -->
        <section id="landingFAQ" class="section-py bg-body landing-faq">
            <div class="container">
                <div class="text-center mb-4">
                    <span class="badge bg-label-primary">FAQ</span>
                </div>
                <h4 class="text-center mb-1">Những câu hỏi thường gặp
                    <span class="position-relative fw-extrabold z-1">
                        <img src="../../assets/img/front-pages/icons/section-title-icon.png" alt="laptop charging"
                            class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
                    </span>
                </h4>
                <p class="text-center mb-12 pb-md-4">Duyệt qua các Câu hỏi thường gặp này để tìm câu trả lời cho
                    những câu hỏi thường gặp..</p>
                <div class="row gy-12 align-items-center">
                    <div class="col-lg-5">
                        <div class="text-center">
                            <img src="../../assets/img/front-pages/landing-page/faq-boy-with-logos.png"
                                alt="faq boy with logos" class="faq-image">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="accordion" id="accordionExample">
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionOne" aria-expanded="false"
                                        aria-controls="accordionOne">
                                        Do you charge for each upgrade?
                                    </button>
                                </h2>

                                <div id="accordionOne" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping.
                                        Sesame snaps icing
                                        marzipan gummi bears macaroon dragée danish caramels powder. Bear claw
                                        dragée pastry topping
                                        soufflé. Wafer gummi bears marshmallow pastry pie.
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionTwo" aria-expanded="false"
                                        aria-controls="accordionTwo">
                                        Do I need to purchase a license for each website?
                                    </button>
                                </h2>
                                <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear
                                        claw dragée oat cake
                                        dragée ice cream halvah tootsie roll. Danish cake oat cake pie macaroon tart
                                        donut gummies. Jelly
                                        beans candy canes carrot cake. Fruitcake chocolate chupa chups.
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionThree" aria-expanded="false"
                                        aria-controls="accordionThree">
                                        What is regular license?
                                    </button>
                                </h2>
                                <div id="accordionThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        Regular license can be used for end products that do not charge users for
                                        access or service(access
                                        is free and there will be no monthly subscription fee). Single regular
                                        license can be used for
                                        single end product and end product can be used by you or your client. If you
                                        want to sell end
                                        product to multiple clients then you will need to purchase separate license
                                        for each client. The
                                        same rule applies if you want to use the same end product on multiple
                                        domains(unique setup). For
                                        more info on regular license you can check official description.
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionFour" aria-expanded="false"
                                        aria-controls="accordionFour">
                                        What is extended license?
                                    </button>
                                </h2>
                                <div id="accordionFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis et aliquid
                                        quaerat possimus maxime!
                                        Mollitia reprehenderit neque repellat deleniti delectus architecto dolorum
                                        maxime, blanditiis
                                        earum ea, incidunt quam possimus cumque.
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionFive" aria-expanded="false"
                                        aria-controls="accordionFive">
                                        Which license is applicable for SASS application?
                                    </button>
                                </h2>
                                <div id="accordionFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi molestias
                                        exercitationem ab cum
                                        nemo facere voluptates veritatis quia, eveniet veniam at et repudiandae
                                        mollitia ipsam quasi
                                        labore enim architecto non!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FAQ: End -->
        <!-- Contact Us: Start -->
        @include('client.components.contact')
        <!-- Contact Us: End -->
    </div>
@endsection
