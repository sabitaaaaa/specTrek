

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Welcome, {{ auth()->user()->name }}</h2>
    <form method="POST" action="/logout">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>
</body>
</html>
