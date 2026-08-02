<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class RemovePublicFromUrl
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Str::contains($request->getRequestUri(), '/public/')) {
            $cleanUrl = Str::replaceFirst('/public/', '/', $request->getRequestUri());
            
            return redirect($cleanUrl, 301);
        }

        return $next($request);
    }
}