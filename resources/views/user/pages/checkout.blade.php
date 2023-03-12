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
                                {{-- <div class="payment-method">
                                    <div class="pay-top sin-payment">
                                        <input id="payment_method_1" class="input-radio" type="radio" value="cheque"
                                            checked="checked" name="payment_method">
                                        <label for="payment_method_1"> Direct Bank Transfer </label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as
                                                the
                                                payment reference. Your order will not be shipped until the funds have
                                                cleared
                                                in our account.</p>
                                        </div>
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input id="payment-method-2" class="input-radio" type="radio" value="cheque"
                                            name="payment_method">
                                        <label for="payment-method-2">Check payments</label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State /
                                                County, Store Postcode.</p>
                                        </div>
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input id="payment-method-3" class="input-radio" type="radio" value="cheque"
                                            name="payment_method">
                                        <label for="payment-method-3">Cash on delivery </label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Pay with cash upon delivery. </p>
                                        </div>
                                    </div>
                                    <div class="pay-top sin-payment sin-payment-3">
                                        <input id="payment-method-4" class="input-radio" type="radio" value="cheque"
                                            name="payment_method">
                                        <label for="payment-method-4">PayPal <img alt=""
                                                src="assets/images/photos/paypal.png" width="35" height="23"><a
                                                href="#">What is PayPal?</a></label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                                account.</p>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="payment-condition">
                                    <p>Your personal data will be used to process your order, support your experience
                                        throughout
                                        this website, and for other purposes described in our <a href="#">privacy
                                            policy</a>.</p>
                                </div>
                            </div>
                            <div class="place-order">
                                <a href="#/">Pay Now</a>
                            </div>
                        </div>
                    </div>
                </div>
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
