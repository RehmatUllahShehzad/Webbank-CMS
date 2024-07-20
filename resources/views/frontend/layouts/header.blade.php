<header class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-light navbar-expand-md ">
                    <a class="navbar-brand d-none d-md-block d-lg-block d-xl-block d-xxl-block" href="/">
                        <img width="300" src="{{ getGeneralSetting('site_logo') }}" alt="">
                    </a>
                    <a class="navbar-brand d-block d-md-none d-lg-none d-xl-none d-xxl-none" href="/">
                            <img width="80" src="{{ getGeneralSetting('site_logo_small') }}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavbar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="17" viewBox="0 0 20 14" fill="none">
                            <path d="M0 1H18.5H20M5 7H20M20 13H0" stroke="#013068" stroke-width="2" />
                        </svg>
                        <!-- <span class="navbar-toggler-icon">  </span> -->
                    </button>

                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav ms-auto" id="nav">
                            @foreach (getMenu('header') as $key => $item)
                                <li class="nav-item {{ $item->children->isEmpty() ? '' : 'dropdown' }}">
                                    @if ($item->children->isEmpty())
                                        <a class="nav-link {{ $item->children->isEmpty() ? '' : 'dropdown-toggle' }}"
                                            href="{{ url($item->link) }}" target="{{$item->target == null ? '_self' : $item->target }}" id="navbardrop" data-toggle="dropdown">
                                            {{ $item->title }}
                                        </a>
                                    @else
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown"> {{ $item->title }}
                                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1L5 5L9 1" />
                                            </svg>
                                        </a>
                                        <ul class="dropdown-menu {{ $loop->last ? 'drop-left' : '' }}">
                                            @foreach ($item->children as $subMenu)
                                                <li><a class="dropdown-item"
                                                        href="{{ url($subMenu->link) }}" target="{{$subMenu->target  == null ? '_self' : $subMenu->target}}" >{{ $subMenu->title }}</a>
                                                </li>
                                    @endforeach
                                </ul>
                                @endif
                                </li>
                            @endforeach
                            </ul>
                    </div>

                    <div class="header-btn d-none">
                        @foreach (getMenu('depositproduct') as $item)
                            @if ($item->children->isEmpty())
                                <a class="general-btn {{ $loop->first ? 'vice-versa' : '' }}"
                                    href="{{ url($item->link) }}" target="{{$item->target == null ? '_self' : $item->target }}">
                                    {{ $item->title }}
                                </a>
                            @else
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    {{ $item->title }}
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L5 5L9 1" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu drop-left">
                                    @foreach ($item->children as $subMenu)
                                        <li
                                            class="nav-item {{ $subMenu->children->isNotEmpty() ? 'dropdown' : '' }}">
                                            @if ($subMenu->children->isEmpty())
                                        <li><a class="dropdown-item"
                                                href="{{ url($subMenu->link) }}">{{ $subMenu->title }}</a></li>
                                    @else
                                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop"
                                            data-toggle="dropdown">
                                            {{ $subMenu->title }}
                                        </a>
                                        <div class="dropdown-menu">
                                            @foreach ($subMenu->children as $subsubMenu)
                                                <a class="dropdown-item"
                                                    href="{{ url($subsubMenu->link) }}">{{ $subsubMenu->title }}</a>
                                            @endforeach
                                        </div>
                                    @endif
                                    </li>
                            @endforeach
                            </ul>
                        @endif
                        @endforeach
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
