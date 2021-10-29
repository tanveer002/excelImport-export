<?php

namespace App\Models;

use App\Models\Brand;

use App\Models\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function brand()
    {
      return  $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function deviceModel()
    {
        return $this->belongsTo(Models::class, 'model_id', 'id');
    }
}
