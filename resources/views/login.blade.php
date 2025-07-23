<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>SpecTrek | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen font-sans m-0">
  <div class="flex h-full">
    <!-- Left Split (Hidden on small devices) -->
    <div class="hidden md:flex w-1/2 bg-gray-100"></div>

    <!-- Right Split (Form) -->
    <div class="w-full md:w-1/2 flex items-center justify-center bg-white relative px-4">
      <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-md">
        <!-- Form Header -->
        <div class="flex flex-col items-center gap-2 text-center mb-6">
          <img src="{{ asset('images/logoo.jpg') }}" alt="Logo" class="h-14 mb-2 rounded-lg shadow-md">
          <div class="text-2xl font-bold text-green-600">SpecTrek</div>
          <div class="text-sm text-gray-500">Explore safely, trek freely</div>
        </div>

        <!-- Error Message -->
        @if (session('error'))
          <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
            {{ session('error') }}
          </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="/login" id="login-form" class="space-y-4">
          @csrf

          <div>
            <label for="email" class="block text-sm font-medium mb-1">Email Address</label>
            <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
            <div class="text-red-600 text-xs mt-1" id="email-error"></div>
          </div>

          <div>
            <label for="password" class="block text-sm font-medium mb-1">Password</label>
            <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
            <div class="text-red-600 text-xs mt-1" id="password-error"></div>
          </div>

          <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md shadow hover:-translate-y-0.5 transition duration-300">
            Login
          </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
          Still, Don't have an account?
          <a href="/register" class="text-green-600 hover:underline">Sign up here</a>
        </p>
      </div>
    </div>
  </div>

  <!-- JS for simple validation -->
  <script>
    const form = document.getElementById('login-form');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');

    form.addEventListener('submit', function (e) {
      emailError.textContent = '';
      passwordError.textContent = '';

      const email = emailInput.value.trim();
      const password = passwordInput.value.trim();
      let valid = true;

      const emailRegex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
      if (!emailRegex.test(email)) {
        emailError.textContent = 'Invalid email format';
        valid = false;
      }

      //  Simple check: just ensure password is not empty (or you can set min length like 6)
      if (password.length < 6) {
        passwordError.textContent = 'Password must be at least 6 characters long';
        valid = false;
      }

      if (!valid) {
        e.preventDefault();
      }
    });
  </script>
</body>
</html>