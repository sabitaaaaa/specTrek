<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SpecTrek Navbar with Price Filter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .navbar {
      background-color: #027478;
    }
    .navbar .nav-link {
      color: white !important;
    }
    .custom-slider::-webkit-slider-thumb {
      background-color: #027478;
    }
    .number-line span {
      font-weight: bold;
    }
    .card img {
      height: 115px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg px-4">
  <a class="navbar-brand" href="#">
    <img src="your-logo.png" alt="SpecTrek" style="height: 75px; width: 100px;">
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

<div class="container mt-4">
  <div class="row">
    <div class="col-md-3 mb-4">
      <h5>Filter by Price</h5>
      <input type="range" class="form-range custom-slider" min="0" max="4" step="1" id="priceRange">
      <div class="d-flex justify-content-between mt-2 number-line">
        <span>5K</span>
        <span>25K</span>
        <span>45K</span>
        <span>65K</span>
        <span>90K</span>
      </div>
      <p class="mt-2">Selected Price: <span id="valueDisplay">5000</span></p>
    </div>

    <div class="col-md-9">
      <div class="row row-cols-1 row-cols-md-3 g-4" id="cardContainer">
        <div class="col" data-price="65000">
          <div class="card h-100">
            <img src="annapurna.jpg" class="card-img-top" alt="Annapurna">
            <div class="card-body">
              <h5 class="card-title">Annapurna Base Camp</h5>
              <p class="card-text">Starts at NPR 65000</p>
            </div>
          </div>
        </div>
        <div class="col" data-price="45000">
          <div class="card h-100">
            <img src="langtang.jpg" class="card-img-top" alt="Langtang">
            <div class="card-body">
              <h5 class="card-title">Langtang</h5>
              <p class="card-text">Starts at NPR 45000</p>
            </div>
          </div>
        </div>
        <div class="col" data-price="25000">
          <div class="card h-100">
            <img src="Amayangri.jpeg" class="card-img-top" alt="Amayangri">
            <div class="card-body">
              <h5 class="card-title">Amayangri</h5>
              <p class="card-text">Starts at NPR 25000</p>
            </div>
          </div>
        </div>
        <div class="col" data-price="5000">
          <div class="card h-100">
            <img src="shivapuri.jpg" class="card-img-top" alt="Shivapuri">
            <div class="card-body">
              <h5 class="card-title">Shivapuri</h5>
              <p class="card-text">Starts at NPR 5000</p>
            </div>
          </div>
        </div>
        <div class="col" data-price="90000">
          <div class="card h-100">
            <img src="manaslu.jpg" class="card-img-top" alt="Manaslu">
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

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const prices = [5000, 25000, 45000, 65000, 90000];
    const range = document.getElementById('priceRange');
    const display = document.getElementById('valueDisplay');

    range.addEventListener('input', function () {
      const selectedPrice = prices[this.value];
      display.textContent = selectedPrice;
      
      document.querySelectorAll('.col[data-price]').forEach(card => {
        const cardPrice = parseInt(card.getAttribute('data-price'));
        card.style.display = cardPrice <= selectedPrice ? '' : 'none';
      });
    });

    range.dispatchEvent(new Event('input'));
  });
</script>

</body>
</html>
