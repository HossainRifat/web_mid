<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidReg02
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //dd($request->session()->has('reg1'));
        if ($request->session()->has("reg1")) {
            return $next($request);
        }
        return response("Unauthorized",401);
    }
}
