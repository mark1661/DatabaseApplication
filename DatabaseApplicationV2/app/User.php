<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Movie_clip;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';

    public function comments()
    {
    return $this->hasMany('App\user_comment');
    }

    public function commentsProfile()
    {
    return $this->hasMany('App\user_profile_comment');
    }

    public function clips(){
      return $this->hasMany(Movie_clip::class);
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
