<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        $viteSources = app()->environment('local')
            ? ' http://127.0.0.1:5173'
            : '';
        $viteConnections = app()->environment('local')
            ? " ws://127.0.0.1:5173 http://127.0.0.1:5173"
            : '';

        $response->headers->set(
            'Content-Security-Policy',
            "default-src 'self'; img-src 'self' https://images.unsplash.com data:; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com{$viteSources}; font-src 'self' https://fonts.gstatic.com; script-src 'self' 'unsafe-inline'{$viteSources}; connect-src 'self'{$viteConnections}"
        );

        return $response;
    }
}
