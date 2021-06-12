<?php

namespace App\Models;

use App\Models\Food;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    function relation_with_product_table()
    {
      return $this->hasMany(Food::class , 'category_id', 'id');
    }

}
