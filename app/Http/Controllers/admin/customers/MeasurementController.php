<?php

namespace App\Http\Controllers\admin\customers;

use App\Models\Measurement;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customers = User::where('role', 'User')->whereDoesntHave('measurement', function($query){
            $query->whereNotNull('users_id');
        })->get();
        return view('admin.pages.customers.measurement.create', compact('customers'));
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

        try {
            //code...
            $user = Measurement::create([
                'users_id' => $request->users_id,
                'neck' => $request->neck,
                'shoulder' => $request->shoulder,
                'frontArc' => $request->frontArc,
                'waist' => $request->waist,
                'hip' => $request->hip,
                'topLength' => $request->topLength,
                'trouserLength' => $request->trouserLength,
                'armHole' => $request->armHole,
                'roundSleeve' => $request->roundSleeve,
                'thigh' => $request->thigh,
                'knee' => $request->knee,
                'crotch' => $request->crotch,
                'upperBust' => $request->upperBust,
                'bust' => $request->bust,
                'N_N' => $request->N_N,
                'underBust' => $request->underBust,
                'bustPoint' => $request->bustPoint,
                'halfLength' => $request->halfLength,
                'halfLengthBack' => $request->halfLengthBack,
                'highWaist' => $request->highWaist,
                'shoulderToknee' => $request->shoulderToknee,
                'shoulderToHip' => $request->shoulderToHip,
                'fullLength' => $request->fullLength,
                'dressLength' => $request->dressLength,
                'sleeveLength' => $request->sleeveLength,
                'calf' => $request->calf,
                'chest' => $request->chest,
                'stomach' => $request->stomach,
                'topHip' => $request->topHip,
                'biceps' => $request->biceps,
                'sleeve' => $request->sleeve,
                'gender' => $request->gender,
                'waistToKnee' => $request->waistToKnee,
            ]);
            return redirect()->back()->with('success','Measurement successfully Created');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors($e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //show measurement and if no measurem redirect to create measurement form
        $measurement = Measurement::where('users_id',$id)->with('users')->first();
        if($measurement){
        return view('admin.pages.customers.measurement.show',compact('measurement'));
        }else{
         return $this->create();


        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        // $customers = User::where('role', 'User')->get();
        $measurement = Measurement::findOrFail($id)->with('users')->first();
        return view('admin.pages.customers.measurement.edit',compact('measurement'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measurement $measurement)
    {
        //
        try {
            //code...
            $data = [
                'users_id' => $request->users_id,
                'neck' => $request->neck,
                'shoulder' => $request->shoulder,
                'frontArc' => $request->frontArc,
                'waist' => $request->waist,
                'hip' => $request->hip,
                'topLength' => $request->topLength,
                'trouserLength' => $request->trouserLength,
                'armHole' => $request->armHole,
                'roundSleeve' => $request->roundSleeve,
                'thigh' => $request->thigh,
                'knee' => $request->knee,
                'crotch' => $request->crotch,
                'upperBust' => $request->upperBust,
                'bust' => $request->bust,
                'N_N' => $request->N_N,
                'underBust' => $request->underBust,
                'bustPoint' => $request->bustPoint,
                'halfLength' => $request->halfLength,
                'halfLengthBack' => $request->halfLengthBack,
                'highWaist' => $request->highWaist,
                'shoulderToknee' => $request->shoulderToknee,
                'shoulderToHip' => $request->shoulderToHip,
                'fullLength' => $request->fullLength,
                'dressLength' => $request->dressLength,
                'sleeveLength' => $request->sleeveLength,
                'calf' => $request->calf,
                'chest' => $request->chest,
                'stomach' => $request->stomach,
                'topHip' => $request->topHip,
                'biceps' => $request->biceps,
                'sleeve' => $request->sleeve,
                'gender' => $request->gender,
                'waistToKnee' => $request->waistToKnee,
            ];
            $measurement->update($data);
            return redirect()->back()->with('success','Measurement successfully Updated');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors($e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measurement $measurement)
    {
        //
    }
}
