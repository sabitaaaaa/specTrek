@extends('layouts.itinerary')

@section('title', $itinerary->title)

@section('content')
<header>
  <h1>{{ $itinerary->title }}</h1>
  <p class="subtitle">{{ strip_tags($itinerary->quote) }}</p>
</header>

<main>
  <div class="row">
    <div class="col-lg-7">
      <div class="slider">
        @foreach ([$itinerary->image1, $itinerary->image2, $itinerary->image3, $itinerary->image4] as $img)
          @if($img)
            <img class="slide {{ $loop->first ? 'active' : '' }}" src="{{ asset('images/' . $img) }}" alt="Trek Image {{ $loop->iteration }}" />
          @endif
        @endforeach
      </div>

      <section class="quote">
        <h4>“<p>{{ strip_tags($itinerary->description) }}</p>”</h4>
      </section>
    </div>

    <div class="col-lg-4">
      <div class="border-box">
        <div>
          <h2 style="color: #2c3e50;">Hidden Gems</h2>


          <!-- for each gem to appear line by line without html formatting -->
            <ul>
            @foreach(json_decode($itinerary->hidden_gems, true) ?? [] as $gem)
           <li>{{ strip_tags($gem) }}</li>
          @endforeach
          </ul>

        </div>
        <div class="best-time">
          <h3 style="color: #2c3e50;">Best Time to Visit</h3>
          <p>{{ strip_tags($itinerary->best_time) }}</p>
        </div>
      </div>
    </div>
  </div>

  <div id="itinerary-wrapper" class="itinerary-wrapper">
    <div class="row itinerary-section">
      <div class="col-lg-6 day-itinerary">
        <h2>Day-to-Day Itinerary</h2>
        <ul>

        <!-- because of jason encoded here removal of html is different  -->
      <h2>Day-to-Day Itinerary</h2>
      <ul>
        <!-- to make it appear line by line  -->
        @foreach(json_decode($itinerary->day_to_day_itinerary, true) ?? [] as $day)
        <li>{{ strip_tags($day) }}</li>
        @endforeach
        </ul>


      </div>

      <div class="col-lg-6 detailed-itinerary-box">
        <h2>Detailed Itinerary</h2>
        <div id="detailed-itinerary" class="fade-box">
          <div class="fade-content">
            <!-- just changed  -->
             @foreach(preg_split('/\r\n|\r|\n/', strip_tags($itinerary->detailed_itinerary)) as $line)
            <p>{{ trim($line) }}</p>
             @endforeach

            <strong>MORE INFORMATIONS</strong><br><br>

            <!-- to remove the html show in browser  -->
          {!! $itinerary->transport_table !!}



            <p style="margin-top: 1.5rem; font-size: 17px; line-height: 1.7;">
            <p><strong>Note:</strong> {{ strip_tags($itinerary->note) }}</p>

            </p>

            <div class="hidden-culture" style="margin-top: 3rem; padding: 2rem; background-color: #fef6f0; border-radius: 10px;">
              <h2 style="color: #2c3e50; text-align: center; margin-bottom: 1rem;">Hidden Traditions & Interesting Facts</h2>
              <ul style="font-size: 18px; line-height: 1.8; padding-left: 1.5rem;">
                <ul>
              @foreach(json_decode($itinerary->hidden_traditions, true) ?? [] as $fact)
              <li>{{ strip_tags($fact) }}</li>
             @endforeach
              </ul>

              </ul>
            </div>
          </div>
          <div class="fade-overlay"></div>
        </div>
 <button id="see-more-btn" class="see-more-button">See More</button>

        <script>
            document.getElementById("see-more-btn").addEventListener("click", function () {
              const isLoggedIn = @json(Auth::check());

              if (!isLoggedIn) {
                // Send them to login with redirect
                const intendedUrl = encodeURIComponent('/shivapuri/payment');
                window.location.href = "/login?redirect=" + intendedUrl;
              } else {
                // Already logged in
                window.location.href = "/shivapuri/payment";
              }
            });
          </script>
      </div>
    </div>
  </div>


</main>

<footer class="footer">
  <div class="footer-container">
    <p>&copy; All rights reserved.</p>
    <p>Developed by SpecTrek Team</p>
  </div>
</footer>

<script>
  let currentSlide = 0;
  const slides = document.querySelectorAll('.slide');
  const totalSlides = slides.length;
  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.style.display = i === index ? 'block' : 'none';
    });
  }
  function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
  }
  setInterval(nextSlide, 3000);
</script>

<script>
  const seeMoreBtn = document.getElementById('see-more-btn');
  const fadeBox = document.getElementById('detailed-itinerary');
  const wrapper = document.getElementById('itinerary-wrapper');
  seeMoreBtn?.addEventListener('click', () => {
    fadeBox.classList.toggle('expanded');
    wrapper.classList.toggle('fullscreen');
    seeMoreBtn.textContent = fadeBox.classList.contains('expanded') ? 'See Less' : 'See More';
  });
</script>

<script>
  const scrollBtn = document.getElementById("scrollTopBtn");
  window.onscroll = function () {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
      scrollBtn.style.display = "block";
    } else {
      scrollBtn.style.display = "none";
    }
  };
  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: "smooth" });
  }
</script>
@endsection
