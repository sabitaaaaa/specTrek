<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> feature/trekking-mapp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"href="First-form.css">

</head>
<body>
    <div id="id01" class="validation">
        <div class="design">
          <div class="model-content">
            <div class="container-scope">
              <div class="row-form">
                  <div class="foodmandu-cover">
                  <img class="main-image" src="Images-Foodmandu/login-img.png" alt="page">
                  </div>
                  <div class="login-form">
                    <div class="cross">
                      <a href="foodmandu.html">
                      &times;</div>
                      </a>
                      <div class="modal-header">
                        <div class="row-model">
                          <div class="content">
                            <h3 id="modal-title" style="font-size:1.3rem">Login to Foodmandu</h3>
                          </div>
                        </div>
                      </div>
                      <div class="modal-body">
                        <div class="row-modal-body">
                        <form id="form" action="/">
                          <div class="email">
                            <label class="text-form">Email Address</label>
                              <input id="input" name="email" type="text" placeholder="you@yourname.com">
                              <div class="error" id="email-error"></div>
                          </div>
                          <div class="password">
                            <label class="text-form">Enter Password</label>
                              <input id="input-password"name="password" type="password">
                              <div class="error" id="password-error"></div>
                          </div> 
                          <div class="remember">
                            <input id="rem" type="checkbox" name="policy" value="value" id="po" required>Remember Me
                            </div>
                          <div class="btn-frm-lgn">
                          <button class="btn-frm" id="login-button" type="Login">Login</button>
                          </div>
                        </div>
                      <hr>
                      <div class="options">
                        <div class="line">OR LOGIN USING</div>
                        <div class="buttons">
                        <div class="btn-form">
                          <div class="btn-frm-1">
                            <a href="javascript:document.getElementById('btnFacebook').click()" style="color:#fff;">Facebook</a>
                          <button class="btn-fb" id="btnFacebook" name="provider" value="Facebook">Facebook</button>
                          </div>
                        </div>
                        <div class="btn-form-2">
                          <div class="btn-frm-2">
                            <a href="javascript:document.getElementById('btnGoogle').click()" style="color:#fff;">Google Plus </a>
                        <button class="btn-gg" id="btnGoogle" name="provider" value="Google">Google Plus</button>
                        </div>
                        </div>
                        </div>
                        </div>
                      </form>
                      <div class="col-md-12text-center">
                        <p class="mt-md-4">Don't have an account? Signup</a></p>         
                      </div>
                      <div class="col-md-12text-center">
                        <p class="mt-md-4">Forgot Password?</a></p>
                        </div>
                        
                        </div>
                      </div>
                      </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <script>
     // Get the form element
const form = document.getElementById('form');

// Add event listener to the form submission
form.addEventListener('submit', (e) => {
  e.preventDefault(); // Prevent default form submission

  // Get the input fields
  const emailInput = document.getElementById('input');
  const passwordInput = document.getElementById('input-password');
  const emailError = document.getElementById('email-error');
  const passwordError = document.getElementById('password-error');
  emailInput.style.width = '290px'; // Adjust the width to your liking
passwordInput.style.width = '290px'; // Adjust the width to your liking
const loginButton = document.getElementById('login-button');
loginButton.classList.add('login-button');
loginButton.style.width = '300px';


  // Reset the error messages
  emailError.textContent = '';
  passwordError.textContent = '';

  // Validate email
  if (!validateEmail(emailInput.value)) {
    emailError.textContent = 'Invalid email address';
    emailError.style.color = 'red';
    emailInput.style.borderColor = 'red';
    return;
  } else {
    emailInput.style.borderColor = 'black';
  }

  // Validate password
  if (!validatePassword(passwordInput.value)) {
    passwordError.textContent = 'Password must be at least 8 characters and contain at least one uppercase letter, one lowercase letter, and one number';
    passwordError.style.color = 'red';
    passwordInput.style.borderColor = 'red';
    passwordError.style.fontSize = '10px'; // Add font size
    return;
  } else {
    passwordInput.style.borderColor = '';
  }

  // If validation passes, submit the form
  form.submit();
});

// Email validation function
function validateEmail(email) {
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return emailRegex.test(email);
}

// Password validation function
function validatePassword(password) {
  const passwordRegex = /^(?=.[a-z])(?=.[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
  return passwordRegex.test(password);
}
        </script>
          
</body>
<<<<<<< HEAD
</html>
=======
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
          Still, Don't have an account? <a href="/register">Sign up here</a>
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
>>>>>>> feature-admin
=======
</html>
>>>>>>> feature/trekking-mapp
