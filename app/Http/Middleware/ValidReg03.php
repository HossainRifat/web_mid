<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidReg03
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
        if ($request->session()->has("reg2")) {
            return $next($request);
        }
        return redirect()->route('Registration02', 'buyer');
    }
}
