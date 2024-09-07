<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{Product, Category};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $categories = Category::get();
        $products = Product::where('is_open', 'true')->get();

        return view('frontend.home', compact('categories', 'categories', 'products', 'products'));
    }
}
