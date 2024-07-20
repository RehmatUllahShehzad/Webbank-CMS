<div class="no-print main-menu menu-fixed menu-light menu-accordion menu-shadow menu-collapsed" data-scroll-to-active="true" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    <div class="navbar-header expanded">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto d-flex align-items-center">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/logo2.svg') }}" style="height: 41px;width: 160px;" alt="">
                </a>
            </li>
            <li class="nav-item nav-toggle d-flex align-items-center">
                <a class="nav-link modern-nav-toggle pr-0 shepherd-modal-target" data-toggle="collapse">
                    <em class="icon-x d-block d-xl-none font-medium-4 primary toggle-icon feather icon-disc"></em>
                    <em class="toggle-icon icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary feather" data-ticon="icon-disc" tabindex="0"></em>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content pt-2 ps ps--active-y">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item {{ $isActive('admin.dashboard.index') }}">
                <a href="{{ route('admin.dashboard.index') }}">
                    <em class="feather icon-home"></em>
                    <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>

            @if (hasRoute(config('app.adminRouteNamePrefix') . 'slider.index'))
                <li class="nav-item {{ $isActive(config('app.adminRouteNamePrefix') . 'slider.index') }}">
                    <a href="{{ route(config('app.adminRouteNamePrefix') . 'slider.index') }}">
                        <em class="feather icon-sliders"></em>
                        <span class="menu-title">Slider</span>
                    </a>
                </li>
            @endif

            @if (hasRoute(config('app.adminRouteNamePrefix') . 'menus.index'))
                <li class="nav-item {{ $isActive(config('app.adminRouteNamePrefix') . 'menus.index') }}">
                    <a href="{{ route(config('app.adminRouteNamePrefix') . 'menus.index') }}">
                        <em class="feather icon-list"></em>
                        <span class="menu-title">Menus</span>
                    </a>
                </li>
            @endif

            @if (hasRoute(config('app.adminRouteNamePrefix') . 'pages.index'))
                <li class="nav-item {{ $isActive(config('app.adminRouteNamePrefix') . 'pages.index') }}">
                    <a href="{{ route(config('app.adminRouteNamePrefix') . 'pages.index') }}">
                        <em class="feather icon-file"></em>
                        <span class="menu-title">Pages</span>
                    </a>
                </li>
            @endif

            @if (hasRoute(config('app.adminRouteNamePrefix') . 'news.index'))
                <li class="nav-item {{ $isActive(config('app.adminRouteNamePrefix') . 'news.index') }}">
                    <a href="{{ route(config('app.adminRouteNamePrefix') . 'news.index') }}">
                        <em class="fa fa-newspaper-o"></em>
                        <span class="menu-title">News</span>
                    </a>
                </li>
            @endif


            @if (hasRoute(config('app.adminRouteNamePrefix') . 'forms.index'))
                <li class="nav-item {{ $isActive(config('app.adminRouteNamePrefix') . 'forms.index') }}">
                    <a href="{{ route(config('app.adminRouteNamePrefix') . 'forms.index') }}">
                        <em class="feather icon-users"></em>
                        <span class="menu-title">Forms</span>
                    </a>
                </li>
            @endif


            @if (hasRoute(config('app.adminRouteNamePrefix') . 'users.index'))
                <li class="nav-item {{ $isActive(config('app.adminRouteNamePrefix') . 'users.index') }}">
                    <a href="{{ route(config('app.adminRouteNamePrefix') . 'users.index') }}">
                        <em class="feather icon-file"></em>
                        <span class="menu-title">Users</span>
                    </a>
                </li>
            @endif

            @if (hasRoute(config('app.adminRouteNamePrefix') . 'roles.index'))
                <li class="nav-item {{ $isActive(config('app.adminRouteNamePrefix') . 'roles.index') }}">
                    <a href="{{ route(config('app.adminRouteNamePrefix') . 'roles.index') }}">
                        <em class="fa fa-key"></em>
                        <span class="menu-title">Roles</span>
                    </a>
                </li>
            @endif

            @if (hasRoute(config('app.adminRouteNamePrefix') . 'settings.index'))
                <li class="nav-item {{ $isActive(config('app.adminRouteNamePrefix') . 'settings.index') }}">
                    <a href="{{ route(config('app.adminRouteNamePrefix') . 'settings.index') }}">
                        <em class="feather icon-settings"></em>
                        <span class="menu-title">Setting</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</div>
