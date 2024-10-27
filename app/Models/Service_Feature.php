<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_Feature extends Model
{
    use HasFactory;

    protected $table = 'service_features';

    protected $fillable = [
        'service_id',
        'feature_name',
        'feature_image',
    ];

    public function service()
        {
          return $this->belongsTo(Service::class);
        }


    public function bookings()
        {
           return $this->hasMany(Booking::class, 'booking_for');
        }

        

}
