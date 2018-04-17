<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
  public function submit(Request $request)
  {
    $this->validate($request, [
      'user_id' => 'required',
      'description' => 'required'
    ]);

    if(Auth::check() == true){
    $id = Auth::id();
    // Create New Message
    $ticket = new Ticket;
    $ticket->user_id = $id;
    $ticket->description = $request->input('message');

    // Save Messages
    $ticket->save();
  }
    // Redirect
    return redirect('/');
  }
}
