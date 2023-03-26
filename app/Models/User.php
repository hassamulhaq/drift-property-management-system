<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];


    const ROLE_GUEST = null; // used in migration. don't modify
    const ROLE_SUPER_ADMIN = 1;
    const ROLE_ADMIN = 2;
    const ROLE_CUSTOMER = 3;

    const ROLE_GUEST_UUID = null;
    const ROLE_SUPER_ADMIN_UUID = 'bcf18f0b-1c03-4038-9340-484fe2b63181';
    const ROLE_ADMIN_UUID = 'dc15da7b-6b75-4b7f-958d-14e4f13c6f4e';
    const ROLE_CUSTOMER_UUID = 'c2f96bbc-d048-48af-800c-a8f54b783268';

    const DEFAULT_IS_GUEST = null;
}
