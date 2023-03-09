 
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
<aside class="aside-side-menu-wrapper off-canvas-area offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions">
    <div class="offcanvas-header" data-bs-dismiss="offcanvas">
        <h5>Menu</h5>
        <button type="button" class="btn-close">×</button>
    </div>
    <div class="offcanvas-body">
        <!-- Start Mobile Menu Wrapper -->
        <div class="res-mobile-menu">
            <nav id="offcanvasNav" class="offcanvas-menu">
                <ul>
                    <li><a href="javascript:void(0)">Home</a>
                        <ul>
                            <li><a href="index.html">Home One</a></li>
                            <li><a href="index-two.html">Home Two</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)">Shop</a>
                        <ul>
                            <li><a href="javascript:void(0)">Shop Layout</a>
                                <ul>
                                    <li><a href="shop.html">Shop 3 Column</a></li>
                                    <li><a href="shop-four-columns.html">Shop 4 Column</a></li>
                                    <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                    <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Single Product</a>
                                <ul>
                                    <li><a href="shop-single-product.html">Single Product Normal</a></li>
                                    <li><a href="shop-single-product-variable.html">Single Product Variable</a></li>
                                    <li><a href="shop-single-product-group.html">Single Product Group</a></li>
                                    <li><a href="shop-single-product-affiliate.html">Single Product Affiliate</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)">Others Pages</a>
                                <ul>
                                    <li><a href="shop-cart.html">Shopping Cart</a></li>
                                    <li><a href="shop-checkout.html">Checkout</a></li>
                                    <li><a href="shop-wishlist.html">Wishlist</a></li>
                                    <li><a href="shop-compare.html">Compare</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)">Pages</a>
                        <ul>
                            <li><a href="about-us.html">About</a></li>
                            <li><a href="account.html">Account</a></li>
                            <li><a href="login-register.html">Login/Register</a></li>
                            <li><a href="page-not-found.html">Page Not Found</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)">Blog</a>
                        <ul>
                            <li><a href="blog.html">Blog Grid</a></li>
                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                            <li><a href="blog-details-left-sidebar.html">Blog Details Left Sidebar</a></li>
                            <li><a href="blog-details-right-sidebar.html">Blog Details Right Sidebar</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
        <!-- End Mobile Menu Wrapper -->
    </div>
</aside>
<!--== Start Side Menu ==-->

 
 <!-- Vendors JS -->

 <script src="{{ asset('shop/js/vendor/modernizr-3.11.7.min.js') }}"></script>
 <script src="{{ asset('shop/js/vendor/jquery-3.6.0.min.js') }}"></script>
 <script src="{{ asset('shop/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
 <script src="{{ asset('shop/js/vendor/bootstrap.bundle.min.js') }}"></script>


 <!-- Plugins JS -->
 <script src="{{ asset('shop/js/plugins/swiper-bundle.min.js') }}"></script>
 <script src="{{ asset('shop/js/plugins/fancybox.min.js') }}"></script>
 <script src="{{ asset('shop/js/plugins/jquery.nice-select.min.js') }}"></script>




 <!-- Custom Main JS -->
 <script src="{{ asset('shop/js/main.js') }}"></script>
