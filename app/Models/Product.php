<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Product extends Model
{
    use HasFactory , Translatable;

    protected $guarded = [];


    public function ScopeProductByCategoryId($querry , $id)
    {
      return $querry->where('category_id' ,$id)->get();
    }

    public function ScopeProductByBrandId($querry , $id)
    {
      return $querry->where('brand_id' ,$id)->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


}
