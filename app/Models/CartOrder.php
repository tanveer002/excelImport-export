<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartOrder extends Model
{
    use HasFactory;
   // protected $casts = ["order" => "array"];


    public function getOrderAttribute($value) {
        return json_decode($value);
    }

}
