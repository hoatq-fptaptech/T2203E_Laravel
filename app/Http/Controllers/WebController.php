<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(){
        $products = Product::limit(8)->orderBy("id","desc")->get();
        return view("home",compact('products'));
    }

    public function aboutUs(){
        return view("about_us");
    }
}
