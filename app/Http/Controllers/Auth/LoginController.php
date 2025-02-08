<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


    
protected function authenticated(Request $request, $user)
{
    if ($user->status === 'approved') {
        $routes = [
            'admin' => 'admin.dashboard',
            'employee' => 'admin.employee',
            'supervisor' => 'admin.supervisor',
            'contractor' => 'admin.contractor',
            'engineer' => 'admin.engineer',
        ];

        // التحقق مما إذا كان نوع المستخدم صالحًا قبل محاولة التوجيه
        $route = $routes[$user->type] ?? 'user.dashboard';

        if (!array_key_exists($user->type, $routes)) {
            $route = 'user.dashboard'; // مسار افتراضي
        }

        return redirect()->route($route);
    }

    if ($user->status === 'rejected') {
        Auth::logout(); // تسجيل خروج المستخدم المرفوض
        return redirect()->route('login')->with('error', 'Your account has been rejected by the admin.');
    }

    // تسجيل خروج المستخدم إذا كان الحساب قيد الانتظار
    Auth::logout();
    return redirect()->route('login')->with('warning', 'Your account is pending approval by the admin.');
}

    protected function credentials(Request $request)
    {
    return filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)
        ? ['email' => $request->input('email'), 'password' => $request->input('password')]
        : ['phone' => $request->input('email'), 'password' => $request->input('password')];
}

}
