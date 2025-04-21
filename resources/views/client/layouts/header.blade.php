 <style>
     .header {
         background-color: #000;
         padding: 15px 0;
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         z-index: 1000;
         transition: all 0.3s ease;
         box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
     }

     .nav-link.active {
         color: #FFF !important;
     }

     .header.scrolled {
         padding: 10px 0;
         background-color: rgba(0, 0, 0, 0.95);
         box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
     }

     .logo {
         display: flex;
         align-items: center;
     }

     .logo-text {
         color: #fff;
         font-weight: bold;
         margin-left: 5px;
         font-size: 18px;
     }

     .logo-icon {
         color: #DD6325;
         font-size: 24px;
         font-weight: bold;
     }

     .nav-item {
         position: relative;
     }

     .nav-item .nav-link {
         color: #DD6325;
         font-weight: 600;
         text-transform: uppercase;
         padding: 0 15px;
         font-size: 17px;
         position: relative;
         transition: color 0.3s ease;
     }

     /* Animated underline effect */
     .nav-item .nav-link::after {
         content: '';
         position: absolute;
         bottom: -5px;
         left: 50%;
         width: 0;
         height: 3px;
         background-color: #DD6325;
         transition: all 0.3s ease;
         transform: translateX(-50%);
         opacity: 0;
         border-top: 0px !important
     }

     .nav-item .nav-link:hover::after {
         width: 70%;
         opacity: 1;
     }

     .search-icon {
         color: #DD6325;
         font-size: 18px;
         margin-right: 15px;
     }

     .language-selector {
         color: #fff;
         font-size: 14px;
     }

     .language-selector span {
         cursor: pointer;
     }

     .language-selector .active {
         color: #DD6325;
     }

     .small-text {
         font-size: 10px;
         color: #777;
         display: block;
         text-align: center;
     }

     .dropdown-menu {
         background-color: #333;
         margin-top: 10px;
         min-width: 235px;
         border-radius: 8px;
         box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
         display: block;
         opacity: 0;
         visibility: hidden;
         transform: translateY(10px);
         transition: all 0.3s ease;
     }

     .dropdown:hover .dropdown-menu {
         opacity: 1;
         visibility: visible;
         transform: translateY(0);
     }

     .dropdown-item {
         color: #DD6325;
         padding: 10px 20px;
         font-size: 16px;
         font-weight: 400;
         transition: all 0.3s ease;
     }

     .dropdown-item:hover {
         background-color: #222;
         color: #fff;
     }

     /* Mobile menu styles */
     .navbar-toggler {
         border: none;
         background-color: #DD6325;
         padding: 5px 10px;
     }

     .navbar-toggler-icon {
         background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
     }

     /* Enhanced Mobile menu */
     .mobile-menu {
         position: fixed;
         top: 0;
         left: -300px;
         width: 300px;
         height: 100%;
         background-color: #111;
         z-index: 9999;
         overflow-y: auto;
         transition: all 0.4s ease-in-out;
         box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
     }

     .mobile-menu.active {
         left: 0;
     }

     .mobile-menu-header {
         padding: 20px;
         background-color: #000;
         display: flex;
         justify-content: space-between;
         align-items: center;
         border-bottom: 1px solid #333;
     }

     .mobile-logo {
         display: flex;
         align-items: center;
     }

     .mobile-logo-icon {
         color: #DD6325;
         font-size: 20px;
         font-weight: bold;
     }

     .mobile-logo-text {
         color: #fff;
         font-weight: bold;
         margin-left: 5px;
         font-size: 16px;
     }

     .mobile-close {
         color: #DD6325;
         font-size: 24px;
         cursor: pointer;
     }

     .mobile-menu-content {
         padding: 20px 0;
     }

     .mobile-nav-item {
         position: relative;
         border-bottom: 1px solid #222;
     }

     .mobile-nav-link {
         color: #DD6325;
         font-weight: bold;
         /* text-transform: uppercase; */
         padding: 15px 20px;
         display: block;
         font-size: 14px;
         position: relative;
         transition: all 0.3s ease;
     }

     .mobile-nav-link:hover {
         color: #fff;
         text-decoration: none;
     }

     .mobile-dropdown-toggle {
         position: absolute;
         right: 20px;
         top: 15px;
         color: #DD6325;
         cursor: pointer;
         transition: all 0.3s ease;
     }

     .mobile-dropdown-toggle.active {
         transform: rotate(180deg);
     }

     .mobile-dropdown-menu {
         background-color: #222;
         display: none;
         padding: 10px 0;
     }

     .mobile-dropdown-item {
         padding: 10px 30px;
         color: #DD6325;
         display: block;
         font-size: 13px;
         transition: all 0.3s ease;
     }

     .mobile-dropdown-item:hover {
         color: #fff;
         text-decoration: none;
     }

     .mobile-menu-footer {
         padding: 0px 20px;
     }

     .mobile-language {
         display: flex;
         justify-content: center;
         margin-bottom: 15px;
     }

     .mobile-language span {
         color: #fff;
         padding: 0 10px;
         cursor: pointer;
     }

     .mobile-language span.active {
         color: #DD6325;
     }

     .mobile-search {
         position: relative;
         margin-top: 15px;
     }

     .mobile-search input {
         width: 100%;
         padding: 10px 15px;
         background-color: #222;
         border: none;
         color: #fff;
         border-radius: 4px;
     }

     .mobile-search button {
         position: absolute;
         right: 10px;
         top: 50%;
         transform: translateY(-50%);
         background: none;
         border: none;
         color: #DD6325;
     }

     .overlay {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0, 0, 0, 0.7);
         z-index: 9998;
         opacity: 0;
         visibility: hidden;
         transition: all 0.3s ease;
     }

     .search-result-item {
         display: flex;
         align-items: flex-start;
         padding: 12px 16px;
         background-color: var(--bg-light);
         border-bottom: 1px solid var(--border-color);
         text-decoration: none;
         transition: background 0.2s ease;
     }

     .search-result-item:hover {
         background-color: var(--hover-bg);
     }

     .search-result-thumb img {
         width: 60px;
         height: 60px;
         object-fit: cover;
         border-radius: 12px;
         border: 1px solid var(--border-color);
         box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
         margin-right: 12px;
     }

     .search-result-content {
         flex-grow: 1;
     }

     .search-result-title {
         font-size: 1.1rem;
         font-weight: 500;
         margin: 0 0 6px;
         color: var(--text-dark);
     }

     .search-result-meta {
         font-size: 0.9rem;
         color: var(--text-light);
         display: flex;
         align-items: center;
         gap: 6px;
     }

     .overlay.active {
         opacity: 1;
         visibility: visible;
     }

     /* Responsive adjustments */
     @media (max-width: 991.98px) {
         .desktop-menu {
             display: none;
         }

         body {
             padding-top: 70px;
         }
     }

     @media (min-width: 992px) {
         .mobile-menu-toggle {
             display: none;
         }
     }
 </style>
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
                     <i class="fas fa-bars" style="color: #DD6325; font-size: 24px;"></i>
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
             {{-- <div class="mobile-language">
                 <span class="active">VI</span> | <span>EN</span>
             </div> --}}
             <div class="mobile-search">
                 <input type="text" placeholder="Tìm kiếm...">
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
             <div class="modal-body">
                 <div class="search-input-group">
                     <h3 class="modal-title mb-2" id="searchModalLabel">Nhập từ khóa tìm kiếm</h3>
                     <div class="input-group">
                         <input type="text" class="form-control search-input" placeholder="Tìm kiếm..."
                             aria-label="Search" aria-describedby="button-addon2">
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
                 if ($(this).scrollTop() > 50) {
                     $('.header').addClass('scrolled');
                 } else {
                     $('.header').removeClass('scrolled');
                 }
             });
         });
     </script>
 @endpush
