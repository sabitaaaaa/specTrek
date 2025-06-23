<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SpecTrek Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
  
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
  <a class="navbar-brand" href="#">
   <img src="{{ asset('images/Logo-spectrek.png') }}" alt="SpecTrek" style="height: 50px;">
  </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item mx-2">
        <a class="nav-link" href="#">Emergency Support</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link" href="#">Tours</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link" href="#">Login</a>
      </li>
      <li class="nav-item mx-2">
        <a class="btn btn-primary" href="#">Signup</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container mt-4">
  <div class="row">
    <div class="col-md-3 mb-4">
      <div class="container mt-4">
    <div class="row">
            <h5>Filter by Price</h5>
            <input type="range" class="form-range custom-slider" min="0" max="3" step="1" id="priceRange">
            <div class="d-flex justify-content-between mt-2 px-1 number-line">
                <span>5K</span>
                <span>25K</span>
                <span>45K</span>
                <span>65K</span>
            </div>

            <p class="mt-2">Selected Price: <span id="valueDisplay">5000</span></p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const prices = [5000, 25000, 45000, 65000];
        const range = document.getElementById('priceRange');
        const display = document.getElementById('valueDisplay');

        range.addEventListener('input', function () {
            display.textContent = prices[this.value];
        });
    });
</script>
</div>
    
    <div class="col-md-9">
      <div class="row row-cols-1 row-cols-md-3 g-4">

      
        <div class="col">
          <div class="card h-100">
           <img src="{{ asset('images/Annapurna.jpeg') }}" alt="SpecTrek" style="height: 115px;">
            <div class="card-body">
              <h5 class="card-title">Annapurna Base Camp</h5>
              <p class="card-text">Starts at NPR 65000p</p>
            </div>
          </div>
        </div>

    
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('images/SheyPhoksundo.jpeg') }}" alt="SpecTrek" style="height: 115px;">
            <div class="card-body">
              <h5 class="card-title">SheyPhoksundo</h5>
              <p class="card-text">Starts at NPR 65000</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('images/Langtang.jpeg') }}" alt="SpecTrek" style="height: 115px;">
            <div class="card-body">
              <h5 class="card-title">Langtang</h5>
              <p class="card-text">Starts at NPR 45000</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('images/Amayangri.jpeg') }}" alt="SpecTrek" style="height: 115px;">
            <div class="card-body">
              <h5 class="card-title">Amayangri</h5>
              <p class="card-text">Starts at NPR 25000</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('images/Shivapuri.jpg') }}" alt="SpecTrek" style="height: 115px;">
            <div class="card-body">
              <h5 class="card-title">Shivapuri</h5>
              <p class="card-text">Starts at NPR 5000</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
