<?php

namespace Adityaricki\LaravelH5P\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class H5PLangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lang = $request->get('lang') ?? Config::get('hh5p.language');

        Config::set('hh5p.language', $lang);
        App::setLocale($lang);

        return $next($request);
    }
}
