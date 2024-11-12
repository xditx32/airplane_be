<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{Airline, BlogScrap, Brochure, Product, Category, Promo, Services, Slider, Testimonial};
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(){

        $active = TRUE;

        $sliders = Slider::get();
        $services = Services::get();
        $testimonials = Testimonial::get();
        $blogscraps = BlogScrap::get();
        $airlines = Airline::get();
        $categories = Category::get();
        $brochures = Brochure::get();
        $promos = Promo::where('is_active', $active)->get();
        $products = Product::where('is_open', $active)->get();

        return view('frontend.home', compact('blogscraps', 'airlines', 'promos', 'brochures','sliders', 'categories', 'categories', 'products', 'products', 'services', 'testimonials'));
    }
}
