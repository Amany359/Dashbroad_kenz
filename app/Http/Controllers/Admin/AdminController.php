<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    

    // عرض لوحة نظرة عامة الأدمن مع إحصائيات
    public function dashboard()
    {
        $totalUsers   = User::count();
        $pendingCount = User::where('status', 'pending')->count();

        return view('admin.dashboard', compact('totalUsers', 'pendingCount'));
    }

    // عرض قائمة طلبات التسجيل المعلقة مع كافة بيانات التسجيل
    public function pendingUsers()
    {
        $pendingUsers = User::where('status', 'pending')->get();
        return view('admin.pending-users', compact('pendingUsers'));
    }

    // قبول طلب التسجيل (تحديث الحالة إلى approved)
    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'approved';
        $user->is_verified = true; // يمكنك ضبطه بناءً على منطق التوثيق لديك
        $user->save();

        return redirect()->back()->with('success', 'تم قبول المستخدم بنجاح.');
    }

    // رفض طلب التسجيل (تحديث الحالة إلى rejected)
    public function rejectUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'rejected';
        $user->save();

        return redirect()->back()->with('error', 'تم رفض المستخدم.');
    }



    
}
