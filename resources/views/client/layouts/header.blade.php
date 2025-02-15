 @php
     $services = \App\Models\Service::where('status', 1)->get();
     $news = \App\Models\NewsCategory::where('status', 1)->get();
     $projects = \App\Models\ProjectCategory::where('status', 1)->get();
     $config = \App\Models\Configs::where('key', 'base_logo')->first();
 @endphp
 <nav class="navbar navbar-expand-lg fixed-top navbar-active">
     <div class="container">
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
             <span class="navbar-toggler-icon"></span>
         </button>
         <a href="{{ url('/') }}" class="app-brand-link">
             <span class="app-brand-logo demo" style="height: 60px; width: 100px">
                 <img width="100%" height="100%" style="object-fit: contain"
                     src="https://anhsongroup.com/images/logo_anh_son.png" alt="">
             </span>
         </a>
         <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
             <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                 <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
                     type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <i class="ti ti-x ti-lg"></i>
                 </button>
                 <ul class="navbar-nav" style="margin-left: auto">
                     <li class="nav-item">
                         <a class="nav-link fw-medium fs-5 {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                             href="{{ url('/') }}">Trang chủ</a>
                     </li>
                     <li class="nav-item {{ request()->is('introduce') ? 'active' : '' }}">
                         <a class="nav-link fw-medium fs-5" href="{{ url('introduce') }}">Giới thiệu</a>
                     </li>
                     <li class="nav-item dropdown {{ request()->is('service/*') ? 'active' : '' }}" id="hover-dropdown">
                         <a href="javascript:void(0);"
                             class="nav-link dropdown-toggle navbar-ex-14-mega-dropdown dropdown fw-medium fs-5"
                             aria-expanded="false" data-bs-toggle="dropdown" data-trigger="hover">
                             <span data-i18n="Pages">Dịch vụ</span>
                         </a>
                         <ul class="dropdown-menu" style="width: 200px">
                             @if (count($services) > 0)
                                 @foreach ($services as $service)
                                     <li>
                                         <a class="dropdown-item waves-effect"
                                             href="{{ url('service', $service->slug) }}">{{ $service->name }}</a>
                                     </li>
                                 @endforeach
                             @else
                                 <li><a class="dropdown-item waves-effect" href="#">Chưa có dịch vụ</a></li>
                             @endif

                         </ul>
                     </li>
                     <li class="nav-item dropdown {{ request()->is('project/*') ? 'active' : '' }}" id="hover-dropdown">
                         <a href="javascript:void(0);"
                             class="nav-link dropdown-toggle navbar-ex-14-mega-dropdown dropdown fw-medium fs-5"
                             aria-expanded="false" data-bs-toggle="dropdown" data-trigger="hover">
                             <span data-i18n="Pages">Dự án</span>
                         </a>
                         <ul class="dropdown-menu" style="width: 200px">
                             @if (count($projects) > 0)
                                 @foreach ($projects as $project)
                                     <li><a class="dropdown-item waves-effect"
                                             href="{{ url('project', $project->slug) }}">{{ $project->name }}</a>
                                     </li>
                                 @endforeach
                             @else
                                 <li><a class="dropdown-item waves-effect" href="#">Chưa có dự án</a></li>
                             @endif
                         </ul>
                     </li>
                     <li class="nav-item dropdown {{ request()->is('news/*') ? 'active' : '' }}" id="hover-dropdown">
                         <a href="javascript:void(0);"
                             class="nav-link dropdown-toggle navbar-ex-14-mega-dropdown dropdown fw-medium fs-5"
                             aria-expanded="false" data-bs-toggle="dropdown" data-trigger="hover">
                             <span data-i18n="Pages">Blog</span>
                         </a>
                         <ul class="dropdown-menu" style="width: 200px">
                             @if (count($news) > 0)
                                 @foreach ($news as $new)
                                     <li><a class="dropdown-item waves-effect"
                                             href="{{ url('news', $new->slug) }}">{{ $new->name }}</a></li>
                                 @endforeach
                             @else
                                 <li><a class="dropdown-item waves-effect" href="#">Chưa có tin tức</a></li>
                             @endif
                         </ul>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link fw-medium fs-5 {{ request()->is('recruitment') ? 'active' : '' }}"
                             href="{{ url('recruitment') }}">Tuyển dụng</a>
                     </li>
                 </ul>
             </div>
         </div>
         <ul class="navbar-nav flex-row align-items-center ms-auto">
             <!-- Style Switcher -->
             <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-1">
                 <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                     <i class="ti ti-lg ti-sun"></i>
                 </a>
                 <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                     <li>
                         <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                             <span class="align-middle"><i class="ti ti-sun me-3"></i>Sáng</span>
                         </a>
                     </li>
                     <li>
                         <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                             <span class="align-middle"><i class="ti ti-moon-stars me-3"></i>Tối</span>
                         </a>
                     </li>
                     <li>
                         <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                             <span class="align-middle"><i class="ti ti-device-desktop-analytics me-3"></i>Hệ
                                 thống</span>
                         </a>
                     </li>
                 </ul>
             </li>
             <li>
                 <a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light scrollToContact">
                     <i class="ti ti-mail-share"></i>
                     <span class="d-none d-md-block" style="margin-left: 5px">Yêu cầu tư vấn</span>
                 </a>
             </li>
         </ul>
     </div>
 </nav>

 @push('scripts')
     <script>
         $(window).scroll(function() {
             const navbar = $('.navbar');
             const navbarLink = $('.nav-link');
             if ($(this).scrollTop() > 100) {
                 navbar.addClass('scrolled');
                 navbarLink.addClass('color')
             } else {
                 navbar.removeClass('scrolled');
                 navbarLink.removeClass('color');
             }
         });
     </script>
 @endpush
