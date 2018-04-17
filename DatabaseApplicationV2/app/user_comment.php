<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_comment extends Model
{
    //
    protected $fillable = array('user_id', 'comment_string');

    public function album(){
      return $this->belongsTo('App\User')
    }
}
