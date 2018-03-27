<?php

namespace App\Http\Middleware;

use Closure;

class GuestsMiddleware
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
        if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'guest'){
            return $next($request);
        }else{
            Session()->flash('error','Permissions Denied !!');
            return redirect()->back();
        }
    }
}
