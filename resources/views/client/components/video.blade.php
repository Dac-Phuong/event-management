<style>
    .hero-banner {
        position: relative;
        height: 100vh;
        min-height: 600px;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .hero-title span {
        color: var(--primary-color);
    }

    .hero-subtitle {
        font-size: 1.2rem;
        margin-bottom: 30px;
        color: var(--text-muted);
        max-width: 600px;
    }

    .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 70% 50%, rgba(221, 99, 37, 0.1) 0%, rgba(17, 17, 17, 1) 70%);
        z-index: 1;
    }

    .hero-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .particle {
        position: absolute;
        background-color: var(--primary-color);
        border-radius: 50%;
        opacity: 0.6;
    }

    .media-highlight {
        display: inline-block;
        padding: 8px 15px;
        background-color: rgba(221, 99, 37, 0.2);
        color: var(--primary-color);
        border-radius: 30px;
        font-weight: 600;
        margin-bottom: 20px;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    .social-icons {
        margin-top: 30px;
    }

    .social-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        margin-right: 10px;
        color: var(--text-light);
        transition: all 0.3s ease;
    }

    .social-icon:hover {
        background-color: var(--primary-color);
        transform: translateY(-3px);
        color: white;
    }

    /* Floating Elements */
    .floating-element {
        position: absolute;
        opacity: 0.1;
        z-index: 0;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .hero-title {
            font-size: 2.8rem;
        }
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.2rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }
    }
