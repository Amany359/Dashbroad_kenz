<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class EmployeeController extends Controller
{
    public function index()
    {
        // هنا يمكن جلب البيانات الخاصة بالموظف إن وجدت
        return view('admin.employee'); // سيتم إنشاء ملف العرض المناسب
    }
}
