<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\ProductsCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = ProductsCategory::all();

        return view('admin.pages.products.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('admin.pages.products.category.create');

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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image'],
        ]);

        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            // Validation succeeded, create the category
            $category = new ProductsCategory();

            // Save the image
            $image = $request->file('image');
            $image->move(public_path('images/categories'), $image->getClientOriginalName());
            $category->name = $request->name;
            $category->image = $image->getClientOriginalName();
            $category->save();

            return redirect('admin/productsCategory')->with('success', 'Products Category Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        if(Auth::user()->role == 'Admin'){
        $category = ProductsCategory::findorfail($id);

        return view('admin.pages.products.category.edit',compact('category'));
        }else{
            return redirect()->back()->with('error','Access Denied!!');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(Auth::user()->role == 'Admin'){
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'image' => ['image'],
        ]);

        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
        // Update the category
$category = ProductsCategory::find($id);

// Check if the user has uploaded a new image
if ($request->hasFile('image')) {
    // Save the new image
    $image = $request->file('image');
    $image->move(public_path('images/categories'), $image->getClientOriginalName());
    $category->image = $image->getClientOriginalName();
}

$category->name = $request->name;
$category->save();

return redirect('admin/productsCategory')->with('success', 'Products Category Updated Successfully');
        }
    }else{
        return redirect()->back()->with('error','Access Denied!!');

    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Auth::user()->role == 'Admin'){

        $category = ProductsCategory::findOrFail($id);

       
     File::delete(public_path('images/categories/' . $category->image));
      $category->delete();
        return redirect('admin/productsCategory')->with('success', 'Category deleted successfully');
    }else{
        return redirect()->back()->with('error','Access Denied!!');

    }
}
}
