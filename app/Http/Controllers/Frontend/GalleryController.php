<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{CategoryGallery, Gallery, Partner};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GalleryController extends Controller
{
    public function index(){
        $galleries = Gallery::get();
        $category_galleries = CategoryGallery::get();
        $partners = Partner::get();

        // $response = Http::post('https://amphuri.org/berita-haji-umrah/',[
        //     'post-title'
        // ]);
        // $response = Http::get('http://alia.rentalmobilteratejakarta.com/');

        // $jsonData = $response->collect();
        // $jsonData = $response->json();

        // dd($jsonData);

          return view('frontend.gallery', compact('category_galleries', 'galleries',  'partners'));
    }
}
