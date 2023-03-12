<?php

namespace App\Http\Controllers\user\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductsCategory;
use Illuminate\Database\Query\Builder;
class UserShopController extends Controller
{
    //

    public function index()
    {
        $category = ProductsCategory::all();
        $products = Products::all();
       return view('user.pages.shop',compact('category','products'));
    }
    public function filter(Request $request)
    {
     // Get the selected values from the request

     $price_order = $request->input('price_order');
     $price_range = $request->input('price_range');


     // Query the products table with the selected filters
     $products = Products::query();




     if ($price_order == 1) {
        // lowest to highest products
        $products->orderBy('selling_price', 'asc');


     }
     if ($price_order == 2) {
        // highest to lowest products
        $products->orderBy('selling_price', 'desc');


     }

     if ($price_range) {
         [$min_price, $max_price] = explode('-', $price_range);
         $products->whereBetween('selling_price', [$min_price, $max_price]);
     }


     $filtered_products = $products->get();
     $category = ProductsCategory::all();
     return view('user.pages.filter',[
         'products' => $filtered_products,
         'category' => $category,
     ]);
        // return response()->json(['product'=> $filtered_products]);
    // Apply filters

}

}
