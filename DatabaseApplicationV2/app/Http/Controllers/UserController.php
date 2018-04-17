<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function Delete()
    {
      return view("deleteuserprofile");
    }

    public function ViewFriends()
    {
      return view("viewfriends");
    }
}
