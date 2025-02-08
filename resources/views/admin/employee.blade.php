@extends('admin.layouts.master')

@section('title', 'لوحة تحكم الموظف')

@section('content')
    <div class="container">
        <h2>مرحبًا بك في لوحة تحكم الموظف</h2>
       

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <p>هنا يمكنك إدارة مهام الموظفين.</p>
    </div>
@endsection
