<?php

namespace App\Http\Middleware;

use Closure;
use HTMLPurifier_Config;
use Illuminate\Http\Request;

class MessageFilter
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
        $data = $request->only('data')['data'];
        
        $anti_xss = HTMLPurifier_Config::createDefault();
        $anti_xss -> set('HTML.Allowed', '');
        //$request = HTMLPurifier($data, $anti_xss);



        return $next($request);
    }
}
