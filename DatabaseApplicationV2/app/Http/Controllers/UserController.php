<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function Edit()
    {
      return view("edituserprofile");
    }

    public function View()
    {
      return view("viewuserprofile");
    }

    public static function getUsername($id)
    {
      $user = User::find($id);
      $username = $user->username;
      return $username;
    }

    public function Delete()
    {
      return view("deleteuserprofile");
    }

    public function ViewFriends()
    {
      return view("viewfriends");
    }
}
