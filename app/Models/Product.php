<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $guarded =['id'];
     
    public function productImage(){
        return $this->hasMany(ProductImage::class);
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function origin(){
        return $this->belongsTo(Origin::class);
    }
    public function features(){
        return $this->hasMany(ProductFeature::class);
    }
    public function features_4(){
        return $this->hasMany(ProductFeature::class)->take(4);
    }

   
    
}
