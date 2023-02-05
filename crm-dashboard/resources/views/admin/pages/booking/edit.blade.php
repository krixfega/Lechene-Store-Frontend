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
                                <h6>Edit Fashion Booking</h6>
                            </div>
                            <div class="p-1">
                                <a href="{{ route('booking.index') }}"
                                    class="btn btn-link bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">All Bookings</h6>
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-2 pt-2 pb-2">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{url('admin/booking/'.$booking->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                <label for="fabrics_id">Fabric</label>
                                <select class="form-control @error('fabrics_id') is-invalid @enderror" id="fabrics_id" name="fabrics_id" required>
                                @foreach($fabrics as $fabric)
                                <option value="{{ $fabric->id }}" {{ $fabric->id == $booking->fabrics_id ? 'selected':'' }}>{{ $fabric->name }}</option>
                                @endforeach
                                </select>
                                @error('fabrics_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="fullname">Full Name(*required)</label>
                                <input type="text" required class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{ $booking->fullname }}" required>
                                @error('fullname')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="phoneNumber">Phone Number(*required)</label>
                                <input type="text" required class="form-control @error('phoneNumber') is-invalid @enderror" id="phoneNumber" name="phoneNumber" value="{{ $booking->phoneNumber }}" required>
                                @error('phoneNumber')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="address">Address(*required)</label>
                                <input type="text" required class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $booking->address }}" required>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="email">Email(*required)</label>
                                <input type="email" required class="form-control @error("email") is-invalid @enderror" id="email" name="email" value="{{ $booking->email }}" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="gender">Gender (*required)</label>
                                <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                                <option value="male" {{ $booking->gender == 'male' ? 'selected':'' }}>Male</option>
                                <option value="female" {{ $booking->gender == 'female' ? 'selected':'' }}>Female</option>
                                </select>
                                @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                @if(Auth::user()->role == 'Admin')
                                <div class="form-group">
                                <label for="qty">Quantity (*required)</label>
                                <input type="number"  required class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" value="{{ $booking->qty }}" required>
                                @error('qty')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                @endif
                                <div class="form-group">
                                <label for="pickupDate">Pickup Date (*required) </label>
                                <input type="date" required class="form-control @error('pickupDate') is-invalid @enderror" id="pickupDate" name="pickupDate" value="{{ $booking->pickupDate }}" required>
                                @error('pickupDate')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="booking_status">Booking Status (*required)</label>
                                <select class="form-control @error('booking_status') is-invalid @enderror" id="booking_status" name="booking_status">
                                <option value="pending" {{ $booking->booking_status == 'pending' ? 'selected':'' }}>Pending</option>
                                <option value="approved" {{ $booking->booking_status == 'approved' ? 'selected':'' }}>Approved</option>
                                <option value="rejected" {{ $booking->booking_status == 'rejected' ? 'selected':'' }}>Rejected</option>
                                </select>
                                @error('booking_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="comment">Comment</label>
                                <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="3">
                                    {{ $booking->comment }}
                                </textarea>
                                @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="order">Order</label>
                                    <input type="text" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $booking->order) }}">
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bustFrontArc">Bust Front Arc</label>
                                    <input type="text" class="form-control @error('bustFrontArc') is-invalid @enderror" id="bustFrontArc" name="bustFrontArc" value="{{ old('bustFrontArc', $booking->bustFrontArc) }}">
                                    @error('bustFrontArc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bustBackArc">Bust Back Arc</label>
                                    <input type="text" class="form-control @error('bustBackArc') is-invalid @enderror" id="bustBackArc" name="bustBackArc" value="{{ old('bustBackArc', $booking->bustBackArc) }}">
                                    @error('bustBackArc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="neck">Neck</label>
                                    <input type="text" class="form-control @error('neck') is-invalid @enderror" id="neck" name="neck" value="{{ old('neck', $booking->neck) }}">
                                    @error('neck')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="shoulder">Shoulder</label>
                                    <input type="text" class="form-control @error('shoulder') is-invalid @enderror" id="shoulder" name="shoulder" value="{{ old('shoulder', $booking->shoulder) }}">
                                    @error('shoulder')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="OffShoulder">Off Shoulder</label>
                                    <input type="text" class="form-control @error('OffShoulder') is-invalid @enderror" id="OffShoulder" name="OffShoulder" value="{{ old('OffShoulder', $booking->OffShoulder) }}">
                                    @error('OffShoulder')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="upperBust">Upper Bust</label>
                                    <input type="text" class="form-control @error('upperBust') is-invalid @enderror" id="upperBust" name="upperBust" value="{{ old('upperBust', $booking->upperBust) }}">
                                    @error('upperBust')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="bust">Bust</label>
                                    <input type="text" class="form-control @error('bust') is-invalid @enderror" id="bust" name="bust" value="{{ old('bust', $booking->bust) }}">
                                    @error('bust')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="underBust">Under Bust</label>
                                    <input type="text" class="form-control @error('underBust') is-invalid @enderror" id="underBust" name="underBust" value="{{ old('underBust', $booking->underBust) }}">
                                    @error('underBust')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="neck">Neck</label>
                                    <input type="text" class="form-control @error('neck') is-invalid @enderror" id="neck" name="neck" value="{{ old('neck', $booking->neck) }}">
                                    @error('neck')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="bustPoint">Bust Point</label>
                                    <input type="text" class="form-control @error('bustPoint') is-invalid @enderror" id="bustPoint" name="bustPoint" value="{{ old('bustPoint', $booking->bustPoint) }}">
                                    @error('bustPoint')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="kneeCircumference">Knee Circumference</label>
                                    <input type="text" class="form-control @error('kneeCircumference') is-invalid @enderror" id="kneeCircumference" name="kneeCircumference" value="{{ old('kneeCircumference', $booking->kneeCircumference) }}">
                                    @error('kneeCircumference')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="shoulderToHip_knee">Shoulder to Hip/Knee</label>
                                    <input type="text" class="form-control @error('shoulderToHip_knee') is-invalid @enderror" id="shoulderToHip_knee" name="shoulderToHip_knee" value="{{ old('shoulderToHip_knee', $booking->shoulderToHip_knee) }}">
                                    @error('shoulderToHip_knee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="waistToknee">Waist to Knee</label>
                                    <input type="text" class="form-control @error('waistToknee') is-invalid @enderror" id="waistToknee" name="waistToknee" value="{{ old('waistToknee', $booking->waistToknee) }}">
                                    @error('waistToknee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="armhole_hicep">Armhole/Hicep</label>
                                    <input type="text" class="form-control @error('armhole_hicep') is-invalid @enderror" id="armhole_hicep" name="armhole_hicep" value="{{ old('armhole_hicep', $booking->armhole_hicep) }}">
                                    @error('armhole_hicep')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="sleeve">Sleeve</label>
                                    <input type="text" class="form-control @error('sleeve') is-invalid @enderror" id="sleeve" name="sleeve" value="{{ old('sleeve', $booking->sleeve) }}">
                                    @error('sleeve')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="roundSleeve">Round Sleeve</label>
                                    <input type="text" class="form-control @error('roundSleeve') is-invalid @enderror" id="roundSleeve" value="{{ old('roundSleeve', $booking->roundSleeve) }}" name="roundSleeve" >
                                    @error('roundSleeve')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                  <div class="form-group">
                                    <label for="wrist">Wrist</label>
                                    <input type="text" class="form-control @error('wrist') is-invalid @enderror" id="wrist" value="{{ old('wrist', $booking->wrist) }}" name="wrist">
                                    @error('wrist')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="trouserLength">Trouser Length</label>
                                    <input type="text" class="form-control @error('trouserLength') is-invalid @enderror" id="trouserLength" value="{{ old('trouserLength', $booking->trouserLength) }}" name="trouserLength">
                                    @error('trouserLength')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fullLength">Full Length</label>
                                    <input type="text" class="form-control @error('fullLength') is-invalid @enderror" id="fullLength" value="{{ old('fullLength', $booking->fullLength) }}" name="fullLength">
                                    @error('fullLength')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="dressLength">Dress Length</label>
                                    <input type="text" class="form-control @error('dressLength') is-invalid @enderror" id="dressLength" value="{{ old('dressLength', $booking->dressLength) }}" name="dressLength">
                                    @error('dressLength')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="shirt/Trouser">Shirt/Trouser</label>
                                    <input type="text" class="form-control @error('shirt/Trouser') is-invalid @enderror" id="shirt/Trouser" value="{{ old('shirt_Trouser', $booking->shirt_Trouser) }}" name="shirt_Trouser">
                                    @error('shirt/Trouser')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="Length">Length</label>
                                    <input type="text" class="form-control @error('Length') is-invalid @enderror" id="Length" value="{{ old('Length', $booking->Length) }}" name="Length">
                                    @error('Length')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="RoundKnee">Round Knee</label>
                                    <input type="text" class="form-control @error('RoundKnee') is-invalid @enderror" id="RoundKnee" value="{{ old('RoundKnee', $booking->RoundKnee) }}" name="RoundKnee">
                                    @error('RoundKnee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="KneeLength">Knee Length</label>
                                    <input type="text" class="form-control @error('KneeLength') is-invalid @enderror" id="KneeLength" value="{{ old('KneeLength', $booking->KneeLength) }}" name="KneeLength">
                                    @error('KneeLength')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="waist/hips">Waist/Hips</label>
                                    <input type="text" class="form-control @error('waist/hips') is-invalid @enderror" id="waist/hips" value="{{ old('waist_hips', $booking->waist_hips) }}" name="waist_hips">
                                    @error('waist/hips')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="thigh">Thigh</label>
                                    <input type="text" class="form-control @error('thigh') is-invalid @enderror" id="thigh" value="{{ old('thigh', $booking->thigh) }}" name="thigh">
                                    @error('thigh')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="ankle">Ankle</label>
                                    <input type="text" class="form-control @error('ankle') is-invalid @enderror" id="ankle" value="{{ old('ankle', $booking->ankle) }}" name="ankle">
                                    @error('ankle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="crotchF/B">Crotch Front/Back</label>
                                    <input type="text" class="form-control @error('crotchF/B') is-invalid @enderror" id="crotchF/B" value="{{ old('crotchF_B', $booking->crotchF_B) }}" name="crotchF_B">
                                    @error('crotchF/B')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
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
    {{-- <script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script> --}}
@endsection
