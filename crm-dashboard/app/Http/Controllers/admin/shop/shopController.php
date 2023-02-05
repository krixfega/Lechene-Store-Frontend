<?php

namespace App\Http\Controllers\admin\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Orders;
use App\Models\OrdersItems;
use App\Models\Products;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Facades\Validator;

class shopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Products::where('qty', '>', 0)->get();
        return view('admin.pages.shop.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Orders::findOrFail($id);

        return view('admin.pages.shop.orders.view', compact('order'));
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        $orders_status = Orders::findOrFail($id);
        $orders_status->status = $request->status;
        $orders_status->update();
        return redirect()->route('orders.history')->with('success','Order status Updated successfully');
    }
    public function update(Request $request, $id)
    {
        //
        // dd('hi');
        if ($request->has(['id', 'quantity'])) {
            $cart = session()->get('products');
            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('products', $cart);
            session()->flash('success', 'Cart updated successfully');
        } else {
            echo ('wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // echo('hi');
        if ($request->id) {

            $cart = session()->get('products');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put("products", $cart);
            }
            session()->flash('status', 'product removed successfuly');
        }
    }

    public function addToCart($id)
    {
        # code...
        $product = Products::findOrFail($id);

        // check if the product is already in the cart
        $cart = session()->get('products', []);

        if (isset($cart[$id])) {
            // check if there's still available quantity for the product
            if ($product->qty > $cart[$id]['quantity']) {
                $cart[$id]['quantity']++;
            }
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "selling_price" => $product->selling_price,
                "cost_price" => $product->cost_price,
                "id" => $product->id,
                "qty" => $product->qty,
            ];
        }

        session()->put('products', $cart);
        return redirect()->back();
    }

    public function delete($id)
    {
        // dd($id);
        if(Auth::user()->role == 'Admin'){

        $order = Orders::findOrFail($id);
        $order->delete();
        return redirect()->back()->with('success','orders deleted successfully');
        }else{
        return redirect()->back()->with('error','Access Denied');

        }

    }



    public function sell()
    {
        // Check for user authentication
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to purchase products.');
        }

        // Validate input data


        // Start a database transaction
        DB::beginTransaction();

        try {
            $total_selling_price = 0;
            $total_cost_price = 0;
            $carts = session()->get('products');

            foreach ($carts as $cart) {
                // Get the product
                $product = Products::findOrFail($cart['id']);

                // Calculate the total cost
                $total_selling_price += $cart['selling_price'] * $cart['quantity'];
                $total_cost_price += $cart['cost_price'] * $cart['quantity'];

                // Check if the product has enough quantity in stock
                if ($product->qty < $cart['quantity']) {
                    throw new Exception("The product '{$product->name}' is out of stock.");
                }

                // Update the product's quantity
                $product->qty -= $cart['quantity'];
                $product->save();
            }

            // Create the order
            $order = new Orders();
            $order->user_id = Auth::id();
            $order->order_no = $this->generateOrderNumber();
            $order->total_selling_price = $total_selling_price;
            $order->total_cost_price = $total_cost_price;
            $order->total_profit = $total_selling_price - $total_cost_price;
            $order->save();

            // Create the order items
            foreach ($carts as $id => $cart) {
                OrdersItems::create([
                    'products_id' => $cart['id'],
                    'qty' => $cart['quantity'],
                    'price' => $cart['selling_price'],
                    'orders_id' => $order->id,
                    'name' => $cart['name'],
                ]);
            }

            // Commit the transaction
            DB::commit();

            // Clear the cart from the session
            session()->forget('products');

            return redirect()->back()->with('success', 'Products sold successfully.');
        } catch (Exception $e) {
            // Rollback the transaction
            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function generateOrderNumber()
    {
        return 'ORDER' . date('Ymd') . str_pad(rand(1, 99999), 5, 0, STR_PAD_LEFT);
    }

    public function orders()
    {
        // show all pending orders
        $orders = Orders::where('status', 'pending')->get();
        return view('admin.pages.shop.orders.index', compact('orders'));
    }
    public function history()
    {
        // show all orders history
        $orders = Orders::all();
        return view('admin.pages.shop.orders.history', compact('orders'));
    }

    public function invoice($id)
    {
        //show orders items
        $order = Orders::findOrFail($id);
        $pdf = Pdf::loadView('admin.pages.shop.orders.invoice', compact('order'));
        // dd($_dompf_warnings);
        return $pdf->download($order->order_no . '.pdf');
    
        
    }
}
