<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\OrderItems;
use App\Models\fibrics;


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

    public function singleProduct($id)
    {
        //
        $product = Products::findOrFail($id);
        return view('user.pages.single_product', compact('product'));
    }


    public function booking(Request $request, $id)
    {

        $bispock = fibrics::findOrFail($id);
        return view('user.pages.booking', compact('bispock'));
    }
}
