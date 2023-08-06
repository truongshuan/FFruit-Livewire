@extends('client.layouts.master')
@section('title', 'Home')
@section('content')
<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <p class="subtitle">FFuirt</p>
                        <h1>Hoa quả tươi !</h1>
                        <div class="hero-btns">
                            <a href="shop.html" class="boxed-btn">Cửa hàng</a>
                            <a href="contact.html" class="bordered-btn">Liên hệ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->

<!-- features list section -->
<div class="list-section pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="content">
                        <h3>Free Shipping</h3>
                        <p>When order over $75</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <div class="content">
                        <h3>Hỗ trợ 24/7</h3>
                        <p>Hỗ trợ khách hàng 24/7</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="list-box d-flex justify-content-start align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-sync"></i>
                    </div>
                    <div class="content">
                        <h3>Hoàn trả</h3>
                        <p>Hoàn trả hàng trong 1 tuần!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="list-box d-flex justify-content-start align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="content">
                        <h3>Bảo hành</h3>
                        <p>Bảo hành trong vòng 2 tháng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end features list section -->

<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>
                        <span class="orange-text">Sản phẩm</span> của chúng tôi
                    </h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Aliquid, fuga quas itaque
                        eveniet beatae optio.
                    </p>
                </div>
            </div>
        </div>
        @livewire('client.home-products')
    </div>
</div>
<!-- end product section -->

<!-- cart banner section -->
<section class="cart-banner pt-100 pb-100">
    <div class="container">
        <div class="row clearfix">
            <!--Image Column-->
            <div class="image-column col-lg-6">
                <div class="image">
                    <div class="price-box">
                        <div class="inner-price">
                            <span class="price">
                                <strong>30%</strong> <br />
                                off per kg
                            </span>
                        </div>
                    </div>
                    <img src="assets/client/img/a.jpg" alt="" />
                </div>
            </div>
            <!--Content Column-->
            <div class="content-column col-lg-6">
                <h3>
                    <span class="orange-text">Deal</span> giá tốt
                </h3>
                <h4>Trái cây tự nhiên</h4>
                <div class="text">
                    Quisquam minus maiores repudiandae nobis, minima
                    saepe id, fugit ullam similique! Beatae, minima
                    quisquam molestias facere ea. Perspiciatis unde
                    omnis iste natus error sit voluptatem accusant
                </div>
                <!--Countdown Timer-->
                <div class="time-counter">
                    <div class="time-countdown clearfix" data-countdown="2020/2/01">
                        <div class="counter-column">
                            <div class="inner">
                                <span class="count">00</span>Days
                            </div>
                        </div>
                        <div class="counter-column">
                            <div class="inner">
                                <span class="count">00</span>Hours
                            </div>
                        </div>
                        <div class="counter-column">
                            <div class="inner">
                                <span class="count">00</span>Mins
                            </div>
                        </div>
                        <div class="counter-column">
                            <div class="inner">
                                <span class="count">00</span>Secs
                            </div>
                        </div>
                    </div>
                </div>
                <a href="cart.html" class="cart-btn mt-3"></i>Tìm hiểu</a>
            </div>
        </div>
    </div>
</section>
<!-- end cart banner section -->

<!-- testimonail-section -->
<div class="testimonail-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="testimonial-sliders">
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="https://i.pravatar.cc/300" alt="" />
                        </div>
                        <div class="client-meta">
                            <h3>
                                Khách hàng
                                <span>Local shop owner</span>
                            </h3>
                            <p class="testimonial-body">
                                " Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos aliquam quisquam
                                voluptatibus consectetur dicta vitae veniam a aspernatur corporis non. Est obcaecati
                                sequi nulla tenetur dignissimos illo officiis accusamus commodi. "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="https://i.pravatar.cc/300" alt="" />
                        </div>
                        <div class="client-meta">
                            <h3>
                                Khách hàng
                                <span>Local shop owner</span>
                            </h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste
                                natus error veritatis et quasi
                                architecto beatae vitae dict eaque ipsa
                                quae ab illo inventore Sed ut
                                perspiciatis unde omnis iste natus error
                                sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="https://i.pravatar.cc/300" alt="" width="70px" />
                        </div>
                        <div class="client-meta">
                            <h3>
                                Khách hàng
                                <span>Local shop owner</span>
                            </h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste
                                natus error veritatis et quasi
                                architecto beatae vitae dict eaque ipsa
                                quae ab illo inventore Sed ut
                                perspiciatis unde omnis iste natus error
                                sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end testimonail-section -->

<!-- advertisement section -->
<div class="abt-section mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="abt-bg">
                    <a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i
                            class="fas fa-play"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="abt-text">
                    <p class="top-sub">Ra đời năm 2023</p>
                    <h2>
                        Chúng tôi là <span class="orange-text">FFruit</span>
                    </h2>
                    <p>
                        Etiam vulputate ut augue vel sodales. In
                        sollicitudin neque et massa porttitor vestibulum
                        ac vel nisi. Vestibulum placerat eget dolor sit
                        amet posuere. In ut dolor aliquet, aliquet
                        sapien sed, interdum velit. Nam eu molestie
                        lorem.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Sapiente facilis illo repellat
                        veritatis minus, et labore minima mollitia qui
                        ducimus.
                    </p>
                    <a href="/about" class="boxed-btn mt-4">Đọc thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end advertisement section -->

<!-- latest news -->
<div class="latest-news pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Tin </span> Mới</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Aliquid, fuga quas itaque
                        eveniet beatae optio.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($latestPosts as $post)
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                <div class="single-latest-news">
                    <a href="{{ route('new_detail', ['slug'=> $post->slug]) }}">
                        <div class="latest-news-bg"
                            style="background-image: url({{ Storage::disk('posts')->url($post->thumbnail) }})"></div>
                    </a>
                    <div class="news-text-box">
                        <h3>
                            <a href="{{ route('new_detail', ['slug'=> $post->slug]) }}">{{ $post->title}}</a>
                        </h3>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> Admin - Đăng {{
                                $post->created_at->locale('vi_VN')->diffForHumans() }}</span>
                            <span class="date"><i class="fas fa-calendar"></i>{{ $post->created_at->format('d/m/Y')
                                }}</span>
                        </p>
                        <p class="excerpt">
                            Bài viết thuộc chủ đề: <b>{{ $post->topic->title }}</b>
                        </p>
                        <a href="{{ route('new_detail', ['slug'=> $post->slug]) }}" class="read-more-btn">Đọc thêm<i
                                class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="/news" class="boxed-btn">Đọc thêm</a>
            </div>
        </div>
    </div>
</div>
<!-- end latest news -->
@endsection
