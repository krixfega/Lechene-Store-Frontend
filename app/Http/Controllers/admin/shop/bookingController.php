<?php

namespace App\Http\Controllers\admin\shop;

use App\Http\Controllers\Controller;
use App\Models\fashionBooking;
use App\Models\fibrics;
use App\Models\BookingStyles;
use App\Models\Tailor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\File;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Validator;


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
        $fashionbookings = fashionBooking::where('bookingStatus', 'pending')->with('customer')->orderBy('pickupDate', 'asc')->get();
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
        $fabrics = fibrics::where('qty', '>', 0)->get();
        $customers = User::where('role','user')->with('measurement')->get();
        return view('admin.pages.booking.create', compact('fabrics','customers'));
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
        $validator = Validator::make($request->all(), [
            'fabrics_id' => 'required',
            'fullName' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'qty' => 'required',
            // 'price' => 'nullable',
            'pickupDate' => 'required',
            'desc' => 'nullable',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'customer_id' => 'required',








        ]);
        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            DB::beginTransaction();
            try {
                $fabric = fibrics::findOrFail($request->fabrics_id);
                $selling_price = $fabric->selling_price;
                $cost_price = $fabric->cost_price;
                $fab_qty = $fabric->qty;
                $fashion_booking = new fashionBooking();
                $fashion_booking->fabrics_id = $request->fabrics_id;
                $fashion_booking->users_id = Auth::user()->id;
                $fashion_booking->customer_id = $request->customer_id;

                $fashion_booking->booking_no = $this->generateOrderNumber();
                $fashion_booking->fullName = $request->fullName;
                $fashion_booking->phoneNumber = $request->phoneNumber;
                $fashion_booking->address = $request->address;
                $fashion_booking->email = $request->email;
                $fashion_booking->gender = $request->gender;
                $fashion_booking->qty = $request->qty;
                $fashion_booking->income = (($selling_price - $cost_price) * $request->qty);
                $fashion_booking->pickupDate = $request->pickupDate;
                $fashion_booking->desc = $request->desc;



                $fashion_booking->saveOrFail();
                $fabric->qty = $fab_qty - $request->qty;
                $fabric->save();

                if ($request->hasFile('images')) {
                    $files = $request->file('images');
                    $upload_path = public_path() . '/images/styles';
                    foreach ($files as $file) {
                        $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->move($upload_path, $file_name);
                        // save into database
                        $stylesImages = new BookingStyles();
                        $stylesImages->fashion_bookings_id = $fashion_booking->id;
                        $stylesImages->name = $file_name;

                        $stylesImages->saveOrFail();
                    }
                }
                // Commit the transaction
                DB::commit();
                return redirect()->route('booking.index')->with('success', 'Booking created successfully');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors($e->getMessage());
            }
        }
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
        // $styleImages = BookingStyles::where('fashion_bookings_id',$id)->get();
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
        $validator = Validator::make($request->all(), [
            'fabrics_id' => 'required',
            'fullName' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'bookingStatus'=>'required',
            // 'gender' => 'required',
            // 'qty' => 'required',
            // 'price' => 'nullable',
            'pickupDate' => 'required',
            'desc' => 'nullable',
            'images' => 'array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',








        ]);
        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            DB::beginTransaction();
            try {
                $fabric = fibrics::findOrFail($request->fabrics_id);
                $selling_price = $fabric->selling_price;
                $cost_price = $fabric->cost_price;
                $fab_qty = $fabric->qty;
                $fashion_booking = fashionBooking::findOrFail($id);
                $fashion_booking->users_id = Auth::user()->id;
                $fashion_booking->fabrics_id = $request->fabrics_id;
                $fashion_booking->booking_no = $this->generateOrderNumber();
                $fashion_booking->fullName = $request->fullName;
                $fashion_booking->phoneNumber = $request->phoneNumber;
                $fashion_booking->address = $request->address;
                $fashion_booking->email = $request->email;
                $fashion_booking->bookingStatus = $request->bookingStatus;
                // $fashion_booking->gender = $request->gender;
                // $fashion_booking->qty = $request->qty;
                $fashion_booking->income = (($selling_price - $cost_price) * $request->qty);
                $fashion_booking->pickupDate = $request->pickupDate;
                $fashion_booking->desc = $request->desc;

                $fashion_booking->update();
                // $fabric->qty = $fab_qty - $request->qty;

                if ($request->hasFile('images')) {

                    $files = $request->file('images');
                    $upload_path = public_path(). '/images/products';
                    $images =BookingStyles::where('fashion_bookings_id', $fashion_booking->id)->get();

                    // check if there is a old document
                    if(count($images) > 0) {
                        // delete all old documents
                        foreach($images as $image) {
                            File::delete('images/product/'.$image->name);
                            $image->delete();
                        }
                    }

                    // upload new documents
                    foreach($files as $key=>$file) {
                        $file_name = uniqid(). '.' .$file->getClientOriginalExtension();
                        $file->move($upload_path, $file_name);
                        $styleImages = new BookingStyles();
                        $styleImages->fashion_bookings_id = $fashion_booking->id;
                        $styleImages->name = $file_name;
                        $styleImages->saveOrFail();
                    }

                }

                // Commit the transaction
                DB::commit();
                return redirect()->route('booking.index')->with('success', 'Booking Updated successfully');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->route('booking.edit')->withErrors('error', $e->getMessage());
            }
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

    protected function generateOrderNumber()
    {
        return 'BKNG' . date('Ymd') . str_pad(rand(1, 99999), 5, 0, STR_PAD_LEFT);
    }

    public function history()
    {
        //booking history
        $booking_history = fashionBooking::orderBy('pickupDate', 'desc')->with('customer')->get();
        return view('admin.pages.booking.history', compact('booking_history'));
    }
    public function invoice($id)
    {
        //show orders items
        $booking = fashionBooking::findOrFail($id);
        $tailor = Tailor::where('booking_id',$id)->first();
        $pdf = Pdf::loadView('admin.pages.booking.invoice', compact('booking','tailor'));
        // dd($_dompf_warnings);
        return $pdf->download($booking->booking_no . '.pdf');


    }
}
