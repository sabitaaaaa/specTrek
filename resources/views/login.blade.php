

<!DOCTYPE html> <!-- Declares the HTML5 document type -->
<html lang="en"> <!-- Starts the HTML document and sets language to English -->
<head>
  <meta charset="UTF-8" /> <!-- Character encoding set to UTF-8 for universal characters -->
  <title>SpecTrek | Login</title> <!-- Page title shown on browser tab -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Responsive design for all devices -->

  <!-- Bootstrap 5 CSS for layout and styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Custom CSS styles for layout and form -->
  <style>
    html, body {
      height: 100%; /* Full height for layout */
      margin: 0; /* No margin around body */
      font-family: 'Segoe UI', sans-serif; /* Font style */
    }

    .row {
      height: 100vh; /* Make row take full height of viewport */
      margin: 0;
    }

    .col-md-6 {
      padding: 0; /* Remove padding */
    }

    /* Left split: background image */
    .split-left {
      background: url('https://images.unsplash.com/photo-1608897013039-91a5cd1d598f?auto=format&fit=crop&w=1350&q=80') no-repeat center center;
      background-size: cover; /* Cover entire div with background image */
    }

    /* Right split: login form section */
    .split-right {
      background-color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    /* Container holding the login form */
    .form-container {
      width: 100%;
      max-width: 420px;
      padding: 2rem;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      border-radius: 12px;
      background-color: #fdfdfd;
    }

    /* Header inside form (logo, brand name, tagline) */
    .form-header {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      text-align: center;
      margin-bottom: 1.5rem;
    }

    /* Logo image styling */
    .form-header img {
      height: 45px;
    }

    /* Brand name style */
    .form-header .brand {
      font-size: 24px;
      font-weight: bold;
      color: #28a745; /* Green */
    }

    /* Tagline style */
    .form-header .tagline {
      font-size: 14px;
      color: #6c757d; /* Gray */
    }

    /* Input field styling */
    .form-control {
      border-radius: 8px;
    }

    /* Input field style when focused */
    .form-control:focus {
      box-shadow: none;
      border-color: #28a745;
    }

    /* Green button style */
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

    /* Button hover effect */
    .btn-primary:hover {
      background-color: #218838;
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(33, 136, 56, 0.4);
    }

    /* Link style */
    .text-muted a {
      color: #28a745;
      text-decoration: none;
    }

    /* Link hover style */
    .text-muted a:hover {
      text-decoration: underline;
    }

    /* Error message style */
    .error {
      font-size: 12px;
      color: red;
    }
  </style>
</head>

<body>
  <div class="row g-0"> <!-- Bootstrap row with no gutter -->
    
    <!-- Left image section (hidden on small devices) -->
    <div class="col-md-6 split-left d-none d-md-block"></div>

    <!-- Right form section -->
    <div class="col-md-6 split-right">
      <div class="form-container"> <!-- Form wrapper -->

        <!-- Form header with logo, brand name and tagline -->
        <div class="form-header">
          <img src="{{ asset('images/logoo.jpg') }}" alt="Logo"> <!-- Laravel Blade asset helper for logo -->
          <div class="brand">SpecTrek</div> <!-- App name -->
          <div class="tagline">Explore safely, trek freely</div> <!-- Tagline -->
        </div>

        <!-- Display error from session (e.g., invalid credentials) -->
        @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Login form -->
        <form method="POST" action="/login" id="login-form"> <!-- POST to /login -->
          @csrf <!-- Blade directive to prevent CSRF attacks -->

          <!-- Email input -->
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" name="email" class="form-control" required />
            <div class="error" id="email-error"></div> <!-- Email error (JS validation) -->
          </div>

          <!-- Password input -->
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required />
            <div class="error" id="password-error"></div> <!-- Password error (JS validation) -->
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <!-- Redirect to register if user has no account -->
        <p class="mt-3 text-center text-muted">
          Don't have an account? <a href="/register">Sign up here</a>
        </p>
      </div> <!-- End form-container -->
    </div> <!-- End col-md-6 split-right -->
  </div> <!-- End row -->

  <!-- JavaScript for client-side validation -->
  <script>
    // Select form and input fields
    const form = document.getElementById('login-form');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');

    // Add event listener on form submit
    form.addEventListener('submit', function (e) {
      // Clear previous error messages
      emailError.textContent = '';
      passwordError.textContent = '';

      // Get field values
      const email = emailInput.value;
      const password = passwordInput.value;
      let valid = true;

      // Regex to validate email format
      const emailRegex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
      if (!emailRegex.test(email)) {
        emailError.textContent = 'Invalid email format';
        valid = false;
      }

      // Regex to validate password complexity
      const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
      if (!passwordRegex.test(password)) {
        passwordError.textContent = 'Password must be 8+ chars, include 1 uppercase, 1 lowercase & 1 number';
        valid = false;
      }

      // Prevent form submission if invalid
      if (!valid) {
        e.preventDefault();
      }
    });
  </script>
</body>
</html>
