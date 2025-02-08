<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     * المعامل $role يتم تمريره من ملف المسارات.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if (!$user || $user->role !== $role) {
            abort(403, 'ليس لديك صلاحية الدخول لهذه الصفحة.');
        }

        return $next($request);
    }
    }

