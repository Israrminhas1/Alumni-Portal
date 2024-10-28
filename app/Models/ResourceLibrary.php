<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceLibrary extends Model
{
    protected $table = 'resource_library';

    protected $fillable = [
        'name',
        'type',
        'file',
        'created_by',
    ];
}
