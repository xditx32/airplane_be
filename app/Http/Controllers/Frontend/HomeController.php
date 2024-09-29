<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{Airline, Brochure, Product, Category, Gallery, Partner, Promo, Slider};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        $sliders = Slider::get();
        $partners = Partner::get();
        $airlines = Airline::get();
        $galleries = Gallery::get();
        $categories = Category::get();
        $brochures = Brochure::get();
        $promos = Promo::get();
        $products = Product::where('is_open', 'true')->get();

        return view('frontend.home', compact('airlines', 'promos', 'brochures', 'partners','sliders', 'galleries', 'categories', 'categories', 'products', 'products'));
    }
}
