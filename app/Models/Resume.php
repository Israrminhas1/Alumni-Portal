<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Resume extends Model
{
    protected $fillable = [
        'user_id',
        'resume_template_id',
        'code',
        'slug',
        'job_title',
        'summary',
        'skill',
        'content',
        'style',
        'view_count',
        'is_published',
    ];

    private function generateCode()
    {
        $uuid = (string) Uuid::uuid1();
        $this->code = $uuid;
        $this->slug = $uuid;
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Resume $model) {
            $model->generateCode();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
