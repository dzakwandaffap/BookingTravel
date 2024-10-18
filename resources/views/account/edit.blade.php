@extends('layout.nav')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit User</h2>

    <form action="{{ route('manage-account.update', $user->id) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role:</label>
            <select name="role" id="role" class="form-select">
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="pengguna" {{ old('role', $user->role) == 'pengguna' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password (leave blank to keep current password):</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update User</button>
        </div>
    </form>
</div>
@endsection
