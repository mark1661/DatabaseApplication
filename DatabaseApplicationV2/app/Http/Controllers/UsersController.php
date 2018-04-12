<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

      public function createAccount(Request $request)
      {
        $this->validate($request, [
          'username' => 'required',
          'email' => 'required',
          'password' => 'required'
        ]);

        // Create New Message
        $new_user = new User;
        $new_user->username = $request->input('username');
        $new_user->email = $request->input('email');
        $new_user->password = $request->input('password');

        // Save Messages
        $new_user->save();

        // Redirect
        return redirect('/');
      }


      public function getUsers(){
        $users = User::all();

        return view('getUsers')->with('users', $users);
      }
    //
}
