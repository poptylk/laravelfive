<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;

class WebsiteMiddleware
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
        $setting = Setting::find('website_switch');
        $pattern = '/^admin\/.*/';
        if ((bool) $setting->value === false && !preg_match($pattern, $request->path())) {
            return response($request->path(), 503);
        }
        return $next($request);
    }
}
