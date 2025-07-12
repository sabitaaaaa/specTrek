
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>User List</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th width="200px">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">No users found.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html> --> 






<!-- 
list all users -->

<!-- index.blade.php -->
<a href="{{ route('users.create') }}">Add User</a>

<table>
  @foreach($users as $user)
    <tr>
      <td>{{ $user->name }}</td>
      <td>
        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
        <form method="POST" action="{{ route('users.destroy', $user->id) }}">
          @csrf
          @method('DELETE')
          <button type="submit">Delete</button>
        </form>
      </td>
    </tr>
  @endforeach
</table>

<a href="{{ route('users.create') }}">Add User</a>

@foreach($users as $user)
    <p>{{ $user->name }} | <a href="{{ route('users.edit', $user->id) }}">Edit</a></p>
@endforeach