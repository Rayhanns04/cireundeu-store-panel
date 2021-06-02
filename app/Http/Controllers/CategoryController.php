<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request) {
        if ($request->has('search')) {
            $categories = Category::where('name', 'LIKE', '%'.$request->search.'%')->get();
        } else  {
            $categories = Category::all();
        }

        return view('categories.index', compact('categories'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'invalid fields', 422]);
        }

        $categories = new Category;
        $categories->name = $request->name;
        $categories->save();

        Session::flash('statuscode', 'success');
        return redirect('/categories')->with('status', 'Success create new category!');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->update();

        Session::flash('statuscode', 'success');
        Session::flash('message', ($category->name));
        return redirect('/categories')->with('status', 'Success update category!');
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/categories');
    }
}
