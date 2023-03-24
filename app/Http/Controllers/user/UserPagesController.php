<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\fashionBooking;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\OrderItems;
use App\Models\fibrics;
use App\Models\BookingStyles;
use App\Models\Tailor;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;


class UserPagesController extends Controller
{
    //
    public function index()
    {
        $Bestproducts = Products::withCount('OrderedItems')
            ->orderByDesc('ordered_items_count')
            ->take(3)
            ->get();
        $products = Products::all();
        $bispock = fibrics::withCount('Bookings')
            ->orderByDesc('bookings_count')
            ->take(3)
            ->get();
        return view('user.pages.home', compact('Bestproducts', 'bispock'));
    }

    public function about(){
        return view('user.pages.about');
    }
    public function contact(){
        return view('user.pages.contact');
    }


    public function singleProduct($id)
    {
        //
        $product = Products::findOrFail($id);
        return view('user.pages.single_product', compact('product'));
    }
    public function bespoke()
    {   $bespoke =  fibrics::paginate(16);
        return view('user.pages.bespoke',compact('bespoke'));
    }

    public function booking(Request $request, $id)
    {

        $bispock = fibrics::findOrFail($id);
        return view('user.pages.booking', compact('bispock'));
    }
    protected function generateOrderNumber()
    {
        return 'BKNG' . date('Ymd') . str_pad(rand(1, 99999), 5, 0, STR_PAD_LEFT);
    }


    public function booking_create(Request $request)
    {


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
            'neck' => 'nullable',
            'shoulder' => 'nullable',
            'frontArc' => 'nullable',
            'waist' => 'nullable',
            'hip' => 'nullable',
            'topLength' => 'nullable',
            'trouserLength' => 'nullable',
            'armHole' => 'nullable',
            'roundSleeve' => 'nullable',
            'thigh' => 'nullable',
            'knee' => 'nullable',
            'crotch' => 'nullable',
            'upperBust' => 'nullable',
            'bust' => 'nullable',
            'N_N' => 'nullable',
            'underBust' => 'nullable',
            'bustPoint' => 'nullable',
            'halfLength' => 'nullable',
            'halfLengthBack' => 'nullable',
            'highWaist' => 'nullable',
            'shoulderToknee' => 'nullable',
            'shoulderToHip' => 'nullable',
            'fullLength' => 'nullable',
            'dressLength' => 'nullable',
            'sleeveLength' => 'nullable',
            'calf' => 'nullable',
            'chest' => 'nullable',
            'stomach' => 'nullable',
            'topHip' => 'nullable',
            'biceps' => 'nullable',
            'sleeve' => 'nullable',
            'waistToKnee' => 'nullable',







        ]);
        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }else {
            DB::beginTransaction();
            try {
                $fabric = fibrics::findOrFail($request->fabrics_id);
                $selling_price = $fabric->selling_price;
                $cost_price = $fabric->cost_price;
                $fab_qty = $fabric->qty;
                $fashion_booking = new fashionBooking();
                $fashion_booking->fabrics_id = $request->fabrics_id;
                $fashion_booking->users_id = Auth::user()->id;
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
                $fashion_booking->neck = $request->neck;
                $fashion_booking->shoulder = $request->shoulder;
                $fashion_booking->frontArc = $request->frontArc;
                $fashion_booking->waist = $request->waist;
                $fashion_booking->hip = $request->hip;
                $fashion_booking->topLength = $request->topLength;
                $fashion_booking->trouserLength = $request->trouserLength;
                $fashion_booking->armHole = $request->armHole;
                $fashion_booking->roundSleeve = $request->roundSleeve;
                $fashion_booking->thigh = $request->thigh;
                $fashion_booking->knee = $request->knee;
                $fashion_booking->crotch = $request->crotch;
                $fashion_booking->upperBust = $request->upperBust;
                $fashion_booking->bust = $request->bust;
                $fashion_booking->N_N = $request->N_N;
                $fashion_booking->underBust = $request->underBust;
                $fashion_booking->bustPoint = $request->bustPoint;
                $fashion_booking->halfLength = $request->halfLength;
                $fashion_booking->halfLengthBack = $request->halfLengthBack;
                $fashion_booking->highWaist = $request->highWaist;
                $fashion_booking->shoulderToknee = $request->shoulderToknee;
                $fashion_booking->shoulderToHip = $request->shoulderToHip;
                $fashion_booking->fullLength = $request->fullLength;
                $fashion_booking->dressLength = $request->dressLength;
                $fashion_booking->sleeveLength = $request->sleeveLength;
                $fashion_booking->calf = $request->calf;
                $fashion_booking->chest = $request->chest;
                $fashion_booking->stomach = $request->stomach;
                $fashion_booking->topHip = $request->topHip;
                $fashion_booking->biceps = $request->biceps;
                $fashion_booking->sleeve = $request->sleeve;
                $fashion_booking->waistToKnee = $request->waistToKnee;

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
                        //      return redirect()->route('booking.index')->with('success', 'Booking created successfully');
                    }
                }
                // Commit the transaction
                DB::commit();
                return redirect()->route('product.booking', $request->fabrics_id)->with('success', 'Booking created successfully');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->route('product.booking', $request->fabrics_id)->withErrors($e->getMessage());
            }
        }
}

}
