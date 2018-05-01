<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_profile extends Model
{
    //
    public $timestamps = false;
    protected $primaryKey = 'user_profile_id';

    public function user_profile_user(){
      return $this->belongsTo('App\User');
    }

    public function relationProfilePic(){
      return $this->hasOne('App\user_profile_picture');
    }

    public function user_profile_relationship(){
      return $this->hasMany('App\Relationship');
    }

    public function user_profile_comment_relationship(){
      return $this->hasMany('App\User_profile');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_profile_id', 'profile_privacy', 'gender', 'location', 'age',
    ];
}
