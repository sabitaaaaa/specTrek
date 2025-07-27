<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpecTrek Landing</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/Home-mountains.js') }}"></script>
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
  rel="stylesheet"
/>


</head>
<body>

    <header class="hero">
        <nav class="navbar">
            <div class="logo">
                <img src="{{ asset($site_logo) }}" alt="Site Logo" style="max-height: 120px;">
            </div>
            <ul class="nav-links">
                <li><a href="#">Emergency</a></li>
                <li><a href="#">Blogs</a></li>
                <li><a href="#">Tour</a></li>
                <li><a href="#">User</a></li>
                <li><a href="/login">Login</a></li>
                <li><a class="signup" href="#">Signup</a></li>
            </ul>
        </nav>
        <img src="{{ asset('images/pine .jpg') }}" class="layer front" alt="Front Mountain">
        <!-- Hero Content -->
        <div class="hero-content">
            <p class="to-the">SETTING THE </p>
            <h1>CLEAR PATH</h1>
            <a href="{{ route('tours') }}" class="cta-button">VIEW TREKS </a>
        </div>
        <svg class="hero-curve" viewBox="0 0 1440 320" preserveAspectRatio="none">
  <path fill="#ffffff" d="M0,0 C480,300 960,300 1440,0 L1440,320 L0,320 Z"></path>

</svg>

    </header>
<section class="features-section">
  <h2>EXPLORE NEPAL'S HIGHLIGHTS</h2>

  <div class="features-grid top-row">
    <div class="feature-card">
        <a href="{{ url('/itinerary/ShivapuriTrek') }}">
          <img src="{{ asset('images/h-1.jpg') }}" alt="Shivapuri">
          <div class="overlay-text">SHIVAPURI</div>
        </a>
      </div>


    <div class="feature-card">
      <a href="{{ url('/abc') }}">
        <img src="{{ asset('images/h-2.jpg') }}" alt="ABC">
        <div class="overlay-text">ANNAPURNA BASE CAMP</div>
      </a>
    </div>

    <div class="feature-card">
      <a href="{{ url('/shey') }}">
        <img src="{{ asset('images/h-3.jpg') }}" alt="Shey Phoksundo">
        <div class="overlay-text">SHEY PHOKSUNDO</div>
      </a>
    </div>
  </div>

  <div class="features-grid bottom-row">
    <div class="feature-card">
      <a href="{{ url('/Langtangtrek') }}">
        <img src="{{ asset('images/h-4.jpg') }}" alt="Langtang">
        <div class="overlay-text">LANGTANG</div>
      </a>
    </div>

    <div class="feature-card">
      <a href="{{ url('/AmaYangriTrek') }}">
        <img src="{{ asset('images/h-5.jpg') }}" alt="Amayangri">
        <div class="overlay-text">AMAYANGRI</div>
      </a>
    </div>

    <div class="feature-card">
      <a href="{{ url('/manaslu') }}">
        <img src="{{ asset('images/h-6.jpg') }}" alt="Manaslu">
        <div class="overlay-text">MANASLU</div>
      </a>
    </div>
  </div>
</section>


<!-- ===============================updated part ----------------------======================= -->

<section class="testimonial-section">
  <h2 class="testimonial-heading">OUR HAPPY TRAVELLERS</h2>

  <div class="testimonial-slider">
    @forelse($reviews as $index => $review)
      <div class="testimonial {{ $index === 0 ? 'active' : '' }}">

        <div class="reviewer-name-container">
          <h3 class="reviewer-name">
            {{ $review->name }}
          </h3>
        </div>

        <div class="review-text-container">
          <span class="quote-icon">❝</span>
          <p class="review-text">
            {{ $review->review }}
          </p>
          <span class="quote-icon">❞</span>
        </div>

      </div>
    @empty
      <p>No reviews yet. Be the first to submit one!</p>
    @endforelse
  </div>

  <div class="dots">
    @foreach($reviews as $index => $r)
      <span class="dot {{ $index === 0 ? 'active' : '' }}"></span>
    @endforeach
  </div>
</section>
<!-- ===================================VISUALIZING============================================= -->
<!-- <section class="hex-section">
  <h2>VISUALIZING THE PLACES</h2>
  <div class="hex-row">
    <div class="hex" style="background-image: url('{{ asset('images/view-1.jpg') }}');">
      <div class="hex-content">

      </div>
    </div>
    <div class="hex" style="background-image: url('{{ asset('images/view-2.jpg') }}');">
      <div class="hex-content">

      </div>
    </div>
    <div class="hex" style="background-image: url('{{ asset('images/view-3.jpg') }}');">
      <div class="hex-content">

      </div>
    </div>
    <div class="hex" style="background-image: url('{{ asset('images/view-4.jpg') }}');">
      <div class="hex-content">

      </div>
    </div>
    <div class="hex" style="background-image: url('{{ asset('images/view-5.jpg') }}');">
      <div class="hex-content">

      </div>

    </div>
  </div> -->
  <!-- <div class="hex-row hex-row-offset">
   <div class="hex" style="background-image: url('{{ asset('images/view-6.jpg') }}');">
      <div class="hex-content">

      </div>
    </div>
    <div class="hex" style="background-image: url('{{ asset('images/view-7.jpg') }}');">
    </div>
    <div class="hex" style="background-image: url('{{ asset('images/view-8.jpg') }}');">
    </div>
        <div class="hex" style="background-image: url('{{ asset('images/view-9.jpg') }}');">
      </div>
    </div>
  </div>
