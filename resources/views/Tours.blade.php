<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SpecTrek - Trek Recommendations</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
    }

    .navbar {
      background-image: linear-gradient(135deg, #4682b4, #5f9ea0);
      padding: 15px 50px;
      height: 90px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .navbar .nav-link {
      color: white !important;
      font-weight: 500;
    }

    .navbar-brand img {
      height: 75px;
      width: 100px;
    }

    .number-line span {
      flex: 1;
      text-align: center;
      font-size: 14px;
    }

    .price-filter-box {
      background: #f8f9fa;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      padding: 15px;
    }

    .card img {
      object-fit: cover;
      width: 100%;
      height: 115px;
    }

    .btn-primary {
      background-color: #027478;
      border-color: #027478;
    }

    .btn-primary:hover {
      background-color: #025f60;
    }

    .form-range.custom-slider {
      width: 100%;
      height: 1.5rem;
      accent-color: #027478;
    }

    .form-range.custom-slider::-webkit-slider-thumb {
      height: 20px;
      width: 20px;
      background-color: #027478;
      border: none;
      border-radius: 50%;
      cursor: pointer;
      margin-top: -6px;
    }

    .form-range.custom-slider::-moz-range-thumb {
      height: 20px;
      width: 20px;
      background-color: #027478;
      border: none;
      border-radius: 50%;
      cursor: pointer;
    }

    .footer {
      background-color: black;
      color: white;
      text-align: center;
      padding: 1rem 0;
      margin-top: 3rem;
    }

    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg text-white">
  <a class="navbar-brand" href="{{ route('home') }}">
    <img src="{{ asset('images/final-logo.png') }}" alt="SpecTrek Logo">
  </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item mx-2"><a class="nav-link" href="#">Emergency Support</a></li>
      <li class="nav-item mx-2"><a class="nav-link" href="#">Tours</a></li>
      <li class="nav-item mx-2"><a class="nav-link" href="#">User</a></li>
      <li class="nav-item mx-2"><a class="nav-link" href="#">Login</a></li>
      <li class="nav-item mx-2"><a class="btn btn-primary" href="#">Signup</a></li>
    </ul>
  </div>
</nav>

<!-- Main Content -->
<main class="py-4">
  <div class="container">
    <div class="row">

      <!-- Sidebar Filter -->
      <div class="col-md-3 mb-4">
        <div class="price-filter-box">
          <h6>Filter by Price</h6>
          <form action="{{ route('recommendation') }}" method="GET" id="priceForm">
            <input type="hidden" name="price" id="priceInput" value="5000">
            <input type="range" class="form-range custom-slider" min="0" max="4" step="1" id="priceRange">
            <div class="d-flex justify-content-between mt-2 number-line">
              <span>5K</span>
              <span>25K</span>
              <span>45K</span>
              <span>65K</span>
              <span>90K</span>
            </div>
            <p class="mt-2">Selected Price: <span id="valueDisplay">5000</span></p>
          </form>
        </div>
      </div>

      <!-- Trek Cards -->
      <div class="col-md-9">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col" data-price="65000">
            <div class="card h-100">
              <img src="{{ asset('images/Annapurna.jpeg') }}" alt="Annapurna Base Camp">
              <div class="card-body">
                <h5 class="card-title">Annapurna Base Camp</h5>
                <p class="card-text">Starts at NPR 65000</p>
              </div>
            </div>
          </div>

          <div class="col" data-price="65000">
            <div class="card h-100">
              <img src="{{ asset('images/SheyPhoksundo.jpeg') }}" alt="SheyPhoksundo">
              <div class="card-body">
                <h5 class="card-title">SheyPhoksundo</h5>
                <p class="card-text">Starts at NPR 65000</p>
              </div>
            </div>
          </div>

          <div class="col" data-price="45000">
            <div class="card h-100">
              <img src="{{ asset('images/Langtang.jpeg') }}" alt="Langtang">
              <div class="card-body">
                <h5 class="card-title">Langtang</h5>
                <p class="card-text">Starts at NPR 45000</p>
              </div>
            </div>
          </div>

          <div class="col" data-price="25000">
            <div class="card h-100">
              <img src="{{ asset('images/Amayangri.jpeg') }}" alt="Amayangri">
              <div class="card-body">
                <h5 class="card-title">Amayangri</h5>
                <p class="card-text">Starts at NPR 25000</p>
              </div>
            </div>
          </div>

          <div class="col" data-price="5000">
            <div class="card h-100">
              <img src="{{ asset('images/Shivapuri.jpg') }}" alt="Shivapuri">
              <div class="card-body">
                <h5 class="card-title">Shivapuri</h5>
                <p class="card-text">Starts at NPR 5000</p>
              </div>
            </div>
          </div>

          <div class="col" data-price="90000">
            <div class="card h-100">
              <img src="{{ asset('images/manaslu.jpg') }}" alt="Manaslu">
              <div class="card-body">
                <h5 class="card-title">Manaslu</h5>
                <p class="card-text">Starts at NPR 90000</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<!-- Footer -->
<footer class="footer">
  <div class="footer-container">
    <p>&copy; All rights reserved.</p>
    <p>Developed by SpecTrek Team</p>
  </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const prices = [5000, 25000, 45000, 65000, 90000];
    const range = document.getElementById('priceRange');
    const display = document.getElementById('valueDisplay');

    range.addEventListener('input', function () {
      const selectedPrice = prices[this.value];
      display.textContent = selectedPrice;
      document.getElementById('priceInput').value = selectedPrice;

      const cards = document.querySelectorAll('.col[data-price]');
      cards.forEach(card => {
        const cardPrice = parseInt(card.getAttribute('data-price'), 10);
        card.style.display = cardPrice <= selectedPrice ? '' : 'none';
      });
    });

    range.dispatchEvent(new Event('input'));
  });
</script>
</body>
</html>
