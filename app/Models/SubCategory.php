<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['category_id','name','slug','image','status','save_by','updated_by','ip_address'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function service(){
        return $this->hasMany(Service::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
