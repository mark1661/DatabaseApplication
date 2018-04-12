<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
  protected $redirectTo = '/';
  
    public function submit(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required'
      ]);

      // Create New Message
      $message = new Message;
      $message->name = $request->input('name');
      $message->email = $request->input('email');
      $message->message = $request->input('message');

      // Save Messages
      $message->save();

      // Redirect
      return redirect('/');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required'
      ]);

      // Create New Message
      $message = new Message;
      $message->name = $request->input('name');
      $message->email = $request->input('email');
      $message->message = $request->input('message');

      // Save Messages
      $message->save();

      // Redirect
      return redirect('/');
    }



    public function getMessages(){
      $messages = Message::all();

      return view('getMessages')->with('messages', $messages);
    }
}
