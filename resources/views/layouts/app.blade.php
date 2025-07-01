<!DOCTYPE html>
<html>
<head>
    <title>Minor Blog</title>
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
            padding: 20px;
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
    <h1>Minor Blog Website</h1>
    <hr>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
