<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";

    //protected $primaryKey = "id";// Nếu là id thì ko cần phải nói

    protected $fillable = [
        "name",
        "image",
        "status"
    ];
}
