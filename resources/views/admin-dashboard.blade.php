<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            padding: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        } 

        .card , .card1 {   
            padding: 18px;
            flex: 1 1 50px; 
            background-color: white;
            box-shadow: 0 2px 8px rgba(20, 18, 18, 0.05); 
            border-radius: 5px; 
            font-size: 18px;
            text-align: center; 
        }

        /* .card {
            background-color: white;
            padding: 18px;
            flex: 1 1 50px;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            font-size: 18px;
            text-align: center;
        } */

        .chart-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            max-width: 500px;
            height: 350px;
            flex: 1 1 400px;
            text-align: center;
        }

        canvas {
            max-width: 100%;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <h2 class="logo">MyDash</h2>
            <nav>
                <a href="{{ url('/admin-dashboard') }}">Dashboard</a>
                <a href="{{ route('users.index') }}">Users</a>
                <a href="setting.blade.php">Settings</a>
                <a href="{{ route('logout') }}">Logout</a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="navbar">
                <h1>Admin Dashboard</h1>
            </header>

            <section class="content">
                <div class="card">Total Users: {{ $userCount }}</div> 
                <div class="card1"> Total Places</div>
            </section> 

            

            <section class="content">
                <div class="chart-container">
                    <h3 style="font-size: 16px; margin-bottom: 10px;">Signups Over Time</h3>
                    <canvas id="signupsChart" width="450" height="300"></canvas>
                </div>

                <div class="chart-container">
                    <h3 style="font-size: 16px; margin-bottom: 10px;">User Overview</h3>
                    <canvas id="overviewChart" width="300" height="300"></canvas>
                </div>
            </section>
        </main>
    </div>

    <script>
        // Line Chart (Signups)
        const signupsCtx = document.getElementById('signupsChart').getContext('2d');
        new Chart(signupsCtx, {
            type: 'line',
            data: {
                labels: [ 'May 26', 'Jun 02', 'Jun 09', 'Jun 16', 'Jun 23', 'Jun 30'],
                datasets: [{
                    label: 'Signups',
                    data: [ 0, 0, 0, 0, 1, 2],
                    borderColor: '#E91E63',
                    backgroundColor: 'rgba(233, 30, 99, 0.1)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                    }
                }
            }
        });

        // Pie Chart (Only Users)
        const overviewCtx = document.getElementById('overviewChart').getContext('2d');
        new Chart(overviewCtx, {
            type: 'pie',
            data: {
                labels: ['Total Users'],
                datasets: [{
                    data: [{{ $userCount }}],
                    backgroundColor: ['#03A9F4'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    </script>
</body>
</html>
