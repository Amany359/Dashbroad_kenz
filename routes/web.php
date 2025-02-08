<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\SupervisorController;
use App\Http\Controllers\Admin\ContractorController;
use App\Http\Controllers\Admin\EngineerController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('admin.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ✅ مجموعة المشرف (Admin)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/pending-users', [AdminController::class, 'pendingUsers'])->name('pendingUsers');
    Route::post('/approve-user/{id}', [AdminController::class, 'approveUser'])->name('approveUser');
    Route::post('/reject-user/{id}', [AdminController::class, 'rejectUser'])->name('rejectUser');
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('/supervisor', [SupervisorController::class, 'index'])->name('supervisor');
    Route::get('/contractor', [ContractorController::class, 'index'])->name('contractor');
    Route::get('/engineer', [EngineerController::class, 'index'])->name('engineer');
});

// ✅ مجموعة الموظف، المشرف، المقاول، المهندس
//Route::middleware(['auth', 'ApprovedMiddleware'])->prefix('admin')->name('admin.')->group(function () {
  //  Route::middleware('CheckUserRole:employee')->get('/employee', [EmployeeController::class, 'index'])->name('employee');
  //  Route::middleware('CheckUserRole:supervisor')->get('/supervisor', [SupervisorController::class, 'index'])->name('supervisor');
  //  Route::middleware('CheckUserRole:contractor')->get('/contractor', [ContractorController::class, 'index'])->name('contractor');
  //  Route::middleware('CheckUserRole:engineer')->get('/engineer', [EngineerController::class, 'index'])->name('engineer');
//});