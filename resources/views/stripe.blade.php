<!DOCTYPE html>
<<<<<<< HEAD
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
=======
>>>>>>> origin/merged-ayushma
<html>
<head>
    <meta charset="UTF-8">
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .payment-container {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        button {
            background-color: #6772e5;
            color: white;
            padding: 12px 24px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #5469d4;
        }

        .success-message {
            color: green;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="payment-container">
    <h2>Pay Rs 99 to Unlock Premium</h2>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <form action="{{ route('stripe.post') }}" method="POST">
        @csrf
        <button type="submit">Pay 99 to Unlock Premium</button>
    </form>
</div>
</body>
</html>
