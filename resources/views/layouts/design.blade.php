<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'AdminPanel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f1f5f9;
        }

        .dashboard {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #1e293b;
            color: white;
            padding: 20px;
        }

        .sidebar .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar nav a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .sidebar nav a:hover,
        .sidebar nav .active {
            background-color: #334155;
        }

        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .content-wrapper {
            padding: 20px;
            overflow-y: auto;
            flex-grow: 1;
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">AdminPanel</div>
            <nav>
                <a href="{{ url('/admin-dashboard') }}" class="{{ request()->is('admin-dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a href="{{ route('users.index') }}" class="{{ request()->is('users*') ? 'active' : '' }}">
                    <i class="bi bi-people me-2"></i> Users
                </a>


                <!-- <a href="{{ route('packages.index') }}" class="{{ request()->is('admin/packages*') ? 'active' : '' }}">
    <i class="bi bi-box-seam me-2"></i> Packages
</a> -->
                {{--
            <a href="{{ url('/setting') }}" class="{{ request()->is('setting') ? 'active' : '' }}">
                <i class="bi bi-gear me-2"></i> Settings
            </a>  --}}
                <a href="{{ url('/profile') }}" class="{{ request()->is('profile') ? 'active' : '' }}">
                    <i class="bi bi-person me-2"></i> Profile
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Navbar -->
            <div class="navbar">
                <h4 class="mb-0">@yield('page-title', 'Admin Dashboard')</h4>
            </div>

            <!--sabita-->
            @php
                $setting = \App\Models\Setting::first();
            @endphp

            <img src="{{ asset($setting->site_logo ?? 'images/final-logo.png') }}?v={{ time() }}" alt="SpecTrek"
                style="height: 90px; width: 100px;">

            <!-- Page Content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
