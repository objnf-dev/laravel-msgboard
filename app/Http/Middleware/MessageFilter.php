<?php

namespace App\Http\Middleware;

use Closure;
use HTMLPurifier_Config;

class MessageFilter
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
        
        $anti_xss = HTMLPurifier_Config::createDefault();
        $anti_xss -> set('HTML.Allowed', '');
        $request = HTMLPurifier($request, $anti_xss);

        return $next($request);
    }
}
