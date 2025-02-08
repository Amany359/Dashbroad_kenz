<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // التحقق مما إذا كان المستخدم مسجلاً ولم تتم الموافقة عليه
        if ($user && $user->status !== 'approved') {
            return redirect()->route('pending')->with('error', 'حسابك قيد المراجعة من قبل الإدارة.');
        }

        return $next($request);
    }
}
