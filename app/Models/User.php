<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
//use Bavix\Wallet\Traits\HasWalletFloat;
//use Bavix\Wallet\Interfaces\WalletFloat;
//use Bavix\Wallet\Interfaces\Wallet;
use Illuminate\Auth\Access\Gate;
use Laravel\Paddle\Billable;
//use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable 
{
    
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use Billable;
    //use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'has_completed_tour',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
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


    public function affiliatedetails()
    {
        return $this->hasOne(Affiliatedetail::class);
    }

    public function agencydetails()
    {
        return $this->hasOne(Agencydetails::class);
    }


    public function trafficsource()
    {
        return $this->hasMany(Trafficsource::class);
    }

    

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function messages()
    {
    return $this->belongsToMany(Message::class, 'message_user');
    }

    public function tenants()
    {
        return $this->belongsToMany(Tenant::class, 'tenant_user');
    }

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }

    public function affiliatepayouts()
    {
        return $this->hasMany(Affiliatepayout::class);
    }

    public function payoutbatches()
    {
        return $this->hasMany(Payoutbatch::class);
    }

   


}
