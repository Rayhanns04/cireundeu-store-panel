<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request) {
        if ($request->has('search')) {
            $products = Product::where('title', 'LIKE', '%'.$request->search.'%')->get();
        } else {
            $products = Product::all();
        }

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $sub_categories = SubCategory::all();

        return view('products.create', compact('sub_categories'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'invalid fields', 422, 'error' => $validator->errors()]);
        }

        $nm = $request->image;
        $fileName = time().rand(100, 999).".".$nm->getClientOriginalExtension();

        $product = new Product;
        $product->image = $fileName;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sub_category_id = $request->category_name;

        $nm->move(public_path().'/assets/images/productsImage', $fileName);
        $product->save();

        Session::flash('statuscode', 'success');
        return redirect('/products')->with('status', 'Success create new product!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $subCategories = SubCategory::all();

        return view('products.edit', compact('product', 'subCategories'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'invalid fields', 422]);
        }

        $product = Product::findOrFail($id);
        $before = $product->image;

        $product->image = $before;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sub_category_id = $request->category_name;

        $request->image->move(public_path().'/assets/images/productsImage', $before);
        $product->update();

        Session::flash('statuscode', 'success');
        Session::flash('message', ($product->title));
        return redirect('/products')->with('status', 'Success update product!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $file = public_path('assets\images\productsImage\\').$product->image;

        if (file_exists($file)) {
            @unlink($file);
        }

        $product->delete();
        return redirect('/products');

    }
}
