<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function autoComplete()
    {


        $products= Products::select('name')->where('qty','>', '0')->get();
        $data = [];
        foreach($products as $item){
            $data[] = $item['name'];
        }
        return $data;
    }


    public function search(Request $request)
    {
        $result= $request->search;
        if($result != ""){
        $product = Products::where('name','LIKE',"%$result%")->first();
        if($product){
            return redirect('product/'.$product->id);
        }else{
            return redirect()->back()->with('error',"PRODUCT NOT FOUND!!!");
        }

        }else{
            return redirect()->back();
        }
    }
}
