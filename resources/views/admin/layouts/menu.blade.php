    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="{{ url('/admin') }}" class="app-brand-link">
                <span class="app-brand-logo demo">
                    <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                            fill="#7367F0" />
                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                            fill="#7367F0" />
                    </svg>
                </span>
                <span class="app-brand-text demo menu-text fw-bold">Media Center</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
        </div>
        <div class="menu-inner-shadow"></div>
        {{-- <button class="btn btn-primary waves-effect waves-light mx-3">
                <i class="ti ti-home me-1 ti-xs"></i>Trang chủ</button> --}}

        <ul class="menu-inner py-1">
            <li class="menu-item {{ request()->routeIs('statistical') ? 'active' : '' }}">
                <a href="{{ url('admin') }}" class="menu-link">
                    <i class="menu-icon ti ti-layout-dashboard"></i>
                    <div>Thống kê</div>
                </a>
            </li>

            <li class="menu-item {{ request()->routeIs('settings') ? 'active' : '' }}">
                <a href="{{ url('admin/settings') }}" class="menu-link">
                    <i class="menu-icon ti ti-settings"></i>
                    <div>Cài đặt</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                <a href="{{ url('admin/contact') }}" class="menu-link">
                    <i class="menu-icon ti ti-mail"></i>
                    <div>Liên hệ</div>
                </a>
            </li>

            <li class="menu-item {{ request()->routeIs('service.*') ? 'active' : '' }}">
                <a href="{{ url('admin/service') }}" class="menu-link">
                    <i class="menu-icon ti ti-server-cog"></i>
                    <div>Dịch vụ</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('admin/users*') || request()->is('admin/users-category*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon ti ti-users"></i>
                    <div>Thành viên</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->is('admin/users-category') ? 'active' : '' }}">
                        <a href="{{ url('admin/users-category') }}" class="menu-link">
                            <div>Danh mục</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('admin/users') ? 'active' : '' }}">
                        <a href="{{ url('admin/users') }}" class="menu-link">
                            <div>Danh sách</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="menu-item {{ request()->routeIs('project.*') || request()->routeIs('project-category.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon ti ti-table-alias"></i>
                    <div>Dự án</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('project-category.*') ? 'active' : '' }}">
                        <a href="{{ url('admin/project-category') }}" class="menu-link">
                            <div>Danh mục</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('project.*') ? 'active' : '' }}">
                        <a href="{{ url('admin/project') }}" class="menu-link">
                            <div>Danh sách</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="menu-item {{ request()->routeIs('news.*') || request()->routeIs('news-category.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-news"></i>
                    <div>Blog</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('news-category.*') ? 'active' : '' }}">
                        <a href="{{ url('admin/news-category') }}" class="menu-link">
                            <div>Danh mục</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('news.*') ? 'active' : '' }}">
                        <a href="{{ url('admin/news') }}" class="menu-link">
                            <div>Danh sách</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item {{ request()->routeIs('recruitment.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon ti ti-users-plus"></i>
                    <div>Tuyển dụng</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item  {{ request()->routeIs('recruitment.*') ? 'active' : '' }}">
                        <a href="{{ url('admin/recruitment') }}" class="menu-link">
                            <div>Đăng tin</div>
                        </a>
                    </li>
                </ul>
            </li>
            </li>
            {{-- <li
                class="menu-item {{ request()->routeIs('project.*') || request()->routeIs('settings.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon ti ti-settings-cog"></i>
                    <div>Cấu hình chung</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('settings.*') ? 'active' : '' }}">
                        <a href="{{ url('admin/settings/introduce') }}" class="menu-link">
                            <div>Giới thiệu</div>
                        </a>
                    </li>
                   
                </ul>
            </li> --}}
        </ul>
    </aside>
