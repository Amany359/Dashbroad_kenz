<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class ContractorController extends Controller
{
    public function index()
    {
        // يمكنك جلب البيانات الخاصة بالمقاول هنا
        return view('admin.contractor');
    }
}
