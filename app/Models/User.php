<?php

namespace App\Models;


use App\Notifications\SendOtpNotification;
use Exception;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
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
        'type',
        'two_factor_enabled',
        'two_factor_code',
        'two_factor_expires_at',
        'parent_id'
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
        'two_factor_expires_at' => 'datetime'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
//        'profile_photo_url',
    ];

    protected static function boot(): void
    {
        parent::boot();
        self::creating(function ($model) {
            $model->name = strtolower($model->first_name) . '-' . strtolower($model->last_name) . rand(10, 99);
        });
    }

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

    /**
     * @throws Exception
     */
    public function setOtp(): void
    {
        $otpLength = (int) config('drift-pms.otp_length');
        $otpExpiryMinutes = (int) config('drift-pms.otp_expiry_minutes');
        $this->otp = substr(bin2hex(random_bytes($otpLength)), 0, $otpLength);
        $expiry = now()->addMinutes($otpExpiryMinutes);
        $this->update([
            'two_factor_code' => encrypt($this->otp),
            'two_factor_expires_at' => $expiry,
        ]);
        $this->sendOtpNotification();
    }

    /**
     * Sends a notification containing the OTP code to the user
     */
    private function sendOtpNotification(): void
    {
        Log::info('in notification section');
        if (! $this->otp) {
            if ($this->two_factor_code && (now() < $this->two_factor_expires_at)) {
                $this->otp = decrypt($this->two_factor_code);
            }
        }

        if ($this->otp) {
            Log::info('in notify');
            $this->notify(new SendOtpNotification());
        }
    }

    /**
     * Returns true if the user
     * a) does not have TFA enabled, or
     * b) has tfa enabled and has entered an OTP code that matches and has not expired
     * A new OTP code is generated if no OTP entered and current OTP expiry has at least 5 minutes remaining
     * @throws Exception
     */
    public function checkTFA(string $otpCode = null): bool
    {
        Log::info('checkTFA');
        Log::info($otpCode);
        if (! $this->two_factor_enabled) {
            Log::info('two_factor_enabled');
            return true;
        }

        if (! $otpCode) {
            Log::info('!$otpCode');
            if (! $this->two_factor_expires_at  || ($this->two_factor_expires_at < now()->addMinutes(5))) {
                $this->setOtp();
            }
        }

        if ($otpCode && (now() < $this->two_factor_expires_at)) {
            Log::info('$otpCode');
            if ($otpCode == decrypt($this->two_factor_code)) {
                return true;
            }
        }

        return false;
    }

    public function lower_level_roles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }

    public function upper_level_roles()
    {

    }
}
