<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{Partner};
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {

         $partners = Partner::get();

        return view('frontend.about', compact('partners'));
    }
}
