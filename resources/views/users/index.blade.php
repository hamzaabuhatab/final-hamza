@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users List</h1>

    {{-- زر إنشاء مستخدم جديد --}}
    <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Create New User</a>

    {{-- عرض رسالة نجاح إن وجدت --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @forelse($user->roles as $role)
                        <span class="badge bg-primary">{{ $role->name }}</span>
                    @empty
                        <span class="text-muted">No role</span>
                    @endforelse
                </td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>

                    {{-- زر الحذف داخل فورم --}}
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" >Delete</button>

                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No users found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
