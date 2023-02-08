<?php

namespace App\Http\Controllers\admin\staff;

use App\Http\Controllers\Controller;
use App\Models\staffs;
use App\Models\User;
use App\Models\StaffDocuments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\File;

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
        $staffs = User::where('role', 'Staff')->get();
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
        if (Auth::user()->role == 'Admin') {
            return view('admin.pages.staff.create');
        } else {
            return redirect()->back()->with('error', 'Access Denialed!!');
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
            'docs.*' => 'nullable|mimes:jpeg,png,jpg,svg,pdf,doc,docx|max:5000',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            DB::beginTransaction();
            try {
                if (Auth::user()->role == 'Admin') {
                    $user = User::create([
                        'name' => $request['name'],
                        'gender' => $request['gender'],
                        'dob' => $request['dob'],
                        'address' => $request['address'],
                        'email' => $request['email'],
                        'phone' => $request['phone'],
                        'role' => 'Staff',
                        'password' => Hash::make($request['password']),
                    ]);
                    $staff = new staffs();
                    $staff->user_id = $user->id;
                    $staff->salary = $request['salary'];
                    $staff->position = $request['position'];

                    $staff->save();
                    if ($request->hasFile('docs')) {
                        $files = $request->file('docs');
                        $upload_path = public_path() . '/docs/staffs';
                        foreach ($files as $file) {
                            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
                            $file->move($upload_path, $file_name);
                            // save into database
                            $staffdocs = new StaffDocuments();
                            $staffdocs->staffs_id = $staff->id;
                            $staffdocs->name = $file_name;

                            $staffdocs->saveOrFail();
                            //      return redirect()->route('booking.index')->with('success', 'Booking created successfully');
                        }
                    }
                    // Commit the transaction
                    DB::commit();
                    return redirect('admin/staffs')->with('successs', 'Staff Created Successfully');
                } else {
                    return redirect()->back()->with('error', 'Access Denialed!!');
                }
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back()->with('error', $e->getMessage());
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
        if (Auth::user()->role == 'Admin') {

            $staff = User::findorfail($id);
            return view('admin.pages.staff.edit', compact('staff'));
        } else {
            return redirect()->back()->with('error', 'Access Denialed!!');
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
            'docs.*' => 'nullable|mimes:jpeg,png,jpg,svg,pdf,doc,docx|max:5000',

            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            DB::beginTransaction();
            try {
                if (Auth::user()->role == 'Admin') {
                    $user = User::findOrFail($id);
                    $user->name = $request['name'];
                    $user->gender = $request['gender'];
                    $user->dob = $request['dob'];
                    $user->address = $request['address'];
                    $user->email = $request['email'];
                    $user->phone = $request['phone'];
                    if($request['password']) {
                        $user->password = Hash::make($request['password']);
                    }
                    $user->update();

                    $staff = staffs::where('user_id', $user->id)->first();
                    $staff->salary = $request['salary'];
                    $staff->position = $request['position'];

                    $staff->update();
                    if ($request->hasFile('docs')) {

                        $files = $request->file('docs');
                        $upload_path = public_path(). '/docs/staffs';
                        $images = StaffDocuments::where('staffs_id', $staff->id)->get();

                        // check if there is a old document
                        if(count($images) > 0) {
                            // delete all old documents
                            foreach($images as $image) {
                                File::delete('docs/staffs/'.$image->name);
                                $image->delete();
                            }
                        }

                        // upload new documents
                        foreach($files as $key=>$file) {
                            $file_name = uniqid(). '.' .$file->getClientOriginalExtension();
                            $file->move($upload_path, $file_name);
                            $staffdocs = new StaffDocuments();
                            $staffdocs->staffs_id = $staff->id;
                            $staffdocs->name = $file_name;
                            $staffdocs->saveOrFail();
                        }

                    }

                    // Commit the transaction
                    DB::commit();
                    return redirect('admin/staffs')->with('successs', 'Staff Updated Successfully');
                } else {
                    return redirect()->back()->with('error', 'Access Denialed!!');
                }
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back()->with('error', $e->getMessage());
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
        if (Auth::user()->role == 'Admin') {

            $user = User::findorfail($id);
            $user->delete();
            return redirect('admin/staffs')->with('successs', 'Staff Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Access Denialed!!');
        }
    }
}
