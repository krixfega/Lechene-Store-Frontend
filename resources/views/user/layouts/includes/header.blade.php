 <!--== Start Header Wrapper ==-->
 <header class="header-area">
     <div class="container">
         <div class="row align-items-center justify-content-between">
             <div class="col-auto">
                 <div class="header-logo">
                     <a href="{{ url('/') }}">
                         <img class="logo-main" src="{{ asset('assets/img/Le_chene.png') }}" width="100" height="20"
                             alt="Logo">
                     </a>
                 </div>
             </div>
             <div class="col-auto d-none d-lg-block">
                 <div class="header-navigation">
                     <ul class="main-nav">
                         <li class=""><a href="{{ url('/') }}">Home</a>

                         </li>
                         <li class=""><a href="{{ route('user.shop.index') }}">Shop</a>

                         </li>
                         <li class=""><a href="{{ route('user.bespoke.index') }}">Bespoke</a>

                         </li>

                         <li class="has-submenu"><a href="#">Pages</a>
                             <ul class="submenu-nav">
                                 <li><a href="{{ route('about') }}">About</a></li>
                                 <li><a href="{{ route('contact') }}">Contact</a></li>
                             </ul>
                         </li>
                     </ul>
                 </div>
             </div>
             <div class="col-auto">

                 <div class="header-action">
                     <form class="header-search-box d-none d-md-block" method="post" action="{{route('search')}}">
                     @csrf
                         <input class="form-control" type="search" id="search-input" required name="search" placeholder="Search products">
                         <button type="submit" class="btn-src">
                             <i class="fa fa-search"></i>
                         </button>
                     </form>
                    <ul class="main-nav">
                        @auth
                        <li class="has-submenu"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="18" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                          </svg> </a>
                            <ul class="submenu-nav">

                                <li><a href="{{ route('user.account.index') }}">profile</a></li>
                                <li>
                                    <a class=""href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                                        Logout</a>

                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                {{-- <li><a href="page-not-found.html">Page Not Found</a></li> --}}

                            </ul>
                        </li>
                    @else
                        <li class="has-submenu m-0"><a href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="21" height="18" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                          </svg> </a>
                            <ul class="submenu-nav">

                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                                {{-- <li><a href="page-not-found.html">Page Not Found</a></li> --}}

                            </ul>
                        </li>

                    @endauth
                    <li class="">
                        <a href="{{ route('cart.show') }}" class="header-action-cart" type="button"
                         > <span id="cart-count">0</span>Items
                         <span class="cart-icon">
                             <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M10 8H12V5H15V3H12V0H10V3H7V5H10V8ZM6 17C5.46957 17 4.96086 17.2107 4.58579 17.5858C4.21071 17.9609 4 18.4696 4 19C4 19.5304 4.21071 20.0391 4.58579 20.4142C4.96086 20.7893 5.46957 21 6 21C6.53043 21 7.03914 20.7893 7.41421 20.4142C7.78929 20.0391 8 19.5304 8 19C8 18.4696 7.78929 17.9609 7.41421 17.5858C7.03914 17.2107 6.53043 17 6 17ZM16 17C15.4696 17 14.9609 17.2107 14.5858 17.5858C14.2107 17.9609 14 18.4696 14 19C14 19.5304 14.2107 20.0391 14.5858 20.4142C14.9609 20.7893 15.4696 21 16 21C16.5304 21 17.0391 20.7893 17.4142 20.4142C17.7893 20.0391 18 19.5304 18 19C18 18.4696 17.7893 17.9609 17.4142 17.5858C17.0391 17.2107 16.5304 17 16 17ZM6.17 13.75L6.2 13.63L7.1 12H14.55C15.3 12 15.96 11.59 16.3 10.97L20.16 3.96L18.42 3H18.41L17.31 5L14.55 10H7.53L7.4 9.73L5.16 5L4.21 3L3.27 1H0V3H2L5.6 10.59L4.25 13.04C4.09 13.32 4 13.65 4 14C4 14.5304 4.21071 15.0391 4.58579 15.4142C4.96086 15.7893 5.46957 16 6 16H18V14H6.42C6.29 14 6.17 13.89 6.17 13.75Z" />
                             </svg>
                         </span>
                        </a>
                    </li>
                    </ul>
                     <button class="btn-search-menu d-md-none" type="button" data-bs-toggle="offcanvas"
                         data-bs-target="#AsideOffcanvasSearch" aria-controls="AsideOffcanvasSearch">
                         <span class="search-icon">
                             <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M12.5 11H11.71L11.43 10.73C12.41 9.59 13 8.11 13 6.5C13 2.91 10.09 0 6.5 0C2.91 0 0 2.91 0 6.5C0 10.09 2.91 13 6.5 13C8.11 13 9.59 12.41 10.73 11.43L11 11.71V12.5L16 17.49L17.49 16L12.5 11ZM6.5 11C4.01 11 2 8.99 2 6.5C2 4.01 4.01 2 6.5 2C8.99 2 11 4.01 11 6.5C11 8.99 8.99 11 6.5 11Z" />
                             </svg>
                         </span>
                     </button>
                     <button class="btn-menu d-lg-none" type="button" data-bs-toggle="offcanvas"
                         data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                         <i class="fa fa-bars"></i>
                     </button>
                 </div>
             </div>
         </div>
     </div>
 </header>
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
                   <li class=""><a href="{{ url('/') }}">Home</a></li>


                   <li class=""><a href="{{ route('user.shop.index') }}">Shop</a>

                         </li>
                         @auth
                             <li class="has-submenu"><a href="#">{{ Auth::user()->name }}</a>
                                 <ul class="submenu-nav">

                                     <li><a href="#">profile</a></li>
                                     <li>
                                         <a class=""href="{{ route('logout') }}"
                                             onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                                             Logout</a>

                                     </li>

                                     <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                         style="display: none;">
                                         @csrf
                                     </form>
                                     {{-- <li><a href="page-not-found.html">Page Not Found</a></li> --}}

                                 </ul>
                             </li>
                         @else
                             <li class="has-submenu"><a href="#">Account</a>
                                 <ul class="submenu-nav">

                                     <li><a href="{{ route('login') }}">Login</a></li>
                                     <li><a href="{{ route('register') }}">Register</a></li>
                                     {{-- <li><a href="page-not-found.html">Page Not Found</a></li> --}}

                                 </ul>
                             </li>

                         @endauth
                         <li class="has-submenu"><a href="#">Pages</a>
                             <ul class="submenu-nav">
                                 <li><a href="about-us.html">About</a></li>
                                 <li><a href="contact.html">Contact</a></li>
                             </ul>
                         </li>
                </ul>
            </nav>
        </div>
        <!-- End Mobile Menu Wrapper -->
    </div>
</aside>
 <!--== End Header Wrapper ==-->
