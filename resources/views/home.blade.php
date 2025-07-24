<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpecTrek Landing</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/Home-mountains.js') }}"></script>

</head>
<body>

    <header class="hero">
        <nav class="navbar">
            <div class="logo">
                <img src="{{ asset('images/final-logo.png') }}" alt="SpecTrek" style="height: 90px; width: 100px;">
            </div>
            <ul class="nav-links">
                <li><a href="#">Emergency</a></li>
                <li><a href="#">Blogs</a></li>
                <li><a href="#">Tour</a></li>
                <li><a href="#">User</a></li>
                <li><a href="#">Login</a></li>
                <li><a class="signup" href="#">Signup</a></li>
            </ul>
        </nav>

        <img src="{{ asset('images/mount-everest-00.png') }}" class="layer bg" alt="Background Layer">
        <img src="{{ asset('images/mounteverest-1.png') }}" class="layer mid" alt="Middle Upper Mountain">
        <img src="{{ asset('images/mounteverest-2.png') }}" class="layer mid" alt="Middle Lower Mountain">
        <img src="{{ asset('images/mounteverest-3.png') }}" class="layer front" alt="Front Mountain">

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
     <a href="ShivapuriTrek"> <img src="{{ asset('images/h-1.jpg') }}" alt="Shivapuri"></a>
       <a href="ShivapuriTrek"><div class="overlay-text">SHIVAPURI</div></a>
    </div>
    <div class="feature-card">
     <a href ="abc"> <img src="{{ asset('images/h-2.jpg') }}" alt="ABC"> </a>
        <a href ="abc"><div class="overlay-text">ANNAPURNA BASE CAMP</div> </a>
    </div>
    <div class="feature-card">
     <a href="shey">   <img src="{{ asset('images/h-3.jpg') }}" alt="Shey Phoksundo"></a>
     <a href="shey"> <div class="overlay-text">SHEY PHOKSUNDO</div></a>
    </div>
  </div>
  <div class="features-grid bottom-row">
    <div class="feature-card">
     <a href="Langtangtrek"> <img src="{{ asset('images/h-4.jpg') }}" alt="Langtang"></a>
      <a href="Langtangtrek"> <div class="overlay-text">LANGTANG</div></a>
    </div>
    <div class="feature-card">
       <a href="AmaYangriTrek"> <img src="{{ asset('images/h-5.jpg') }}" alt="Amayangri"></a>
    <a href="AmaYangriTrek"> <div class="overlay-text">AMAYANGRI</div></a>
    </div>
    <div class="feature-card">
    <a href="manaslu"> <img src="{{ asset('images/h-6.jpg') }}" alt="Manaslu"> </a>
       <a href="manaslu"><div class="overlay-text">MANASLU</div></a>
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

<!-- Review Button & Modal Form -->
<button class="floating-btn" onclick="document.getElementById('popupForm').style.display='block'">
   Review us
</button>

<div id="popupForm" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="document.getElementById('popupForm').style.display='none'">&times;</span>
    <form method="POST" action="{{ route('reviews.store') }}">
      @csrf
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="review" rows="4" placeholder="Your review..." required></textarea>

      <button type="submit" class="submit-btn">Submit</button>
    </form>
  </div>
</div>

@if(session('success'))
  <p style="color: green;">{{ session('success') }}</p>
@endif


<!------------------------------------- end review form part -------------------------------- -->


<section class="hex-section">
  <h2>VISUALIZING THE PLACES</h2>
  

  <!-- Top row - 5 hexes -->
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
  </div>

  <!-- Bottom row - 4 hexes -->
  <div class="hex-row hex-row-offset">
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
</section>

<!--================== VIDEO-SECTION========================================= -->
<section class="video-section">
  <h2>#SPECTREK</h2>
  <div class="video-container">
    <iframe src="https://www.youtube.com/embed/4OiXfDdbtnM?autoplay=1&mute=1&loop=1&playlist=4OiXfDdbtnM&controls=0&showinfo=0&modestbranding=1"
    frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
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
        <img src="stripe" alt="stripe">
        <img src="khalti.png" alt="Khalti">
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
<script>
    window.onclick = function(event) {
        const modal = document.getElementById('popupForm');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>