</style>
<section class="hero-banner">
    <div class="hero-bg"></div>
    <div class="hero-particles" id="particles">
        <div class="particle"
            style="width: 2.07693px; height: 2.07693px; left: 15.2762%; top: 85.1647%; opacity: 0.537463; transform: translateX(5.76556px) translateY(-21.1404px);">
        </div>
        <div class="particle"
            style="width: 6.44681px; height: 6.44681px; left: 57.9928%; top: 28.6136%; opacity: 0.412261; transform: translateX(0px) translateY(0px);">
        </div>
        <div class="particle"
            style="width: 6.1603px; height: 6.1603px; left: 81.866%; top: 87.1235%; opacity: 0.27862; transform: translateX(0px) translateY(0px);">
        </div>
        <div class="particle"
            style="width: 4.70957px; height: 4.70957px; left: 38.793%; top: 64.6501%; opacity: 0.357489; transform: translateX(-16.1018px) translateY(-10.9262px);">
        </div>
        <div class="particle"
            style="width: 4.91664px; height: 4.91664px; left: 19.62%; top: 27.9138%; opacity: 0.423463; transform: translateX(14.991px) translateY(-34.9791px);">
        </div>
        <div class="particle"
            style="width: 5.0008px; height: 5.0008px; left: 57.6542%; top: 84.8307%; opacity: 0.546308; transform: translateX(-31.9414px) translateY(34.9359px);">
        </div>
        <div class="particle"
            style="width: 6.89666px; height: 6.89666px; left: 53.3186%; top: 18.3252%; opacity: 0.385078; transform: translateX(0.10392px) translateY(0.023753px);">
        </div>
        <div class="particle"
            style="width: 6.93832px; height: 6.93832px; left: 8.65939%; top: 69.5343%; opacity: 0.47852; transform: translateX(1.53422px) translateY(-2.2161px);">
        </div>
        <div class="particle"
            style="width: 6.82404px; height: 6.82404px; left: 6.6835%; top: 16.4476%; opacity: 0.484952; transform: translateX(0px) translateY(0px);">
        </div>
        <div class="particle"
            style="width: 5.00119px; height: 5.00119px; left: 47.9413%; top: 51.7992%; opacity: 0.352449; transform: translateX(18.9398px) translateY(-16.9461px);">
        </div>
        <div class="particle"
            style="width: 6.0671px; height: 6.0671px; left: 29.7844%; top: 53.9809%; opacity: 0.486646; transform: translateX(-0.273065px) translateY(-11.1957px);">
        </div>
        <div class="particle"
            style="width: 4.17541px; height: 4.17541px; left: 59.6783%; top: 97.4037%; opacity: 0.453073; transform: translateX(-34.2451px) translateY(23.1386px);">
        </div>
        <div class="particle"
            style="width: 4.44838px; height: 4.44838px; left: 45.2584%; top: 34.853%; opacity: 0.531071; transform: translateX(0.849705px) translateY(-6.79764px);">
        </div>
        <div class="particle"
            style="width: 5.98276px; height: 5.98276px; left: 74.3659%; top: 88.3316%; opacity: 0.534439; transform: translateX(10.2292px) translateY(14.7421px);">
        </div>
        <div class="particle"
            style="width: 3.09566px; height: 3.09566px; left: 22.385%; top: 26.0997%; opacity: 0.260363; transform: translateX(-0.0196405px) translateY(0.235687px);">
        </div>
        <div class="particle"
            style="width: 2.37365px; height: 2.37365px; left: 33.8832%; top: 64.9598%; opacity: 0.494582; transform: translateX(0px) translateY(0px);">
        </div>
        <div class="particle"
            style="width: 5.2284px; height: 5.2284px; left: 1.73145%; top: 70.2347%; opacity: 0.425319; transform: translateX(-4.50539px) translateY(32.4388px);">
        </div>
        <div class="particle"
            style="width: 6.67341px; height: 6.67341px; left: 46.6318%; top: 64.4059%; opacity: 0.279325; transform: translateX(0px) translateY(19.5473px);">
        </div>
        <div class="particle"
            style="width: 2.71131px; height: 2.71131px; left: 29.0422%; top: 5.49133%; opacity: 0.475868; transform: translateX(2.05px) translateY(-0.623914px);">
        </div>
        <div class="particle"
            style="width: 5.09378px; height: 5.09378px; left: 88.7428%; top: 62.9263%; opacity: 0.485279; transform: translateX(3.94217px) translateY(-2.38919px);">
        </div>
        <div class="particle"
            style="width: 5.23765px; height: 5.23765px; left: 69.687%; top: 6.99725%; opacity: 0.431517; transform: translateX(2.8717px) translateY(13.497px);">
        </div>
        <div class="particle"
            style="width: 4.13188px; height: 4.13188px; left: 43.2997%; top: 15.6927%; opacity: 0.519834; transform: translateX(4.78963px) translateY(-4.50788px);">
        </div>
        <div class="particle"
            style="width: 4.99822px; height: 4.99822px; left: 9.71833%; top: 48.0723%; opacity: 0.412019; transform: translateX(-24.6457px) translateY(-25.3118px);">
        </div>
        <div class="particle"
            style="width: 6.09664px; height: 6.09664px; left: 52.7953%; top: 65.3847%; opacity: 0.357177; transform: translateX(0.389808px) translateY(-0.0721865px);">
        </div>
        <div class="particle"
            style="width: 6.99986px; height: 6.99986px; left: 30.609%; top: 95.2324%; opacity: 0.484564; transform: translateX(-5.65405px) translateY(-6.95883px);">
        </div>
        <div class="particle"
            style="width: 3.94875px; height: 3.94875px; left: 55.3963%; top: 6.72617%; opacity: 0.514734; transform: translateX(-17.5468px) translateY(-39.7111px);">
        </div>
        <div class="particle"
            style="width: 5.53809px; height: 5.53809px; left: 89.1795%; top: 98.2658%; opacity: 0.394048; transform: translateX(4.61593px) translateY(-4.50603px);">
        </div>
        <div class="particle"
            style="width: 6.79061px; height: 6.79061px; left: 4.15858%; top: 86.8523%; opacity: 0.3025; transform: translateX(27.9726px) translateY(-5.41406px);">
        </div>
        <div class="particle"
            style="width: 3.47412px; height: 3.47412px; left: 52.8645%; top: 73.0759%; opacity: 0.465422; transform: translateX(-25.9781px) translateY(-8.38002px);">
        </div>
        <div class="particle"
            style="width: 6.37939px; height: 6.37939px; left: 68.9608%; top: 55.6347%; opacity: 0.303376; transform: translateX(6.13671px) translateY(-35.0669px);">
        </div>
    </div>

    <!-- Floating elements -->
    <div class="floating-element"
        style="top: 20%; left: 10%; width: 100px; height: 100px; background-color: var(--primary-color); border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; transform: translateY(-49.8454px);"
        id="float1"></div>
    <div class="floating-element"
        style="top: 70%; left: 80%; width: 150px; height: 150px; background-color: var(--primary-color); border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; transform: translateX(-26.3036px) rotate(17.5357deg);"
        id="float2"></div>
    <div class="floating-element"
        style="top: 40%; left: 75%; width: 80px; height: 80px; background-color: var(--primary-color); border-radius: 50%; transform: scale(1.13339);"
        id="float3"></div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="hero-content">
                    <div class="media-highlight">
                        <i class="fas fa-play-circle me-2"></i> Media Production
                    </div>
                   <h1 class="hero-title">Tổ Chức Sự Kiện Chuyên Nghiệp Và Đẳng Cấp</h1>
                    <p class="hero-subtitle" style="transform: translateY(0px); opacity: 1;">
                        Anh Sơn Group tự hào là đơn vị tổ chức sự kiện hàng đầu với hơn 15 năm kinh nghiệm. Chúng tôi
                        cam kết mang đến những trải nghiệm đáng nhớ nhất cho mọi sự kiện từ hội nghị, triển lãm đến tiệc
                        cưới, gala dinner.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a target="_blank" href="{{ url('/profile') }}" class="cta-button">Hồ sơ năng
                            lực <i class="fas fa-arrow-right" style="margin-left: 10px"></i></a>
                        <a href="#" class="btn btn-outline-light btn-lg d-flex align-items-center">
                            <i class="fas fa-play-circle me-2"></i> Xem Video
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <!-- Placeholder for 3D media element -->
                <div class="position-relative"
                    style="height: 500px; transform: translateY(0px); opacity: 1; box-shadow: rgba(221, 99, 37, 0.353) 0px 0px 21.0953px;"
                    id="media-container">
                    <div class="position-absolute"
                        style="width: 100%; height: 100%; background: rgba(221, 99, 37, 0.1); border-radius: 20px; border: 2px dashed var(--primary-color); display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-photo-video"
                            style="font-size: 3rem; color: var(--primary-color); opacity: 0.5;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <script>
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Create particles
        function createParticles() {
            const container = document.getElementById('particles');
            const particleCount = 30;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');

                // Random properties
                const size = Math.random() * 5 + 2;
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                const delay = Math.random() * 5;
                const duration = Math.random() * 10 + 10;
                const opacity = Math.random() * 0.4 + 0.2;

                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.top = `${posY}%`;
                particle.style.opacity = opacity;

                container.appendChild(particle);

                // Animate particles
                anime({
                    targets: particle,
                    translateX: [0, anime.random(-50, 50)],
                    translateY: [0, anime.random(-50, 50)],
                    duration: duration * 1000,
                    delay: delay * 1000,
                    easing: 'easeInOutSine',
                    direction: 'alternate',
                    loop: true
                });
            }
        }

        // Animate floating elements
        function animateFloatingElements() {
            anime({
                targets: '#float1',
                translateY: [0, -50],
                duration: 8000,
                easing: 'easeInOutSine',
                direction: 'alternate',
                loop: true
            });

            anime({
                targets: '#float2',
                translateX: [0, -30],
                rotate: [0, 20],
                duration: 10000,
                easing: 'easeInOutSine',
                direction: 'alternate',
                loop: true
            });

            anime({
                targets: '#float3',
                scale: [1, 1.2],
                duration: 6000,
                easing: 'easeInOutSine',
                direction: 'alternate',
                loop: true
            });
        }

        // Media container animation
        function animateMediaContainer() {
            const mediaContainer = document.getElementById('media-container');

            anime({
                targets: mediaContainer,
                translateY: [50, 0],
                opacity: [0, 1],
                duration: 1500,
                easing: 'easeOutExpo'
            });

            // Create a shimmer effect
            setInterval(() => {
                anime({
                    targets: mediaContainer,
                    boxShadow: ['0 0 0 rgba(221, 99, 37, 0)', '0 0 30px rgba(221, 99, 37, 0.5)'],
                    duration: 2000,
                    easing: 'easeInOutSine',
                    direction: 'alternate'
                });
            }, 5000);
        }

        // Text animation
        function animateText() {
            const heroTitle = document.querySelector('.hero-title');
            const heroSubtitle = document.querySelector('.hero-subtitle');

            anime({
                targets: heroTitle,
                translateY: [30, 0],
                opacity: [1],
                duration: 1000,
                easing: 'easeOutExpo',
                delay: 300
            });

            anime({
                targets: heroSubtitle,
                translateY: [30, 0],
                opacity: [1],
                duration: 1000,
                easing: 'easeOutExpo',
                delay: 600
            });

            // Animate each word in the title
            const titleWords = heroTitle.innerHTML.split(' ');
            heroTitle.innerHTML = '';

            titleWords.forEach((word, i) => {
                const wordSpan = document.createElement('span');
                wordSpan.textContent = word + ' ';
                wordSpan.style.opacity = '0';
                heroTitle.appendChild(wordSpan);

                anime({
                    targets: wordSpan,
                    opacity: [1],
                    translateY: [20, 0],
                    duration: 800,
                    delay: 300 + (i * 100),
                    easing: 'easeOutExpo'
                });
            });
        }

        // Initialize all animations
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            animateFloatingElements();
            animateMediaContainer();
            animateText();

            // Button hover effects
            const buttons = document.querySelectorAll('.btn-primary-custom, .btn-outline-light');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    anime({
                        targets: this,
                        scale: 1.05,
                        duration: 300,
                        easing: 'easeOutExpo'
                    });
                });

                button.addEventListener('mouseleave', function() {
                    anime({
                        targets: this,
                        scale: 1,
                        duration: 300,
                        easing: 'easeOutExpo'
                    });
                });
            });

            // Nav link hover effects
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('mouseenter', function() {
                    anime({
                        targets: this,
                        color: '#DD6325',
                        duration: 300,
                        easing: 'easeOutExpo'
                    });
                });

                link.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        anime({
                            targets: this,
                            color: '#f8f9fa',
                            duration: 300,
                            easing: 'easeOutExpo'
                        });
                    }
                });
            });
        });
    </script>
@endpush
