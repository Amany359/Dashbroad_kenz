<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class SupervisorController extends Controller
{
    public function index()
    {
        // يمكنك جلب البيانات الخاصة بالمشرف هنا
        return view('admin.supervisor');
    }
}
