<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class Location
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
        $response = $next($request);
        if(!$request->hasCookie('location')) {
            $location = get_location_info($request->ip());
            return $response->cookie('location', json_encode($location), 43200);
        }
        else {
            return $response;
        }
    }
}
