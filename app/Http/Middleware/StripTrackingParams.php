<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StripTrackingParams
{
    protected $paramsToStrip = ['_g'];

    public function handle(Request $request, Closure $next)
    {
        if (! $request->isMethod('GET') && ! $request->isMethod('HEAD')) {
            return $next($request);
        }

        $hasTrackingParam = false;
        foreach ($this->paramsToStrip as $param) {
            if ($request->has($param)) {
                $hasTrackingParam = true;
                break;
            }
        }

        if ($hasTrackingParam) {
            $query = $request->except($this->paramsToStrip);
            $cleanUrl = $request->url() . ($query ? '?' . http_build_query($query) : '');
            return redirect()->to($cleanUrl, 301);
        }

        return $next($request);
    }
}
