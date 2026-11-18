<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RequireRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = Auth::user() ?? $request->user();
        abort_unless($user && $user->role === $role && $user->is_active, 403);

        return $next($request);
    }
}
