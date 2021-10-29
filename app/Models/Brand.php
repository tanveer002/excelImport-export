<?php

namespace App\Models;

use App\Models\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Brand extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function model()
    {
       return $this->hasMany(Models::class, 'brand_id', 'id');
    }
}
