<?php

namespace App\Http\Controllers\user\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductsCategory;

class UserShopController extends Controller
{
    //

    public function index()
    {
        $category = ProductsCategory::all();
       return view('user.pages.shop',compact('category'));
    }
    public function filter(Request $request)
{
    $products = Products::query();

    // Apply filters

}

}
