<?php

namespace App\Http\Controllers;

use App\support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tickets = support::get();
      return view('support/index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $this->validate($request,
      [
        'message' => 'required'
      ]);


      $ticket = new support;
      $ticket->user_id = Auth::user()->user_id;
      $ticket->message = $request->input('message');
      $ticket->save();

      return redirect()->action('SupportController@createSuccess');
    }

    public function createSuccess()
    {
      return view('support/submitSuccessful');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
      $ticket = new support;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\support  $support
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = support::find($id);
        return view('support/show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(support $support)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(support $support)
    {
        //
    }
}
