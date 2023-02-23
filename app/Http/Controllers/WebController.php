<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

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

    public function cart(){
        $cart = session()->has("cart") && is_array(session("cart"))?session("cart"):[];
        $grand_total = 0;
        $can_checkout = true;
        foreach ($cart as $item){
            $grand_total += $item->price * $item->buy_qty;
            if($can_checkout && $item->qty ==0){
                $can_checkout =  false;
            }
        }

        return view("user.cart",compact('cart',"grand_total",'can_checkout'));
    }
    public function checkout(){
        $cart = session()->has("cart") && is_array(session("cart"))?session("cart"):[];
        if(count($cart) == 0){
            return redirect()->to("/cart");
        }
        $grand_total = 0;
        foreach ($cart as $item){
            $grand_total += $item->price * $item->buy_qty;
        }
        return view("user.checkout",compact('cart',"grand_total"));
    }

    public function remove(Product $product){
        $cart = session()->has("cart") && is_array(session("cart"))?session("cart"):[];
        foreach ($cart as $key=>$item){
            if($item->id == $product->id){
                unset($cart[$key]);
                break;
            }
        }
        session(["cart"=>$cart]);
        return redirect()->back();
    }

    public function placeOrder(Request $request){
        $request->validate([
           "firstname"=>"required",
           "lastname"=>"required",
           "country"=>"required",
           "address"=>"required",
           "city"=>"required",
           "zip"=>"required",
           "phone"=>"required",
           "email"=>"required",
        ]);
        $cart = session()->has("cart") && is_array(session("cart"))?session("cart"):[];
        if(count($cart) == 0) return abort(404);
        $grand_total = 0;
        $can_checkout = true;
        foreach ($cart as $item){
            $grand_total += $item->price * $item->buy_qty;
            if($can_checkout && $item->qty ==0){
                $can_checkout =  false;
            }
        }
        if(!$can_checkout) return abort(404);

        $order = Order::create([
            "order_date"=> now(),
            "grand_total"=>$grand_total,
            "shipping_address"=> $request->get("address"),
            "customer_tel"=>$request->get("phone"),
//            "status"=>0,
            "fullname" => $request->get("firstname")." ".$request->get("lastname"),
            "country"=>$request->get("country"),
            "city"=>$request->get("city"),
            "zip"=>$request->get("zip"),
            "email"=>$request->get("email")
        ])->createItems();
      //  $order->createItems();
        return redirect()->to("/");
    }

    public function sendNotification(){
        $data['message'] = 'Có một đơn hàng mới';
        $data["order_id"] = 55;
        notification("my-channel",'my-event',$data);
    }
}
