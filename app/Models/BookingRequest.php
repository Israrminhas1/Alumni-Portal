<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
{
    protected $fillable = [
        'availability_id',
        'ccjpo_id',
        'trainee_id',
        'title',
        'date',
        'start_time',
        'end_time',
        'status',
    ];

    public function availability()
    {
        return $this->belongsTo(Availability::class, 'availability_id');
    }

    public function ccjpo()
    {
        return $this->belongsTo(Ccjpo::class, 'ccjpo_id');
    }

    public function trainee()
    {
        return $this->belongsTo(Trainee::class, 'trainee_id');
    }
}
