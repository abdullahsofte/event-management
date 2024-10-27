<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'title', 'short_details', 'offer_link', 'image',
        'status', 'save_by', 'updated_by', 'ip_address'
    ];
}
