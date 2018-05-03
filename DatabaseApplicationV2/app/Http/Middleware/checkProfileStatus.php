<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User_profile;

class checkProfileStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next)
    {
      $id = $request->id;
      $userprofile = User_profile::find($id);

      $privacy = $userprofile->profile_privacy;

      if (Auth::user()->user_id === $userprofile->user_profile_id) {
        return $next($request);
      }

      if ($privacy === 'Only Me' && Auth::user()->user_id === $userprofile->user_profile_id) {
        return $next($request);
      }
      elseif ($privacy === 'Only Me' && Auth::user()->user_id !== $userprofile->user_profile_id) {
        return redirect('/error');
      }

      if ($privacy === 'Friends'){
        $friend = app('App\Http\Controllers\RelationshipController')->getRelationship($id);
        if ($friend === 'FRIEND') {
          return $next($request);
        }
        else {
          return redirect('/error');
        }
      }
        return $next($request);
    }

  }
