@extends('user.layouts.app')
@section('content')

<main class="main-content">

            <!--== Start About Area Wrapper ==-->
            <section class="about-area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-xl-5">
                            <div class="about-content">
                                <!-- <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About</li>
                                </ol> -->
                                <h4 class="about-content-title">Our culture</h4>
                                <p>At Lechene, we are more than just fashion designers; we are dream weavers. With a passion for design and an unwavering commitment to quality, we create outfits that tell stories and reflect your inner beauty.</p>
                                <p>Our journey began with a vision to redefine fashion, and now, we stand as a testament to the pursuit of elegance and individuality. Every stitch we sew and every fabric we choose is a testament to our dedication to excellence. Our bespoke outfits are tailored to your unique essence, while our ready-to-wear collection brings cutting-edge style to your fingertips.</p>
                                <p>Join us in a journey of self-expression and style. Let us bring your fashion dreams to life.</p>
                                <!-- <a class="ht-popup-video" data-fancybox="" data-type="iframe" href="https://player.vimeo.com/video/172601404?autoplay=1">
                                    <span>Play Now</span>
                                    <i class="fa fa-play icon"></i>
                                </a> -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-7 align-self-center">
                            <div class="about-thumb">
                                <img src="{{ asset('shop/images/photos/about1.png')}}" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End About Area Wrapper ==-->

            <!--== Start Funfact Area Wrapper ==-->
            <section class="section-space pt-5">
                <div class="container">
                    <div class="section-title text-center mb-7 mb-md-5 mb-xl-10 pb-0 pb-md-3">
                        <h2 class="title">Company Progress</h2>
                        <p>Having being in the industry for years, we have established a lasting touch rendering quality and top-notch services</p>
                    </div>
                    <div class="row mb-n9">
                        <div class="col-sm-6 col-lg-3 mb-9">
                            <!--== Start Funfact Item ==-->
                            <div class="funfact-item">
                                <img src="{{asset('shop/images/icons/f1.png')}}" width="100" height="100" alt="Icon">
                                <h2 class="funfact-info">2000+ <span>Customers</span></h2>
                            </div>
                            <!--== End Funfact Item ==-->
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-9">
                            <!--== Start Funfact Item ==-->
                            <div class="funfact-item">
                                <img src="{{asset('shop/images/icons/f2.png')}}" width="109" height="100" alt="Icon">
                                <h2 class="funfact-info">10000+ <span>Oufits</span></h2>
                            </div>
                            <!--== End Funfact Item ==-->
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-9">
                            <!--== Start Funfact Item ==-->
                            <div class="funfact-item">
                                <img src="{{asset('shop/images/icons/f3.png')}}" width="84" height="100" alt="Icon">
                                <h2 class="funfact-info">5k+ <span>Deliveries</span></h2>
                            </div>
                            <!--== End Funfact Item ==-->
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-9">
                            <!--== Start Funfact Item ==-->
                            <div class="funfact-item">
                                <img src="{{asset('shop/images/icons/f4.png')}}" width="101" height="100" alt="Icon">
                                <h2 class="funfact-info">20+ <span>Team</span></h2>
                            </div>
                            <!--== End Funfact Item ==-->
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Funfact Area Wrapper ==-->

            <!--== Start Brand Logo Area Wrapper ==-->
            <section class="section-space" data-bg-color="#fafafa">
                <div class="container pt-lg-5 pb-lg-5">
                    <div class="swiper brand-logo-slider-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide brand-logo-item">
                                <!--== Start Brand Logo Item ==-->
                                <img src="{{  asset('shop/images/brand-logo/1.png') }}" width="102" height="63" alt="Image-HasTech">
                                <!--== End Brand Logo Item ==-->
                            </div>
                            <div class="swiper-slide brand-logo-item">
                                <!--== Start Brand Logo Item ==-->
                                <img src="{{  asset('shop/images/brand-logo/2.png')}}" width="128" height="80" alt="Image-HasTech">
                                <!--== End Brand Logo Item ==-->
                            </div>
                            <div class="swiper-slide brand-logo-item">
                                <!--== Start Brand Logo Item ==-->
                                <img src="{{  asset('shop/images/brand-logo/3.png')}}" width="88" height="84" alt="Image-HasTech">
                                <!--== End Brand Logo Item ==-->
                            </div>
                            <div class="swiper-slide brand-logo-item">
                                <!--== Start Brand Logo Item ==-->
                                <img src="{{  asset('shop/images/brand-logo/4.png')}}" width="102" height="83" alt="Image-HasTech">
                                <!--== End Brand Logo Item ==-->
                            </div>
                            <div class="swiper-slide brand-logo-item">
                                <!--== Start Brand Logo Item ==-->
                                <img src="{{  asset('shop/images/brand-logo/5.png')}}" width="97" height="69" alt="Image-HasTech">
                                <!--== End Brand Logo Item ==-->
                            </div>
                            <div class="swiper-slide brand-logo-item">
                                <!--== Start Brand Logo Item ==-->
                                <img src="{{  asset('shop/images/brand-logo/3.png')}}" width="88" height="84" alt="Image-HasTech">
                                <!--== End Brand Logo Item ==-->
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="visually-hidden">Section Name</h6>
            </section>
            <!--== End Brand Logo Area Wrapper ==-->

            <!--== Start Features Area Wrapper ==-->
            <section class="features-area section-space mb-n3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <img class="feature-thumb" src="{{ asset('shop/images/photos/about2.png')}}" width="970" height="650" alt="Image-HasTech">
                        </div>
                    </div>
                    <div class="section-title section-title-feature text-center pb-2">
                        <h2 class="title">Why should you choose lechene</h2>
                        <p>At Lechene, we're not just a fashion brand; we're a fashion experience. Here's why you should choose us:</p>
                    </div>
                    <div class="row mb-n6 mb-xl-n10">
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-6 mb-xl-10">
                            <!--== Start Feature Item ==-->
                            <div class="feature-item mb-2">
                                <h2 class="feature-title"><img src="{{asset('shop/images/icons/ft1.png')}}" width="30" height="30" alt="Icon"> Bespoke Excellence</h2>
                                <p>Our bespoke outfits are personalized, ensuring each piece perfectly matches your style and body, making a bold statement everywhere you go.</p>
                            </div>
                            <!--== End Feature Item ==-->
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-6 mb-xl-10">
                            <!--== Start Feature Item ==-->
                            <div class="feature-item mb-2">
                                <h2 class="feature-title"><img src="{{asset('shop/images/icons/ft2.png')}}" width="30" height="30" alt="Icon"> Ready-to-Wear Elegance</h2>
                                <p>Our ready-to-wear collection offers a diverse range of outfits, combining comfort, trendiness, and artisanal craftsmanship.</p>
                            </div>
                            <!--== End Feature Item ==-->
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-6 mb-xl-10">
                            <!--== Start Feature Item ==-->
                            <div class="feature-item mb-2">
                                <h2 class="feature-title"><img src="{{asset('shop/images/icons/ft3.png')}}" width="30" height="30" alt="Icon"> Quality Assurance</h2>
                                <p>We are committed to using the finest materials and employing skilled artisans to guarantee long-lasting, high-quality pieces.</p>
                            </div>
                            <!--== End Feature Item ==-->
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-6 mb-xl-10">
                            <!--== Start Feature Item ==-->
                            <div class="feature-item mb-2">
                                <h2 class="feature-title"><img src="{{asset('shop/images/icons/ft4.png')}}" width="30" height="30" alt="Icon"> Unique Designs</h2>
                                <p>Our designs are inspired by the fusion of classic and contemporary, ensuring that your outfit stands out in every crowd.</p>
                            </div>
                            <!--== End Feature Item ==-->
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-6 mb-xl-10">
                            <!--== Start Feature Item ==-->
                            <div class="feature-item mb-2">
                                <h2 class="feature-title"><img src="{{asset('shop/images/icons/ft5.png')}}" width="30" height="30" alt="Icon"> Customer-Centric Approach</h2>
                                <p>We value your input. Every outfit is tailored to your specifications, and our customer support team is always ready to assist you.</p>
                            </div>
                            <!--== End Feature Item ==-->
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-6 mb-xl-10">
                            <!--== Start Feature Item ==-->
                            <div class="feature-item mb-2">
                                <h2 class="feature-title"><img src="{{asset('shop/images/icons/ft6.png')}}" width="30" height="30" alt="Icon"> Efficient Delivery</h2>
                                <p>We deliver on time, and we guarantee the "What you choosed is what you get"</p>
                            </div>
                            <!--== End Feature Item ==-->
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Features Area Wrapper ==-->

            <!--== Start Divider Area Wrapper ==-->
            <section class="divider-area section-bottom-space">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="divider-thumb">
                                <img src="{{asset('shop/images/photos/about3.jpg')}}" alt="Image">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 align-self-center">
                            <div class="divider-content">
                                <h4 class="divider-content-title">Our Team</h4>
                                <p>Behind every stunning creation is a dedicated team of designers, tailors, and fashion enthusiasts. Their expertise and passion shine through in every outfit we offer.</p>
                                <h4 class="divider-content-title">Our Vision</h4>
                                <p>Our vision is to redefine fashion by providing outfits that not only meet trends but also empower individuals to express their distinct personalities.</p>
                                <p>Join us in a journey of self-expression and style. Let us bring your fashion dreams to life. At LeChene, it's not just about clothing; it's about making you feel like the masterpiece you are.</p>
                                <a href="/contact" class="btn-border-secondary">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Divider Area Wrapper ==-->

            <!--== Start News Letter Area Wrapper ==-->
            <section class="news-letter-area section-bottom-space">
                <div class="container">
                    <div class="newsletter-content-wrap" data-bg-img="{{ asset('shop/images/photos/bg1.jpg')}}">
                        <div class="newsletter-content">
                            <h2 class="title">Connect with us today</h2>
                            <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                            <div class="newsletter-form">
                                <form>
                                    <input type="email" class="form-control" placeholder="Email address">
                                    <button class="btn-submit" type="submit"><i class="fa fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End News Letter Area Wrapper ==-->

        </main>
@endsection
