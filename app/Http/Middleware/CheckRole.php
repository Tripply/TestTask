<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{

    /**
     * @param Request $request
     * @param Closure $next
     * @param int $role
     * @return Response
     */
    public function handle(Request $request, Closure $next, int $role): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        if ($user->role === $role) {
            return $next($request);
        }

        abort(403, 'Access denied.');
    }
}
