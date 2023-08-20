<?php

namespace App\Http\Controllers\admin\tailor;

use App\Http\Controllers\Controller;
use App\Models\staffs;
use App\Models\fashionBooking;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Tailor;
use App\Models\User;
use Illuminate\Http\Request;

class TailorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Tailor::with('booking')->all();
        return view('admin.pages.tailor.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tailors = staffs::where('position','Tailors')->get();
        $booked = Tailor::all();
        $bookings = fashionBooking::whereNotIn('id', $booked->pluck('booking_id'))->get();
        return view('admin.pages.tailor.create',compact('tailors', 'bookings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'tailor' => 'required',
            'booking_no' => 'required',
            'total_price' => 'required',
            'paid_price' => 'required',
            'balance_price' => 'required',
        ]);
        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {

        $tailor = new Tailor();
        $tailor->user_id = $request->input('tailor');
        $tailor->booking_id = $request->input('booking_no');
        $tailor->total_price = $request->input('total_price');
        $tailor->paid_price = $request->input('paid_price');
        $tailor->balance_price = $request->input('balance_price');
        $tailor->save();

        return redirect()->route('tailor.index')->with('success', 'Tailor Assigned successfully');

    }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tailor = Tailor::findOrFail($id);
        return view('admin.pages.tailor.view',compact('tailor'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(Auth::user()->role == 'Admin'){
        $tailor = Tailor::findOrfail($id);
        $tailors = staffs::where('position','Tailors')->get();
        // $booked = Tailor::all();
       $bookings = FashionBooking::whereNotIn('id', Tailor::all()->pluck('booking_id'))->get();

        return view('admin.pages.tailor.edit',compact('tailor','bookings','tailors',));

        }else{
return redirect()->back()->with('error','Access Denied!!');
        }
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
        //
        $validator = Validator::make($request->all(), [
            'tailor' => 'required',
            // 'booking_no' => 'required',
            'total_price' => 'required',
            'paid_price' => 'required',
            'balance_price' => 'required',
        ]);
        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {

        if(Auth::user()->role == 'Admin'){

        $tailor = Tailor::findOrFail($id);
        $tailor->user_id = $request->input('tailor');
        if ($request->has('booking_no')) {
        $tailor->booking_id = $request->input('booking_no');
        }
        $tailor->total_price = $request->input('total_price');
        $tailor->paid_price = $request->input('paid_price');
        $tailor->balance_price = $request->input('balance_price');
        $tailor->update();

        return redirect()->route('tailor.index')->with('success', 'Tailor Assigned Updated successfully');
    }
    else{
return redirect()->back()->with('error','Access Denied!!');

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
        //
        if(Auth::user()->role == 'Admin'){

        $tailor = Tailor::findOrFail($id);
        $tailor->delete();

        return redirect()->back()->with('success', 'Assigned tailor deleted successfully');
        }
        else{
return redirect()->back()->with('error','Access Denied!!');

        }
    }
}
