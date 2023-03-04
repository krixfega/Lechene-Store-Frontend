<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Orders;
use App\Models\OrdersItems;
use App\Models\fibrics;
use App\Models\Tailor;
use App\Models\fashionBooking;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class AdminPagesController extends Controller
{
    //

    // public function index()
    // {
    //     # code...
    //     return view('admin.pages.dashboard.index');
    // }

    public function profile(){
        return view('admin.pages.dashboard.profile');
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator =Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'required|max:255',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date',
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
    $user->gender = $request->gender;
    $user->dob = $request->dob;

        $user->update();

        return redirect()->back()->withSuccess('Profile updated successfully.');
    }
    }


    public function index()
    {
        // total sales
        $total_sales = Orders::sum('total_selling_price');

        // total yearly income


        // $yearly_booking_income
        $total_booking_sales = fashionBooking::sum('income');
        $total_income = 0;
        $total_tailor_fee = 0;
        $fashion_bookings = fashionBooking::whereYear('created_at', Carbon::now()->year)->get();
        if ($fashion_bookings) {

            foreach ($fashion_bookings as $fashion_booking) {
                $total_income += $fashion_booking->income;

                $tailor = Tailor::where('booking_id', $fashion_booking->id)->first();
                if ($tailor) {
                    $total_tailor_fee += $tailor->total_price;
                }
            }
            // total yealy booking income
            $net_annual_booking_income = Cache::remember('net_annual_booking_income', 60, function () use ($total_income, $total_tailor_fee) {
                return $total_income - $total_tailor_fee;
            });
        }
        // yearly income increase %
        $total_income = 0;
        $total_tailor_fee = 0;
        $fashion_bookings = fashionBooking::whereYear('created_at', Carbon::now()->subYear()->year)->get();
        if ($fashion_bookings) {

            foreach ($fashion_bookings as $fashion_booking) {
                $total_income += $fashion_booking->income;

                $tailor = Tailor::where('booking_id', $fashion_booking->id)->first();
                if ($tailor) {
                    $total_tailor_fee += $tailor->total_price;
                }
            }
            // total booking income
            $prev_net_annual_booking_income = Cache::remember(' prev_net_annual_booking_income', 60, function () use ($total_income, $total_tailor_fee) {
                return $total_income - $total_tailor_fee;
            });
            //   dd( $prev_net_annual_booking_income);
            if ($prev_net_annual_booking_income != 0) {
                $yearly_booking_increase = round(($net_annual_booking_income - $prev_net_annual_booking_income) / $prev_net_annual_booking_income * 100, 1);
            } else {
                $yearly_booking_increase = 0;
            }
            // dd($yearly_booking_increase);

        }




        $total_income = 0;
        $total_tailor_fee = 0;
        $fashion_bookings = fashionBooking::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->get();
        if ($fashion_bookings) {

            foreach ($fashion_bookings as $fashion_booking) {
                $total_income += $fashion_booking->income;

                $tailor = Tailor::where('booking_id', $fashion_booking->id)->first();
                if ($tailor) {
                    $total_tailor_fee += $tailor->total_price;
                }
            }
            // total booking income
            $net_monthly_booking_income = Cache::remember(' net_monthly_booking_income', 60, function () use ($total_income, $total_tailor_fee) {
                return $total_income - $total_tailor_fee;
            });

            //   dd( $net_monthly_booking_income);

            // dd($yearly_booking_increase);


        }

        $total_income = 0;
        $total_tailor_fee = 0;
        $fashion_bookings = fashionBooking::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)->get();
        if ($fashion_bookings) {

            foreach ($fashion_bookings as $fashion_booking) {
                $total_income += $fashion_booking->income;

                $tailor = Tailor::where('booking_id', $fashion_booking->id)->first();
                if ($tailor) {
                    $total_tailor_fee += $tailor->total_price;
                }
            }
            // total booking income
            $prev_net_monthly_booking_income = Cache::remember('prev_net_monthly_booking_income', 60, function () use ($total_income, $total_tailor_fee) {
                return $total_income - $total_tailor_fee;
            });
            //   dd( $prev_net_annual_booking_income);
            if ($prev_net_monthly_booking_income != 0) {
                $monthly_booking_increase = round(($net_monthly_booking_income - $prev_net_monthly_booking_income) / $prev_net_monthly_booking_income * 100, 1);
            } else {
                $monthly_booking_increase = 0;
            }
            // dd($monthly_booking_increase);

        }



        // total daily income
        $daily_income = Orders::whereDate('created_at', Carbon::today())->sum('total_profit');
        // total yesterday income
        $yesterday_income = Orders::whereDate('created_at', Carbon::yesterday())->sum('total_profit');
        // daily percentage profit
        if ($yesterday_income != 0) {
            $daily_percent_increase = ($daily_income - $yesterday_income) / $yesterday_income * 100;
        } else {
            $daily_percent_increase = 0;
        }


        // daily booking income
        $total_income = 0;
        $total_tailor_fee = 0;
        $fashion_bookings = fashionBooking::whereDate('created_at', Carbon::today())->get();
        if ($fashion_bookings) {

            foreach ($fashion_bookings as $fashion_booking) {
                $total_income += $fashion_booking->income;

                $tailor = Tailor::where('booking_id', $fashion_booking->id)->first();
                if ($tailor) {
                    $total_tailor_fee += $tailor->total_price;
                }
            }

            $net_daily_booking_income = Cache::remember(' net_daily_booking_income', 60, function () use ($total_income, $total_tailor_fee) {
                return $total_income - $total_tailor_fee;
            });

            //   dd( $net_daily_booking_income);

        }
        // INCREASED DAILY BOOKING INCOME
        $total_income = 0;
        $total_tailor_fee = 0;
        $fashion_bookings = fashionBooking::whereDate('created_at', Carbon::yesterday())->get();
        if ($fashion_bookings) {

            foreach ($fashion_bookings as $fashion_booking) {
                $total_income += $fashion_booking->income;

                $tailor = Tailor::where('booking_id', $fashion_booking->id)->first();
                if ($tailor) {
                    $total_tailor_fee += $tailor->total_price;
                }
            }
            // total booking income
            $prev_net_daily_booking_income = Cache::remember('prev_net_daily_booking_income', 60, function () use ($total_income, $total_tailor_fee) {
                return $total_income - $total_tailor_fee;
            });
            //   dd( $prev_net_annual_booking_income);
            if ($prev_net_daily_booking_income != 0) {
                $daily_booking_increase = round(($net_daily_booking_income - $prev_net_daily_booking_income) / $prev_net_daily_booking_income * 100, 1);
            } else {
                $daily_booking_increase = 0;
            }
            // dd($daily_booking_increase);

        }


        // weekly income
        $weekly_income = Orders::whereMonth('created_at', Carbon::now()->month)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total_profit');
        // last week income
        $last_week_income = Orders::whereMonth('created_at', Carbon::now()->month)->whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->sum('total_profit');
        // weekly pecentage profit
        if ($last_week_income != 0) {
            $weekly_increase = (($weekly_income - $last_week_income) / $last_week_income) * 100;
        } else {
            $weekly_increase = 0;
        }


        //WEEKLY BOOKING INCOME
        $total_income = 0;
        $total_tailor_fee = 0;
        $fashion_bookings = fashionBooking::whereMonth('created_at', Carbon::now()->month)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        if ($fashion_bookings) {

            foreach ($fashion_bookings as $fashion_booking) {
                $total_income += $fashion_booking->income;

                $tailor = Tailor::where('booking_id', $fashion_booking->id)->first();
                if ($tailor) {
                    $total_tailor_fee += $tailor->total_price;
                }
            }

            $net_weekly_booking_income = Cache::remember(' net_weekly_booking_income', 60, function () use ($total_income, $total_tailor_fee) {
                return $total_income - $total_tailor_fee;
            });

            //   dd( $net_weekly_booking_income);

        }
        //WEEKLY BOOKING INCOME INCREASE
        $total_income = 0;
        $total_tailor_fee = 0;
        $fashion_bookings = fashionBooking::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->get();
        if ($fashion_bookings) {

            foreach ($fashion_bookings as $fashion_booking) {
                $total_income += $fashion_booking->income;

                $tailor = Tailor::where('booking_id', $fashion_booking->id)->first();
                if ($tailor) {
                    $total_tailor_fee += $tailor->total_price;
                }
            }
            // total booking income
            $prev_net_weekly_booking_income = Cache::remember('prev_net_weekly_booking_income', 60, function () use ($total_income, $total_tailor_fee) {
                return $total_income - $total_tailor_fee;
            });
            //   dd( $prev_net_annual_booking_income);
            if ($prev_net_weekly_booking_income != 0) {
                $weekly_booking_increase = round(($net_weekly_booking_income - $prev_net_weekly_booking_income) / $prev_net_weekly_booking_income * 100, 1);
            } else {
                $weekly_booking_increase = 0;
            }
            // dd($weekly_booking_increase);

        }









        // total Customers
        $total_customers = User::where('role', 'User')->count();
        // last week Customers
        $last_week_users = User::where('role', 'User')->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->count();
        // increased customers
        $increased_users = $total_customers - $last_week_users;
        // increased customers percentage
        if ($last_week_users != 0) {
            $users_percentage_increase = ($increased_users / $last_week_users) * 100;
        } else {
            $users_percentage_increase = 0;
        }

        // PENDING ORDERS
        $pending_orders = Orders::where('status', 'pending')->count();

        // APPROVED OREDRS
        $approved_orders = Orders::where('status', 'approved')->count();


        $total_booking = fashionBooking::count();
        $last_week_bookings = fashionBooking::whereYear('created_at', Carbon::now()->year)
        ->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->count();
        $increased_booking = $total_booking- $last_week_bookings;
        if($last_week_bookings != 0){
            $bookings_percentage_increase =round(($increased_booking/$last_week_bookings) * 100, 1);
        }else{
            $bookings_percentage_increase = 0;
        }
        $pending_booking = fashionBooking::where('bookingStatus','pending')->count();
        $approved_booking = fashionBooking::where('bookingStatus','approved')->count();
        $jan_income = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', 1)
            ->sum('total_profit');

        $feb_income = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', 2)
            ->sum('total_profit');
        $mar_income = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', 3)
            ->sum('total_profit');
        $apr_income = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', 4)
            ->sum('total_profit');
        $may_income = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', 5)
            ->sum('total_profit');
        $jun_income = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', 6)
            ->sum('total_profit');
        $jul_income = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', 7)
            ->sum('total_profit');
        $aug_income = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', 8)
            ->sum('total_profit');
        $sep_income = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', 9)
            ->sum('total_profit');
        $oct_income = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', 10)
            ->sum('total_profit');
        $nov_income = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', 11)
            ->sum('total_profit');

        $dec_income = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', 12)
            ->sum('total_profit');

        $top_sold_products = ordersItems::with('products')
            ->selectRaw('products_id, sum(qty) as total_quantity')
            ->groupBy('products_id')
            ->orderByDesc('total_quantity')
            ->limit(10)
            ->get();
        //   dd($top_sold_products);


        return view(
           'admin.pages.dashboard.index',
            compact(

                'daily_income',
                'daily_percent_increase',


                'pending_orders',
                'approved_orders',

                'total_customers',
                'users_percentage_increase',
                'jan_income',
                'feb_income',
                'mar_income',
                'apr_income',
                'may_income',
                'jun_income',
                'jul_income',
                'aug_income',
                'sep_income',
                'oct_income',
                'nov_income',
                'dec_income',
                'top_sold_products',




                'net_annual_booking_income',
                'yearly_booking_increase',
                'net_monthly_booking_income',
                'monthly_booking_increase',
                'net_daily_booking_income',
                'daily_booking_increase',
                'net_weekly_booking_income',
                'weekly_booking_increase',
                'total_booking',
                'bookings_percentage_increase',
                'total_booking_sales',
                 'pending_booking',
                 'approved_booking',


            )

        );
    }
}
