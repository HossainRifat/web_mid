<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoggedInSellerAPI
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
        /* $token = $request->header("Authorization");
        $token = json_decode($token);
        echo "<pre>";
        print_r($token);
        $check_token = Token::where('token',$token->access_token)->where('updated_at',NULL)->first();
        if ($check_token) {
            return $next($request);
        } */
        if (session()->has('user'))
            return $next($request);
        else
            return response("Invalid token", 401);
        //return response("Invalid token",401);
    }
}
