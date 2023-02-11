<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public function Products(){
//        return $this->belongsToMany(Product::class,"order_products","order_id","product_id","id","id");
        return $this->belongsToMany(Product::class,"order_products");
    }
}
