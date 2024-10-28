<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $fillable = [
        'ccjpo_id',
        'day_of_week',
        'start_time',
        'end_time',
    ];

    public function ccjpo()
    {
        return $this->belongsTo(Ccjpo::class);
    }

    public function bookingRequest()
    {
        return $this->HasOne(BookingRequest::class, 'availability_id');
    }
}