</section> -->
<!-- STATS SECTION -->
<section class="stats-banner">
  <div class="stats-container">
    <div class="stat-box">
      <h3>120+</h3>
      <p>TREKS COMPLETED</p>
    </div>
    <div class="stat-box">
      <h3>95%</h3>
      <p>CLIENT SATISFACTION</p>
    </div>
    <div class="stat-box">
      <h3>6,476m</h3>
      <p>HIGHEST ALTITUDE CONQUERED</p>
    </div>
    <div class="stat-box">
      <h3>8</h3>
      <p>REGIONS EXPLORED</p>
    </div>
  </div>
</section>

<!-- VIDEO SECTION -->
<section class="video-section">
  <h2>#SPECTREK</h2>
  <div class="video-container">
    <iframe src="https://www.youtube.com/embed/4OiXfDdbtnM?autoplay=1&mute=1&loop=1&playlist=4OiXfDdbtnM&controls=0&showinfo=0&modestbranding=1"
    frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
  </div>
</section>

<!-- QUOTE SECTION -->
<section class="sherpa-banner">
  <div class="banner-content">
    <h2>“Because every summit begins with a single step.”</h2>
    <p>A tribute to the spirit of the mountains and the legends who led the way.</p>
  </div>
</section>

<!-- =======================================UPPER-PART-OF-FOOTER======================================== -->
<section class="quote-mountain-wrapper">
  <!-- Main scenic mountain -->
  <img src="{{ asset('images/everest_kalapathar.jpg') }}" class="main-mountain" alt="Mountain">

  <!-- Quotes overlayed above mountain -->
  <div class="quote-overlay">
  <div class="quote quote-1">
    <p>"The journey of a thousand miles begins with a single step."</p>
    <span>— Lao Tzu</span>
    <div class="dot"></div>
    <div class="line"></div>
  </div>
  <div class="quote quote-2">
    <p>"Do not follow where the path may lead. Go instead where there is no path and leave a trail."</p>
    <span>— Ralph Waldo Emerson</span>
    <div class="dot"></div>
    <div class="line"></div>
  </div>
  <div class="quote quote-3">
    <p>"It’s not the mountain we conquer, but ourselves."</p>
    <span>— Sir Edmund Hillary</span>
    <div class="dot"></div>
    <div class="line"></div>
  </div>
</div>


  <!-- Black silhouette mountain on top of scenic mountain -->
  <img src="{{ asset('images/tree.png') }}" class="black-mountain" alt="Black silhouette">
</section>



<!-- ===========================Footer=========================== -->

<footer class="site-footer">
  <div class="footer-inner">
    <div class="footer-column">
      <h4>Company</h4>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Places</a></li>
        <li><a href="#">Explore</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Services</a></li>
        <li><a href="#">Press Center</a></li>
      </ul>
    </div>

    <div class="footer-column">
      <h4>Contact Us</h4>
      <p><strong>Spectrek Team</strong><br>
      <a href="mailto:spectrek29@email.com">spectrek29@gmail.com</a><br>
      01-4567922 </p>

      <p><strong>Nepal</strong><br>
      2025 Apex college,<br>
      mid baneshowr, kathmandu.</p>


    </div>
    <div class="footer-column">
      <h4>Follow Us</h4>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/spectrek29/"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-google-plus-g"></i></a>
      </div>

      <h4>Secure Payments By</h4>
      <div class="payment-icons">
        <img src="{{ asset('images/stripe.png') }}" alt="Stripe" style="height: 30px;">
        <img src="{{ asset('images/khalti.png') }}" alt="Khalti" style="height: 30px;">

      </div>
    </div>
  </div>
<svg class="hero-curve" viewBox="0 0 1440 320" preserveAspectRatio="none">
  <path fill="#ffffff" d="M0,0 C480,300 960,300 1440,0 L1440,320 L0,320 Z"></path>
</svg>

  <div class="footer-bottom">
    <p>© 2025 SpecTrek. All rights reserved.</p>
  </div>
</footer>

<script src="js/Home-mountain.js"></script>
<!-- Floating Review Button -->
<button class="floating-review-btn" onclick="toggleReviewModal(true)">
  <i class="fas fa-comment-dots"></i> Review Us
</button>

<!-- Review Modal -->
<div id="reviewModal" class="modern-modal" style="display: none;">
  <div class="modern-modal-content">
    <span class="modern-close" onclick="toggleReviewModal(false)">&times;</span>
    <h3 class="modal-heading">We value your feedback 💬</h3>
    <form method="POST" action="{{ route('reviews.store') }}">
      @csrf
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="review" rows="4" placeholder="Share your thoughts..." required></textarea>
      <button type="submit" class="btn btn-success mt-2">Submit Review</button>
    </form>
  </div>
</div>

<!-- Optional: Success Message -->
<!-- @if(session('success'))
  <p style="color: green;">{{ session('success') }}</p>
@endif -->

<!-- Toggle Modal Script -->
<script>
  function toggleReviewModal(show) {
    const modal = document.getElementById('reviewModal');
    modal.style.display = show ? 'flex' : 'none';
  }

  // Optional: Close modal when clicking outside
  window.onclick = function(event) {
    const modal = document.getElementById('reviewModal');
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  };
</script>

</body>
</html>
