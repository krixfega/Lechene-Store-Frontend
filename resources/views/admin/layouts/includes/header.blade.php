<div class="min-height-300 bg-gradient-dark position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="{{asset('assets/img/Le_chene.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bolder text-la">LE CHENE</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="{{url('/admin')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{url('admin/customers')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Customers Management</span>
          </a>
        </li>
        <li class="nav-item dropdown position-relative" id=" ">
            <span class="nav-link dropdown-toggle"  id="BookingDropdown" role="button"  data-bs-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-image text-danger text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1" data-bs-dismiss="modal">Staff Management</span>
            </span>
            <div class="dropdown-menu bg-secondary text-white mt-0 " aria-labelledby="StaffDropdown">
              <a class="dropdown-item" href="{{url('admin/staffs')}}">All Staffs</a>
              @if(Auth::user()->role == 'Admin')
              <a class="dropdown-item" href="{{url('admin/staffs/create')}}">Create Staff</a>
              @endif
            </div>
          </li>
        <li class="nav-item dropdown position-relative" id=" ">
            <span class="nav-link dropdown-toggle"  id="BookingDropdown" role="button"  data-bs-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-image text-secondary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1" data-bs-dismiss="modal">Tailor Management</span>
            </span>
            <div class="dropdown-menu bg-secondary text-white mt-0 " aria-labelledby="StaffDropdown">
              <a class="dropdown-item" href="{{route('tailor.index')}}">index</a>
              {{-- <a class="dropdown-item" href="{{url('')}}">Create Tailors</a> --}}
              <a class="dropdown-item" href="{{route('tailor.create')}}">Assign Tailors</a>

            </div>
          </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('account.index')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-money-coins text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Account Management</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{url('admin/products')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-basket text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Shop Management</span>
          </a>
        </li>
        <li class="nav-item dropdown position-relative" id=" ">
            <span class="nav-link dropdown-toggle"  id="StaffDropdown" role="button"  data-bs-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-basket text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1" data-bs-dismiss="modal">Point Of Sales</span>
            </span>
            <div class="dropdown-menu bg-secondary  mt-0 " aria-labelledby="StaffDropdown">
              <a class="dropdown-item "  href="{{route('shop.index')}}">Shop</a>
              <a class="dropdown-item"  href="{{route('orders.index')}}">Orders</a>
              <a class="dropdown-item"  href="{{route('orders.history')}}">History</a>
            </div>
        </li>


        <li class="nav-item dropdown position-relative" id=" ">
            <span class="nav-link dropdown-toggle"  id="StaffDropdown" role="button"  data-bs-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-image text-danger text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1" data-bs-dismiss="modal">Booking</span>
            </span>
            <div class="dropdown-menu bg-secondary  mt-0 " aria-labelledby="StaffDropdown">
              <a class="dropdown-item "  href="{{route('booking.index')}}">All Bookings</a>
              <a class="dropdown-item"  href="{{route('booking.create')}}">Create Booking</a>
              <a class="dropdown-item"  href="{{route('booking.history')}}">Booking History </a>
            </div>
        </li>





        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">.
          <a class="nav-link " href="{{route('admin.profile')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link " href="../pages/sign-in.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/sign-up.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li> --}}
      </ul>
    </div>

  </aside>
