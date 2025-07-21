<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 220px;
            background-color: #1e293b;
            color: white;
            padding: 20px 0;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar .active {
            background-color: #334155;
        }
        .main-content {
            flex: 1;
            background-color: #f1f5f9;
        }
        .topbar {
            background-color: white;
            padding: 15px 25px;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar">
        <h4 class="text-center mb-4">MyDash</h4>
        <a href="{{ url('/admin-dashboard') }}" class="{{ request()->is('admin-dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('users.index') }}" class="{{ request()->is('admin/users*') ? 'active' : '' }}">Users</a>
        <a href="#">Settings</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link text-white w-100 text-start px-4 mt-3">Logout</button>
        </form>
    </div>

    {{-- Main Content --}}
    <div class="main-content">
        <div class="topbar">
            <h3 class="m-0">Admin Dashboard</h3>
        </div>

        <div class="p-4">
            @yield('content')
        </div>
    </div>

</body>
</html>
