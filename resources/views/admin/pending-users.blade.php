{{-- resources/views/admin/pending-users.blade.php --}}
@extends('admin.layouts.master')

@section('title', 'طلبات التسجيل المعلقة')

@section('content')
<div class="container">
    <h1 class="my-4">طلبات التسجيل المعلقة</h1>

    {{-- عرض رسائل النجاح أو الخطأ إن وجدت --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($pendingUsers->isEmpty())
        <p>لا توجد طلبات تسجيل معلقة حالياً.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>المهنة</th>
                    <th>صورة الهوية</th>
                    <th>تصريح العمل</th>
                    <th>نوع المستخدم</th>
                    <th>حالة التسجيل</th>
                    <th>تاريخ التسجيل</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingUsers as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->profession }}</td>
                        <td>
                            @if($user->identity_image)
                                <img src="{{ asset('storage/' . $user->identity_image) }}" alt="صورة الهوية" width="100">
                            @else
                                <small class="text-muted">لم يتم الرفع</small>
                            @endif
                        </td>
                        <td>
                            @if($user->work_permit_image)
                                <img src="{{ asset('storage/' . $user->work_permit_image) }}" alt="تصريح العمل" width="100">
                            @else
                                <small class="text-muted">لم يتم الرفع</small>
                            @endif
                        </td>
                        <td>{{ $user->type }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        <td>
                            {{-- زر قبول الطلب --}}
                            <form action="{{ route('admin.approveUser', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">قبول</button>
                            </form>
                            {{-- زر رفض الطلب --}}
                            <form action="{{ route('admin.rejectUser', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">رفض</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
