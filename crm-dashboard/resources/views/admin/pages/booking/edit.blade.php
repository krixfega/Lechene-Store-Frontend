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
                                <label for="fullName">Full Name(*required)</label>
                                <input type="text" required class="form-control @error('fullName') is-invalid @enderror" id="fullName" name="fullName" value="{{ $booking->fullName }}" required>
                                @error('fullName')
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
                                {{-- <div class="form-group">
                                <label for="gender">Gender (*required)</label>
                                <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                                <option value="male" {{ $booking->gender == 'male' ? 'selected':'' }}>Male</option>
                                <option value="female" {{ $booking->gender == 'female' ? 'selected':'' }}>Female</option>
                                </select>
                                @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div> --}}
                                {{-- @if(Auth::user()->role == 'Admin')
                                <div class="form-group">
                                <label for="qty">Quantity (*required)</label>
                                <input type="number"  required class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" value="{{ $booking->qty }}" required>
                                @error('qty')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                @endif --}}
                                <div class="form-group">
                                <label for="pickupDate">Pickup Date (*required) </label>
                                <input type="date" required class="form-control @error('pickupDate') is-invalid @enderror" id="pickupDate" name="pickupDate" value="{{ $booking->pickupDate }}" required>
                                @error('pickupDate')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="bookingStatus">Booking Status (*required)</label>
                                <select class="form-control @error('bookingStatus') is-invalid @enderror" id="bookingStatus" name="bookingStatus">
                                <option value="pending" {{ $booking->bookingStatus == 'pending' ? 'selected':'' }}>Pending</option>
                                <option value="approved" {{ $booking->bookingStatus == 'approved' ? 'selected':'' }}>Approved</option>
                                <option value="rejected" {{ $booking->bookingStatus == 'rejected' ? 'selected':'' }}>Rejected</option>
                                </select>
                                @error('bookingStatus')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label for="desc">Style Description</label>
                                <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" rows="3">
                                    {{ $booking->desc }}
                                </textarea>
                                @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>

                                {{-- general measurement --}}
                                <div class="form-group">
                                    <label for="neck">Neck</label>
                                    <input type="text" class="form-control @error('neck') is-invalid @enderror"
                                       value="{{$booking->neck}}" id="neck" name="neck">
                                    @error('neck')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="shoulder">Shoulder</label>
                                    <input type="text" class="form-control @error('shoulder') is-invalid @enderror"
                                       value="{{$booking->shoulder}}" id="shoulder" name="shoulder">
                                    @error('shoulder')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="frontArc">Front Arc</label>
                                    <input type="text"
                                        class="form-control @error('frontArc') is-invalid @enderror"
                                        name="frontArc" value="{{ $booking->frontArc }}" required>
                                    @error('frontArc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                 <div class="form-group">
                                    <label for="waist">Waist</label>
                                    <input type="text" class="form-control @error('waist') is-invalid @enderror"
                                       value="{{$booking->waist}}" id="waist" name="waist">
                                    @error('waist')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="hip">Hip</label>
                                    <input type="text" class="form-control @error('hip') is-invalid @enderror"
                                       value="{{$booking->hip}}" id="hip" name="hip">
                                    @error('hip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="topLength">Top Length</label>
                                    <input type="text"
                                        class="form-control @error('topLength') is-invalid @enderror"
                                        name="topLength" value="{{ $booking->topLength }}" required>
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
                                        name="trouserLength" value="{{ $booking->trouserLength }}" required>
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
                                        value="{{ $booking->armHole }}"required>
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
                                        name="roundSleeve" value="{{ $booking->roundSleeve }}" required>
                                    @error('roundSleeve')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                 <div class="form-group">
                                    <label for="thigh">Thigh</label>
                                    <input type="text" class="form-control @error('thigh') is-invalid @enderror"
                                       value="{{$booking->thigh}}" id="thigh" name="thigh">
                                    @error('thigh')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="knee">Knee</label>
                                    <input type="text" class="form-control @error('knee') is-invalid @enderror"
                                       value="{{$booking->knee}}" id="knee" name="knee">
                                    @error('knee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="crotch">Crotch</label>
                                    <input type="text" class="form-control @error('crotch') is-invalid @enderror"
                                       value="{{$booking->crotch}}" id="crotch" name="crotch">
                                    @error('crotch')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- measurement based on gender --}}


                                @if ($booking->gender == 'male' )
                                <div id="male-form" style="display:block;">



                                    <div class="form-group">
                                        <label for="chest">Chest</label>
                                        <input type="text" class="form-control @error('chest') is-invalid @enderror"
                                            name="chest" value="{{ old('chest',$booking->chest) }}" required>
                                        @error('chest')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="stomach">Stomach</label>
                                        <input type="text" class="form-control @error('stomach') is-invalid @enderror"
                                            name="stomach" value="{{ old('stomach',$booking->stomach) }}" required>
                                        @error('stomach')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="topHip">Top Hip</label>
                                        <input type="text" class="form-control @error('topHip') is-invalid @enderror"
                                            name="topHip" value="{{ old('topHip',$booking->topHip) }}" required>
                                        @error('topHip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="biceps">Biceps</label>
                                        <input type="text" class="form-control @error('biceps') is-invalid @enderror"
                                            name="biceps" value="{{ old('biceps',$booking->biceps) }}" required>
                                        @error('biceps')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="sleeve">Sleeve</label>
                                        <input type="text" class="form-control @error('sleeve')is-invalid @enderror"
                                            name="sleeve" value="{{ old('sleeve',$booking->sleeve) }}" required>
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
                                            name="waistToKnee" value="{{ old('waistToKnee',$booking->waistToKnee) }}" required>
                                        @error('waistToKnee')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div>
                                @elseif($booking->gender == 'female')
                                <div>

                                    <div class="form-group">
                                        <label for="offShoulder">Off Shoulder</label>
                                        <input type="text"
                                            class="form-control @error('offShoulder') is-invalid @enderror"
                                            id="offShoulder" vale="{{$booking->offShoulder}}"name="offShoulder">
                                        @error('offShoulder')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="upperBust">Upper Bust</label>
                                        <input type="text" class="form-control @error('upperBust') is-invalid @enderror"
                                            id="upperBust" vale="{{$booking->upperBust}}"name="upperBust">
                                        @error('upperBust')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="bust">Bust</label>
                                        <input type="text" class="form-control @error('bust') is-invalid @enderror"
                                            id="bust" vale="{{$booking->bust}}"name="bust">
                                        @error('bust')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="N_N">N-N</label>
                                        <input type="text" class="form-control @error('N_N') is-invalid @enderror"
                                            id="N_N" vale="{{$booking->N_N}}"name="N_N">
                                        @error('N_N')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="underBust">Under Bust</label>
                                        <input type="text"
                                            class="form-control @error('underBust') is-invalid @enderror" id="underBust"
                                            vale="{{$booking->underBust}}"name="underBust">
                                        @error('underBust')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="bustPoint">Bust Point</label>
                                        <input type="text"
                                            class="form-control @error('bustPoint') is-invalid @enderror" id="bustPoint"
                                            vale="{{$booking->bustPoint}}"name="bustPoint">
                                        @error('bustPoint')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="halfLength">Half Length </label>
                                        <input type="text"
                                            class="form-control @error('halfLength') is-invalid @enderror"
                                            id="halfLength" vale="{{$booking->halfLength}}"name="halfLength">
                                        @error('halfLength')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="halfLengthBack">Half Length Back </label>
                                        <input type="text"
                                            class="form-control @error('halfLengthBack') is-invalid @enderror"
                                            id="halfLengthBack" vale="{{$booking->halfLengthBack}}"name="halfLengthBack">
                                        @error('halfLengthBack')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="highWaist">HighWaist</label>
                                        <input type="text"
                                            class="form-control @error('highWaist') is-invalid @enderror" id="highWaist"
                                            vale="{{$booking->highWaist}}"name="highWaist">
                                        @error('highWaist')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="shoulderToKnee">Shoulder To Knee</label>
                                        <input type="text"
                                            class="form-control @error('shoulderToknee') is-invalid @enderror"
                                            id="shoulderToKnee" vale="{{$booking->shoulderToKnee}}"name="shoulderToKnee">
                                        @error('shoulderToKnee')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="shoulderToHip">Shoulder To Hip</label>
                                        <input type="text"
                                            class="form-control @error('shoulderToHip') is-invalid @enderror"
                                            id="shoulderToHip" vale="{{$booking->shoulderToHip}}"name="shoulderToHip">
                                        @error('shoulderToHip')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="fullLength">Full Length</label>
                                        <input type="text"
                                            class="form-control @error('fullLength') is-invalid @enderror"
                                            id="fullLength" vale="{{$booking->fullLength}}"name="fullLength">
                                        @error('fullLength')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="dressLength">Dress Length</label>
                                        <input type="text"
                                            class="form-control @error('dressLength') is-invalid @enderror"
                                            id="dressLength" vale="{{$booking->dressLength}}"name="dressLength">
                                        @error('dressLength')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="sleeveLength"> Sleeve Length</label>
                                        <input type="text"
                                            class="form-control @error('sleeveLength') is-invalid @enderror"
                                            id="sleeveLength" vale="{{$booking->sleeveLength}}"name="sleeveLength">
                                        @error('sleeveLength')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="calf">Calf</label>
                                        <input type="text" class="form-control @error('calf') is-invalid @enderror"
                                            id="calf" vale="{{$booking->calf}}"name="calf">
                                        @error('calf')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                @else


                                @endif

                                <div class="form-group">

                                    <label for="image"> Edit Style Images</label>


                                    <input  type="file" class="form-control @error('image') is-invalid @enderror"
                                     id="images" name="images[]"  multiple>
                                     {{-- <div id="images-container" class="row"></div> --}}

                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                  </div>
                                  <div class="row">
                                    @foreach($booking->styles as $img)
                                    <br>

                                    <img src="{{asset('images/products/'.$img->name)}}" alt="{{$img->name}}" class="img-thumbnail w-25 col-6">
                                    @endforeach
                                        </div>
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
