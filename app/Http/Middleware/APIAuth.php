<?php

namespace App\Http\Middleware;

use App\Models\ad_token;
use Closure;
use Illuminate\Http\Request;

class APIAuth
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

        $token = $request->header("Authorization");
        $token = json_decode($token);
        $check_token = ad_token::where('token_ad', $token->access_token)->where('expired_at', NULL)->first();
        if ($check_token) {
            return $next($request);
        } else return response("Invalid token", 401);
    }
}
