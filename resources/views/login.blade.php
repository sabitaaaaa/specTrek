<!DOCTYPE html>
<html lang="en">
<head>
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
</html>