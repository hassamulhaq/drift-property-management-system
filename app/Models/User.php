<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    use CanResetPassword;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'email',
        'phone',
        'address',
        'address2',
        'city',
        'state',
        'zip',
        'country',
        'type'
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
//        'profile_photo_url',
    ];

    const DEFAULT_IS_GUEST = 0;

    protected array $guard_name = ['api', 'web'];

    const USER_TYPE_SALE = 'sale';
    const USER_TYPE_ROP = 'rop'; // Rent On Property

    const NATIONAL_SALE_DIRECTOR_USER_ID = 13;

    const ROLE_SALE_REPRESENTATIVE_PERCENTAGE = 2;  // Sale Representative
    const ROLE_ASSISTANT_SALE_MANAGER_PERCENTAGE = 0.5; // Assistant Sale Manager
    const ROLE_SALE_MANAGER_PERCENTAGE = 0.3; // Sale Manager
    const ROLE_BUSINESS_MANAGER_PERCENTAGE = 0.2; // Business Manager
    const ROLE_GROUP_MANAGER_PERCENTAGE = 0.1; // Group Manager
    const ROLE_ZONAL_MANAGER_PERCENTAGE = 0.01; // Zonal Manager
    const ROLE_REGIONAL_MANAGER_PERCENTAGE = 0.02; // Regional Manager
    const ROLE_NATIONAL_SALE_DIRECTOR_PERCENTAGE = 0; // National Sale Director (only 1 user. no one can create this user)
}
