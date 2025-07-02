<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Payment - AmaYangri</title>
  <link rel="icon" href="{{ asset('images/logo.jpg') }}">
  <style>
    /* Modal background */
    .modal {
      display: flex; /* show modal immediately */
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1000;
      justify-content: center;
      align-items: center;
    }

    /* Modal box */
    .modal-content {
      background-color: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      max-width: 400px;
      width: 90%;
      text-align: center;
      position: relative;
    }

    /* Close button */
    .close {
      position: absolute;
      top: 12px;
      right: 18px;
      font-size: 24px;
      font-weight: bold;
      color: #555;
      cursor: pointer;
      transition: color 0.3s ease;
    }
    .close:hover {
      color: #027478;
    }

    /* Payment message */
    .payment-message {
      font-size: 1.2rem;
      margin-bottom: 25px;
      color: #333;
      font-weight: 600;
    }

    /* Pay button */
    .pay-button {
      background-color: #027478;
      color: white;
      border: none;
      padding: 14px 30px;
      font-size: 1.1rem;
      border-radius: 30px;
      cursor: pointer;
      font-weight: 600;
      box-shadow: 0 4px 12px rgba(2, 116, 120, 0.3);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }
    .pay-button:hover {
      background-color: #025f61;
      box-shadow: 0 6px 16px rgba(2, 116, 120, 0.5);
      transform: translateY(-2px);
    }
  </style>
</head>
<body>

  <!-- Modal popup -->
  <div id="payment-modal" class="modal">
    <div class="modal-content">
      <span id="close-modal" class="close">&times;</span>

      <p class="payment-message">Please complete the payment to unlock premium content.</p>

      <form method="GET" action="{{ route('esewa.pay') }}">
        <button type="submit" class="pay-button">Pay with eSewa</button>
      </form>
    </div>
  </div>

<script>
  const modal = document.getElementById('payment-modal');
  const closeBtn = document.getElementById('close-modal');

  // Function to close modal and redirect
  function closeAndRedirect() {
    modal.style.display = 'none';
    window.location.href = '{{ url("/AmaYangriTrek") }}'; // Update this URL if your route is different
  }

  // Close modal on X click
  closeBtn.addEventListener('click', closeAndRedirect);

  // Close modal when clicking outside modal-content
  window.addEventListener('click', (e) => {
    if (e.target === modal) {
      closeAndRedirect();
    }
  });
</script>

</body>
</html>
