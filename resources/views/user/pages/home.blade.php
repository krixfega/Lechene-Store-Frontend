@extends('user.layouts.app')

@section('content')
    <main class="main-content">

        <!--== Start Hero Area Wrapper ==-->
        <section class="hero-slider-area position-relative">
            <div class="swiper hero-slider-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide hero-slide-item">
                        <div class="container">
                            <div class="row align-items-center position-relative">
                                <div class="col-12 col-sm-6">
                                    <div class="hero-slide-content">
                                        <div class="hero-slide-shape-img"><img
                                                src="{{ asset('shop/images/slider/slider1.png') }}" width="180"
                                                height="180" alt="Image"></div>
                                        <h4 class="hero-slide-sub-title">HURRY UP!</h4>
                                        <h1 class="hero-slide-title">Let’s find your fashion outfit.</h1>
                                        <p class="hero-slide-desc">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry.</p>
                                        <div class="hero-slide-meta">
                                            <a class="btn btn-border-primary" href="{{ route('user.shop.index') }}">Shop Now</a>
                                            <a class="ht-popup-video" data-fancybox data-type="iframe"
                                                href="https://player.vimeo.com/video/172601404?autoplay=1">
                                                <i class="fa fa-play icon"></i>
                                                <span>Play Now</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="hero-slide-thumb">
                                        <img src="{{ asset('shop/images/slider/slider1.png') }}" width="555"
                                            height="550" alt="Image">
                                    </div>
                                </div>
                            </div>
                            <div class="hero-social">
                                <a href="https://www.facebook.com/" target="_blank" rel="noopener">fb</a>
                                <a href="https://www.twitter.com/" target="_blank" rel="noopener">tw</a>
                                <a href="https://www.linkedin.com/" target="_blank" rel="noopener">in</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide hero-slide-item">
                        <div class="container">
                            <div class="row align-items-center position-relative">
                                <div class="col-12 col-sm-6">
                                    <div class="hero-slide-content">
                                        <div class="hero-slide-shape-img"><img
                                                src="{{ asset('shop/images/slider/shape1.png') }}" width="180"
                                                height="180" alt="Image"></div>
                                        <h4 class="hero-slide-sub-title">HURRY UP!</h4>
                                        <h2 class="hero-slide-title">Let’s find your fashion outfit.</h2>
                                        <p class="hero-slide-desc">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry.</p>
                                        <div class="hero-slide-meta">
                                            <a class="btn btn-border-primary" href="{{ route('user.shop.index') }}">Shop Now</a>
                                            <a class="ht-popup-video" data-fancybox data-type="iframe"
                                                href="https://player.vimeo.com/video/172601404?autoplay=1">
                                                <i class="fa fa-play icon"></i>
                                                <span>Play Now</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="hero-slide-thumb">
                                        <img src="{{ asset('shop/images/slider/slider1-man2.png') }}" width="555"
                                            height="550" alt="Image">
                                    </div>
                                </div>
                            </div>
                            <div class="hero-social">
                                <a href="https://www.facebook.com/" target="_blank" rel="noopener">fb</a>
                                <a href="https://www.twitter.com/" target="_blank" rel="noopener">tw</a>
                                <a href="https://www.linkedin.com/" target="_blank" rel="noopener">in</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--== Add Pagination ==-->
                <div class="hero-slider-pagination"></div>
            </div>
        </section>
        <!--== End Hero Area Wrapper ==-->

        <!--== Start Product Banner Area Wrapper ==-->
        <section class="product-banner-area section-top-space">
            <div class="container">
                <div class="swiper banner-slider-container">
                    <div class="swiper-wrapper">
                        <a href="{{ route('user.shop.index') }}" class="swiper-slide product-banner-item">
                            <img class="icon" src="{{ asset('shop/images/shop/banner/01.png') }}" width="370"
                                height="294" alt="Image-HasTech">
                        </a>
                        <a href="{{ route('user.shop.index') }}" class="swiper-slide product-banner-item">
                            <img class="icon" src="{{ asset('shop/images/shop/banner/02.png') }}" width="370"
                                height="294" alt="Image-HasTech">
                        </a>
                        <a href="{{ route('user.shop.index') }}" class="swiper-slide product-banner-item">
                            <img class="icon" src="{{ asset('shop/images/shop/banner/03.png') }}" width="370"
                                height="294" alt="Image-HasTech">
                        </a>
                    </div>
                </div>
            </div>
            <h6 class="visually-hidden">Banner Section</h6>
        </section>
        <!--== End Product Banner Area Wrapper ==-->

        <!--== Start Product Area Wrapper ==-->
        <section class="product-area best-product section-space">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="title">Best Products</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="row mb-n6">
                    @foreach ($Bestproducts as $prod)
                        <div class="col-sm-6 col-lg-4 mb-6">
                            <!--== Start Product Item ==-->
                            <div class="product-item product-item-border">
                                @if ($prod->productImages->count() > 0)
                                    <a class="product-thumb" href="{{ route('product.show', $prod->id) }}">
                                        <img src="{{ asset('images/products/' . $prod->productImages->first()->name) }}"
                                            width="300" height="200" alt="Image-HasTech">
                                    </a>
                                @endif
                                <span class="badges">{{ $prod->Category->name }}</span>
                                <div class="product-action">
                                    <a href="{{ route('product.show', $prod->id) }}"><button type="button" class="product-action-btn action-btn-quick-view"
                                       >
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    </a>


                                </div>
                                <div class="product-info">
                                    <h4 class="title"><a href="{{ route('product.show', $prod->id) }}">{{ $prod->name }}</a></h4>
                                    <div class="price">&#8358;{{ $prod->discounted_price }} <span
                                            class="price-old">&#8358;{{ $prod->selling_price }}</span></div>


                                        <button type="button" class="info-btn-wishlist add-to-cart" data-product-id="{{ $prod->id }}">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>

                                </div>
                            </div>
                            <!--== End prPduct Item ==-->
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!--== End Product Area Wrapper ==-->

        <!--== Start Product Banner Area Wrapper ==-->
        <section class="product-banner-area">
            <div class="container">
                <div class="row mb-n6 mb-sm-n7">
                    <div class="col-sm-12 col-md-6 mb-6">
                        <!--== Start Product Banner Item ==-->
                        <a href="{{ route('user.shop.index') }}" class="product-banner-item">
                            <img class="icon" src="{{ asset('shop/images/shop/banner/d1.png') }}" width="570"
                                height="266" alt="Image-HasTech">
                        </a>
                        <!--== End Product Banner Item ==-->
                    </div>
                    <div class="col-sm-12 col-md-6 mb-6">
                        <!--== Start Product Banner Item ==-->
                        <a href="{{ route('user.shop.index') }}" class="product-banner-item">
                            <img class="icon" src="{{ asset('shop/images/shop/banner/d2.png') }}" width="570"
                                height="266" alt="Image-HasTech">
                        </a>
                        <!--== End Product Banner Item ==-->
                    </div>
                </div>
            </div>
            <h6 class="visually-hidden">Product Banner Area</h6>
        </section>
        <!--== End Product Banner Area Wrapper ==-->

        <!--== Start Product Area Wrapper ==-->
        <section class="product-area section-space">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="title">Bespoke Collections</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="row mb-n6">
                    @foreach ($bispock as $prod)
                        <div class="col-sm-6 col-lg-4 mb-6">
                            <!--== Start Product Item ==-->
                            <div class="product-item product-item-border">
                                @if ($prod->FibricImages->count() > 0)
                                    <a class="product-thumb" href="#">
                                        <img src="{{ asset('images/fibrics/' . $prod->FibricImages->first()->name) }}"
                                            width="300" height="286" alt="Image-HasTech">
                                    </a>
                                @endif
                                <span class="badges">{{ $prod->typeOrColors }}</span>
                                <div class="product-action">
                                    <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                        <i class="fa fa-expand"></i>
                                    </button>

                                </div>
                                <div class="product-info">
                                    <h4 class="title"><a href="#">{{ $prod->name }}</a></h4>
                                    <div class="price">&#8358;{{ $prod->selling_price }} <span class="price-old"></span>
                                    </div>
                                    <a href="{{ route('product.booking',$prod->id) }}" type="button" class="info-btn-wishlist">
                                        <i class="fa fa-book"></i>
                                    </a>
                                </div>
                            </div>
                            <!--== End prPduct Item ==-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--== End Product Area Wrapper ==-->

        <!--== Start Product Banner Area Wrapper ==-->
        <section class="product-banner-area">
            <div class="container">
                <div class="row mb-n6">
                    <div class="col-sm-6 col-md-3 mb-6">
                        <!--== Start Product Banner Item ==-->
                        <a href="{{ route('user.shop.index') }}" class="product-banner-item">
                            <img class="icon" src="{{ asset('shop/images/shop/banner/c1.jpg') }}" width="270"
                                height="419" alt="Image-HasTech">
                        </a>
                        <!--== End Product Banner Item ==-->
                    </div>
                    <div class="col-sm-6 col-md-3 mb-6">
                        <!--== Start Product Banner Item ==-->
                        <a href="{{ route('user.shop.index') }}" class="product-banner-item">
                            <img class="icon" src="{{ asset('shop/images/shop/banner/c2.jpg') }}" width="270"
                                height="419" alt="Image-HasTech">
                        </a>
                        <!--== End Product Banner Item ==-->
                    </div>
                    <div class="col-sm-6 col-md-3 mb-6">
                        <!--== Start Product Banner Item ==-->
                        <a href="{{ route('user.shop.index') }}" class="product-banner-item">
                            <img class="icon" src="{{ asset('shop/images/shop/banner/c3.png') }}" width="270"
                                height="419" alt="Image-HasTech">
                        </a>
                        <!--== End Product Banner Item ==-->
                    </div>
                    <div class="col-sm-6 col-md-3 mb-6">
                        <!--== Start Product Banner Item ==-->
                        <a href="{{ route('user.shop.index') }}" class="product-banner-item">
                            <img class="icon" src="{{ asset('shop/images/shop/banner/c4.jpg') }}" width="270"
                                height="419" alt="Image-HasTech">
                        </a>
                        <!--== End Product Banner Item ==-->
                    </div>
                </div>
            </div>
            <h6 class="visually-hidden">Product Banner Area</h6>
        </section>
        <!--== End Product Banner Area Wrapper ==-->


        <!--== Start News Letter Area Wrapper ==-->
        <section class="news-letter-area section-bottom-space">
            <div class="container">
                <div class="newsletter-content-wrap" data-bg-img="{{ asset('shop/images/photos/bg1.jpg') }}">
                    <div class="newsletter-content">
                        <h2 class="title">Connect with us | Lechene</h2>
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
@section('scripts')

<script>


    // var load_url = "{{ route('cart.count') }}";
    // $.ajax({
    //     method: "GET",
    //     url: load_url,
    //     success: function (response) {
    //       console.log(response.count);
    //     }
    // });

    $(document).on('click', '.add-to-cart', function(e) {
    e.preventDefault();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var productId = $(this).data('product-id');
    var quantity = 1;
        $.ajax({

            url: "/cart",
            method: "POST",
            data: {
            product_id: productId,
            quantity: quantity,
            _token: '{{ csrf_token() }}'
            },
            dataType: "json",
            success: function (response) {
                if(response.info){
                alert(response.info);
                }else{
                    alert(response.success);
                };
                loadcart();
            },
            error: function(response) {
                alert(response.responseJSON.error);
            }

        });

       });


</script>


@endsection
