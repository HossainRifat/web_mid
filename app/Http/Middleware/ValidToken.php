<?php

namespace App\Http\Middleware;

use App\Models\login;
use Closure;
use Illuminate\Http\Request;

class ValidToken
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
        $check_token = login::where('token',$token->access_token)->where("logout_time",NULL)->first();
        if ($check_token) {
            return $next($request);

        }
        else return response("Invalid Token middleware",401);
    }
}
