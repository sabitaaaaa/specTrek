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

<style>
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat', sans-serif;
}

body, html {
  height: 100%;
  overflow-x: hidden;
  background-color: #fff;
}

/* ===============================
   HERO (Main Section with Images)
=============================== */
.hero {
  position: relative;
  height: 120vh; 
  overflow: hidden;
}

/*  Layered mountain images */
.layer {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  will-change: transform;
  transition: transform 0.9s ease-out;
  pointer-events: none;
}


.layer.bg { 
  z-index: 1; 
   top: -0px;
   height:700px;
   /* width:100%; */
}
.layer.mid {
   z-index: 2;
   top: -140px; 
   /* width:100%; */
  }
.layer.front {
  z-index: 3; 
  top: -130px;
}


/* =====================
    Navbar on top of image
===================== */
.navbar {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  z-index: 10;
  /* background-color: rgba(255, 255, 255, 0.9);  */
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 40px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}
.navbar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 100;
}
.navbar.scrolled {
    background-color: #e4d0bdff;
}

.nav-links {
  list-style: none;
  display: flex;
  gap: 25px;
  text-decoration:  #fff;
}

.nav-links a {
  text-decoration: none;
  color: #fff;
  font-weight: 600;
}

.signup {
  border: 1px solid  #fff;
  padding: 6px 12px;
  border-radius: 4px;
}

/* ====================
   HERO CENTER TEXT
==================== */
.hero-content {
  position: absolute;
  top: 55%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  text-align: center;
  z-index: 5;
  text-shadow: 0 2px 4px rgba(0,0,0,0.6);
}

.hero-content .to-the {
  font-size: 1.2rem;
  letter-spacing: 2px;
}

.hero-content h1 {
  font-size: 5rem;
  margin: 10px 0;
}

.cta-button {
  background-color: yellow;
  color: black;
  padding: 15px 25px;
  font-weight: bold;
  text-decoration: none;
  border-radius: 5px;
  margin-top: 20px;
  display: inline-block;
}
/* ====================
   SVG CURVE TRANSITION
==================== */
.hero {
  position: relative;
  height: 100vh;
  overflow: hidden;
  background: url('images/blue-mountain-0.jpg') center/cover no-repeat;
}

.hero-curve {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 200px;
  z-index: 5;
  pointer-events: none;
}


/* ==========SEction============ */
.features-section {
  text-align: center;
  padding: 60px 20px;
  background: white;
}

.features-section h2 {
  font-size: 28px;
  margin-bottom: 40px;
  color: #333;
}

/* Shared Grid Styles */
.features-grid {
  display: grid;
  gap: 30px 20px;
  margin-bottom: 40px;
}

/* Top row: 3 cards centered */
.top-row {
  grid-template-columns: repeat(3, 220px);
  justify-content: center;
}

/* Bottom row: 2 cards centered */
.bottom-row {
  grid-template-columns: repeat(3, 220px);
  justify-content: center;
}

/* Card styles */
.feature-card {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 8px 16px rgba(0,0,0,0.15);
  aspect-ratio: 3 / 4;
  width: 100%;
}

.feature-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.overlay-text {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 12px;
  color: white;
  background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);
  font-weight: bold;
  font-size: 14px;
}

/* Responsive stacking for small screens */
@media (max-width: 768px) {
  .top-row,
  .bottom-row {
    grid-template-columns: 1fr;
    justify-content: center;
  }
}




/* ====== ANOTHER SECTION============ */
.testimonial-section {
  padding: 60px 20px;
  text-align: center;
  background: #f8f8f8;
}

.testimonial-slider {
  position: relative;
  overflow: hidden;
  max-width: 900px;
  margin: 0 auto;
  height: 300px;
}

.testimonial {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  padding: 30px;
  position: absolute;
  width: 100%;
  top: 0;
  left: 100%;
  opacity: 0;
  transition: all 0.6s ease-in-out;
  box-sizing: border-box;
}

