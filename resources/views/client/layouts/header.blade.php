 <nav class="layout-navbar shadow-none py-0 navbar-active ">
     <div class="">
         <div class="navbar navbar-expand-lg  landing-navbar rounded-none py-2 px-3 m-0" style="border-radius: 0;">
             <!-- Menu logo wrapper: Start -->
             <div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-4 me-xl-8">
                 <!-- Mobile menu toggle: Start-->
                 <button class="navbar-toggler border-0 px-0 me-4" type="button" data-bs-toggle="collapse"
                     data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                     aria-expanded="false" aria-label="Toggle navigation">
                     <i class="ti ti-menu-2 ti-lg align-middle text-heading fw-medium"></i>
                 </button>
                 <!-- Mobile menu toggle: End-->
                 <a href="{{ url('/') }}" class="app-brand-link">
                     <span class="app-brand-logo demo">
                         <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                 fill="#7367F0"></path>
                             <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                 d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616">
                             </path>
                             <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                 d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616">
                             </path>
                             <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                 fill="#7367F0"></path>
                         </svg>
                     </span>
                     <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">AnhSon</span>
                 </a>
             </div>
             <!-- Menu logo wrapper: End -->
             <!-- Menu wrapper: Start -->
             <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                 <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
                     type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <i class="ti ti-x ti-lg"></i>
                 </button>
                 <ul class="navbar-nav m-auto">
                     <li class="nav-item">
                         <a class="nav-link fw-medium {{ request()->is('/') ? 'active' : '' }}"
                             href="{{ url('/') }}">Trang chủ</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link fw-medium {{ request()->is('introduce') ? 'active' : '' }}"
                             href="{{ url('introduce') }}">Giới thiệu</a>
                     </li>
                     <li class="nav-item dropdown" id="hover-dropdown">
                         <a href="javascript:void(0);"
                             class="nav-link dropdown-toggle navbar-ex-14-mega-dropdown dropdown fw-medium"
                             aria-expanded="false" data-bs-toggle="dropdown" data-trigger="hover">
                             <span data-i18n="Pages">Dịch vụ</span>
                         </a>
                         <ul class="dropdown-menu" style="width: 200px">
                             <li><a class="dropdown-item waves-effect" href="#">PR-Marketing</a></li>
                             <li><a class="dropdown-item waves-effect" href="#">Event Management</a></li>
                             <li><a class="dropdown-item waves-effect" href="#">Decoration</a></li>
                         </ul>
                     </li>
                     <li class="nav-item dropdown" id="hover-dropdown">
                         <a href="javascript:void(0);"
                             class="nav-link dropdown-toggle navbar-ex-14-mega-dropdown dropdown fw-medium"
                             aria-expanded="false" data-bs-toggle="dropdown" data-trigger="hover">
                             <span data-i18n="Pages">Tin tức</span>
                         </a>
                         <ul class="dropdown-menu" style="width: 200px">
                             <li><a class="dropdown-item waves-effect" href="javascript:void(0);">Action</a></li>
                             <li><a class="dropdown-item waves-effect" href="javascript:void(0);">Another action</a>
                             </li>
                             <li><a class="dropdown-item waves-effect" href="javascript:void(0);">Something else
                                     here</a></li>
                             <li>
                                 <hr class="dropdown-divider">
                             </li>
                             <li><a class="dropdown-item waves-effect" href="javascript:void(0);">Separated link</a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link fw-medium" href="landing-page.html#landingFAQ">Tuyển dụng</a>
                     </li>
                 </ul>
             </div>
             <!-- Menu wrapper: End -->
             <!-- Toolbar: Start -->
             <ul class="navbar-nav flex-row align-items-center ms-auto">
                 <!-- navbar button: Start -->
                 <li>
                     <a href="#"
                         class="btn btn-primary waves-effect waves-light btn-header animate__animated animate__fadeIn animate__faster" style="transition: all 0.3s ease-in-out; transform-origin: center center;">
                         <i class="ti ti-mail-share"></i>
                         <span class="d-none d-md-block" style="margin-left: 5px">Yêu cầu tư vấn</span>
                     </a>
                 </li>
                 <!-- navbar button: End -->
             </ul>
             <!-- Toolbar: End -->
         </div>
     </div>
 </nav>
