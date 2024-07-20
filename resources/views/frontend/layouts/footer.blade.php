<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="footer-logo">
                                <h2><a href="/">WebBank</a></h2>
                                <span>{{ getGeneralSetting('copyright_text') }}</span>
                                <div>
                                    @foreach (getMenu('footer-ehl-fdic') as $item)
                                        <a href="{{ url($item->link) }}"
                                            target="{{ $item->target == null ? '_self' : $item->target }}"
                                            class="text-white px-1 d-inline-block"> <small>{{ $item->title }}</small>
                                        @if ($loop->last)
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        @endif
                                        </a>
                                        @if (!$loop->last)
                                            |
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <h3>Personal</h3>
                                    <ul>
                                        @foreach (getMenu('footerpersonal') as $item)
                                            @if ($item->children->isEmpty())
                                                <li><a href="{{ url($item->link) }}"
                                                        target="{{ $item->target == null ? '_self' : $item->target }}">{{ $item->title }}</a>
                                                </li>
                                            @else
                                                <li>
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop"
                                                        data-toggle="dropdown">
                                                        {{ $item->title }}
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        @foreach ($item->children as $subMenu)
                                                            <a class="dropdown-item" href="{{ url($subMenu->link) }}"
                                                                target="{{ $subMenu->target == null ? '_self' : $subMenu->target }}">{{ $subMenu->title }}</a>
                                                        @endforeach
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-6 col-md-6">
                                    <h3>Businesses</h3>
                                    <ul>
                                        @foreach (getMenu('footerbuisness') as $item)
                                            @if ($item->children->isEmpty())
                                                <li><a href="{{ url($item->link) }}"
                                                        target="{{ $item->target == null ? '_self' : $item->target }}">{{ $item->title }}</a>
                                                </li>
                                            @else
                                                <li>
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop"
                                                        data-toggle="dropdown">
                                                        {{ $item->title }}
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        @foreach ($item->children as $subMenu)
                                                            <a class="dropdown-item"
                                                                href="{{ url($subMenu->link) }}"
                                                                target="{{ $subMenu->target == null ? '_self' : $subMenu->target }}">{{ $subMenu->title }}</a>
                                                        @endforeach
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-6 col-md-4 col-lg-4">
                                    <h3>WebBank</h3>
                                    <ul>
                                        @foreach (getMenu('footerwebbank') as $item)
                                            @if ($item->children->isEmpty())
                                                <li><a href="{{ url($item->link) }}"
                                                        target="{{ $item->target == null ? '_self' : $item->target }}">{{ $item->title }}</a>
                                                </li>
                                            @else
                                                <li>
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop"
                                                        data-toggle="dropdown">
                                                        {{ $item->title }}
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        @foreach ($item->children as $subMenu)
                                                            <a class="dropdown-item"
                                                                href="{{ url($subMenu->link) }}"
                                                                target="{{ $subMenu->target == null ? '_self' : $subMenu->target }}">{{ $subMenu->title }}</a>
                                                        @endforeach
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <h3>Policies</h3>
                                    <ul>
                                        @foreach (getMenu('footerpolicies') as $item)
                                            @if ($item->children->isEmpty())
                                                <li><a href="{{ url($item->link) }}"
                                                        target="{{ $item->target == null ? '_self' : $item->target }}">{{ $item->title }}</a>
                                                </li>
                                            @else
                                                <li>

                                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop"
                                                        data-toggle="dropdown">
                                                        {{ $item->title }}
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        @foreach ($item->children as $subMenu)
                                                            <a class="dropdown-item"
                                                                href="{{ url($subMenu->link) }}">{{ $subMenu->title }}</a>
                                                        @endforeach
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-4 col-lg-5">
                                    <!-- <h3>Social</h3> -->
                                    <div class="social-links mb-2">
                                        <!-- <a href="#"><em class="fab fa-facebook-f"></em></a>
                                        <a href="#"><em class="fab fa-instagram"></em></a> -->
                                        <a href="{{ getGeneralSetting('linkedin_url') }}"><em
                                                class="fab fa-linkedin-in"></em></a>
                                        <!-- <a href="#"><em class="fab fa-twitter"></em></a> -->
                                    </div>
                                    <ul class="ul-list">
                                        <li><a
                                                href="tel:{{ getGeneralSetting('phone') }}">{{ getGeneralSetting('phone') }}</a>
                                        </li>
                                        <li class="d-none time"><a>{{ getGeneralSetting('timing') }}</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
