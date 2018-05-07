<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_profile_comment extends Model
{
  protected $fillable = array('user_id', 'comment_string');

  protected $primaryKey = 'user_profile_comment_id';

  public function album(){
    return $this->belongsTo('App\User');
  }
}
