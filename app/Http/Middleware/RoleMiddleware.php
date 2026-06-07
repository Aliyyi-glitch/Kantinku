<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Jika user belum login, tendang ke halaman login
        if (!auth()->check()) {
            return redirect('login');
        }

        // Karena tidak pakai sistem role, langsung loloskan saja ke halaman tujuan
        return $next($request);
    }
}