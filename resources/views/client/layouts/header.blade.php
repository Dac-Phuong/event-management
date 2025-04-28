<header class="header">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-6 col-lg-2">
                <div class="logo">
                    @include('client.components.logo')
                </div>
            </div>
            <!-- Mobile menu toggle -->
            <div class="col-6 d-lg-none text-end">
                <div class="mobile-menu-toggle">
                    <i class="fas fa-bars" style="color: #1E64A5; font-size: 24px;"></i>
                </div>
            </div>
            <!-- Desktop Navigation -->
            <div class="col-lg-8 desktop-menu">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/gioi-thieu') }}">Giới thiệu</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Dịch vụ
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach ($services as $service)
                                            <li class="m-0"><a class="dropdown-item"
                                                    href="{{ url('dich-vu/' . $service->slug) }}">{{ $service->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Dự án
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach ($projects as $project)
                                            <li class="m-0"><a class="dropdown-item"
                                                    href="{{ url('du-an', $project->slug) }}">{{ $project->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank" href="{{ url('profile') }}">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('tuyen-dung') }}">Tuyển dụng</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Search and Language -->
            <div class="col-lg-2 d-none d-lg-flex justify-content-end align-items-center">
                <a href="#" class="search-icon" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <i class="fas fa-search"></i>
                </a>
                <div class="language-selector">
                    <span class="active">VI</span> | <span>EN</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu">
    <div class="mobile-menu-header">
        <div class="mobile-logo">
            @include('client.components.logo')
        </div>
        <div class="mobile-close">
            <i class="fas fa-times"></i>
        </div>
    </div>
    <div class="mobile-menu-content">
        <div class="mobile-menu-footer">
            <div class="mobile-language">
                <span class="active">VI</span> | <span>EN</span>
            </div>
            <div class="mobile-search">
                <input class="mobile-search-input" type="text" placeholder="Tìm kiếm...">
                <button><i class="fas fa-search"></i></button>
            </div>
        </div>
        <ul class="mobile-nav">
            <li class="mobile-nav-item">
                <a href="{{ url('/gioi-thieu') }}" class="mobile-nav-link">Giới thiệu</a>
            </li>
            <li class="mobile-nav-item">
                <a href="#" class="mobile-nav-link">Dịch vụ</a>
                <span class="mobile-dropdown-toggle"><i class="fas fa-chevron-down"></i></span>
                <ul class="mobile-dropdown-menu">
                    @foreach ($services as $service)
                        <li><a class="mobile-dropdown-item"
                                href="{{ url('dich-vu/' . $service->slug) }}">{{ $service->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="mobile-nav-item">
                <a href="#" class="mobile-nav-link">Dự án</a>
                <span class="mobile-dropdown-toggle"><i class="fas fa-chevron-down"></i></span>
                <ul class="mobile-dropdown-menu">
                    @foreach ($projects as $project)
                        <li><a class="mobile-dropdown-item"
                                href="{{ url('du-an/' . $project->slug) }}">{{ $project->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="mobile-nav-item">
                <a href="{{ url('/profile') }}" class="mobile-nav-link">Profile</a>
            </li>
            <li class="mobile-nav-item">
                <a href="{{ url('/blog') }}" class="mobile-nav-link">Blog</a>
            </li>
            <li class="mobile-nav-item">
                <a href="{{ url('/tuyen-dung') }}" class="mobile-nav-link">Tuyển dụng</a>
            </li>
        </ul>
    </div>

</div>

<!-- Overlay -->
<div class="overlay"></div>

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title mb-2" id="searchModalLabel">Nhập từ khóa tìm kiếm</h3>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="search-input-group">
                    <div class="input-group">
                        <input type="text" class="form-control search-input" placeholder="Tìm kiếm..."
                            aria-label="Search" aria-describedby="button-addon2"
                            style="border: 1px solid var(--primary-color)">
                        <button class="btn btn-primary" type="button" id="button-addon2"
                            style="height: 46px;width: 75px;">
                            <i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="search-result-container">
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#button-addon2').click(function() {
                var query = $('.search-input').val().trim();
                console.log(query,'oks');
                
                var resultsContainer = $(".search-result-container");
                resultsContainer.empty().show().append(`
                    <li class="list-group-item result-item d-flex justify-content-center">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </li>
                `);
                $.ajax({
                    url: "{{ route('news.search') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        keyword: query
                    },
                    success: function(response) {
                        resultsContainer.empty();
                        if (response.data.length > 0) {
                            $.each(response.data, function(key, value) {
                                resultsContainer.append(`
                                <a href="blog/${value.category.slug}/${value.slug}" class="search-result-item">
                                    <div class="search-result-thumb">
                                    <img src="${value.thumbnail}" alt="${value.title}">
                                    </div>
                                    <div class="search-result-content">
                                    <h3 class="search-result-title">${value.title}</h3>
                                    <div class="search-result-meta">
                                        <i class="far fa-calendar-alt"></i>
                                        <span>${formatDate(value.created_at)}</span>
                                    </div>
                                    </div>
                                </a>
                                `);
                            });
                        } else {
                            resultsContainer.append(
                                '<p class="text-center">Không có kết quả tìm kiếm</p>');
                        }
                    }
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                        resultsContainer.empty().append(
                            '<p class="text-center">Có lỗi xảy ra. Vui lòng thử lại sau.</p>'
                            );
                    }
                });
            });
        });

        function formatDate(dateString) {
            var date = new Date(dateString);
            var day = ("0" + date.getDate()).slice(-2);
            var month = ("0" + (date.getMonth() + 1)).slice(-2);
            var year = date.getFullYear();
            return day + "/" + month + "/" + year;
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.mobile-search-input').click(function(event) {
                event.stopPropagation();
                $('.mobile-menu').removeClass('active');
                $('.overlay').removeClass('active');
                $('body').css('overflow', '');
                $('#searchModal').modal('show');
            });
            // Mobile menu toggle
            $('.mobile-menu-toggle').click(function() {
                $('.mobile-menu').addClass('active');
                $('.overlay').addClass('active');
                $('body').css('overflow', 'hidden');
            });

            // Close mobile menu
            $('.mobile-close, .overlay').click(function() {
                $('.mobile-menu').removeClass('active');
                $('.overlay').removeClass('active');
                $('body').css('overflow', '');
            });

            // Mobile dropdown toggle
            $('.mobile-dropdown-toggle').click(function() {
                $(this).toggleClass('active');
                $(this).next('.mobile-dropdown-menu').slideToggle(300);
            });

            // Language selector
            $('.language-selector span, .mobile-language span').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            });

            // Handle window resize
            $(window).resize(function() {
                if ($(window).width() > 991) {
                    $('.mobile-menu').removeClass('active');
                    $('.overlay').removeClass('active');
                    $('body').css('overflow', '');
                }
            });

            // Add smooth animation to mobile menu items
            $('.mobile-nav-item').each(function(index) {
                $(this).css({
                    'animation-delay': (index * 0.1) + 's'
                });
            });

            // Add active class to current page
            var currentLocation = window.location.href;
            $('.nav-link, .mobile-nav-link').each(function() {
                if ($(this).attr('href') === currentLocation) {
                    $(this).addClass('active');
                }
            });

            // Header scroll effect
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('.header').addClass('scrolled');
                } else {
                    $('.header').removeClass('scrolled');
                }
            });
        });
    </script>
@endpush
