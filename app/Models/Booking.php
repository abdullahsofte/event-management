<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'phone', 'address',
        'booking_type', 'booking_for', 'booking_person',
        'boking_date', 'boking_time',
    ];

    public function feature()
    {
        return $this->belongsTo(Service_Feature::class, 'booking_for');
    }
}
