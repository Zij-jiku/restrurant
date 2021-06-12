<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Food extends Model
{
    use HasFactory;
    protected $guarded = [];

    function relation_with_category_table()
    {
      return $this->hasOne('App\Category', 'id', 'category_id')->withTrashed();
    }

    
}
