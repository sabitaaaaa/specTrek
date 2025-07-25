<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Use a dynamic title or fallback -->
  <title>@yield('title', 'Itinerary Editor Dashboard')</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}">
  <link rel="stylesheet" href="{{ asset('css/dynamic.css') }}">
</head>
<body>
  <nav class="navbar">
    <a href="{{ route('itinerary.index') }}" class="navbar-brand">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" />
    </a>
    <ul class="nav-links">
      <li><a href="{{ route('itinerary.index') }}">Dashboard</a></li>
      <li><a href="{{ route('itinerary.create') }}">Add Itinerary</a></li>
      <!-- Add more links as needed -->
    </ul>
  </nav>

  <main style="padding: 20px;">
    @yield('content')
  </main>
</body>
</html>
