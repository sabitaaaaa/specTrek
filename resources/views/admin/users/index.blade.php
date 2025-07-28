<<<<<<< HEAD
@extends('layouts.design')
=======
@extends('layout')
>>>>>>> origin/merged-nishmi

@section('content')
<div class="container-fluid px-4">
    <h2 class="mt-4 mb-4">User Management</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="card-title mb-0">Users List</h5>
                <a href="{{ route('users.create') }}" class="btn btn-primary">+ Add User</a>
            </div>

            <table class="table table-hover table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th class="text-center" style="width: 160px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td class="text-center">
<<<<<<< HEAD
                                <a href="{{ route('users.edit', $user->id) }}" title="Edit" class="btn btn-sm btn-outline-warning me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE') 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                    
                                </form>
=======
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <!--Delete form: No confirmation -->  
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger">Delete</button>
</form>

>>>>>>> origin/merged-nishmi
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
