<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    { 
        // التأكد من أن المستخدم مسجل الدخول ولديه دور "admin"
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }
        
        // إذا لم يكن المستخدم لديه صلاحية الأدمن، يتم رفض الوصول
        abort(403, 'ليس لديك صلاحية الوصول إلى هذه الصفحة.');
    }
}
