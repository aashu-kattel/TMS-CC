@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add New User</a>
    <h2>Users</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Online Status</th>
                <th>Tasks Completed</th>
                <th>Tasks In Progress</th>
                <th>Tasks To Do</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_online ? 'Online' : 'Offline' }}</td>
                    <td>{{ $user->tasks_completed }}</td>
                    <td>{{ $user->tasks_in_progress }}</td>
                    <td>{{ $user->tasks_to_do }}</td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
