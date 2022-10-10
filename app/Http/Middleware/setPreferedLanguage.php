<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class setPreferedLanguage
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
        $lang = $request->user('zeus') ? $request->user('zeus')->lang : $request->cookie('lang', 'en');
        app()->setLocale($lang);
        return $next($request);
    }
}
