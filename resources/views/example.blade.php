<?php
// amayangri_trek.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Amayangri Trek</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      background-color: #f8f9fa;
    }
    .hero {
      background-color: #343a40;
      color: white;
      padding: 3rem 1rem;
      text-align: center;
    }
    footer {
      background-color: #212529;
      color: #ccc;
      padding: 1rem;
      text-align: center;
      margin-top: 2rem;
    }
  </style>
</head>
<body>

  <!-- Hero Section -->
  <div class="hero">
    <h1 class="display-4">Amayangri Trek</h1>
    <p class="lead">Explore the serene beauty of the Himalayan foothills</p>
  </div>

  <div class="container my-5">

    <!-- About Section -->
    <div class="card mb-4">
      <div class="card-body">
        <h2 class="card-title text-primary">About the Trek</h2>
        <p class="card-text">
          The Amayangri Trek is a breathtaking journey through the Himalayan foothills, offering stunning views of snow-capped peaks, lush forests, and vibrant local culture. Perfect for beginners and seasoned trekkers, this route immerses you in nature and tranquility.
        </p>
      </div>
    </div>

    <!-- Highlights Section -->
    <div class="card mb-4">
      <div class="card-body">
        <h2 class="card-title text-success">Key Highlights</h2>
        <ul>
          <li>Panoramic views of Annapurna and Langtang ranges</li>
          <li>Authentic traditional villages</li>
          <li>Rhododendron-filled forests and scenic trails</li>
          <li>Moderate trekking route for most fitness levels</li>
        </ul>
      </div>
    </div>

    <!-- Booking Button -->
    <div class="text-center">
      <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Your Trek</button>
    </div>

    <!-- PHP Form Handling -->
    <?php
    $message = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars($_POST['name'] ?? '');
        $email = htmlspecialchars($_POST['email'] ?? '');
        $msg = htmlspecialchars($_POST['message'] ?? '');

        if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $msg) {
            $message = "<div class='alert alert-success mt-4'>Thank you, <strong>$name</strong>. Your inquiry has been received!</div>";
        } else {
            $message = "<div class='alert alert-danger mt-4'>Please fill out all fields correctly.</div>";
        }
    }
    echo $message;
    ?>
  </div>

  <!-- Booking Modal -->
  <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="#bookingModal">
          <div class="modal-header">
            <h5 class="modal-title" id="bookingModalLabel">Booking Inquiry</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="name" class="form-label">Your Name</label>
              <input type="text" name="name" class="form-control" required />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" required />
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Your Message</label>
              <textarea name="message" class="form-control" rows="4" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Send Inqui
