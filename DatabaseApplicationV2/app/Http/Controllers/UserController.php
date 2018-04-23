<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
  public function index(){
    $users= User::get();
    return view('Users/index', compact('users'));
  }

  public static function getUserName($id){
    $user = User::find($id);
    $username = $user->username;
    return $username;
  }

  public function delete($id){
    $user= User::find($id);
    $user->delete();
    return redirect('/users');
  }

  public function deleteConfirmation($id){
    $user= User::find($id);
    return view('/Users/delete', compact('user'));
  }

}
