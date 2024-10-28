<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, Notifiable;

    const ROLE_ADMIN = 'Admin';

    const ROLE_CCJPO = 'CCJPO-Officer';

    const ROLE_ALUMNI = 'Alumni';

    const ROLE_TRAINEE = 'Trainee';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'dob',
        'country',
        'state',
        'postal_code',
        'driving_license',
        'nationality',
        'profile_photo',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ccjpo()
    {
        return $this->hasOne(Ccjpo::class, 'user_id');
    }

    public function trainee()
    {
        return $this->hasOne(Trainee::class, 'user_id');
    }
}
