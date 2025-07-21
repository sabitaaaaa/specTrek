<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>SpecTrek | Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

        <form method="POST" action="/register">
          @csrf

          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required />
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required />
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required />
            <div class="error" id="password-error"></div>
          </div>

          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" id="confirm-password" name="password_confirmation" class="form-control" required />
            <div class="error" id="confirm-password-error"></div>
          </div>

          <button class="btn btn-primary">Sign Up</button>
        </form>

        <p class="mt-3 text-center text-muted">
          Already registered? <a href="/login">Login</a>
        </p>

        @if ($errors->any())
          <div class="alert alert-danger mt-3">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      </div>
    </div>
  </div>

  <script>
    const form = document.querySelector('form');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm-password');
    const passwordError = document.getElementById('password-error');
    const confirmPasswordError = document.getElementById('confirm-password-error');

    form.addEventListener('submit', function (e) {
      passwordError.textContent = '';
      confirmPasswordError.textContent = '';

      const passwordValue = password.value;
      const confirmValue = confirmPassword.value;
      let valid = true;

      const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

      if (!passwordRegex.test(passwordValue)) {
        passwordError.textContent = 'Password must be 8+ chars, include 1 uppercase, 1 lowercase & 1 number';
        valid = false;
      }

      if (passwordValue !== confirmValue) {
        confirmPasswordError.textContent = 'Passwords do not match.';
        valid = false;
      }

      if (!valid) {
        e.preventDefault();
      }
    });
  </script>
</body>
</html>
