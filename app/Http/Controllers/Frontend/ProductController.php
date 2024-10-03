<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{Category, Product};
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){

    }

    public function getCategory(Category $category) {
        $categories = Category::all();

         return view('frontend.category', compact('category', 'categories'));
    }

    public function getCategoryProduct(Category $category, Product $product) {

        $categories = Category::where('slug', $category)->get();
        $products = Product::where('slug', $product)->get();
        //$products = Product::with(['category'])->where('is_open', 'true')->get();
        // $products = Product::get();
        //$categories = Category::get();

        return view('frontend.details', compact('categories', 'category', 'products', 'product'));
    }

}
