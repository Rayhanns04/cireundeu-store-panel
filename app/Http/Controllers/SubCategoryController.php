<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function index(Request $request) {
        if ($request->has('search')) {
            $categories = SubCategory::where('name', 'LIKE', '%'.$request->search.'%')->get();
        } else  {
            $categories = SubCategory::all();
        }

        return view('subcategories.index', compact('categories'));
    }

    public function create() {
        $categories = Category::all();

        return view('subcategories.create', compact('categories'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'category_name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'invalid fields', 422]);
        }

        $categories = new SubCategory;
        $categories->name = $request->name;
        $categories->category_id = $request->category_name;
        $categories->save();

        Session::flash('statuscode', 'success');
        return redirect('/subcategories')->with('status', 'Success create new category!');
    }

    public function edit($id) {
        $category = SubCategory::findOrFail($id);
        $categories = Category::all();

        return view('subcategories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id) {
        $category = SubCategory::findOrFail($id);

        $category->name = $request->name;
        $category->category_id = $request->category_name;
        $category->update();

        Session::flash('statuscode', 'success');
        Session::flash('message', ($category->name));
        return redirect('/subcategories')->with('status', 'Success update category!');
    }

    public function destroy($id) {
        $category = SubCategory::findOrFail($id);
        $category->delete();

        return redirect('/subcategories');
    }
}
