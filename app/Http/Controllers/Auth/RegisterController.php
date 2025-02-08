<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'unique:users'],
            'profession' => ['required', 'string'],
            'identity_image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'work_permit_image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'type' => ['required', 'in:employee,supervisor,contractor,engineer,user,admin'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $identityImagePath = isset($data['identity_image']) ? $data['identity_image']->store('identity_images', 'public') : null;
        $workPermitImagePath = isset($data['work_permit_image']) ? $data['work_permit_image']->store('work_permit_images', 'public') : null;
    
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'profession' => $data['profession'],
            'identity_image' => $identityImagePath,
            'work_permit_image' => $workPermitImagePath,
            'is_verified' => false, // الحساب غير موثق تلقائيًا
            'verification_code' => rand(100000, 999999), // إنشاء رمز تحقق عشوائي
            'verification_code_expires_at' => now()->addMinutes(10), // تحديد صلاحية رمز التحقق
            'type' => $data['type'], // نوع المستخدم (admin, employee, contractor, engineer, etc.)
            'status' => 'pending', // الحساب يبدأ بحالة انتظار
        ]);
    }
}
