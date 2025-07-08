<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>SpecTrek | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap 5 CSS for layout and styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }

    .row {
      height: 100vh;
      margin: 0;
    }

    .col-md-6 {
      padding: 0;
    }

    .split-right {
      background-color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    .form-container {
      width: 100%;
      max-width: 420px;
      padding: 2rem;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      border-radius: 12px;
      background-color: #fdfdfd;
    }

    .form-header {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .form-header img {
      height: 60px;
      margin-bottom: 0.5rem;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .form-header .brand {
      font-size: 24px;
      font-weight: bold;
      color: #28a745;
    }

    .form-header .tagline {
      font-size: 14px;
      color: #6c757d;
    }

    .form-control {
      border-radius: 8px;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #28a745;
    }

    .btn-primary {
      background-color: #28a745;
      border: none;
      border-radius: 8px;
      padding: 8px 24px;
      font-size: 14px;
      width: auto;
      display: block;
      margin: 0 auto;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
    }

    .btn-primary:hover {
      background-color: #218838;
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(33, 136, 56, 0.4);
    }

    .text-muted a {
      color: #28a745;
      text-decoration: none;
    }

    .text-muted a:hover {
      text-decoration: underline;
    }

    .error {
      font-size: 12px;
      color: red;
    }
  </style>
</head>

<body>
  <div class="row g-0">
    <div class="col-md-6 split-left d-none d-md-block"></div>

    <div class="col-md-6 split-right">
      <div class="form-container">
        <div class="form-header">
          <img src="{{ asset('images/logoo.jpg') }}" alt="Logo">
          <div class="brand">SpecTrek</div>
          <div class="tagline">Explore safely, trek freely</div>
        </div>

        @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="/login" id="login-form">
          @csrf

          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" name="email" class="form-control" required />
            <div class="error" id="email-error"></div>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required />
            <div class="error" id="password-error"></div>
          </div>

          <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <p class="mt-3 text-center text-muted">
          Don't have an account? <a href="/register">Sign up here</a>
        </p>
      </div>
    </div>
  </div>

  <script>
    const form = document.getElementById('login-form');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');

    form.addEventListener('submit', function (e) {
      emailError.textContent = '';
      passwordError.textContent = '';

      const email = emailInput.value;
      const password = passwordInput.value;
      let valid = true;

      const emailRegex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
      if (!emailRegex.test(email)) {
        emailError.textContent = 'Invalid email format';
        valid = false;
      }

      const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
      if (!passwordRegex.test(password)) {
        passwordError.textContent = 'Password must be 8+ chars, include 1 uppercase, 1 lowercase & 1 number';
        valid = false;
      }

      if (!valid) {
        e.preventDefault();
      }
    });
  </script>
</body>
</html>
