<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SpecTrek Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" rel="stylesheet">


</head>
<style>
  /* -----------------------------------------------------footer part -------------------- */
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
      /* font-size: 14px; */
    }

  </style>
<body>

<nav class="navbar navbar-expand-lg px-4 !important text-white" style="    background: linear-gradient(135deg, #4682b4, #5f9ea0);
);
"

>
  <style>
  .navbar .nav-link {
    color: white !important;
  }
</style>
  <a class="navbar-brand" href="#">
   <img src="{{ asset('images/final-logo.png') }}" alt="SpecTrek" style="height: 75px; width: 100px;">
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
        <a class="nav-link" href="#">User</a>
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

  <form action="{{ route('recommendation') }}" method="GET" id="priceForm">
          <input type="hidden" name="price" id="priceInput" value="5000">
          <input type="range" class="form-range custom-slider" min="0" max="4" step="1" id="priceRange">
      <div class="d-flex justify-content-between mt-2 px-1 number-line">
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

<script>
   document.addEventListener('DOMContentLoaded', function () {
    const prices = [5000, 25000, 45000, 65000,90000];
    const range = document.getElementById('priceRange');
    const display = document.getElementById('valueDisplay');

    range.addEventListener('input', function () {
        const selectedPrice = prices[this.value];
        display.textContent = selectedPrice;

        const cards = document.querySelectorAll('.col[data-price]');

        cards.forEach(card => {
            const cardPrice = parseInt(card.getAttribute('data-price'), 10);
            if (cardPrice <= selectedPrice) {
                card.style.display = '';  // reset display to default (show)
            } else {
                card.style.display = 'none';  // hide
            }
        });
    });

    // Trigger input event on page load to apply filter immediately
    range.dispatchEvent(new Event('input'));
});

</script>
</div>

    <div class="col-md-9">
      <div class="row row-cols-1 row-cols-md-3 g-4">


        <div class="col" data-price="65000">
          <div class="card h-100">
           <img src="{{ asset('images/Annapurna.jpeg') }}" alt="SpecTrek" style="height: 115px;">
            <div class="card-body">
              <h5 class="card-title">Annapurna Base Camp</h5>
              <p class="card-text">Starts at NPR 65000p</p>
            </div>
          </div>
        </div>

        <div class="col" data-price="65000">
          <div class="card h-100">
            <img src="{{ asset('images/SheyPhoksundo.jpeg') }}" alt="SpecTrek" style="height: 115px;">
            <div class="card-body">
              <h5 class="card-title">SheyPhoksundo</h5>
              <p class="card-text">Starts at NPR 65000</p>
            </div>
          </div>
        </div>

        <div class="col"data-price="45000">
          <div class="card h-100">
            <img src="{{ asset('images/Langtang.jpeg') }}" alt="SpecTrek" style="height: 115px;">
            <div class="card-body">
              <h5 class="card-title">Langtang</h5>
              <p class="card-text">Starts at NPR 45000</p>
            </div>
          </div>
        </div>

        <div class="col" data-price="25000">
          <div class="card h-100">
            <img src="{{ asset('images/Amayangri.jpeg') }}" alt="SpecTrek" style="height: 115px;">
            <div class="card-body">
              <h5 class="card-title">Amayangri</h5>
              <p class="card-text">Starts at NPR 25000</p>
            </div>
          </div>
        </div>

        <div class="col" data-price="5000">
          <div class="card h-100">
            <img src="{{ asset('images/Shivapuri.jpg') }}" alt="SpecTrek" style="height: 115px;">
            <div class="card-body">
              <h5 class="card-title">Shivapuri</h5>
              <p class="card-text">Starts at NPR 5000</p>
            </div>
          </div>
        </div>

        <div class="col" data-price="90000">
          <div class="card h-100">
            <img src="{{ asset('images/manaslu.jpg') }}" alt="SpecTrek" style="height: 115px;">
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
