@extends('layouts.app')

@section('title', 'User Details')

@section('content')
    <h1>{{ $user->username }}</h1>
    <p>Name: {{ $user->first_name }} {{ $user->last_name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Role: 
        <form action="{{ route('users.updateRole', $user) }}" method="POST" id="updateRoleForm" style="display: inline;">
            @csrf
            <select name="role_id" id="role_id" class="form-control" style="display: inline; width: auto;">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </form>
    </p>
    <p>Created at: {{ $user->created_at }}</p>
    <p>Updated at: {{ $user->updated_at }}</p>

    <div class="btn-group" role="group">
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users</a>
        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete User</button>
        </form>
    </div>

    <script>
        document.getElementById('role_id').addEventListener('change', function() {
            document.getElementById('updateRoleForm').submit();
        });
    </script>
@endsection
