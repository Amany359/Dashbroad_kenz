<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class EngineerController extends Controller
{
    public function index()
    {
        // يمكنك جلب البيانات الخاصة بالمهندس هنا
        return view('admin.engineer');
    }
}
