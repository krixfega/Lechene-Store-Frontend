@extends('user.layouts.app')
@section('content')

<main class="main-content">

            <!--== Start About Area Wrapper ==-->
            <section class="about-area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-xl-5">
                            <div class="about-content">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About</li>
                                </ol>
                                <h4 class="about-content-title">About lechene, Learn more about our company</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Molestie tincidunt nascetur amet libero, volutpat. Amet diam blandit justo rhoncus vitae. Ultricies arcu, urna placerat ac urna adipiscing augue ornare dolor.</p>
                                <a class="ht-popup-video" data-fancybox="" data-type="iframe" href="https://player.vimeo.com/video/172601404?autoplay=1">
                                    <span>Play Now</span>
                                    <i class="fa fa-play icon"></i>
                                </a>
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
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                    <div class="row mb-n9">
                        <div class="col-sm-6 col-lg-3 mb-9">
                            <!--== Start Funfact Item ==-->
                            <div class="funfact-item">
                                <img src="{{asset('shop/images/icons/f1.png')}}" width="100" height="100" alt="Icon">
                                <h2 class="funfact-info">5000+ <span>Clients</span></h2>
                            </div>
                            <!--== End Funfact Item ==-->
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-9">
                            <!--== Start Funfact Item ==-->
                            <div class="funfact-item">
                                <img src="{{asset('shop/images/icons/f2.png')}}" width="109" height="100" alt="Icon">
                                <h2 class="funfact-info">200+ <span>Project</span></h2>
                            </div>
                            <!--== End Funfact Item ==-->
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-9">
                            <!--== Start Funfact Item ==-->
                            <div class="funfact-item">
                                <img src="{{asset('shop/images/icons/f3.png')}}" width="84" height="100" alt="Icon">
                                <h2 class="funfact-info">1.5M+ <span>Revenue</span></h2>
                            </div>
                            <!--== End Funfact Item ==-->
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-9">
                            <!--== Start Funfact Item ==-->
                            <div class="funfact-item">
                                <img src="{{asset('shop/images/icons/f4.png')}}" width="101" height="100" alt="Icon">
                                <h2 class="funfact-info">150+ <span>Team</span></h2>
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tellus pulvinar et enim et maecenas faucibus. Volutpat consectetur non, ac, porttitor. Lorem cursus malesuada viverra morbi.</p>
                    </div>
                    <div class="row mb-n6 mb-xl-n10">
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-6 mb-xl-10">
                            <!--== Start Feature Item ==-->
                            <div class="feature-item mb-2">
                                <h2 class="feature-title"><img src="{{asset('shop/images/icons/ft1.png')}}" width="30" height="30" alt="Icon"> Support Team</h2>
                                <p>Lorem ipsum dolor amet, consectetur adipiscing. Ac tortor enim metus, turpis id.</p>
                            </div>
                            <!--== End Feature Item ==-->
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-6 mb-xl-10">
                            <!--== Start Feature Item ==-->
                            <div class="feature-item mb-2">
                                <h2 class="feature-title"><img src="{{asset('shop/images/icons/ft2.png')}}" width="30" height="30" alt="Icon"> Creative Support</h2>
                                <p>Lorem ipsum dolor amet, consectetur adipiscing. Ac tortor enim metus, turpis id.</p>
                            </div>
                            <!--== End Feature Item ==-->
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-6 mb-xl-10">
                            <!--== Start Feature Item ==-->
                            <div class="feature-item mb-2">
                                <h2 class="feature-title"><img src="{{asset('shop/images/icons/ft3.png')}}" width="30" height="30" alt="Icon"> Project Management</h2>
                                <p>Lorem ipsum dolor amet, consectetur adipiscing. Ac tortor enim metus, turpis id.</p>
                            </div>
                            <!--== End Feature Item ==-->
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-6 mb-xl-10">
                            <!--== Start Feature Item ==-->
                            <div class="feature-item mb-2">
                                <h2 class="feature-title"><img src="{{asset('shop/images/icons/ft4.png')}}" width="30" height="30" alt="Icon"> Quality Control</h2>
                                <p>Lorem ipsum dolor amet, consectetur adipiscing. Ac tortor enim metus, turpis id.</p>
                            </div>
                            <!--== End Feature Item ==-->
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-6 mb-xl-10">
                            <!--== Start Feature Item ==-->
                            <div class="feature-item mb-2">
                                <h2 class="feature-title"><img src="{{asset('shop/images/icons/ft5.png')}}" width="30" height="30" alt="Icon"> Team Management</h2>
                                <p>Lorem ipsum dolor amet, consectetur adipiscing. Ac tortor enim metus, turpis id.</p>
                            </div>
                            <!--== End Feature Item ==-->
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-6 mb-xl-10">
                            <!--== Start Feature Item ==-->
                            <div class="feature-item mb-2">
                                <h2 class="feature-title"><img src="{{asset('shop/images/icons/ft6.png')}}" width="30" height="30" alt="Icon"> Client Management</h2>
                                <p>Lorem ipsum dolor amet, consectetur adipiscing. Ac tortor enim metus, turpis id.</p>
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
                                <h4 class="divider-content-title">lechene fashion is demo amet adipiscing elit.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo nascetur commodo et convallis mi. Enim, enim felis, amet aliquam donec quisque quisque malesuada aliquam. Semper enim amet sit natoque felis tristique orci nullam. Quis erat in ac tellus malesuada elit libero. Suspendisse scelerisque lacus semper posuere pulvinar arcu at non non. Lobortis interdum morbi tincidunt convallis elit.</p>
                                <a href="/contact" class="btn-border-secondary">Contact</a>
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
                            <h2 class="title">Connect with us |Lechene</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
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
