

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Settings - MyDash</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f1f5f9;
    }

    .dashboard {
      display: flex;
    }

    .sidebar {
      width: 200px;
      height: 100vh;
      background-color: #1e293b;
      color: white;
      padding: 20px 10px;
      position: fixed;
    }

    .sidebar a {
      display: block;
      color: white;
      padding: 10px 5px;
      text-decoration: none;
      cursor: pointer;
    }

    .sidebar a:hover {
      background: #334155;
    }

    .main-content {
      margin-left: 210px;
      padding: 20px;
      width: calc(100% - 210px);
    }

    .navbar {
      margin-bottom: 20px;
    }

    .content .card {
      background-color: white;
      padding: 20px;
      margin-bottom: 15px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .content label {
      display: block;
      margin: 10px 0 5px;
      font-weight: bold;
    }

    .content input,
    .content select {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .content button {
      background-color: #3b82f6;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .content button:hover {
      background-color: #2563eb;
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <aside class="sidebar">
      <h2 class="logo">MyDash</h2>
      <nav>
        <a href="admin.html">Dashboard</a>
        <a href="users.html">Users</a>
        <a href="settings.html">Settings</a>
        <a href="index.html" onclick="logout()">Logout</a>
      </nav>
    </aside>

    <main class="main-content">
      <header class="navbar">
        <h1>Settings</h1>
      </header>
      <section class="content">
        <div class="card">
          <h2>Profile Settings</h2>
          <label for="username">Username:</label>
          <input type="text" id="username" placeholder="Enter username" />

          <label for="email">Email:</label>
          <input type="email" id="email" placeholder="Enter email" />

          <label for="theme">Theme Preference:</label>
          <select id="theme">
            <option>Light</option>
            <option>Dark</option>
            <option>System Default</option>
          </select>

          <button onclick="saveSettings()">Save Settings</button>
        </div>

        <div class="card">
          <h2>Change Password</h2>
          <label for="old-password">Current Password:</label>
          <input type="password" id="old-password" />

          <label for="new-password">New Password:</label>
          <input type="password" id="new-password" />

          <label for="confirm-password">Confirm New Password:</label>
          <input type="password" id="confirm-password" />

          <button onclick="changePassword()">Change Password</button>
        </div>
      </section>
    </main>
  </div>

  <script>
    function logout() {
      localStorage.clear();
      alert("Logged out successfully!");
    }

    function saveSettings() {
      const username = document.getElementById('username').value;
      const email = document.getElementById('email').value;
      const theme = document.getElementById('theme').value;

      // You can connect to a backend later
      alert(`Saved!\nUsername: ${username}\nEmail: ${email}\nTheme: ${theme}`);
    }

    function changePassword() {
      const oldPass = document.getElementById('old-password').value;
      const newPass = document.getElementById('new-password').value;
      const confirmPass = document.getElementById('confirm-password').value;

      if (newPass !== confirmPass) {
        alert("New passwords do not match.");
        return;
      }

      // You can connect to real server here
      alert("Password changed successfully.");
    }
  </script>
</body>
</html>