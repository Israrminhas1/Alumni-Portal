<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCJPO extends Model
{
    use HasFactory;

    protected $table = 'ccjpos';

    protected $fillable = [
        'user_id',
        'institute_id',
        'province',
        'designation',
        'cnic',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
