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
                                <h6>Create Booking</h6>
                            </div>
                            <div class="p-1">
                                <a href="{{ route('booking.index') }}"
                                    class="btn btn-link bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">All Booking</h6>
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
                            <form action="{{ route('booking.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="fabrics_id">Fabrics</label>
                                    <select class="form-control @error('fabrics_id') is-invalid @enderror" id="fabrics_id" name="fabrics_id" required>
                                        @foreach($fabrics as $fabric)
                                            <option value="{{ $fabric->id }}">{{ $fabric->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('fabrics_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="fullname">Full Name (*required)</label>
                                    <input type="text" required class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" required>
                                    @error('fullname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phoneNumber">Phone Number(*required)</label>
                                    <input type="text" required class="form-control @error('phoneNumber') is-invalid @enderror" id="phoneNumber" name="phoneNumber" required>
                                    @error('phoneNumber')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Address(*required)</label>
                                    <input type="text"  required class="form-control @error('address') is-invalid @enderror" id="address" name="address" required>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email (*required)</label>
                                    <input type="email" required class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="qty">Quantity (*required)</label>
                                    <input type="number" required class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" required>
                                    @error('qty')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="pickupDate">Pickup Date (*required)</label>
                                    <input type="date"  required class="form-control @error('pickupDate') is-invalid @enderror" id="pickupDate" name="pickupDate" required>
                                    @error('pickupDate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- All other measurement fields -->


                                <div class="form-group">
                                    <label for="order">Order</label>
                                    <input type="text" class="form-control @error('order') is-invalid @enderror" id="order" name="order">
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bustFrontArc">Bust Front Arc</label>
                                    <input type="text" class="form-control @error('bustFrontArc') is-invalid @enderror" id="bustFrontArc" name="bustFrontArc">
                                    @error('bustFrontArc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                         </div>
                                        <div class="form-group">
                                            <label for="bustBackArc">Bust Back Arc</label>
                                            <input type="text" class="form-control @error('bustBackArc') is-invalid @enderror" id="bustBackArc" name="bustBackArc">
                                            @error('bustBackArc')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                <div class="form-group">
                                    <label for="corsetLength">Corset Length</label>
                                    <input type="text" class="form-control @error('corsetLength') is-invalid @enderror" id="corsetLength" name="corsetLength">
                                    @error('corsetLength')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="3/4_length">3/4 Length</label>
                                    <input type="text" class="form-control @error('3/4_length') is-invalid @enderror" id="3/4_length" name="Length3_4">
                                    @error('3/4_length')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- All other fields -->


                                <div class="form-group">
                                    <label for="shortSleeveElbow">Short Sleeve Elbow</label>
                                    <input type="text" class="form-control @error('shortSleeveElbow') is-invalid @enderror" id="shortSleeveElbow" name="shortSleeveElbow">
                                    @error('shortSleeveElbow')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="shortSleeveRoundElbow">Short Sleeve Round Elbow</label>
                                    <input type="text" class="form-control @error('shortSleeveRoundElbow') is-invalid @enderror" id="shortSleeveRoundElbow" name="shortSleeveRoundElbow">
                                    @error('shortSleeveRoundElbow')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="shortSleeveFullSleeveLength">Short Sleeve Full Sleeve Length</label>
                                    <input type="text" class="form-control @error('shortSleeveFullSleeveLength') is-invalid @enderror" id="shortSleeveFullSleeveLength" name="shortSleeveFullSleeveLength">
                                    @error('shortSleeveFullSleeveLength')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="neck">Neck</label>
                                    <input type="text" class="form-control @error('neck') is-invalid @enderror" id="neck" name="neck">
                                    @error('neck')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="shoulder">Shoulder</label>
                                    <input type="text" class="form-control @error('shoulder') is-invalid @enderror" id="shoulder" name="shoulder">
                                    @error('shoulder')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="OffShoulder">Off Shoulder</label>
                                    <input type="text" class="form-control @error('OffShoulder') is-invalid @enderror" id="OffShoulder" name="OffShoulder">
                                    @error('OffShoulder')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="upperBust">Upper Bust</label>
                                    <input type="text" class="form-control @error('upperBust') is-invalid @enderror" id="upperBust" name="upperBust">
                                    @error('upperBust')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="bust">Bust</label>
                                    <input type="text" class="form-control @error('bust') is-invalid @enderror" id="bust" name="bust">
                                    @error('bust')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="underBust">Under Bust</label>
                                    <input type="text" class="form-control @error('underBust') is-invalid @enderror" id="underBust" name="underBust">
                                    @error('underBust')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bustPoint">Bust Point</label>
                                    <input type="text" class="form-control @error('bustPoint') is-invalid @enderror" id="bustPoint" name="bustPoint">
                                    @error('bustPoint')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="N-N">N-N</label>
                                    <input type="text" class="form-control @error('N-N') is-invalid @enderror" id="N-N" name="N_N">
                                    @error('N-N')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="acrossF/B">Across F/B</label>
                                    <input type="text" class="form-control @error('acrossF/B') is-invalid @enderror" id="acrossF/B" name="acrossF_B">
                                    @error('acrossF/B')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="halfLengthF/B">Half Length F/B</label>
                                    <input type="text" class="form-control @error('halfLengthF/B') is-invalid @enderror" id="halfLengthF/B" name="halfLengthF_B">
                                    @error('halfLengthF/B')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="topLength">Top Length</label>
                                    <input type="text" class="form-control @error('topLength') is-invalid @enderror" id="topLength" name="topLength">
                                    @error('topLength')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="waist/highwaist">Waist/Highwaist</label>
                                    <input type="text" class="form-control @error('waist/highwaist') is-invalid @enderror" id="waist/highwaist" name="waist_highwaist">
                                    @error('waist/highwaist')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="hip/hipLength">Hip/Hip Length</label>
                                    <input type="text" class="form-control @error('hip/hipLength') is-invalid @enderror" id="hip/hipLength" name="hip_hipLength">
                                    @error('hip/hipLength')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="thigh/knee/ankle">Thigh/Knee/Ankle</label>
                                    <input type="text" class="form-control @error('thigh/knee/ankle') is-invalid @enderror" id="thigh/knee/ankle" name="thigh_knee_ankle">
                                    @error('thigh/knee/ankle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>






                                <div class="form-group">
                                    <label for="kneeCircumfrence">Knee Circumference</label>
                                    <input type="text" class="form-control @error('kneeCircumfrence') is-invalid @enderror" id="kneeCircumfrence" name="kneeCircumfrence">
                                    @error('kneeCircumfrence')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="shoulderToHip/knee">Shoulder to Hip/Knee</label>
                                    <input type="text" class="form-control @error('shoulderToHip/knee') is-invalid @enderror" id="shoulderToHip/knee" name="shoulderToHip_knee">
                                    @error('shoulderToHip/knee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="waistToknee">Waist to Knee</label>
                                    <input type="text" class="form-control @error('waistToknee') is-invalid @enderror" id="waistToknee" name="waistToknee">
                                    @error('waistToknee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="armhole/hicep">Armhole/Hicep</label>
                                    <input type="text" class="form-control @error('armhole/hicep') is-invalid @enderror" id="armhole/hicep" name="armhole_hicep">
                                    @error('armhole/hicep')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="sleeve">Sleeve</label>
                                    <input type="text" class="form-control @error('sleeve') is-invalid @enderror" id="sleeve" name="sleeve">
                                    @error('sleeve')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="roundSleeve">Round Sleeve</label>
                                    <input type="text" class="form-control @error('roundSleeve') is-invalid @enderror" id="roundSleeve" name="roundSleeve">
                                    @error('roundSleeve')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="wrist">Wrist</label>
                                    <input type="text" class="form-control @error('wrist') is-invalid @enderror" id="wrist" name="wrist">
                                    @error('wrist')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="trouserLength">Trouser Length</label>
                                    <input type="text" class="form-control @error('trouserLength') is-invalid @enderror" id="trouserLength" name="trouserLength">
                                    @error('trouserLength')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fullLength">Full Length</label>
                                    <input type="text" class="form-control @error('fullLength') is-invalid @enderror" id="fullLength" name="fullLength">
                                    @error('fullLength')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="dressLength">Dress Length</label>
                                    <input type="text" class="form-control @error('dressLength') is-invalid @enderror" id="dressLength" name="dressLength">
                                    @error('dressLength')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="shirt/Trouser">Shirt/Trouser</label>
                                    <input type="text" class="form-control @error('shirt/Trouser') is-invalid @enderror" id="shirt/Trouser" name="shirt_Trouser">
                                    @error('shirt/Trouser')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="Length">Length</label>
                                    <input type="text" class="form-control @error('Length') is-invalid @enderror" id="Length" name="Length">
                                    @error('Length')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="RoundKnee">Round Knee</label>
                                    <input type="text" class="form-control @error('RoundKnee') is-invalid @enderror" id="RoundKnee" name="RoundKnee">
                                    @error('RoundKnee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="KneeLength">Knee Length</label>
                                    <input type="text" class="form-control @error('KneeLength') is-invalid @enderror" id="KneeLength" name="KneeLength">
                                    @error('KneeLength')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="waist/hips">Waist/Hips</label>
                                    <input type="text" class="form-control @error('waist/hips') is-invalid @enderror" id="waist/hips" name="waist_hips">
                                    @error('waist/hips')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="thigh">Thigh</label>
                                    <input type="text" class="form-control @error('thigh') is-invalid @enderror" id="thigh" name="thigh">
                                    @error('thigh')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="ankle">Ankle</label>
                                    <input type="text" class="form-control @error('ankle') is-invalid @enderror" id="ankle" name="ankle">
                                    @error('ankle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="crotchF/B">Crotch Front/Back</label>
                                    <input type="text" class="form-control @error('crotchF/B') is-invalid @enderror" id="crotchF/B" name="crotchF_B">
                                    @error('crotchF/B')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message">Comment</label>
                                    <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment"></textarea>
                                    @error('comment')
                                        <div class="invalid-feedback">{{ $comment }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create</button>
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
