<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $productsCount = Product::all()->count();
        $categoriesCount = Category::all()->count();

        $products = Product::all();
        $categories = Category::all();

        return view('dashboard', compact('productsCount', 'categoriesCount','products','categories'));
    }
}
