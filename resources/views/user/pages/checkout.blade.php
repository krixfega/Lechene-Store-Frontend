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
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                            <h2 class="page-header-title">All Trending Products</h2>
                        </div>
                    </div>
                    <div class="col-sm-4 d-sm-flex justify-content-end align-items-end">
                        <h5 class="showing-pagination-results">Checkout Page</h5>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Checkout Area Wrapper ==-->
        <section class="section-space shop-checkout-area">
            <div class="container">
            <form action="{{ route('pay') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Billing Details</h3>

                            <div class="row">
                                <div class="col-12">
                                    <div class="billing-info mb-4">
                                        <label>Fullname <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="name" value="{{ Auth::user()->name }}" required>
                                    </div>
                                </div>



                            </div>
                            <div class="col-12">
                                <div class="billing-info mb-4">
                                    <label>Address <abbr class="required" title="required">*</abbr></label>
                                    <input class="billing-address" placeholder="House number,street name and state"
                                        type="text" name="address" value="{{ Auth::user()->address }}" required>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="billing-info mb-4">
                                    <label>Phone <abbr class="required" title="required">*</abbr></label>
                                    <input type="number" name="phone" value="{{ Auth::user()->phone }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="billing-info mb-4">
                                    <label>Email Address <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-5">
                        <div class="your-order-area mt-10 mt-lg-0">
                            <h3 class="">Your order</h3>
                            <div class="your-order-wrap">
                                <div class="your-order-info-wrap">
                                    <div class="your-order-title">
                                        <h4>Product <span>Subtotal</span></h4>
                                    </div>
                                    <div class="your-order-product">

                                        <ul>
                                            @php
                                                $totalPrice = 0;
                                            @endphp
                                            @forelse ($cartitem as $prod)
                                                @php
                                                    $itemTotal = $prod->prod->discounted_price * $prod->qty;
                                                    $totalPrice += $itemTotal;
                                                @endphp
                                                <li>{{ $prod->prod->name }} X {{ $prod->qty }}
                                                    <span>${{ $prod->prod->discounted_price * $prod->qty }} </span></li>

                                            @empty
                                            @endforelse
                                        </ul>





                                    </div>
                                    <div class="your-order-subtotal">
                                        <h3>Subtotal <span>${{ $totalPrice }}</span></h3>
                                    </div>
                                    <div class="your-order-shipping">
                                        <span>Shipping</span>
                                        <ul>
                                            <li><input type="radio" name="shipping" value="info"
                                                    checked="checked"><label>Free shipping</label></li>

                                        </ul>
                                    </div>
                                    <div class="your-order-total">
                                        <h3>Total <span>${{ $totalPrice }}</span></h3>
                                    </div>
                                </div>

                                <div class="payment-condition">
                                    <p>Your personal data will be used to process your order, support your experience
                                        throughout
                                        this website, and for other purposes described in our <a href="#">privacy
                                            policy</a>.</p>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                            <button type="submit" class="place-order btn btn-primary btn-lg ">
                                <p>Pay Now</p>
                            </button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </section>
        <!--== End Checkout Area Wrapper ==-->

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
@endsection
