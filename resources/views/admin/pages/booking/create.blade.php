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
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
                            <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="fabrics_id">Fabrics</label>
                                    <select class="form-control @error('fabrics_id') is-invalid @enderror" id="fabrics_id"
                                        name="fabrics_id" required>
                                        @foreach ($fabrics as $fabric)
                                            <option value="{{ $fabric->id }}">{{ $fabric->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('fabrics_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="fullName">Full Name (*required)</label>
                                    <input type="text" required
                                        class="form-control @error('fullName') is-invalid @enderror" id="fullName"
                                        name="fullName" required>
                                    @error('fullName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phoneNumber">Phone Number(*required)</label>
                                    <input type="text" required
                                        class="form-control @error('phoneNumber') is-invalid @enderror" id="phoneNumber"
                                        name="phoneNumber" required>
                                    @error('phoneNumber')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Address(*required)</label>
                                    <input type="text" required
                                        class="form-control @error('address') is-invalid @enderror" id="address"
                                        name="address" required>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email (*required)</label>
                                    <input type="email" required class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="qty">Quantity (*required)</label>
                                    <input type="number" required class="form-control @error('qty') is-invalid @enderror"
                                        id="qty" name="qty" required>
                                    @error('qty')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pickupDate">Pickup Date (*required)</label>
                                    <input type="date" required
                                        class="form-control @error('pickupDate') is-invalid @enderror" id="pickupDate"
                                        name="pickupDate" required>
                                    @error('pickupDate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" id="gender"
                                        name="gender" required>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                        <label for="neck">Neck</label>
                                        <input type="text" class="form-control @error('neck') is-invalid @enderror"
                                            id="neck" name="neck">
                                        @error('neck')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="shoulder">Shoulder</label>
                                        <input type="text" class="form-control @error('shoulder') is-invalid @enderror"
                                            id="shoulder" name="shoulder">
                                        @error('shoulder')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="frontArc">Front Arc</label>
                                        <input type="text"
                                            class="form-control @error('frontArc') is-invalid @enderror"
                                            name="frontArc" value="{{ old('frontArc') }}" required>
                                        @error('frontArc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                     <div class="form-group">
                                        <label for="waist">Waist</label>
                                        <input type="text" class="form-control @error('waist') is-invalid @enderror"
                                            id="waist" name="waist">
                                        @error('waist')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="hip">Hip</label>
                                        <input type="text" class="form-control @error('hip') is-invalid @enderror"
                                            id="hip" name="hip">
                                        @error('hip')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="topLength">Top Length</label>
                                        <input type="text"
                                            class="form-control @error('topLength') is-invalid @enderror"
                                            name="topLength" value="{{ old('topLength') }}" required>
                                        @error('topLength')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="trouserLength">Trouser Length</label>
                                        <input type="text"
                                            class="form-control @error('trouserLength') is-invalid @enderror"
                                            name="trouserLength" value="{{ old('trouserLength') }}" required>
                                        @error('trouserLength')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="armHole">Arm Hole</label>
                                        <input type="text"
                                            class="form-control @error('armHole') is-invalid @enderror" name="armHole"
                                            value="{{ old('armHole') }}" required>
                                        @error('armHole')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="roundSleeve">Round Sleeve</label>
                                        <input type="text"
                                            class="form-control @error('roundSleeve') is-invalid @enderror"
                                            name="roundSleeve" value="{{ old('roundSleeve') }}" required>
                                        @error('roundSleeve')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                     <div class="form-group">
                                        <label for="thigh">Thigh</label>
                                        <input type="text" class="form-control @error('thigh') is-invalid @enderror"
                                            id="thigh" name="thigh">
                                        @error('thigh')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="knee">Knee</label>
                                        <input type="text" class="form-control @error('knee') is-invalid @enderror"
                                            id="knee" name="knee">
                                        @error('knee')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="crotch">Crotch</label>
                                        <input type="text" class="form-control @error('crotch') is-invalid @enderror"
                                            id="crotch" name="crotch">
                                        @error('crotch')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                <!-- Female other measurement fields -->
                                <div id="female-form" style="display: none;">

                                    <div class="form-group">
                                        <label for="offShoulder">Off Shoulder</label>
                                        <input type="text"
                                            class="form-control @error('offShoulder') is-invalid @enderror"
                                            id="offShoulder" name="offShoulder">
                                        @error('offShoulder')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="upperBust">Upper Bust</label>
                                        <input type="text" class="form-control @error('upperBust') is-invalid @enderror"
                                            id="upperBust" name="upperBust">
                                        @error('upperBust')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="bust">Bust</label>
                                        <input type="text" class="form-control @error('bust') is-invalid @enderror"
                                            id="bust" name="bust">
                                        @error('bust')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="N_N">N-N</label>
                                        <input type="text" class="form-control @error('N_N') is-invalid @enderror"
                                            id="N_N" name="N_N">
                                        @error('N_N')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="underBust">Under Bust</label>
                                        <input type="text"
                                            class="form-control @error('underBust') is-invalid @enderror" id="underBust"
                                            name="underBust">
                                        @error('underBust')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="bustPoint">Bust Point</label>
                                        <input type="text"
                                            class="form-control @error('bustPoint') is-invalid @enderror" id="bustPoint"
                                            name="bustPoint">
                                        @error('bustPoint')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="halfLength">Half Length </label>
                                        <input type="text"
                                            class="form-control @error('halfLength') is-invalid @enderror"
                                            id="halfLength" name="halfLength">
                                        @error('halfLength')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="halfLengthBack">Half Length Back </label>
                                        <input type="text"
                                            class="form-control @error('halfLengthBack') is-invalid @enderror"
                                            id="halfLengthBack" name="halfLengthBack">
                                        @error('halfLengthBack')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="highWaist">HighWaist</label>
                                        <input type="text"
                                            class="form-control @error('highWaist') is-invalid @enderror" id="highWaist"
                                            name="highWaist">
                                        @error('highWaist')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="shoulderToKnee">Shoulder To Knee</label>
                                        <input type="text"
                                            class="form-control @error('shoulderToknee') is-invalid @enderror"
                                            id="shoulderToKnee" name="shoulderToKnee">
                                        @error('shoulderToKnee')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="shoulderToHip">Shoulder To Hip</label>
                                        <input type="text"
                                            class="form-control @error('shoulderToHip') is-invalid @enderror"
                                            id="shoulderToHip" name="shoulderToHip">
                                        @error('shoulderToHip')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="fullLength">Full Length</label>
                                        <input type="text"
                                            class="form-control @error('fullLength') is-invalid @enderror"
                                            id="fullLength" name="fullLength">
                                        @error('fullLength')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="dressLength">Dress Length</label>
                                        <input type="text"
                                            class="form-control @error('dressLength') is-invalid @enderror"
                                            id="dressLength" name="dressLength">
                                        @error('dressLength')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="sleeveLength"> Sleeve Length</label>
                                        <input type="text"
                                            class="form-control @error('sleeveLength') is-invalid @enderror"
                                            id="sleeveLength" name="sleeveLength">
                                        @error('sleeveLength')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="calf">Calf</label>
                                        <input type="text" class="form-control @error('calf') is-invalid @enderror"
                                            id="calf" name="calf">
                                        @error('calf')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- male measurement fields --}}
                                <div id="male-form" style="display:block;">



                                    <div class="form-group">
                                        <label for="chest">Chest</label>
                                        <input type="text" class="form-control @error('chest') is-invalid @enderror"
                                            name="chest" value="{{ old('chest') }}" required>
                                        @error('chest')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="stomach">Stomach</label>
                                        <input type="text" class="form-control @error('stomach') is-invalid @enderror"
                                            name="stomach" value="{{ old('stomach') }}" required>
                                        @error('stomach')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="topHip">Top Hip</label>
                                        <input type="text" class="form-control @error('topHip') is-invalid @enderror"
                                            name="topHip" value="{{ old('topHip') }}" required>
                                        @error('topHip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="biceps">Biceps</label>
                                        <input type="text" class="form-control @error('biceps') is-invalid @enderror"
                                            name="biceps" value="{{ old('biceps') }}" required>
                                        @error('biceps')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="sleeve">Sleeve</label>
                                        <input type="text" class="form-control @error('sleeve')is-invalid @enderror"
                                            name="sleeve" value="{{ old('sleeve') }}" required>
                                        @error('sleeve')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="waistToKnee">Waist to Knee</label>
                                        <input type="text"
                                            class="form-control @error('waistToKnee') is-invalid @enderror"
                                            name="waistToKnee" value="{{ old('waistToKnee') }}" required>
                                        @error('waistToKnee')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label for="desc">Style Description</label>
                                    <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc"></textarea>
                                    @error('desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="images">Style images:</label>
                                    <input type="file" required name="images[]"
                                        class="form-control @error('images') is-invalid @enderror" multiple>
                                    @error('images')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
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
        const genderSelect = document.querySelector('#gender');
        const maleForm = document.querySelector('#male-form');
        const femaleForm = document.querySelector('#female-form');

        genderSelect.addEventListener('change', function() {
            if (this.value === 'male') {
                maleForm.style.display = 'block';
                femaleForm.style.display = 'none';
            } else {
                maleForm.style.display = 'none';
                femaleForm.style.display = 'block';
            }
        });
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    {{-- <script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script> --}}
@endsection
