<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Cart;
use App\Models\CartItems;

class CartController extends Controller
{
    //
    public function create(Request $request)
    {



        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $product = Products::findOrFail($productId);

        if (Auth::check()) {
            try {
                DB::beginTransaction();
                $cart = Cart::where('users_id', Auth::user()->id)->first();

                if (!$cart) {
                    $cart = Cart::create(['users_id' => Auth::user()->id, 'total_price']);
                }
                $existingItem = $cart->cart_items()->where('products_id', $productId)->first();
                if ($existingItem) {
                    // $existingItem->increment('qty', $quantity);
                    // $existingItem->update(['total_price' => $existingItem->qty * $product->discounted_price]);
                    return response()->json(['info' => 'Product already added to cart']);
                } else {
                    CartItems::create([
                        'carts_id' => $cart->id,
                        'products_id' => $productId,
                        'qty' => $quantity,
                        'total_price' => $quantity * $product->discounted_price,
                    ]);
                }
                DB::commit();
                return response()->json(['success' => 'Product added to cart']);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['error' => 'Error adding product to cart: ' . $e->getMessage()], 500);
            }
        } else {
            return response()->json(['error' => 'Login to Continue']);
        }
    }


    public function show()
    {
        if (Auth::check()) {
            // echo('hi');
            $cart = Cart::where('users_id', Auth::user()->id)->first();
            if($cart){

            return view('user.pages.cart', compact('cart'));
            }else{
                return redirect()->route('home')->with('error','Cart not Found');
            }
            //      else {
            //         return response('info', 'Login to Continue!');
        }
    }
    public function update(Request $request)
    {
        $itemId = $request->input('item_id');
        $newQty = $request->input('qty');

        if (Auth::check()) {
            try {
                DB::beginTransaction();
                $item = CartItems::where('id', $itemId)->first();
                // $product = Cart

                if (!$item) {
                    return response()->json(['error' => 'Item not found in cart']);
                }

                $item->qty = $newQty;
                $item->total_price =  $newQty * $item->prod->discounted_price;

                $item->update();

                DB::commit();
                return response()->json(['success' => 'Cart item quantity updated']);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['error' => 'Error updating cart item quantity: ' . $e->getMessage()], 500);
            }
        } else {
            return response()->json(['error' => 'Login to Continue']);
        }
    }

    public function delete(Request $request,$id)
    {


        if (Auth::check()) {
            try {
                DB::beginTransaction();
                $cart = Cart::where('users_id', Auth::user()->id)->firstOrFail();

                $item = CartItems::where('carts_id', $cart->id)->where('id', $id)->firstOrFail();
                $item->delete();
                DB::commit();
                return redirect()->back();
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->with('error' ,'Error deleting item from cart: ' . $e->getMessage());
            }
        } else {
            return redirect()->route('home')->with('error', 'Login to Continue');
        }
    }
    public function count()
    {
        if (Auth::check()) {
            $cart = Cart::where('users_id', Auth::user()->id)->first();
            $count = $cart ? $cart->cart_items()->count() : 0;
        } else {
            $count = 0;
        }
        return response()->json(['count' => $count]);
    }

    public function checkout()
    {
        $cart = Cart::where('users_id', Auth::user()->id)->firstOrFail();
        $cartitem = CartItems::where('carts_id', $cart->id)->get();
        return view('user.pages.checkout', compact('cart', 'cartitem'));
    }
}
