<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listAll(){
//        $data = Product::all();// collection Product object
        // offset = (page - 1) * limit
//        $data = Product::limit(20)->offset(20)->get();
//        $data = Product::limit(20)->orderBy("id","desc")->get();
        $data = Product::orderBy("id","desc")->paginate(20);
//        return view("admin.product.list",compact('data'));
        return view("admin.product.list",[
            "data"=>$data
        ]);
    }

    public function create(){
        $categories = Category::all();
        return view("admin.product.create",compact("categories"));
    }

    public function store(Request $request){
        $data = $request->all();
        Product::create($data);
        return redirect()->to("admin/product");
    }
}
