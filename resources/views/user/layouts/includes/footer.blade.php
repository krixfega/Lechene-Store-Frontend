
  <aside class="aside-search-box-wrapper offcanvas offcanvas-top" data-bs-scroll="true" tabindex="-1" id="AsideOffcanvasSearch">
    <div class="offcanvas-header">
        <h5 class="d-none" id="offcanvasTopLabel">Aside Search</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">×</button>
    </div>
    <div class="offcanvas-body">
        <div class="container pt--0 pb--0">
            <div class="search-box-form-wrap">
                <div class="search-note">
                    <p>Start typing and press Enter to search</p>
                </div>
                <form action="#" method="post">
                    <div class="search-form position-relative">
                        <label for="search-input" class="visually-hidden">Search</label>
                        <input id="search-input" type="search" class="form-control" placeholder="Search entire store…">
                        <button class="search-button" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</aside>
<!--== End Aside Search Menu ==-->

<!--== Start Side Menu ==-->

<!--== Start Side Menu ==-->

  <footer class="footer-area">
            <!--== Start Footer Main ==-->
            <div class="footer-main">
                <div class="container">
                    <div class="row mb-n6">
                        <div class="col-sm-12 col-md-3 col-lg-3 mb-6">
                            <div class="widget-item">
                                <div class="widget-about">
                                    <a class="widget-logo" href="{{ url('/') }}">
                                        <img src="{{ asset('assets/img/Le_chene.png') }}" alt="Logo" width="153" height="30">
                                    </a>
                                    <p class="desc">Lechene  fashion is simply dummy text of the printing and typesetting industry.</p>
                                </div>
                                <div class="widget-social">
                                    <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a>
                                    <a href="https://www.linkedin.com/" target="_blank" rel="noopener"><i class="fa fa-linkedin"></i></a>
                                    <a href="https://www.twitter.com/" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 offset-lg-1 mb-6">
                            <div class="widget-item">
                                <h4 class="widget-title">Shop</h4>
                                <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetTitleId-1">Ecommerce</h4>
                                <div id="widgetTitleId-1" class="collapse widget-collapse-body">
                                    <ul class="widget-nav">
                                        <li><a href="{{ route('user.shop.index') }}">Products</a></li>
                                        <li><a href="{{ route('cart.show') }}">Your Cart</a></li>
                                        <li><a href="#">Your Order</a></li>
                                        <li><a href="#">Tracking</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 offset-lg-1 mb-6">
                            <div class="widget-item">
                                <h4 class="widget-title">Support</h4>
                                <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetTitleId-2">Support</h4>
                                <div id="widgetTitleId-2" class="collapse widget-collapse-body">
                                    <ul class="widget-nav">
                                        <li><a href="#">Help</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--== End Footer Main ==-->

            <!--== Start Footer Bottom ==-->
            <div class="footer-bottom">
                <div class="container pt-0 pb-0">
                    <div class="footer-bottom-content">
                        <!-- <a href="{{ route('user.shop.index') }}"><img src="{{ asset('assets/img/logos/visa.png') }}" alt="Image-HasTech"></a> -->
                        <p class="copyright">© 2023 lechenne.</p>
                </div>
            </div>
            <!--== End Footer Bottom ==-->
        </footer>
 <!-- Vendors JS -->

 <script src="{{ asset('shop/js/vendor/modernizr-3.11.7.min.js') }}"></script>
 <script src="{{ asset('shop/js/vendor/jquery-3.6.0.min.js') }}"></script>
 {{-- <script src="{{ asset('shop/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script> --}}
 <script src="{{ asset('shop/js/vendor/bootstrap.bundle.min.js') }}"></script>


 <!-- Plugins JS -->
 <script src="{{ asset('shop/js/plugins/swiper-bundle.min.js') }}"></script>
 <script src="{{ asset('shop/js/plugins/fancybox.min.js') }}"></script>
 <script src="{{ asset('shop/js/plugins/jquery.nice-select.min.js') }}"></script>




 <!-- Custom Main JS -->
 <script src="{{ asset('shop/js/main.js') }}"></script>
