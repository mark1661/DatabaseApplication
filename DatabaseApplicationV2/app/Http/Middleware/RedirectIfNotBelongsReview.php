<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserReview;

class RedirectIfNotBelongsReview
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
      $review = UserReview::find($id);


      if (Auth::user()->user_id !== $review->user_id) {
        return redirect('/error');
      }
      else {
        return $next($request);
      }
    }
}
