<?php

namespace App\Models;

use App\Events\NewOrder;
use App\Mail\MailOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Pusher\Pusher;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = [
        "order_date",
        "grand_total",
        "shipping_address",
        "customer_tel",
        "status",
        "fullname",
        "country",
        "city",
        "zip",
        "email"
    ];

    public function Products(){
//        return $this->belongsToMany(Product::class,"order_products","order_id","product_id","id","id");
        return $this->belongsToMany(Product::class,"order_products");
    }

    public function createItems(){
        $cart = session()->has("cart") && is_array(session("cart"))?session("cart"):[];
        foreach ($cart as $item){
            DB::table("order_products")->insert([
                "qty"=>$item->buy_qty,
                "price"=>$item->price,
                "order_id"=>$this->id,
                "product_id"=>$item->id
            ]);
        }
        // phat event
        event(new NewOrder($this));
    }

}
