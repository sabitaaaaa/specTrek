<h1>WELCOMEEE. HELLO</h1> 
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

        <!-- ✅ Hero Content -->
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
      <img src="{{ asset('images/h-1.jpg') }}" alt="Shivapuri">
      <div class="overlay-text">SHIVAPURI</div>
    </div>
    <div class="feature-card">
      <img src="{{ asset('images/h-2.jpg') }}" alt="ABC">
      <div class="overlay-text">ANNAPURNA BASE CAMP</div>
    </div>
    <div class="feature-card">
      <img src="{{ asset('images/h-3.jpg') }}" alt="Shey Phoksundo">
      <div class="overlay-text">SHEY PHOKSUNDO</div>
    </div>
  </div>
  <div class="features-grid bottom-row">
    <div class="feature-card">
      <img src="{{ asset('images/h-4.jpg') }}" alt="Langtang">
      <div class="overlay-text">LANGTANG</div>
    </div>
    <div class="feature-card">
      <img src="{{ asset('images/h-5.jpg') }}" alt="Amayangri">
      <div class="overlay-text">AMAYANGRI</div>
    </div>
    <div class="feature-card">
      <img src="{{ asset('images/h-6.jpg') }}" alt="Amayangri">
      <div class="overlay-text">MANASLU</div>
    </div>
  </div>
</section>

<section class="testimonial-section">
  <h2>HAPPY TRAVELERS</h2>

  <div class="testimonial-slider">
    <!-- 1. Priyanka MV -->
    <div class="testimonial active">
      <div class="profile">
        <div class="hexagon">
          <img src="images/user-1.jpeg" alt="Profile">
        </div>
        <h3>Priyanka MV</h3>
      </div>
      <div class="quote-icon">❝</div>
      <p class="review-text">
        “SpecTrek was exactly what I needed to plan my Langtang Valley trek. The detailed trail maps and budget filter saved me a lot of time and stress.”
      </p>
    </div>

    <!-- 2. John Doe -->
    <div class="testimonial">
      <div class="profile">
        <div class="hexagon">
          <img src="images/user-2.jpeg" alt="Profile">
        </div>
        <h3>John Doe</h3>
      </div>
      <div class="quote-icon">❝</div>
      <p class="review-text">
        "I found hidden gems I never knew existed. Great for adventure!"
      </p>
    </div>

    <!-- 3. Sarah K. -->
    <div class="testimonial">
      <div class="profile">
        <div class="hexagon">
          <img src="images/user-3.jpeg" alt="Profile">
        </div>
        <h3>Sarah K.</h3>
      </div>
      <div class="quote-icon">❝</div>
      <p class="review-text">
        The design is clean and beginner-friendly, but I faced a few lags while exploring the Solukhumbu trek options. Hoping for an update soon.
    </div>

    <!-- 4. Daniel Lee -->
    <div class="testimonial">
      <div class="profile">
        <div class="hexagon">
          <img src="images/user-4.webp" alt="Profile">
        </div>
        <h3>Daniel Lee</h3>
      </div>
      <div class="quote-icon">❝</div>
      <p class="review-text">
        SpecTrek offers one of the most personalized and genuine experiences I’ve had while trekking.
    </div>

    <!-- 5. Amina R. -->
    <div class="testimonial">
      <div class="profile">
        <div class="hexagon">
          <img src="images/user-5.jpeg" alt="Profile">
        </div>
        <h3>Amina R.</h3>
      </div>
      <div class="quote-icon">❝</div>
      <p class="review-text">
        “I’m not a professional hiker, but this app helped me feel prepared. From the safety checklist to nearby resources, I felt supported every step of the way.”
      </p>
    </div>
  </div>

  <!-- Dots for navigation -->
  <div class="dots">
    <span class="dot active"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>
</section>



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
      <p><strong>Ashish Shrestha</strong><br>
      <a href="mailto:spectrekobserve@spectrekapps.com">spectrekobserve@spectrekapps.com</a><br>
      +977-9841370673</p>

      <p><strong>United States Office</strong><br>
      2035 Sunset Lake Rd Suite B-2,<br>
      Newark, New Castle, DE-19702.</p>

      <p><strong>India Office</strong><br>
      Flat No 1-D, Top Floor, DDA Flats Pocket-1, Sector-7,<br>
      Dwarka, New Delhi-110075, Delhi.</p>

      <p><strong>Nepal Office</strong><br>
      Nuwakott Ghar, Sanepa Chowk,<br>
      Lalitpur-44700, Province Number-3.</p>
    </div>

    <div class="footer-column">
      <h4>Follow Us</h4>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-pinterest-p"></i></a>
        <a href="#"><i class="fab fa-google-plus-g"></i></a>
      </div>

      <h4>Secure Payments By</h4>
      <div class="payment-icons">
        <img src="esewa.png" alt="eSewa">
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
</body>
</html>
