<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function create()
    {
      return view("addmovie");
    }

    public function createactor()
    {
      return view("addactor");
    }

    public function Login()
    {
      return view("adminlogin");
    }
}
