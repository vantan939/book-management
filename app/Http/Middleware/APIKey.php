<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class APIKey
{
    const AUTH_HEADER = 'X-Authorization';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header(self::AUTH_HEADER);
        if(!empty($header) && $header == env('MIX_API_KEY')) {
            return $next($request);
        }

        return response([
            'errors' => [[
                'message' => 'Unauthorized'
            ]]
        ], 401);
    }
}
