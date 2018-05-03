<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
      $privacy = $request->profile_privacy;
      echo $privacy;
      if ($privacy !== 'public'){
        if ($request->profile_privacy == 'Only Me' AND Auth::user()->user_id !== $request->user_profile_id) {
          return view('error_page');
        }
        else {
          return $next($request);
        }
        if ($request->profile_privacy == 'Only Me') {
          return view('error_page');
        }
        return view('error_page');
      }
      else {
        return $next($request);
      }
    }
}
