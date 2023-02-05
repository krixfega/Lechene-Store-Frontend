<?php

namespace App\Http\Controllers\admin\staff;

use App\Http\Controllers\Controller;
use App\Models\staffs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $staffs = User::where('role','Staff')->get();
        return view('admin.pages.staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::user()->role == 'Admin'){
        return view('admin.pages.staff.create');
        }else{
            return redirect()->back()->with('error','Access Denialed!!');
        }

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
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'position' => ['required', 'string'],
            'salary' => ['required', 'string'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            if(Auth::user()->role == 'Admin'){
           $user = User::create([
                'name' => $request['name'],
                'gender' => $request['gender'],
                'dob' => $request['dob'],
                'address' => $request['address'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'role'=>'Staff',
                'password' => Hash::make($request['password']),
            ]);
            $staff = new staffs();
            $staff->user_id = $user->id;
            $staff->salary = $request['salary'];
            $staff->position = $request['position'];
            $staff->save();


            return redirect('admin/staffs')->with('successs', 'Staff Created Successfully');
        }else{
            return redirect()->back()->with('error','Access Denialed!!');

        }
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

        $staff = User::findorfail($id);
        return view('admin.pages.staff.edit', compact('staff'));
        }else{
            return redirect()->back()->with('error','Access Denialed!!');

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
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'position' => ['required', 'string'],
            'salary' => ['required', 'string'],

            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
        if(Auth::user()->role == 'Admin'){

           $user = User::where('id',$id)->update([
                'name' => $request['name'],
                'gender' => $request['gender'],
                'dob' => $request['dob'],
                'address' => $request['address'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'role'=>'Staff',
                // 'password' => Hash::make($request['password']),
            ]);
            $staff = staffs::where('user_id',$id)->first();
            $staff->user_id = $id;
            $staff->salary = $request['salary'];
            $staff->position = $request['position'];
            $staff->update();


            return redirect('admin/staffs')->with('successs', 'Staff Updated Successfully');
        }else{
            return redirect()->back()->with('error','Access Denialed!!');

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

        $user = User::findorfail($id);
        $user->delete();
        return redirect('admin/staffs')->with('successs', 'Staff Deleted Successfully');
        }
       else{
        return redirect()->back()->with('error','Access Denialed!!');

        }
    }
}
