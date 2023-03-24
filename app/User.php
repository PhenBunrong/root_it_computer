<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable , LogsActivity;

    protected static $logAttribute = ['name','email'];


    protected $fillable = [
        'name',
        'lname',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'avatar',
        'payment_type',
        'role_as',
        'isban',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders() {
        // user one has many order
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function getUserName()
    {
        return $this->name. ' ' . $this->lname;
    }

    public function getAvatar(){
        return 'https://www.gravatar.com/avatar/HASH' . md5($this->email);
    }

    public function isUserOnline()
    {
        return Cache::has('user-is-online' . $this->id);
    }
}
