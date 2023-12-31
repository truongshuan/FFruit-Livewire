<!--PreLoader-->
{{-- <div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div> --}}
<!--PreLoader Ends-->

<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="/">
                            <img src="{{ asset('assets/client/img/pngwing.com.png') }}" alt="logo-site" width="60px" />
                        </a>
                    </div>
                    <!-- logo -->
                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class="current-list-item">
                                <a href="/">Trang chủ</a>
                            </li>
                            <li><a href="/about">Giới thiệu</a></li>
                            <li>
                                <a href="/news">Tin tức</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="news.html">Tin tức mới</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="/contact">Liên hệ</a></li>
                            <li>
                                <a href="/shops">Shop</a>
                            </li>
                            @if (Auth::check())
                            <li>
                                <a href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('profile.edit') }}">{{ __('Thông tin') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('myorder') }}">{{ __('Đơn hàng') }}</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="logout-btn">{{ __('Đăng xuất') }}</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @else
                            <li>
                                <a href="#">Tài khoản</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('login') }}">Đăng nhập</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}">Đăng ký</a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            <li>
                                <livewire:client.cart-count />
                            </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->

<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Tìm kiếm:</h3>
                        <input type="text" placeholder="Keywords" />
                        <button type="submit">
                            Tìm kiếm <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search area -->