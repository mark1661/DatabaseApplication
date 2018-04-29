<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
  public function index()
  {
    return view("admin/adminindex");
  }

  public function addmovie()
  {
    return view("admin/addmovieview");
  }

  public function supportindex()
  {
    return view("admin/supportindex");
  }
}
