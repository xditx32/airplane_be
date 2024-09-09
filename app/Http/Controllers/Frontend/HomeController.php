<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{Brochure, Product, Category, Gallery, Partner, Slider};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $sliders = Slider::get();
        $partners = Partner::get();
        $galleries = Gallery::get();
        $categories = Category::get();
        $brochures = Brochure::get();
        $products = Product::where('is_open', 'true')->get();

        return view('frontend.home', compact('brochures', 'partners','sliders', 'galleries', 'categories', 'categories', 'products', 'products'));
    }
}
