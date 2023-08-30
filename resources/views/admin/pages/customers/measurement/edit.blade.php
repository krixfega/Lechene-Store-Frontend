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
                        {{-- header --}}
                        <div class="card-header d-flex flex-row justify-content-between align-items-center pb-0">
                            <div class="p-1">
                                <h6>Edit <strong class="text-primary">{{$measurement->users->email}} </strong>Measurement</h6>
                            </div>
                            <div class="p-1">
                                <a href="{{ route('customers.index') }}"
                                    class="btn btn-link bg-primary text-white  text-center">
                                    <h6 class="text-white text-center">All Customers</h6>
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

                            <form action="{{ route('measurement.update',$measurement->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-12">

                                        <select class="form-control @error('users_id') is-invalid @enderror" id="users_id"
                                            name="users_id" hidden required>

                                                <option value="{{ $measurement->users->id }}">{{ $measurement->users->email }}</option>

                                        </select>
                                        @error('users_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-12">
                                        <label for="gender">Gender</label>
                                        <select class="form-control @error('gender') is-invalid @enderror" id="gender"
                                            name="gender" required>
                                            <option value="male"  {{ $measurement->gender =='male'? 'selected' : ""}} >Male</option>
                                            <option value="female" {{ $measurement->gender =='female'? 'selected' : ""}}>Female</option>
                                        </select>
                                        @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                            <label for="neck">Neck</label>
                                            <input type="text" class="form-control @error('neck') is-invalid @enderror"
                                                id="neck" name="neck" value="{{$measurement->neck}}">
                                            @error('neck')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="shoulder">Shoulder</label>
                                        <input type="text" class="form-control @error('shoulder') is-invalid @enderror"
                                            id="shoulder" value="{{$measurement->shoulder}}"name="shoulder">
                                        @error('shoulder')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="frontArc">Front Arc</label>
                                        <input type="text"
                                            class="form-control @error('frontArc') is-invalid @enderror"
                                            value="{{$measurement->frontArc}}"name="frontArc" value="{{ old('frontArc') }}" required>
                                        @error('frontArc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                     <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="waist">Waist</label>
                                        <input type="text" class="form-control @error('waist') is-invalid @enderror"
                                            id="waist" value="{{$measurement->waist}}"name="waist">
                                        @error('waist')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="hip">Hip</label>
                                        <input type="text" class="form-control @error('hip') is-invalid @enderror"
                                            id="hip" value="{{$measurement->hip}}"name="hip">
                                        @error('hip')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="topLength">Top Length</label>
                                        <input type="text"
                                            class="form-control @error('topLength') is-invalid @enderror"
                                            value="{{$measurement->topLength}}"name="topLength" value="{{ old('topLength') }}" required>
                                        @error('topLength')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="trouserLength">Trouser Length</label>
                                        <input type="text"
                                            class="form-control @error('trouserLength') is-invalid @enderror"
                                            value="{{$measurement->trouserLength}}"name="trouserLength" value="{{ old('trouserLength') }}" required>
                                        @error('trouserLength')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="armHole">Arm Hole</label>
                                        <input type="text"
                                            class="form-control @error('armHole') is-invalid @enderror" value="{{$measurement->armHole}}"name="armHole"
                                            value="{{ old('armHole') }}" required>
                                        @error('armHole')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="roundSleeve">Round Sleeve</label>
                                        <input type="text"
                                            class="form-control @error('roundSleeve') is-invalid @enderror"
                                            value="{{$measurement->roundSleeve}}"name="roundSleeve" value="{{ old('roundSleeve') }}" required>
                                        @error('roundSleeve')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                     <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="thigh">Thigh</label>
                                        <input type="text" class="form-control @error('thigh') is-invalid @enderror"
                                            id="thigh" value="{{$measurement->thigh}}"name="thigh">
                                        @error('thigh')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="knee">Knee</label>
                                        <input type="text" class="form-control @error('knee') is-invalid @enderror"
                                            id="knee" value="{{$measurement->knee}}"name="knee">
                                        @error('knee')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-4">
                                        <label for="crotch">Crotch</label>
                                        <input type="text" class="form-control @error('crotch') is-invalid @enderror"
                                            id="crotch" value="{{$measurement->crotch}}"name="crotch">
                                        @error('crotch')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Female other measurement fields -->
                                <div id="female-form" style="display: none;">
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6 col-lg-4">
                                            <label for="offShoulder">Off Shoulder</label>
                                            <input type="text"
                                                class="form-control @error('offShoulder') is-invalid @enderror"
                                                id="offShoulder" value="{{$measurement->offShoulder}}"name="offShoulder">
                                            @error('offShoulder')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-4">
                                            <label for="upperBust">Upper Bust</label>
                                            <input type="text" class="form-control @error('upperBust') is-invalid @enderror"
                                                id="upperBust" value="{{$measurement->upperBust}}"name="upperBust">
                                            @error('upperBust')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-4">
                                            <label for="bust">Bust</label>
                                            <input type="text" class="form-control @error('bust') is-invalid @enderror"
                                                id="bust" value="{{$measurement->bust}}"name="bust">
                                            @error('bust')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-4">
                                            <label for="N_N">N-N</label>
                                            <input type="text" class="form-control @error('N_N') is-invalid @enderror"
                                                id="N_N" value="{{$measurement->N_N}}"name="N_N">
                                            @error('N_N')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-4">
                                            <label for="underBust">Under Bust</label>
                                            <input type="text"
                                                class="form-control @error('underBust') is-invalid @enderror" id="underBust"
                                                value="{{$measurement->underBust}}"name="underBust">
                                            @error('underBust')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>



                                            <div class="form-group col-12 col-md-6  col-lg-4" >
                                                <label for="bustPoint">Bust Point</label>
                                                <input type="text"
                                                    class="form-control @error('bustPoint') is-invalid @enderror" id="bustPoint"
                                                    value="{{$measurement->bustPoint}}"name="bustPoint">
                                                @error('bustPoint')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12 col-md-6  col-lg-4">
                                                <label for="halfLength">Half Length </label>
                                                <input type="text"
                                                    class="form-control @error('halfLength') is-invalid @enderror"
                                                    id="halfLength" value="{{$measurement->halfLength}}"name="halfLength">
                                                @error('halfLength')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12 col-md-6  col-lg-4">
                                                <label for="halfLengthBack">Half Length Back </label>
                                                <input type="text"
                                                    class="form-control @error('halfLengthBack') is-invalid @enderror"
                                                    id="halfLengthBack" value="{{$measurement->halfLengthBack}}"name="halfLengthBack">
                                                @error('halfLengthBack')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12 col-md-6  col-lg-4">
                                                <label for="highWaist">HighWaist</label>
                                                <input type="text"
                                                    class="form-control @error('highWaist') is-invalid @enderror" id="highWaist"
                                                    value="{{$measurement->highWaist}}"name="highWaist">
                                                @error('highWaist')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>


                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label for="shoulderToKnee">Shoulder To Knee</label>
                                                <input type="text"
                                                    class="form-control @error('shoulderToknee') is-invalid @enderror"
                                                    id="shoulderToKnee" value="{{$measurement->shoulderToKnee}}"name="shoulderToKnee">
                                                @error('shoulderToKnee')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label for="shoulderToHip">Shoulder To Hip</label>
                                                <input type="text"
                                                    class="form-control @error('shoulderToHip') is-invalid @enderror"
                                                    id="shoulderToHip" value="{{$measurement->shoulderToHip}}"name="shoulderToHip">
                                                @error('shoulderToHip')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label for="fullLength">Full Length</label>
                                                <input type="text"
                                                    class="form-control @error('fullLength') is-invalid @enderror"
                                                    id="fullLength" value="{{$measurement->fullLength}}"name="fullLength">
                                                @error('fullLength')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label for="dressLength">Dress Length</label>
                                                <input type="text"
                                                    class="form-control @error('dressLength') is-invalid @enderror"
                                                    id="dressLength" value="{{$measurement->dressLength}}"name="dressLength">
                                                @error('dressLength')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label for="sleeveLength"> Sleeve Length</label>
                                                <input type="text"
                                                    class="form-control @error('sleeveLength') is-invalid @enderror"
                                                    id="sleeveLength" value="{{$measurement->sleeveLength}}"name="sleeveLength">
                                                @error('sleeveLength')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-4">
                                                <label for="calf">Calf</label>
                                                <input type="text" class="form-control @error('calf') is-invalid @enderror"
                                                    id="calf" value="{{$measurement->calf}}"name="calf">
                                                @error('calf')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                </div>
                                {{-- male measurement fields --}}
                                <div id="male-form" style="display:block;">


                                    <div class="row">
                                    <div class="form-group col-12 col-md-2 col-lg-4">
                                        <label for="chest">Chest</label>
                                        <input type="text" class="form-control @error('chest') is-invalid @enderror"
                                            value="{{$measurement->chest}}"name="chest" value="{{ old('chest') }}" required>
                                        @error('chest')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12 col-md-2 col-lg-4">
                                        <label for="stomach">Stomach</label>
                                        <input type="text" class="form-control @error('stomach') is-invalid @enderror"
                                            value="{{$measurement->stomach}}"name="stomach" value="{{ old('stomach') }}" required>
                                        @error('stomach')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12 col-md-2 col-lg-4">
                                        <label for="topHip">Top Hip</label>
                                        <input type="text" class="form-control @error('topHip') is-invalid @enderror"
                                            value="{{$measurement->topHip}}"name="topHip" value="{{ old('topHip') }}" required>
                                        @error('topHip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group col-12 col-md-2 col-lg-4">
                                        <label for="biceps">Biceps</label>
                                        <input type="text" class="form-control @error('biceps') is-invalid @enderror"
                                            value="{{$measurement->biceps}}"name="biceps" value="{{ old('biceps') }}" required>
                                        @error('biceps')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12 col-md-2 col-lg-4">
                                        <label for="sleeve">Sleeve</label>
                                        <input type="text" class="form-control @error('sleeve')is-invalid @enderror"
                                            value="{{$measurement->sleeve}}"name="sleeve" value="{{ old('sleeve') }}" required>
                                        @error('sleeve')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12 col-md-2 col-lg-4">
                                        <label for="waistToKnee">Waist to Knee</label>
                                        <input type="text"
                                            class="form-control @error('waistToKnee') is-invalid @enderror"
                                            value="{{$measurement->waistToKnee}}"name="waistToKnee" value="{{ old('waistToKnee') }}" required>
                                        @error('waistToKnee')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    </div>
                                </div>



                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Measurement</button>
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
