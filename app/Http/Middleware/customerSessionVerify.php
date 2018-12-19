<?php

namespace App\Http\Middleware;

use Closure;

class customerSessionVerify
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
       if(session('loggedCustomer') == null){
            return redirect()->route('customer.index');
        }

        return $next($request);
    }
}
