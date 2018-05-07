<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectIfNotAdmin
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
      if (Auth::check()) {
        if (is_null(Auth::user()->status)) {
          return redirect('/error');
        }
        if (Auth::user()->status !== 'ADMIN') {
          return redirect('/error');
        }
        else {
          return $next($request);
        }
      }
      return redirect('/error');
    }
}
