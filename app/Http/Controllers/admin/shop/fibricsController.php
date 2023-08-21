<?php

namespace App\Http\Controllers\admin\shop;

use App\Http\Controllers\Controller;
use App\Models\fibrics;
use App\Models\fibricsImages;
use App\Models\Products;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class fibricsController extends Controller
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
        return view('admin.pages.products.index', compact('categories', 'products', 'fibrics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('admin.pages.fabrics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //ProductController.php

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'typeOrColors' => 'required|string',
            'qty' => 'required|numeric',
            'category' => 'required|string',
            'cost_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'details' => 'required|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $fibrics = new fibrics();
        $fibrics->name = $request->name;
        $fibrics->typeOrColors = $request->typeOrColors;
        $fibrics->qty = $request->qty;
        $fibrics->category = $request->category;
        $fibrics->cost_price = $request->cost_price;
        $fibrics->selling_price = $request->selling_price;
        $fibrics->details = $request->details;
        $fibrics->save();

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $upload_path = public_path() . '/images/fibrics';
            foreach ($files as $file) {
                $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($upload_path, $file_name);
                // save into database
                $fibrics_images = new fibricsImages();
                $fibrics_images->fibrics_id = $fibrics->id;
                $fibrics_images->name = $file_name;

                $fibrics_images->saveOrFail();
            }
        }

        return redirect()->route('products.index')->with('success', 'Fibrics added successfully.');
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
        $fibric = fibrics::findOrFail($id);
        return view('admin.pages.fibrics.show', compact('fibric'));
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
        if (Auth::user()->role == 'Admin') {

            $fibric = fibrics::findOrFail($id);
            return view('admin.pages.fibrics.edit', compact('fibric'));
        } else {
            return redirect()->back()->with('error', 'Access Denied!!');
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
        $request->validate([
            'name' => 'required|string',
            'typeOrColors' => 'required|string',
            'qty' => 'required|numeric',
            'category' => 'required|string',
            'cost_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'details' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if (Auth::user()->role == 'Admin') {

            $fibrics = fibrics::findOrFail($id);
            $fibrics->name = $request->name;
            $fibrics->typeOrColors = $request->typeOrColors;
            $fibrics->qty = $request->qty;
            $fibrics->category = $request->category;
            $fibrics->cost_price = $request->cost_price;
            $fibrics->selling_price = $request->selling_price;
            $fibrics->details = $request->details;
            $fibrics->updateOrFail();

            if ($request->hasFile('images')) {
                $files = $request->file('images');
                $upload_path = public_path() . '/images/fibrics';
                foreach ($files as $file) {
                    $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move($upload_path, $file_name);
                    // save into database
                    $fibrics_images = new fibricsImages();
                    $fibrics_images->fibrics_id = $fibrics->id;
                    $fibrics_images->name = $file_name;

                    $fibrics_images->updateOrFail();
                }
            }

            return redirect()->route('products.index')->with('success', 'Fibrics Updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Access Denied!!');
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
        if (Auth::user()->role == 'Admin') {


            $fibric = fibrics::findOrFail($id);
            $fibric_images = fibricsImages::where('fibrics_id', $fibric->id)->get();
            // delete product images
            foreach ($fibric_images as $image) {
                $path = public_path() . '/images/fibrics/' . $image->name;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $image->delete();
            }
            // delete product
            $fibric->delete();

            return redirect()->route('products.index')->with('success', 'Fibrics Deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Access Denied!!');
        }
    }
}
