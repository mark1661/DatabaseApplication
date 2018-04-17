<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_profile extends Model
{
    //
    protected $primaryKey = 'user_profile_id';

    public function relationUser(){
      return $this->belongsTo('App\User')
    }
}
