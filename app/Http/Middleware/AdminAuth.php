<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\Roles;
use Session;

class AdminAuth
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
        if (Auth::user() && in_array(Auth::user()->type,[1,4])){
            return $next($request);
        }
        Auth::logout();
        return redirect('admin');
    }
}
