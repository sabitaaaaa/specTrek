<!DOCTYPE html> <!-- Declares the document type and version (HTML5) -->
<html lang="en"> <!-- Begins the HTML document and sets the language to English -->
<head>
  <meta charset="UTF-8" /> <!-- Sets the character encoding to UTF-8 -->
  <title>SpecTrek | Register</title> <!-- Sets the title shown on the browser tab -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Ensures responsiveness on mobile devices -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" /> <!-- Links Bootstrap CSS -->

  <style>
    /* Basic styling for page layout */
    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }

    .row {
      height: 100vh; /* Full height row */
      margin: 0;
    }

    .col-md-6 {
      padding: 0;
    }

    .split-left {
      /* Left side background image */
      background: url('https://images.unsplash.com/photo-1608897013039-91a5cd1d598f?auto=format&fit=crop&w=1350&q=80') no-repeat center center;
      background-size: cover;
    }

    .split-right {
      /* Right side with the form */
      background-color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    .form-container {
      width: 100%;
      max-width: 420px;
      padding: 1rem 1.5rem;
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
      height: 45px;
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
    <!-- Left side background image (hidden on small screens) -->
    <div class="col-md-6 split-left d-none d-md-block"></div>

    <!-- Right side form area -->
    <div class="col-md-6 split-right">
      <div class="form-container">

        <!-- Form header section with logo and brand -->
        <div class="form-header">
          <img src="{{ asset('images/logoo.jpg') }}" alt="Logo">
          <div class="brand">SpecTrek</div>
          <div class="tagline">Explore safely, trek freely</div>
        </div>

        <!-- Registration form -->
        <form method="POST" action="/register">
          @csrf

          <!-- Full Name input -->
          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required />
          </div>

          <!-- Email input -->
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required />
          </div>

          <!-- Password input -->
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required />
            <div class="error" id="password-error"></div>
          </div>

          <!-- Confirm Password input -->
          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" id="confirm-password" name="password_confirmation" class="form-control" required />
            <div class="error" id="confirm-password-error"></div>
          </div>

          <!-- Submit button -->
          <button class="btn btn-primary">Sign Up</button>
        </form>

        <!-- Link to login page -->
        <p class="mt-3 text-center text-muted">
          Already registered? <a href="/login">Login</a>
        </p>

        <!-- Laravel error display if validation fails -->
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

  <!-- JavaScript for password validation -->
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
