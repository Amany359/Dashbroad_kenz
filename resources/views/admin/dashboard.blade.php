{{-- resources/views/admin/dashboard.blade.php --}}
@extends('admin.layouts.master')

@section('title', 'لوحة تحكم الأدمن')

@section('content')
<div class="container">
    <h1 class="my-4">مرحباً بك في لوحة تحكم الأدمن</h1>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mb-3">Create New Product</a>

    <div class="row">
        <!-- إجمالي المستخدمين -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">إجمالي المستخدمين</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalUsers }}</h5>
                    <p class="card-text">عدد جميع المستخدمين في النظام.</p>
                </div>
            </div>
        </div>

        <!-- طلبات التسجيل المعلقة -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">طلبات التسجيل المعلقة</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $pendingCount }}</h5>
                    <p class="card-text">عدد الطلبات التي لم تتم الموافقة عليها بعد.</p>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('admin.pendingUsers') }}" class="btn btn-secondary">عرض طلبات التسجيل المعلقة</a>
</div>
@endsection
