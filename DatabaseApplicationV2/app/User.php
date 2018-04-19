<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';

    public function comments()
    {
    return $this->hasMany('App\user_comment');
    }

<<<<<<< HEAD
    public function profile_comments()
=======
    public function commentsProfile()
>>>>>>> master
    {
    return $this->hasMany('App\user_profile_comment');
    }

    public function profile(){
      return $this->hasOne('App\User_profile');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
