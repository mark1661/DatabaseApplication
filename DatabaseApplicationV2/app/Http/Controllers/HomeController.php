<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;

class HomeController extends Controller
{
    public function logout()
    {
      Session::flush();
      Auth::logout();
      return redirect()->route('home');
    }
}
