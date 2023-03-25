<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user == null)
            return redirect()->route('admin.login');
        elseif ($user->role == 'guest')
            return response('', 403);
        elseif ($user->role == 'admin' || $user->role == 'superadmin')
            return $next($request);
    }
}
