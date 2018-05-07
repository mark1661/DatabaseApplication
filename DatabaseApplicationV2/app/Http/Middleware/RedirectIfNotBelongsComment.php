<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\user_profile_comment;

class RedirectIfNotBelongsComment
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
      $comment = user_profile_comment::find($id);


      if (Auth::user()->user_id !== $comment->user_id) {
        return redirect('/error/ProhibitedURL');
      }
      else {
        return $next($request);
      }
    }
}
