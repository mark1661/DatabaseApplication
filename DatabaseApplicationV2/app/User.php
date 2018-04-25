<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Movie_clip;
use App\User_like;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';

    public function comments()
    {
    return $this->hasMany('App\user_comment');
    }

    public function likes(){
      return $this->hasMany(User_like::class);
    }
    public function commentsProfile()
    {
    return $this->hasMany('App\user_profile_comment');
    }

    public function user_reviews()
    {
    return $this->hasMany('App\UserReview');
    }

    public function profile(){
      return $this->hasOne('App\User_profile');
    }

    public function relationshipLink(){
      return $this->hasMany('App\relationship');
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
