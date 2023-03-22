@extends('user.layouts.app')
@section('content')

<main class="main-content">

    <!--== Start Page Header Area Wrapper ==-->
    <section class="page-header-area">
        <div class="container">
            <div class="page-header-content">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </div>
        </div>
        <h6 class="visually-hidden">Contact Page Header Area</h6>
    </section>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Contact Area Wrapper ==-->
    <section class="contact-area section-space mt-n3 mt-md-0 pt-0 pt-md-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-7 col-lg-6">
                    <div class="contact-form-area">
                        <h3>Get in touch</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                        <!--== Start Contact Form ==-->
                        <form class="contact-form" id="contact-form" action="https://whizthemes.com/mail-php/raju/arden/mail.php" method="post">
                            <div class="form-input-item">
                                <input type="text" class="form-control" name="con_name" id="name" placeholder="Enter Your Name">
                            </div>
                            <div class="form-input-item">
                                <input class="form-control" type="email" name="con_email" id="mail" placeholder="Enter Your Mail">
                            </div>
                            <div class="form-input-item">
                                <textarea class="form-control" name="con_message" id="message" placeholder="Enter Your Message"></textarea>
                            </div>
                            <div class="form-input-item mb-0">
                                <button class="btn btn-theme" type="submit">Submit</button>
                            </div>
                        </form>
                        <!--== End Contact Form ==-->
                        <!--== Message Notification ==-->
                        <div class="form-message"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-6 align-self-center">
                    <div class="contact-thumb">
                        <img src="{{ asset('shop/images/photos/contact1.png') }}" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Contact Area Wrapper ==-->

    <!--== Start Contact Info Area Wrapper ==-->
    <section class="contact-info-area">
        <div class="container">
            <div class="row mb-n6">
                <div class="col-sm-6 col-md-4 mb-6">
                    <!--== Start Contact Info Item ==-->
                    <div class="contact-info-item">
                        <h4>Phone</h4>
                        <div class="content">
                            <a href="tel://+11215562222 ">+11 21556 2222 </a>
                            <a href="tel://+12454555545">+12 4545 55545</a>
                        </div>
                    </div>
                    <!--== End Contact Info Item ==-->
                </div>
                <div class="col-sm-6 col-md-4 mb-6">
                    <!--== Start Contact Info Item ==-->
                    <div class="contact-info-item">
                        <h4>E-mail</h4>
                        <div class="content">
                            <a href="mailto://demo@example.com">demo@example.com</a>
                            <a href="mailto://example@demo.info">example@demo.info</a>
                        </div>
                    </div>
                    <!--== End Contact Info Item ==-->
                </div>
                <div class="col-sm-6 col-md-4 mb-6">
                    <!--== Start Contact Info Item ==-->
                    <div class="contact-info-item">
                        <h4>Address</h4>
                        <div class="content">
                            <p>98 Winn St, Woburn, MA 01801, USA</p>
                        </div>
                    </div>
                    <!--== End Contact Info Item ==-->
                </div>
            </div>
        </div>
    </section>
    <!--== End Contact Info Area Wrapper ==-->

    <!--== Start Map Area Wrapper ==-->
    <section class="map-area section-space">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d802879.9165497769!2d144.83475730949783!3d-38.180874157285366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sbd!4v1636803638401!5m2!1sen!2sbd"></iframe>
        <h6 class="visually-hidden">Map Area</h6>
    </section>
    <!--== End Map Area Wrapper ==-->

</main>
@endsection
