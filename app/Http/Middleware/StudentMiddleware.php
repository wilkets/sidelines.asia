<?php

namespace sidelines\Http\Middleware;

use Closure;

class StudentMiddleware
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
        if(\Auth::check())
        {
            if(!\Auth::user()->user_type != 'sa')
            {
                return redirect('/');
            }
        }
        else
        {
            return redirect('/');
        }

        return $next($request);
    }
}
