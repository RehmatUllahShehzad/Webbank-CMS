<nav class="no-print header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-header d-none d-sm-block">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item">
                <a class="navbar-brand" href="/">
                    <div class="brand-logo px-1 h6"></div>
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto">
                            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                <em class="ficon feather icon-menu"></em>
                            </a>
                        </li>
                    </ul>
                </div>

                <ul class="nav navbar-nav float-right">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link nav-link-expand">
                            <em class="ficon feather icon-maximize"></em>
                        </a>
                    </li>
                    <x-user-profile></x-user-profile>
                </ul>
            </div>
        </div>
    </div>
</nav>
