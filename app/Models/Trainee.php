<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'institute_id',
        'district_id',
        'disable_id',
        'registration_no',
        'father_name',
        'cnic',
        'basic_qualification',
        'basic_qualification_detail',
        'experience',
        'prv_rec',
        'uid',
        'psdf_traineeId',
        'psdf_class_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class, 'institute_id');
    }
}
