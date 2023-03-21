<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\OrdersItems;
use App\Models\Products;
use App\Models\payment;
use Illuminate\Support\Facades\Redirect;
use Exception;
use Illuminate\Support\Facades\DB;
use Paystack;

class PaymentController extends Controller
{
    //


    public function redirectToGateway(Request $request)
    {
        if (Auth::check()) {
            validator::make($request->all(), [

                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phone' => 'required',

            ])->validate();
            if (Auth::check()) {
                $cart_id = Cart::where('users_id', Auth::user()->id)->first();
               $cart_items = $cart_id->cart_items;
               $total_price = $cart_items->sum('total_price');
            //    dd($total_price);









            //     // paystack inputs
                $request->merge([
                    "first_name" => Auth::user()->name,
                    "amount" => $total_price * 100,
                    "reference" => paystack()->genTranxRef(),
                    "email" => Auth::user()->email,
                    "phone"=> Auth::user()->phone,
                    "currency" => "NGN",
                    "orderID" => 'LCH' . Auth::user()->id . random_int(100000, 999999999999),
                    "description" => 'payment for products',
                    // 'callback_url'=>route('payment/callback'),



                ]);

                try {
                    $url = paystack()->getAuthorizationUrl()->url;

                    return redirect()->away($url);
                } catch (\Exception $e) {
                    dd($e->getMessage());
                    return Redirect::back()->withMessage(['msg' => 'The paystack Tokeen has expired .Please refresh and try again.', 'type' => 'error']);
                }
            } else {
                return redirect('/login')->with('status', 'Login to continue');
            }
        } else {
            return redirect('/login')->with('status', 'Login to continue');
        }
    }




     public function handleGatewayCallback()
    {
        $paymentDetails = paystack()->getPaymentData();

        // dd($paymentDetails);

        if(!Auth::check()){
            return redirect()->back()->with('error', 'You must be logged in to purchase products.');
        }
        DB::beginTransaction();
        try{
            $inv_id = $paymentDetails['data']['id'];// Getting InvoiceId I passed from the form
            $status = $paymentDetails['data']['status']; // Getting the status of the transaction
            $amount = $paymentDetails['data']['amount']; //Getting the Amount
            $total_selling_price = 0;
            $total_cost_price = 0;
            $carts = Cart::where('users_id', Auth::user()->id)->first();
            foreach ($carts->cart_items as $cart) {
                // Get the product
                $product = Products::findOrFail($cart->products_id);

                // Calculate the total cost
                if($product->discounted_price > 0){
                $total_selling_price += $product->discounted_price   * $cart->qty;
                $total_cost_price += $product->cost_price * $cart->qty;
                }else{
                    $total_selling_price += $product->selling_price   * $cart->qty;
                $total_cost_price += $product->cost_price * $cart->qty;
                }
                // Check if the product has enough quantity in stock
                if ($product->qty < $cart->qty) {
                    throw new Exception("The product '{$product->name}' is out of stock.");
                }

                // Update the product's quantity
                $product->qty -= $cart->qty;
                // $product->save();
            }

            if($status == "success"){

            $order = new  Orders();
            $order->user_id = Auth::id();
            $order->order_no = $this->generateOrderNumber();
            $order->total_selling_price = $total_selling_price;
            $order->total_cost_price = $total_cost_price;
            $order->total_profit = $total_selling_price - $total_cost_price;
            $order->save();


            foreach ($carts->cart_items as $cart) {
                OrdersItems::create([
                    'products_id' => $cart->products_id,
                    'qty' =>  $cart->qty,
                    'price' => $cart->prod->selling_price,
                    'd_price' => $cart->prod->discounted_price,
                    'orders_id' => $order->id,
                    'name' => $cart->prod->name,
                ]);
            }

             // Storing the payment in the database
            Payment::create(
                [
                    'users_id' => Auth::user()->id,
                    'orders_id' => $order->id,
                    'invoice_id'=>$inv_id,
                    'amount'=>$amount,
                    'status'=>1,
                ]);

                $carts->delete();

                DB::commit();
                return redirect()->route('user.account.index')->withSuccess('Payment Successfull');





            }
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('user.account.index')->withErrors($e->getMessage());

        }


        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
    public function generateOrderNumber()
    {
        return 'ORDER' . date('Ymd') . str_pad(rand(1, 99999), 5, 0, STR_PAD_LEFT);
    }
}
