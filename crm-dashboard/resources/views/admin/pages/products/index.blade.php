@extends('admin.layouts.app')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.includes.nav')
        <!-- End Navbar -->
        <div class="container-fluid py-4 box-shadow-10-10-20-0">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex flex-row justify-content-between align-items-center pb-0">
                            <div class="p-1">
                                <h6>Product Category Table</h6>
                            </div>
                            <div class="p-1">
                                <a href=""
                                    class="btn btn-link bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">Create</h6>
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive  p-0">
                                <table class="table w-full align-items-center mb-0" id="example4">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Email</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Address</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                DOB</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Phone</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date Joined</th>
                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        {{-- <div>
                                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div> --}}
                                                        <div class="d-flex flex-column justify-content-center">
                                                            {{-- <h6 class="mb-0 text-sm text-primary">John Michael</h6> --}}
                                                            <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                               </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        </p>
                                                    {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        </p>
                                                    {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        </p>
                                                    {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        </p>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold"></span>
                                                </td>
                                                {{-- <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">

                                                </a>
                                            </td> --}}
                                                <td class="align-middle">
                                                    <a href=""
                                                        class="text-success font-weight-bold text-xs" data-toggle="tooltip"
                                                        data-original-title="Edit user">
                                                       <i class="fa fa-pen"></i>
                                                    </a>
                                                </td>
                                                <td class="align-middle">
                                                    <form action=""
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-danger  border-0 font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Delete user">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>



                                            </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex flex-row justify-content-between align-items-center pb-0">
                            <div class="p-1">
                                <h6>Products Table</h6>
                            </div>
                            <div class="p-1">
                                <a href=""
                                    class="btn btn-link bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">Create</h6>
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive  p-0">
                                <table class="table w-full align-items-center mb-0" id="example3">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Email</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Address</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                DOB</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Phone</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date Joined</th>
                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        {{-- <div>
                                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div> --}}
                                                        <div class="d-flex flex-column justify-content-center">
                                                            {{-- <h6 class="mb-0 text-sm text-primary">John Michael</h6> --}}
                                                            <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                               </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        </p>
                                                    {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        </p>
                                                    {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        </p>
                                                    {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        </p>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold"></span>
                                                </td>
                                                {{-- <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">

                                                </a>
                                            </td> --}}
                                                <td class="align-middle">
                                                    <a href=""
                                                        class="text-success font-weight-bold text-xs" data-toggle="tooltip"
                                                        data-original-title="Edit user">
                                                       <i class="fa fa-pen"></i>
                                                    </a>
                                                </td>
                                                <td class="align-middle">
                                                    <form action=""
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-danger  border-0 font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Delete user">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>



                                            </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </main>
@endsection


@section('script')
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
@endsection
