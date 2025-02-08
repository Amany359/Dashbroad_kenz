@extends('admin.layouts.master')

@section('content')
    <h2>Pending Users</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->type) }}</td>
                    <td>
                        <form action="{{ route('admin.users.approve', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-success">Approve</button>
                        </form>
                        <form action="{{ route('admin.users.reject', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-danger">Reject</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
