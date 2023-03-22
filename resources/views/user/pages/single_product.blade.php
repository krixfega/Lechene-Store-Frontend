@extends('user.layouts.app')




@section('content')
    <main class="main-content">

        <!--== Start Page Header Area Wrapper ==-->
        <section class="page-header-area" data-bg-color="#F1FAEE">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="page-header-content">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                            </ol>
                            <h2 class="page-header-title">Beat deal with best product.</h2>
                        </div>
                    </div>
                    <div class="col-sm-4 d-sm-flex justify-content-end align-items-end">
                        <h5 class="showing-pagination-results">Product Detail</h5>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Product Details Area Wrapper ==-->
        <section class="product-detail-area section-space">
            <div class="container">
                <div class="row product-details">
                    <div class="col-lg-7">
                        <div class="product-details-thumb me-lg-6">
                            <div class="swiper single-product-thumb-slider">
                                <div class="swiper-wrapper">

                                    @foreach ($product->productImages as $prod)
                                        <a class="lightbox-image swiper-slide" data-fancybox="gallery"
                                            href="assets/images/shop/details/1.png">
                                            <img src="{{ asset('images/products/' . $prod->name) }}" width="640"
                                                height="530" alt="Image">
                                            <span class="badges">{{ $product->Category->name }}</span>
                                        </a>
                                    @endforeach
                                </div>
                                <!-- swiper pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="swiper single-product-nav-slider">
                                <div class="swiper-wrapper">
                                    @foreach ($product->productImages as $prod)
                                        <div class="nav-item swiper-slide">
                                            <img src="{{ asset('images/products/' . $prod->name) }}" alt="Image"
                                                width="305" height="253">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="product-details-content">
                            <h3 class="product-details-title">{{ $product->name }}</h3>
                            {{-- <div class="product-details-review">
                            <div class="product-review-icon">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                            <button type="button" class="product-review-show">156 reviews</button>
                        </div> --}}
                            <p class="product-details-desc">
                                {{ $product->details }}</p>
                            <form method="post" id="multiAddToCart">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="product-details-pro-qty">
                                    <h4>QTY :</h4>
                                    <div class="pro-qty">
                                        <input type="text" title="Quantity" name="quantity" value="1"
                                            max="{{ $product->qty }}">
                                    </div>
                                </div>
                                <div class="product-details-price">${{ $product->discounted_price }}<span
                                        class="price-old">${{ $product->selling_price }}</span></div>
                                <div class="product-details-action">
                                    <button type="submit" class="product-action-btn" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">Add to cart</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        </section>
        <!--== End Product Details Area Wrapper ==-->

        <!--== Start Related Product Area Wrapper ==-->
        {{-- <section class="product-area section-bottom-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title">Related Product</h2>
                        <p class="ms-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
            </div>
            <div class="row mb-n6">
                <div class="col-sm-6 col-lg-4 mb-6">
                    <!--== Start Product Item ==-->
                    <div class="product-item">
                        <a class="product-thumb" href="shop-single-product.html">
                            <img src="assets/images/shop/23.jpg" width="300" height="286" alt="Image-HasTech">
                        </a>
                        <span class="badges">New</span>
                        <div class="product-action">
                            <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                <i class="fa fa-expand"></i>
                            </button>
                            <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                            <button type="button" class="product-action-btn action-btn-compare" data-bs-toggle="modal" data-bs-target="#action-CompareModal">
                                <i class="fa fa-exchange"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <h4 class="title"><a href="shop-single-product.html">Style Modern Dress</a></h4>
                            <div class="price">N650.00 <span class="price-old">N650.00</span></div>
                            <button type="button" class="info-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                <i class="fa fa-heart-o"></i>
                            </button>
                        </div>
                    </div>
                    <!--== End prPduct Item ==-->
                </div>
                <div class="col-sm-6 col-lg-4 mb-6">
                    <!--== Start Product Item ==-->
                    <div class="product-item">
                        <a class="product-thumb" href="shop-single-product.html">
                            <img src="assets/images/shop/17.jpg" width="300" height="286" alt="Image-HasTech">
                        </a>
                        <span class="badges">New</span>
                        <div class="product-action">
                            <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                <i class="fa fa-expand"></i>
                            </button>
                            <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                            <button type="button" class="product-action-btn action-btn-compare" data-bs-toggle="modal" data-bs-target="#action-CompareModal">
                                <i class="fa fa-exchange"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <h4 class="title"><a href="shop-single-product.html">Modern Race</a></h4>
                            <div class="price">N650.00 <span class="price-old">N650.00</span></div>
                            <button type="button" class="info-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                <i class="fa fa-heart-o"></i>
                            </button>
                        </div>
                    </div>
                    <!--== End prPduct Item ==-->
                </div>
                <div class="col-sm-6 col-lg-4 mb-6">
                    <!--== Start Product Item ==-->
                    <div class="product-item">
                        <a class="product-thumb" href="shop-single-product.html">
                            <img src="assets/images/shop/24.jpg" width="300" height="286" alt="Image-HasTech">
                        </a>
                        <span class="badges">New</span>
                        <div class="product-action">
                            <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                <i class="fa fa-expand"></i>
                            </button>
                            <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                            <button type="button" class="product-action-btn action-btn-compare" data-bs-toggle="modal" data-bs-target="#action-CompareModal">
                                <i class="fa fa-exchange"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <h4 class="title"><a href="shop-single-product.html">Fit Wool Suit</a></h4>
                            <div class="price">N650.00 <span class="price-old">N650.00</span></div>
                            <button type="button" class="info-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                <i class="fa fa-heart-o"></i>
                            </button>
                        </div>
                    </div>
                    <!--== End prPduct Item ==-->
                </div>
            </div>
        </div>
    </section> --}}
        <!--== End Related Product Area Wrapper ==-->

        <!--== Start News Letter Area Wrapper ==-->
        <section class="news-letter-area section-bottom-space">
            <div class="container">
                <div class="newsletter-content-wrap" data-bg-img="assets/images/photos/bg1.jpg">
                    <div class="newsletter-content">
                        <h2 class="title">Connect with us | merier</h2>
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
       var proQty = $(".pro-qty");
proQty.append('<div class= "dec qty-btn">-</div>');
proQty.append('<div class="inc qty-btn">+</div>');
$('.qty-btn').on('click', function(e) {
    e.preventDefault();
    var $button = $(this);
    var oldValue = $button.parent().find('input').val();
    var maxQty = parseInt('{{ $product->qty }}');

    if ($button.hasClass('inc')) {
        var newVal = parseFloat(oldValue) + 1;
        if (newVal > maxQty) {
            newVal = maxQty;
        }
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - 1;
            if (newVal > maxQty) {
                newVal = maxQty;
            }
        } else {
            newVal = 1;
        }
    }

    $button.parent().find('input').val(newVal);
});




        $(document).ready(function() {
            $('#multiAddToCart').on('submit', function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                var formDataArray = $(this).serializeArray();
                $.ajax({

                    url: "/cart",
                    method: "POST",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        alert(response.responseJSON);
                    },
                    error: function(response) {
                        alert(response.responseJSON.error);
                    }

                });
               
            });
        });
    </script>
@endsection
