<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
//        if(!$request->session()->get('username'))
//        {
//            return redirect(route("home"));
//        }
        if($request->isMethod("options")) {
            return response("DATA", 200);
        }
        return $next($request);
    }
}
