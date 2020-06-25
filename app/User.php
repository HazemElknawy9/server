<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Laratrust\Traits\LaratrustUserTrait;

use Sqits\UserStamps\Concerns\HasUserStamps;



class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use Notifiable;
    use HasUserStamps;
   use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'first_name', 'last_name', 'image','email','phone','date_birth','governrate','city','address','postal_code','password','channel_promote','website','terms','active','code','mail_order_changed','sms_order_changed','mail_data_changed','mail_weekly','history_email','history_phone','email_verified_at','number_id'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }// end of orders

    public function products()
    {
        return $this->hasMany('App\Product','vendor_id');
    }// end of orders


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}//end of model
