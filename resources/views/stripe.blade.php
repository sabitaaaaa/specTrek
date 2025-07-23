<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Stripe Payment</title>
  <script async src="https://js.stripe.com/v3/buy-button.js"></script>
  <style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f3f4f6;
    }

    .payment-container {
      text-align: center;
      background: white;
      padding: 40px 60px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    h2 {
      margin-bottom: 30px;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="payment-container">
    <h2>Pay with Stripe</h2>

    <!-- Stripe Buy Button -->
    <stripe-buy-button
      buy-button-id="buy_btn_1Rnb1H2EZhQjvwUDzDzo2z4f"
      publishable-key="pk_test_51RgQnH2EZhQjvwUDmT9XNp8uJ2b6RMK5LWPXGZL6jdlkCKlG8T5wW9LtVL9MOExF5bt9zU57OuUhkyPEMzRiwVES00xM6dZTI1">
    </stripe-buy-button>
  </div>
</body>
</html>
