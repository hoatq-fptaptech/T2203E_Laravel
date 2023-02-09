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
        $request->validate([
            "name"=>"required|string|min:6",
            "price"=>"required|numeric|min:0",
            "qty"=>"required|numeric|min:0",
            "category_id"=>"required",
            "thumbnail"=>"required|image|mimes:jpg,png,jpeg,gif"
        ],[
            "required"=>"Vui lòng nhập thông tin",
            "string"=> "Phải nhập vào là một chuỗi văn bản",
            "min"=> "Phải nhập :attribute  tối thiểu :min",
            "mimes"=>"Vui lòng nhập đúng định dạng ảnh"
        ]);

        $thumbnail = null;
        if($request->hasFile("thumbnail")){
            $file = $request->file("thumbnail");
            $fileName = time().$file->getClientOriginalName();
//            $ext = $file->getClientOriginalExtension();
//            $fileName = time().".".$ext;
            $path = public_path("uploads");
            $file->move($path,$fileName);
            $thumbnail = "uploads/".$fileName;
        }

        $product = Product::create([
            "name"=>$request->get("name"),
            "price"=>$request->get("price"),
            "thumbnail"=>$thumbnail,
            "description"=>$request->get("description"),
            "qty"=>$request->get("qty"),
            "category_id"=>$request->get("category_id"),
        ]);
        return redirect()->to("admin/product");
    }

    public function edit(Product $product){
        // dung id de tim product
//        $product = Product::find($id);
//        if($product==null){
//            return abort(404);
//        }

//        $product = Product::findOrFail($id);

        $categories = Category::all();
        return view("admin.product.edit",compact("categories",'product'));
    }

    public function update(Product $product, Request $request){
        $request->validate([
            "name"=>"required|string|min:6",
            "price"=>"required|numeric|min:0",
            "qty"=>"required|numeric|min:0",
            "category_id"=>"required",
            "thumbnail"=>"nullable|image|mimes:jpg,png,jpeg,gif"
        ],[
            "required"=>"Vui lòng nhập thông tin",
            "string"=> "Phải nhập vào là một chuỗi văn bản",
            "min"=> "Phải nhập :attribute  tối thiểu :min",
            "mimes"=>"Vui lòng nhập đúng định dạng ảnh"
        ]);

        $thumbnail = $product->thumbnail;
        if($request->hasFile("thumbnail")){
            $file = $request->file("thumbnail");
            $fileName = time().$file->getClientOriginalName();
            $path = public_path("uploads");
            $file->move($path,$fileName);
            $thumbnail = "uploads/".$fileName;
        }

        $product->update([
            "name"=>$request->get("name"),
            "price"=>$request->get("price"),
            "thumbnail"=>$thumbnail,
            "description"=>$request->get("description"),
            "qty"=>$request->get("qty"),
            "category_id"=>$request->get("category_id"),
        ]);
        return redirect()->to("admin/product");
    }
}
