<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        .dashboard {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 220px;
            background-color: #1e293b;
            color: white;
            padding: 20px;
        }

        .sidebar .logo {
            font-size: 24px;
            margin-bottom: 30px;
        }

        .sidebar nav a {
            display: block;
            color: white;
            text-decoration: none;
            margin: 15px 0;
            padding: 10px;
            border-radius: 6px;
        }

        .sidebar nav a:hover {
            background-color: #334155;
        }

        .main-content {
            flex: 1;
            background-color: #f1f5f9;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .content {
            padding: 20px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            background-color: white;
            padding: 20px;
            flex: 1 1 200px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <h2 class="logo">MyDash</h2>
            <nav>
                <a href="#">Dashboard</a>
                <a href="#">Users</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="navbar">
                <h1>Dashboard Overview</h1>
            </header>
            <section class="content">
                <div class="card">Total Users: 1,230</div>
                <div class="card">Active Plans: 320</div>
                <div class="card">Monthly Growth: 14%</div>
            </section>
        </main>
    </div>
</body>
</html>
