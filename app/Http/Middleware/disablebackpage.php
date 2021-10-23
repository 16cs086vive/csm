<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class disablebackpage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response= $next($request);
        $response->headers->set('Cache-Control','nocache,no-store, max-age=0, must-revalidate'); 
         $response->headers->set('pragma','no-cache');  
         $response->headers->set('Expires','sat, 01 jan 2000 00:00:00 GMT');  
         return $response;
    }
}
