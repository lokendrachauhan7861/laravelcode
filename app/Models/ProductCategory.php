<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class ProductCategory extends Model
{

    protected $table = "category";
    use HasFactory;

     protected $fillable = [
        'brand_name',
        'cat_name',
      
    ];
}
