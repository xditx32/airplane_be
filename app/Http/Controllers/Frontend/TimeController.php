<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{Product, Category, Partner,};
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index() {

        $active = TRUE;

        $partners = Partner::get();
        $categories = Category::get();
        $products = Product::where('is_open', $active)->get();


        return view('frontend.time', compact('categories', 'categories', 'products', 'products', 'partners'));
    }
}
