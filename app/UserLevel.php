<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use App\Model\UserLevel;
// use App\Model\OQCStamp;

class UserLevel extends Authenticatable
{
    use Notifiable;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    // /**
    //  * The attributes that should be hidden for arrays.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    protected $table = 'tbl_user_levels';

    // public function user_level()
    // {
    //     return $this->hasOne(UserLevel::class, 'id', 'user_level_id');
    // }

    // public function rapidx_user_details()
    // {
    //     return $this->hasOne(RapidXUser::class, 'id','rapidx_id');
    // }

    // public function rapidx_user_details()
    // {
    //     return $this->hasOne(RapidXDepartment::class, 'id','rapidx_id');
    // }
}