.testimonial.active {
  left: 0;
  opacity: 1;
}

.profile {
  flex: 0 0 180px;
  text-align: center;
}

.hexagon {
  width: 100px;
  height: 110px;
  clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
  overflow: hidden;
  margin: 0 auto;
}

.hexagon img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.profile h3 {
  margin-top: 10px;
  font-size: 16px;
  font-weight: 600;
}

.review-content {
  flex: 1;
  padding-left: 40px;
  text-align: justify;
}

.review-text {
  font-size: 16px;
  color: #333;
}

.quote-icon {
  font-size: 40px;
  color: #ccc;
  margin-bottom: 10px;
}

/* Dots */
.dots {
  margin-top: 20px;
  
}

.dot {
  display: inline-block;
  width: 12px;
  height: 12px;
  margin: 0 6px;
  border-radius: 50%;
  background: #bbb;
  background-color: #907f6fff;
  cursor: pointer;
}

.dot.active {
  background: #333;
}


   

/* ==========views========== */
.hex-section {
  text-align: center;
  padding: 60px 20px;
}

.hex-row {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 10px;
  margin: 20px 64px;
  width:1500px;
}

.hex-row-offset {
  margin-top: -30px; /* shift second row up slightly for a tighter layout */
}

.hex {
  width: 270px;
  height: 208px;
  background-size: cover;
  background-position: center;
  clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
  position: relative;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  color: white;
  transition: 0.3s ease;
  overflow: hidden;
}

.hex-content {
  background: rgba(0, 0, 0, 0.5);
  width: 100%;
  padding: 10px;
}

.hex-content h4 {
  font-size: 15px;
  margin: 0;
}

.hex-content span {
  font-size: 12px;
}

.hex.customize {
  background: #eee;
  color: #333;
}

.hex.customize img {
  width: 40px;
  margin-bottom: 5px;
}


/* =======video========= */
.video-section {
  background-color: #d0e3ee;
  padding: 60px 20px;
  text-align: center;
}

.video-placeholder {
  width: 80%;
  max-width: 960px;
  height: 480px;
  margin: 30px auto 0;
  background-color: #1e1e1e;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 8px;
}

.unavailable-message {
  color: #ccc;
  text-align: center;
}

.unavailable-message .icon {
  font-size: 48px;
  color: #aaa;
  margin-bottom: 10px;
}

.unavailable-message .title {
  font-size: 20px;
  font-weight: bold;
  color: #eee;
}

.unavailable-message .subtitle {
  font-size: 16px;
  color: #aaa;
}
.video-section {
  position: relative;
  width: 100%;
  height: 100vh;
  overflow: hidden;
}

