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
                                <h6>Fashion Booking</h6>
                            </div>
                            <div class="p-1">
                                <a href="{{ route('booking.create') }}"
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
                                                #</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                fabric
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                name
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                phone</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                address</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                qty</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                price</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                status</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                pickup Date</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Created Date</th>
                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                            @if (Auth::user()->role == 'Admin')
                                                <th class="text-secondary opacity-7"></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fashionbookings as $book)
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

                                                                {{ $book->booking_no }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        {{ $book->fabric->name }}
                                                    </p>
                                                    {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        {{ $book->fullName }}
                                                    </p>
                                                    {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        {{ $book->phoneNumber }}
                                                    </p>
                                                    {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        {{ $book->address }}
                                                    </p>
                                                    {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        {{ $book->qty }}
                                                    </p>
                                                    {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        {{ $book->fabric->selling_price }}
                                                    </p>
                                                    {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                                </td>
                                                <td>
                                                    <p
                                                        class="text-xs font-weight-bold mb-0 {{ $book->bookingStatus == 'pending' ? 'text-warning' : ($book->bookingStatus == 'approved' ? 'text-primary' : 'text-danger') }}">
                                                        {{ $book->bookingStatus }}
                                                    </p>
                                                    {{-- <p class="text-xs text-secondary mb-0 text-secondary">Organization</p> --}}
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 text-secondary">
                                                        {{ $book->pickupDate }}

                                                    </p>
                                                </td>
                                                <td>
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ date('Y-m-d', strtotime($book->created_at)) }}

                                                    </span>
                                                </td>
                                                {{-- <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">

                                                </a>
                                            </td> --}}
                                            <td class="align-middle">
                                                <a href="{{route('booking.invoice',$book->id)}}" class="text-success font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="download booking">
                                                    <i class="fa fa-download"></i>Download
                                                </a>
                                            </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('booking.edit', $book->id) }}"
                                                        class="text-success font-weight-bold text-xs" data-toggle="tooltip"
                                                        data-original-title="Edit Product">
                                                        <i class="fa fa-pen"></i>Edit
                                                    </a>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('booking.show', $book->id) }}"
                                                        class="text-success font-weight-bold text-xs" data-toggle="tooltip"
                                                        data-original-title="View More">
                                                        <i class="fa fa-eye"></i>View
                                                    </a>
                                                </td>
                                                @if (Auth::user()->role == 'Admin')
                                                    <td class="align-middle">
                                                        <form action="{{ route('booking.destroy', $book->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="text-danger  border-0 font-weight-bold text-xs"
                                                                data-toggle="tooltip" data-original-title="Delete user">
                                                                <i class="fa fa-trash"></i>Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                @endif


                                            </tr>
                                        @endforeach
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
