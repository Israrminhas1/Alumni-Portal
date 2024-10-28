<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumeTemplate extends Model
{
    protected $fillable = [
        'name',
        'thumb',
        'content',
        'style',
        'is_active',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