.video-container {
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.video-container iframe {
  position: absolute;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  width: 177.77vh; /* 100vh * (16/9 aspect ratio) */
  height: 100vh;
}

/* fallback to keep it centered on resize */
@media (max-aspect-ratio: 16/9) {
  .video-container iframe {
    width: 100vw;
    height: 56.25vw; /* (9/16 aspect ratio) */
  }
}



/* ======= footer uppeeer====== */
.quote-mountain-wrapper {
      position: relative;
      width: 100%;
      min-height: 800px;
      text-align: center;
      overflow: hidden;
    }

    .main-mountain {
  width: 100%;
  display: block;
  position: relative;
  z-index: 1;
  margin-top: 320px; /* Pushes the mountain down */
}

    .black-mountain {
      position: absolute;
      bottom: 0px;
      left: 0;
      width: 100%;
      z-index: 2;
      pointer-events: none;
    }

.quote-overlay {
  position: absolute;
  bottom: 400px;
  left: 0;
  width: 100%;
  display: flex;
  justify-content: space-evenly;
  align-items: flex-start;
  z-index: 3;
  pointer-events: none;
}

.quote {
  max-width: 250px;
  text-align: center;
  color: black;
  pointer-events: auto;
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.quote p {
  font-weight: bold;
  font-size: 15px;
  margin-bottom: 5px;
}

.quote span {
  font-size: 14px;
  color: #333;
  margin-bottom: 10px;
}

.dot {
  width: 16px;
  height: 16px;
  background-color: #027478;
  border-radius: 50%;
  margin: 10px 0 0;
  transition: all 0.3s ease-in-out;
}

.line {
  width: 2px;
  height: 0; /* hidden initially */
  background-color: black;
  margin-top: 5px;
  transition: height 0.4s ease;
}

.quote:hover .line {
  height: 50px; /* grows on hover */
}



    /* Footer */

    .site-footer {
      background-color: #0c0c0c;
      color: #fff;
      padding: 60px 20px 30px;
      z-index: 0;
      position: relative;
    }

    .footer-inner {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 40px;
    }

    .footer-column h4 {
      font-size: 18px;
      margin-bottom: 15px;
      color: #fff;
    }

    .footer-column ul {
      list-style: none;
      padding: 0;
    }

    .footer-column ul li {
      margin-bottom: 10px;
    }

    .footer-column ul li a {
      color: #ccc;
      text-decoration: none;
      transition: color 0.3s;
    }

    .footer-column ul li a:hover {
      color: #fff;
    }

    .footer-column p {
      font-size: 14px;
      line-height: 1.6;
      color: #ccc;
    }

    .social-icons a {
      display: inline-block;
      margin-right: 10px;
      font-size: 18px;
      color: #ccc;
      transition: color 0.3s;
    }

    .social-icons a:hover {
      color: #fff;
    }

    .payment-icons img {
      height: 30px;
      margin-right: 10px;
      margin-top: 10px;
      filter: brightness(0) invert(1);
    }

    .footer-bottom {
      border-top: 1px solid #333;
      margin-top: 40px;
      text-align: center;
      padding-top: 20px;
      font-size: 14px;
      color: #888;
    }
    /* review form  */
    .modal {
        display: none;
        position: fixed;
        z-index: 10;
        left: 0; top: 0;
        width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background: white;
        margin: 10% auto;
        padding: 20px;
        width: 400px;
        border-radius: 10px;
        position: relative;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 20px;
        cursor: pointer;
    }

    input, textarea {
        width: 100%;
        margin-bottom: 10px;
        padding: 10px;
    }

    .submit-btn {
        width: 100%;
        background-color: #e4d0bdff;
        color: black;
        padding: 10px;
        border: none;
    }

    .floating-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #e4d0bdff;
    color: black;
    border: none;
    padding: 15px 20px;
    border-radius: 50px;
    font-size: 16px;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    transition: background-color 0.3s ease;
    z-index: 1000;
}

.floating-btn:hover {
    background-color: #baa99aff;;
}
</style>

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

<!-- ===============================updated part ----------------------======================= -->

<section class="testimonial-section">
  <h2>HAPPY TRAVELERS</h2>

 

  <div class="testimonial-slider">
    @forelse($reviews as $index => $review)
      <div class="testimonial {{ $index === 0 ? 'active' : '' }}">
        <div class="profile">
          <div class="hexagon">
            <img src="{{ asset('images/user-' . (($index % 5) + 1) . '.jpeg') }}" alt="Profile">
          </div>
          <h3>{{ $review->name }}</h3>
        </div>
        <div class="quote-icon">❝</div>
        <p class="review-text">{{ $review->review }}</p>
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


<!-- ---------------------------- review form part----------------------- --> 
<!-- Trigger Button -->
<button class="floating-btn" onclick="document.getElementById('popupForm').style.display='block'">
   Review us
</button>

<!-- Popup Modal Form -->
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

<!-- Success Message -->
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
<!------------------------------------- end review form part -------------------------------- -->

<!--============================= updated part end =================================== -->
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
      <a href="mailto:spectrek29@email.com">spectrek29@gmail.com</a><br>
      +977-9841868919 </p>

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

<!--=================== js for review ========== -->
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
