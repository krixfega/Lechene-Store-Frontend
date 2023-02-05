<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use App\Models\ProductsCategory;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\fibrics;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fibrics = fibrics::all();
        $categories = ProductsCategory::all();
        $products = Products::with('Category')->get();
        return view('admin.pages.products.index',compact('categories','products','fibrics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = ProductsCategory::all();

        return view('admin.pages.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' => ['required', 'string'],
        'images' => 'required|array',
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'products_categories_id' => ['required'],
        'cost_price'=>['required','string'],
        'selling_price'=>['required','string'],
        'discounted_price'=>['string'],
        'qty'=>['required'],
        'size'=>['required'],
        'details'=>['required'],
    ]);

    if ($validator->fails()) {
        // Validation failed
        return redirect()->back()
            ->withInput()
            ->withErrors($validator);
    } else {
        // Save the Product
        $product = new Products;
        $product->name = $request->input('name');
        $product->products_categories_id = $request->input('products_categories_id');
        $product->cost_price = $request->input('cost_price');
        $product->selling_price = $request->input('selling_price');
        $product->discounted_price = $request->input('discounted_price');
        $product->qty = $request->input('qty');
        $product->size = $request->input('size');
        $product->details = $request->input('details');
        $product->saveOrFail();

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $upload_path = public_path(). '/images/products';
            foreach($files as $file) {
                $file_name = uniqid(). '.' .$file->getClientOriginalExtension();
                $file->move($upload_path, $file_name);
                // save into database
                $product_images = new ProductImages();
                $product_images->products_id = $product->id;
                $product_images->name = $file_name;

                $product_images->saveOrFail();
                // echo($product_images->name);
            }
            return redirect()->route('products.index')->with('success', 'Product added successfully!');
        }
        else{
            echo('no image');
        }

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
        $product = Products::findOrFail($id);
        $images = ProductImages::where('products_id',$id)->get();
        return view('admin.pages.products.show',compact('product','images'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit products
        $categories = ProductsCategory::all();
        $product = Products::findOrFail($id);
        return view('admin.pages.products.edit',compact('product','categories'));



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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'images' => 'array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'products_categories_id' => ['required'],
            'cost_price'=>['required','string'],
            'selling_price'=>['required','string'],
            'discounted_price'=>['string'],
            'qty'=>['required'],
            'size'=>['required'],
            'details'=>['required'],
        ]);

        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            // Save the Product
            $product = Products::findOrFail($id);
            $product->name = $request->input('name');
            $product->products_categories_id = $request->input('products_categories_id');
            $product->cost_price = $request->input('cost_price');
            $product->selling_price = $request->input('selling_price');
            $product->discounted_price = $request->input('discounted_price');
            $product->qty = $request->input('qty');
            $product->size = $request->input('size');
            $product->details = $request->input('details');
            $product->updateOrFail();

            if ($request->hasFile('images')) {
            $files = $request->file('images');
            $upload_path = public_path(). '/images/products';
            $images = ProductImages::where('products_id', $product->id)->get();
            foreach($files as $key=>$file) {
                $file_name = uniqid(). '.' .$file->getClientOriginalExtension();
                $file->move($upload_path, $file_name);
                // update into database
                if(isset($images[$key])){
                    $product_images = $images[$key];
                    $product_images->name = $file_name;
                    $product_images->updateOrFail();
                    // echo($product_images->name);
                }
            }
                

        }
  return redirect()->route('products.index')->with('success', 'Product updated successfully!'); 
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
        $product = Products::findOrFail($id);
    $product_images = ProductImages::where('products_id', $product->id)->get();
    // delete product images
    foreach($product_images as $image) {
        $path = public_path().'/images/products/'. $image->name;
        if(File::exists($path)){
            File::delete($path);
        }
        $image->delete();
    }
    // delete product
    $product->delete();
    return redirect()->route('products.index')->with('success', 'Product deleted successfully!');

    }
}
