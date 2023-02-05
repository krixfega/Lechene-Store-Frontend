<?php

namespace App\Http\Controllers\admin\shop;

use App\Http\Controllers\Controller;
use App\Models\fashionBooking;
use App\Models\fibrics;
use App\Models\Tailor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class bookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all booking index page
        $fashionbookings = fashionBooking::where('booking_status', 'pending')->orderBy('pickupDate', 'asc')->get();
        return view('admin.pages.booking.index', compact('fashionbookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create
        $fabrics = fibrics::all();
        return view('admin.pages.booking.create', compact('fabrics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store booking
        $validatedData = $request->validate([
            'fabrics_id' => 'required',
            'fullname' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'qty' => 'required',
            // 'price' => 'nullable',
            'pickupDate' => 'required',
            'comment' => 'nullable',
            'order' => 'nullable',
            'bustFrontArc' => 'nullable',
            'corsetLength' => 'nullable',
            'Length3_4' => 'nullable',
            'bustBackArc' => 'nullable',
            'shortSleeveElbow' => 'nullable',
            'shortSleeveRoundElbow' => 'nullable',
            'shortSleeveFullSleeveLength' => 'nullable',
            'neck' => 'nullable',
            'shoulder' => 'nullable',
            'OffShoulder' => 'nullable',
            'upperBust' => 'nullable',
            'bust' => 'nullable',
            'underBust' => 'nullable',
            'bustPoint' => 'nullable',
            'N_N' => 'nullable',
            'acrossF_B' => 'nullable',
            'halfLengthF_B' => 'nullable',
            'topLength' => 'nullable',
            'waist_highwaist' => 'nullable',
            'hip_hipLength' => 'nullable',
            'thigh_knee_ankle' => 'nullable',
            'kneeCircumfrence' => 'nullable',
            'shoulderToHip_knee' => 'nullable',
            'waistToknee' => 'nullable',
            'armhole_hicep' => 'nullable',
            'sleeve' => 'nullable',
            'roundSleeve' => 'nullable',
            'wrist' => 'nullable',
            'trouserLength' => 'nullable',
            'fullLength' => 'nullable',
            'dressLength' => 'nullable',
            'shirt_Trouser' => 'nullable',
            'Length' => 'nullable',
            'RoundKnee' => 'nullable',
            'KneeLength' => 'nullable',
            'waist_hips' => 'nullable',
            'thigh' => 'nullable',
            'ankle' => 'nullable',
            'crotchF_B' => 'nullable',

        ]);
        $fabric = fibrics::findOrFail($request->fabrics_id);
        $selling_price = $fabric->selling_price;
        $cost_price = $fabric->cost_price;
        $fab_qty = $fabric->qty;


        $fashion_booking = new fashionBooking();
        // $tailor = Tailor::where('booking_id',$fashion_booking->id)->first();
        // $tailorFee = $tailor->total_price;
        // dd($tailor);
        $fashion_booking->fabrics_id = $request->fabrics_id;
        $fashion_booking->booking_no = $this->generateOrderNumber();
        $fashion_booking->fullname = $request->fullname;
        $fashion_booking->phoneNumber = $request->phoneNumber;
        $fashion_booking->address = $request->address;
        $fashion_booking->email = $request->email;
        $fashion_booking->gender = $request->gender;
        $fashion_booking->qty = $request->qty;
        $fashion_booking->income = (($selling_price - $cost_price) * $request->qty);
        $fashion_booking->pickupDate = $request->pickupDate;
        $fashion_booking->comment = $request->comment;
        $fashion_booking->order = $request->order;
        $fashion_booking->bustFrontArc = $request->bustFrontArc;
        $fashion_booking->corsetLength = $request->corsetLength;
        $fashion_booking->Length3_4 = $request->Length3_4;
        $fashion_booking->bustBackArc = $request->bustBackArc;
        $fashion_booking->shortSleeveElbow = $request->shortSleeveElbow;
        $fashion_booking->shortSleeveRoundElbow = $request->shortSleeveRoundElbow;
        $fashion_booking->shortSleeveFullSleeveLength = $request->shortSleeveFullSleeveLength;
        $fashion_booking->neck = $request->neck;
        $fashion_booking->shoulder = $request->shoulder;
        $fashion_booking->OffShoulder = $request->OffShoulder;
        $fashion_booking->upperBust = $request->upperBust;
        $fashion_booking->bust = $request->bust;
        $fashion_booking->underBust = $request->underBust;
        $fashion_booking->bustPoint = $request->bustPoint;
        $fashion_booking->N_N = $request->N_N;
        $fashion_booking->acrossF_B = $request->acrossF_B;
        $fashion_booking->halfLengthF_B = $request->halfLengthF_B;
        $fashion_booking->topLength = $request->topLength;
        $fashion_booking->waist_highwaist = $request->waist_highwaist;
        $fashion_booking->hip_hipLength = $request->hip_hipLength;
        $fashion_booking->thigh_knee_ankle = $request->thigh_knee_ankle;
        $fashion_booking->kneeCircumfrence = $request->kneeCircumfrence;
        $fashion_booking->shoulderToHip_knee = $request->shoulderToHip_knee;
        $fashion_booking->waistToknee = $request->waistToknee;
        $fashion_booking->armhole_hicep = $request->armhole_hicep;
        $fashion_booking->sleeve = $request->sleeve;
        $fashion_booking->roundSleeve = $request->roundSleeve;
        $fashion_booking->wrist = $request->wrist;
        $fashion_booking->trouserLength = $request->trouserLength;
        $fashion_booking->fullLength = $request->fullLength;
        $fashion_booking->dressLength = $request->dressLength;
        $fashion_booking->shirt_Trouser = $request->shirt_Trouser;
        $fashion_booking->Length = $request->Length;
        $fashion_booking->RoundKnee = $request->RoundKnee;
        $fashion_booking->KneeLength = $request->KneeLength;
        $fashion_booking->waist_hips = $request->waist_hips;
        $fashion_booking->thigh = $request->thigh;
        $fashion_booking->ankle = $request->ankle;
        $fashion_booking->crotchF_B = $request->crotchF_B;
        $fashion_booking->saveOrFail();
        $fabric->qty = $fab_qty - $request->qty;
        $fabric->save();
        return redirect()->route('booking.index')->with('success', 'Booking created successfully');
    }




    //


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //view bookings
        $booking = fashionBooking::findOrFail($id);
        return view('admin.pages.booking.view', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit booking
        // if (Auth::user()->role == 'Admin') {

        $fabrics = fibrics::all();
        $booking = fashionBooking::findOrFail($id);
        return view('admin.pages.booking.edit', compact('booking', 'fabrics'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update booking
        $validatedData = $request->validate([
            'fabrics_id' => 'required',
            'fullname' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'qty' => 'required',
            'booking_status' => 'required',
            // 'price' => 'nullable',
            'pickupDate' => 'required',
            'comment' => 'nullable',
            'order' => 'nullable',
            'bustFrontArc' => 'nullable',
            'corsetLength' => 'nullable',
            'Length3_4' => 'nullable',
            'bustBackArc' => 'nullable',
            'shortSleeveElbow' => 'nullable',
            'shortSleeveRoundElbow' => 'nullable',
            'shortSleeveFullSleeveLength' => 'nullable',
            'neck' => 'nullable',
            'shoulder' => 'nullable',
            'OffShoulder' => 'nullable',
            'upperBust' => 'nullable',
            'bust' => 'nullable',
            'underBust' => 'nullable',
            'bustPoint' => 'nullable',
            'N_N' => 'nullable',
            'acrossF_B' => 'nullable',
            'halfLengthF_B' => 'nullable',
            'topLength' => 'nullable',
            'waist_highwaist' => 'nullable',
            'hip_hipLength' => 'nullable',
            'thigh_knee_ankle' => 'nullable',
            'kneeCircumfrence' => 'nullable',
            'shoulderToHip_knee' => 'nullable',
            'waistToknee' => 'nullable',
            'armhole_hicep' => 'nullable',
            'sleeve' => 'nullable',
            'roundSleeve' => 'nullable',
            'wrist' => 'nullable',
            'trouserLength' => 'nullable',
            'fullLength' => 'nullable',
            'dressLength' => 'nullable',
            'shirt_Trouser' => 'nullable',
            'Length' => 'nullable',
            'RoundKnee' => 'nullable',
            'KneeLength' => 'nullable',
            'waist_hips' => 'nullable',
            'thigh' => 'nullable',
            'ankle' => 'nullable',
            'crotchF_B' => 'nullable',

        ]);
        $fabric = fibrics::findOrFail($request->fabrics_id);
        $selling_price = $fabric->selling_price;
        $cost_price = $fabric->cost_price;
        $fab_qty = $fabric->qty;
        $fashion_booking = fashionBooking::findOrFail($id);

        if (Auth::user()->role == 'Admin') {
            $fashion_booking->booking_status = $request->booking_status;
            $fashion_booking->fabrics_id = $request->fabrics_id;
            $fashion_booking->fullname = $request->fullname;
            $fashion_booking->phoneNumber = $request->phoneNumber;
            $fashion_booking->address = $request->address;
            $fashion_booking->email = $request->email;
            $fashion_booking->gender = $request->gender;
            $fashion_booking->qty = $request->qty;
            $fashion_booking->pickupDate = $request->pickupDate;
            $fashion_booking->comment = $request->comment;
            $fashion_booking->order = $request->order;
            $fashion_booking->bustFrontArc = $request->bustFrontArc;
            $fashion_booking->corsetLength = $request->corsetLength;
            $fashion_booking->Length3_4 = $request->Length3_4;
            $fashion_booking->bustBackArc = $request->bustBackArc;
            $fashion_booking->shortSleeveElbow = $request->shortSleeveElbow;
            $fashion_booking->shortSleeveRoundElbow = $request->shortSleeveRoundElbow;
            $fashion_booking->shortSleeveFullSleeveLength = $request->shortSleeveFullSleeveLength;
            $fashion_booking->neck = $request->neck;
            $fashion_booking->shoulder = $request->shoulder;
            $fashion_booking->OffShoulder = $request->OffShoulder;
            $fashion_booking->upperBust = $request->upperBust;
            $fashion_booking->bust = $request->bust;
            $fashion_booking->income = (($selling_price - $cost_price) * $request->qty);
            $fashion_booking->underBust = $request->underBust;
            $fashion_booking->bustPoint = $request->bustPoint;
            $fashion_booking->N_N = $request->N_N;
            $fashion_booking->acrossF_B = $request->acrossF_B;
            $fashion_booking->halfLengthF_B = $request->halfLengthF_B;
            $fashion_booking->topLength = $request->topLength;
            $fashion_booking->waist_highwaist = $request->waist_highwaist;
            $fashion_booking->hip_hipLength = $request->hip_hipLength;
            $fashion_booking->thigh_knee_ankle = $request->thigh_knee_ankle;
            $fashion_booking->kneeCircumfrence = $request->kneeCircumfrence;
            $fashion_booking->shoulderToHip_knee = $request->shoulderToHip_knee;
            $fashion_booking->waistToknee = $request->waistToknee;
            $fashion_booking->armhole_hicep = $request->armhole_hicep;
            $fashion_booking->sleeve = $request->sleeve;
            $fashion_booking->roundSleeve = $request->roundSleeve;
            $fashion_booking->wrist = $request->wrist;
            $fashion_booking->trouserLength = $request->trouserLength;
            $fashion_booking->fullLength = $request->fullLength;
            $fashion_booking->dressLength = $request->dressLength;
            $fashion_booking->shirt_Trouser = $request->shirt_Trouser;
            $fashion_booking->Length = $request->Length;
            $fashion_booking->RoundKnee = $request->RoundKnee;
            $fashion_booking->KneeLength = $request->KneeLength;
            $fashion_booking->waist_hips = $request->waist_hips;
            $fashion_booking->thigh = $request->thigh;
            $fashion_booking->ankle = $request->ankle;
            $fashion_booking->crotchF_B = $request->crotchF_B;
            $fashion_booking->update();
           
            return redirect()->route('booking.index')->with('success', 'Booking Updated successfully');
        } else {
            $fashion_booking->fabrics_id = $request->fabrics_id;
            $fashion_booking->fullname = $request->fullname;
            $fashion_booking->phoneNumber = $request->phoneNumber;
            $fashion_booking->address = $request->address;
            $fashion_booking->email = $request->email;
            $fashion_booking->gender = $request->gender;
            // $fashion_booking->qty = $request->qty;
            $fashion_booking->pickupDate = $request->pickupDate;
            $fashion_booking->comment = $request->comment;
            $fashion_booking->order = $request->order;
            $fashion_booking->bustFrontArc = $request->bustFrontArc;
            $fashion_booking->corsetLength = $request->corsetLength;
            $fashion_booking->Length3_4 = $request->Length3_4;
            $fashion_booking->bustBackArc = $request->bustBackArc;
            $fashion_booking->shortSleeveElbow = $request->shortSleeveElbow;
            $fashion_booking->shortSleeveRoundElbow = $request->shortSleeveRoundElbow;
            $fashion_booking->shortSleeveFullSleeveLength = $request->shortSleeveFullSleeveLength;
            $fashion_booking->neck = $request->neck;
            $fashion_booking->shoulder = $request->shoulder;
            $fashion_booking->OffShoulder = $request->OffShoulder;
            $fashion_booking->upperBust = $request->upperBust;
            $fashion_booking->bust = $request->bust;
            $fashion_booking->underBust = $request->underBust;
            $fashion_booking->bustPoint = $request->bustPoint;
            $fashion_booking->N_N = $request->N_N;
            $fashion_booking->acrossF_B = $request->acrossF_B;
            $fashion_booking->halfLengthF_B = $request->halfLengthF_B;
            $fashion_booking->topLength = $request->topLength;
            $fashion_booking->waist_highwaist = $request->waist_highwaist;
            $fashion_booking->hip_hipLength = $request->hip_hipLength;
            $fashion_booking->thigh_knee_ankle = $request->thigh_knee_ankle;
            $fashion_booking->kneeCircumfrence = $request->kneeCircumfrence;
            $fashion_booking->shoulderToHip_knee = $request->shoulderToHip_knee;
            $fashion_booking->waistToknee = $request->waistToknee;
            $fashion_booking->armhole_hicep = $request->armhole_hicep;
            $fashion_booking->sleeve = $request->sleeve;
            $fashion_booking->roundSleeve = $request->roundSleeve;
            $fashion_booking->wrist = $request->wrist;
            $fashion_booking->trouserLength = $request->trouserLength;
            $fashion_booking->fullLength = $request->fullLength;
            $fashion_booking->dressLength = $request->dressLength;
            $fashion_booking->shirt_Trouser = $request->shirt_Trouser;
            $fashion_booking->Length = $request->Length;
            $fashion_booking->RoundKnee = $request->RoundKnee;
            $fashion_booking->KneeLength = $request->KneeLength;
            $fashion_booking->waist_hips = $request->waist_hips;
            $fashion_booking->thigh = $request->thigh;
            $fashion_booking->ankle = $request->ankle;
            $fashion_booking->crotchF_B = $request->crotchF_B;
            $fashion_booking->update();
            return redirect()->route('booking.index')->with('success', 'Booking Updated successfully');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete booking
        if (Auth::user()->role == 'Admin') {

            $booking = fashionBooking::find($id);
            if (!$booking) {
                return redirect()->route('booking.index')->with('error', 'Booking not found');
            }
            $booking->delete();

            return redirect()->route('booking.index')->with('success', 'Booking deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Acess Denied');
        }
    }

    public function generateOrderNumber()
    {
        return 'BKNG' . date('Ymd') . str_pad(rand(1, 99999), 5, 0, STR_PAD_LEFT);
    }

    public function history()
    {
        //booking history
        $booking_history = fashionBooking::orderBy('pickupDate', 'desc')->get();
        return view('admin.pages.booking.history', compact('booking_history'));
    }
}
