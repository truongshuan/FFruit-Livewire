@extends('client.layouts.master')
@section('title', 'Giới thiệu')
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Chúng tôi là FFruit</p>
                    <h1>Giới thiệu</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- featured section -->
<div class="feature-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="featured-text">
                    <h2 class="pb-3">Tại sao ?<span class="orange-text">FFruit</span></h2>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-4 mb-md-5">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <div class="content">
                                    <div class="content">
                                        <h3>Giao hàng tận nhà</h3>
                                        <p>Giao hàng tận nhà khách hàng với những khách hàng online.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-money-bill-alt"></i>
                                </div>
                                <div class="content">
                                    <h3>Giá tốt</h3>
                                    <p>Thực phẩm hữu cơ giá tốt, chất lượng</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="content">
                                    <div class="content">
                                        <h3>Quà hấp dẫn</h3>
                                        <p>Khách hàng được hưởng nhiều ưu đãi, và phần quà hấp dẫn</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-sync-alt"></i>
                                </div>
                                <div class="content">
                                    <h3>Hoàn tiền</h3>
                                    <p>Hoàn trả lại tiền nếu không hài lòng với sản phẩm của chúng tôi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end featured section -->

<!-- shop banner -->
<section class="shop-banner">
    <div class="container">
        <h3>Tháng 5 này! <br> với đợt khuyến mãi lớn <span class="orange-text">Giảm giá</span></h3>
        <div class="sale-percent"><span>Sale! <br> tới</span>50% <span>đơn hàng</span></div>
        <a href="shop.html" class="cart-btn btn-lg">Mua ngay</a>
    </div>
</section>
<!-- end shop banner -->

<!-- team section -->
<div class="mt-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>Đội ngũ của <span class="orange-text">chúng tôi</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                        beatae optio.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-team-item">
                    <div class="team-bg team-bg-1"></div>
                    <h4>Trường Xuân<span>Chủ</span></h4>
                    <ul class="social-link-team">
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-team-item">
                    <div class="team-bg team-bg-2"></div>
                    <h4>Trường Xuân<span>Chủ</span></h4>
                    <ul class="social-link-team">
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                <div class="single-team-item">
                    <div class="team-bg team-bg-3"></div>
                    <h4>Trường Xuân<span>Chủ</span></h4>
                    <ul class="social-link-team">
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end team section -->

<!-- testimonail-section -->
<div class="testimonail-section mt-80 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="testimonial-sliders">
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="assets/img/avaters/avatar1.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Trường Xuân <span>Buyer</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae
                                vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus
                                error sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="assets/img/avaters/avatar2.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Trường Xuân <span>Buyer</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae
                                vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus
                                error sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="assets/img/avaters/avatar3.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Trường Xuân <span>Buyer</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae
                                vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus
                                error sit voluptatem accusantium "
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
@endsection