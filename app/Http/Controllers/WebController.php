<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function home(){
        $products = Product::limit(8)->orderBy("id","desc")->get();
        return view("home",compact('products'));
    }

    public function aboutUs(){
        return view("about_us");
    }

    public function detail(Product $product){
        $related_products = Product::CategoryFilter($product->category_id)
            ->where("id","!=",$product->id)
            ->get()->random(4);
        $best_seller_ids = DB::table("order_products")->groupBy("product_id")
                            ->orderBy("sum_qty","desc")
                            ->limit(4)
                            ->select(DB::raw("product_id, sum(qty) as sum_qty"))
                            ->get()
                            ->pluck("product_id")
                            ->toArray();
//        dd($best_seller_ids);
//        $best_sellers = Product::whereIn("id",$best_seller_ids)->get();
        $best_sellers = Product::find($best_seller_ids);
        return view("user.product_detail",
            compact('product','related_products','best_sellers'));
    }

    public function addToCart(Product $product,Request $request){
        $request->validate([
            "qty"=>"required|numeric|min:1"
        ]);
        $cart = session()->has("cart") && is_array(session("cart"))?session("cart"):[];
        $flag = true;
        foreach ($cart as $item){
            if($item->id == $product->id){
                $item->buy_qty += $request->get("qty");
                $flag= false;
                break;
            }
        }
        if($flag){
            $product->buy_qty = $request->get("qty");
            $cart[] = $product;
        }

        session(["cart"=>$cart]);
        return redirect()->back();
    }
}
