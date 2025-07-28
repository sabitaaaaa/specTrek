<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Khalti Payment</title>
  <script src="https://khalti.com/static/khalti-checkout.js"></script>
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

    .khalti-button {
      background-color: #5c2d91;
      color: white;
      padding: 12px 20px;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="payment-container">
    <h2>Pay with Khalti</h2>
    <button id="payment-button" class="khalti-button">Pay Now</button>
  </div>

  <script>
    var khaltiConfig = {
      "publicKey": "f602f5b8305144238bfc7bc5172d2dc2",
      "productIdentity": "1234567890",
      "productName": "Premium Access",
      "productUrl": "http://example.com/product",
      "paymentPreference": ["KHALTI"],
      "eventHandler": {
        onSuccess(payload) {
          console.log("Payment Successful:", payload);
          // Optionally redirect
          window.location.href = "/"; // your premium page
        },
        onError(error) {
          console.error("Payment Error:", error);
        },
        onClose() {
          console.log("Khalti widget closed");
        }
      }
    };

    var khaltiCheckout = new KhaltiCheckout(khaltiConfig);

    // Trigger payment on button click
    document.getElementById("payment-button").addEventListener("click", function () {
      khaltiCheckout.show({ amount: 990*00 }); // Amount in paisa = Rs. 10
    });
  </script>
</body>
</html>
