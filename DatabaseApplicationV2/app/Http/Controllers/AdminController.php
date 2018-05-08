<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Jobs\SendPasswordResetEmail;

class AdminController extends Controller
{

  public function __construct(){
    $this->middleware('RedirectIfNotAdmin');
  }
  
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

  public function addmoviesubmit()
  {
    app('App\Http\Controllers\MovieController')->store();
  }

  public function showListOfUsers()
  {
    $users = User::get();
    return view('admin/listOfUsers', compact('users'));
  }

  public function sendEmail($id)
  {
    $user = User::find($id);
    dispatch(new SendPasswordResetEmail($user));
    return view('admin/emailSent');
  }

}
