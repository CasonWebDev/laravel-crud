<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsCategories;

class Products extends Model
{
    public function category(){
        return $this->hasOne(ProductsCategories::class,'id');
    }
}
