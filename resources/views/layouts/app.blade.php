<!DOCTYPE html>
<html>
<head>
    <title>SpecTrek Blog</title>
    <style>
        /* Reset some default browser styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

       body {
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         background-color: #f9fafb;
         color: #333;
         line-height: 1.6;
         padding: 0; 
}
        /* ----------------navbar ---------------------- */
.navbar {
    background-color: #027478;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 40px;
    height: 80px;
    border-bottom: 2px solid #ddd;
    width: 100%;
    box-sizing: border-box;
}

.navbar-brand {
    display: flex;
    align-items: center;
    gap: 10px;
}

.navbar-brand img {
    height: 60px;
    object-fit: contain;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 20px;
    margin: 0;
    padding: 0;
}

.nav-links a {
    text-decoration: none;
    color: white;
    font-size: 16px;
    font-weight: 500;
    padding: 6px 10px;
    transition: color 0.3s;
}

.nav-links a:hover {
    color: #ccc;
}

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 10px;
            font-weight: 700;
        }

        hr {
            border: none;
            border-top: 2px solid #2980b9;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        a {
            color: #2980b9;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #1c5980;
            text-decoration: underline;
        }

        /* Container for content */
        .container {
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <nav class="navbar">
    <a href="#" class="navbar-brand">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" />
    </a>
    <ul class="nav-links">
      <li><a href="#">Emergency</a></li>
      <li><a href="#">Tour</a></li>
      <li><a href="#">User</a></li>
      <li><a href="#" class="btn">Login</a></li>
      <li><a href="#" class="btn">Signup</a></li>
    </ul>
  </nav>
    <h1>SpecTrek Blog</h1>
    <hr>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
