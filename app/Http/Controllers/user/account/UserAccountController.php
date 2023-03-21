<?php

namespace App\Http\Controllers\user\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\fashionBooking;
use App\Models\Orders;
use App\Models\User;

class UserAccountController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {

            // $bookings = fashionBooking::where('users_id',Auth::user()->id)->firstOrFail();
            $user = User::where('id', Auth::user()->id)->firstOrFail();


            return view('user.pages.account.index', compact('user'));
        } else {
            return redirect()->back()->with('error', 'login to continue');
        }
    }


    public function showBooking($id)
    {
        $booking = fashionBooking::findOrFail($id);
        return view('user.pages.account.booking.show', compact('booking'));
    }


    public function showOrder($id)
    {
        $order = Orders::findOrFail($id);
        return view('user.pages.account.orders.show', compact('order'));
    }




    public function EditProfile(Request $request)
    {

        $user = User::findOrFail(Auth::user()->id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required|max:13',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'required|max:255',

        ]);
        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->phone = $request->phone;


            $user->update();

            return redirect()->back()->withSuccess('Profile updated successfully.');
        }
    }


    public function ChangePassword(Request $request)
    {
    $validator = Validator::make($request->all(),[
        'password' => 'required',
        'new_password' => 'required|confirmed'
    ]);
    if($validator->fails()){
        return redirect()->back()->withInput()->withErrors($validator);
    }else{
        if(!Hash::check($request->password, Auth::user()->password)){
            return redirect()->back()->withErrors('incorect password!!');
        }else{
            User::whereId(Auth::user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            return back()->withSuccess('password changed successfully');
        }
    }
    }
}
