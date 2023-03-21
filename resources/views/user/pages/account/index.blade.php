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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Account</li>
                            </ol>
                            <h2 class="page-header-title">My Account</h2>
                        </div>
                    </div>
                    <div class="col-sm-4 d-sm-flex justify-content-end align-items-end">
                        <h5 class="showing-pagination-results">Account</h5>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start My Account Wrapper ==-->
        <section class="account-area section-space">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="myaccount-page-wrapper">
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <nav>
                                        <div class="myaccount-tab-menu nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="dashboad-tab" data-bs-toggle="tab"
                                                data-bs-target="#dashboad" type="button" role="tab"
                                                aria-controls="dashboad" aria-selected="true">Dashboard</button>
                                            <button class="nav-link" id="orders-tab" data-bs-toggle="tab"
                                                data-bs-target="#orders" type="button" role="tab"
                                                aria-controls="orders" aria-selected="false"> Orders</button>
                                            <button class="nav-link" id="transaction-tab" data-bs-toggle="tab"
                                                data-bs-target="#transaction" type="button" role="tab"
                                                aria-controls="transaction" aria-selected="false"> Transactions</button>
                                            <button class="nav-link" id="bookings-tab" data-bs-toggle="tab"
                                                data-bs-target="#bookings" type="button" role="tab"
                                                aria-controls="bookings" aria-selected="false"> Bookings</button>
                                            <button class="nav-link" id="account-info-tab" data-bs-toggle="tab"
                                                data-bs-target="#account-info" type="button" role="tab"
                                                aria-controls="account-info" aria-selected="false">Account Details</button>
                                            <button class="nav-link" onclick="window.location.href='login-register.html'"
                                                type="button">Logout</button>
                                        </div>
                                    </nav>
                                </div>

                                <div class="col-lg-9 col-md-8">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            <p>{{ session('success') }}</p>
                                        </div>
                                    @endif
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel"
                                            aria-labelledby="dashboad-tab">
                                            <div class="myaccount-content">
                                                <h3>Dashboard</h3>
                                                <div class="welcome">
                                                    <p>Hello, <strong
                                                            class="text-capitalize">{{ Auth::user()->name }}</strong> (If
                                                        Not <strong>{{ Auth::user()->name }} !</strong><a
                                                            href="login-register.html" class="logout"> Logout</a>)</p>
                                                </div>
                                                <p class="mb-0">From your account dashboard. you can easily check & view
                                                    your recent orders, manage your shipping and billing addresses and edit
                                                    your password and account details.</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="orders" role="tabpanel"
                                            aria-labelledby="orders-tab">
                                            <div class="myaccount-content">
                                                <h3>Orders</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($user->orders as $order)
                                                            <tr>
                                                                <td>{{ $order->order_no }}</td>
                                                                <td> {{ date('Y-m-d', strtotime($order->created_at)) }}</td>
                                                                <td>{{ $order->status }}</td>
                                                                <td>{{ $order->total_selling_price }}</td>
                                                                <td><a href="{{ route('user.account.order.show', $order->id) }}"
                                                                    class="check-btn sqr-btn ">View</a></td>
                                                            </tr>
                                                           @empty
                                                            empty
                                                           @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="orders" role="tabpanel"
                                            aria-labelledby="orders-tab">
                                            <div class="myaccount-content">
                                                <h3>Orders</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($user->orders as $order)
                                                            <tr>
                                                                <td>{{ $order->order_no }}</td>
                                                                <td> {{ date('Y-m-d', strtotime($order->created_at)) }}</td>
                                                                <td>{{ $order->status }}</td>
                                                                <td>{{ $order->total_selling_price }}</td>
                                                                <td><a href="{{ route('user.account.order.show', $order->id) }}"
                                                                    class="check-btn sqr-btn ">View</a></td>
                                                            </tr>
                                                           @empty
                                                            empty
                                                           @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="transaction" role="tabpanel"
                                            aria-labelledby="transaction-tab">
                                            <div class="myaccount-content">
                                                <h3>Transaction</h3>
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Invoice No</th>
                                                                <th>Order No</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                                <th>Status<th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($user->payments as $payment)
                                                                <tr>
                                                                    <td>{{ $payment->invoice_id }}</td>
                                                                    <td>{{ $payment->orders->order_no }}</td>
                                                                    <td> {{ date('Y-m-d', strtotime($payment->created_at)) }}
                                                                    </td>
                                                                    <td>{{ $payment->amount }}</td>
                                                                    @if ($payment->status == '1')
                                                                        <td>Success</td>
                                                                    @else
                                                                        <td>Failed</td>
                                                                    @endif


                                                                </tr>
                                                            @empty
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="tab-pane fade" id="account-info" role="tabpanel"
                                            aria-labelledby="account-info-tab">
                                            <div class="myaccount-content">
                                                <h3>Account Details</h3>
                                                <div class="account-details-form">

                                                    <form action="{{ route('profile') }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="single-input-item">
                                                                    <label for="name" class="required">First
                                                                        Name</label>
                                                                    <input type="text" id="name" name="name"
                                                                        required value="{{ Auth::user()->name }}" />
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="single-input-item">
                                                            <label for="email" class="required">Email Addres</label>
                                                            <input type="email" id="email" name="email" required
                                                                value="{{ Auth::user()->email }}" />
                                                        </div>

                                                        <fieldset>
                                                            <legend>Contact details</legend>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="addresss"
                                                                            class="required">Addresss</label>
                                                                        <input type="text" id="addresss"
                                                                            name="address" required
                                                                            value="{{ Auth::user()->address }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="phone_no" class="required">Phone
                                                                            Number</label>
                                                                        <input type="number" id="phone_no"
                                                                            name="phone" required
                                                                            value="{{ Auth::user()->phone }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="single-input-item">
                                                            <button class="check-btn sqr-btn">Save Changes</button>
                                                        </div>
                                                    </form>
                                                    <form action="{{ route('user.account.password.update') }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')

                                                        <fieldset>
                                                            <legend>Password change</legend>
                                                            <div class="single-input-item">
                                                                <label for="current-pwd" class="required">Current
                                                                    Password</label>
                                                                <input type="password" id="current-pwd" name="password"
                                                                    required />
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="new-pwd" class="required">New
                                                                            Password</label>
                                                                        <input type="password" id="new-pwd"
                                                                            name="new_password" required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="confirm-pwd" class="required">Confirm
                                                                            Password</label>
                                                                        <input type="password" id="confirm-pwd"
                                                                            name="new_password_confirmation"
                                                                            @required(true) />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="single-input-item">
                                                            <button class="check-btn sqr-btn"> Change Password</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="visually-hidden">My Account</h6>
        </section>
        <!--== End My Account Wrapper ==-->

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
