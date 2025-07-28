<!DOCTYPE html>
<html>
<head>
  <title>Payment Options</title>
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: sans-serif;
      background-color: #f3f4f6;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .pay-box {
      text-align: center;
      max-width: 500px;
      border: 1px solid #ccc;
      padding: 2rem;
      border-radius: 12px;
      background-color: #fff;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    h1 {
      margin-bottom: 1.5rem;
      color: #333;
    }

    button {
      padding: 10px 20px;
      margin: 1rem;
      font-size: 18px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .stripe-btn {
      background-color: #05696cdb;
      color: white;
    }

    .stripe-btn:hover {
      background-color: #044f52;
    }

    .Khalti-btn {
      background-color: #9e1616;
      color: white;
    }

    .Khalti-btn:hover {
      background-color: #7b1010;
    }

    a {
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="pay-box">
    <h1>Select Payment Method</h1>
    <a href="/stripe">
      <button class="stripe-btn">Pay with Stripe</button>
    </a>
    <a href="/Khalti">
      <button class="Khalti-btn">Pay with Khalti</button>
    </a>
  </div>
</body>
</html>