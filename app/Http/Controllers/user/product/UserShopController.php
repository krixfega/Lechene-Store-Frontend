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
        $products = Products::paginate(8);
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
        // get products according to price range
         [$min_price, $max_price] = explode('-', $price_range);
         $products->whereBetween('selling_price', [$min_price, $max_price]);
     }


     $filtered_products = $products->paginate(8);
     $category = ProductsCategory::all();
     return view('user.pages.filter',[
         'products' => $filtered_products,
         'category' => $category,
     ]);
        // return response()->json(['product'=> $filtered_products]);
    // Apply filters

}
    public function category(Request $request,$id)
    {

        $category = ProductsCategory::findOrFail($id);
        $categoryProd = Products::where('products_categories_id',$id)->paginate(8);
        // dd($categoryProd);
        return view('user.pages.category',compact('category','categoryProd'));



    }

}
