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
            <img class="slide {{ $loop->first ? 'active' : '' }}" src="{{ asset('storage/' . $img) }}" alt="Trek Image {{ $loop->iteration }}" />
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
          @php
  $gems = preg_split('/[.,]/', strip_tags($itinerary->hidden_gems));
@endphp

<ul>
  @foreach($gems as $gem)
    @if(trim($gem) !== '')
      <li>{{ trim($gem, ' "“”') }}</li>
    @endif
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
        @php
          $decodedDayText = html_entity_decode(strip_tags($itinerary->day_to_day_itinerary));
          $cleanDayText = preg_replace('/(?<!\s)(Day \d+:)/', "\n$1", $decodedDayText);

          $cleanDetailed = strip_tags($itinerary->detailed_itinerary);
          $cleanDetailed = preg_replace('/(?<!\s)(Day \d+:)/', "\n$1", $cleanDetailed);
        @endphp

        @if(auth()->check() && auth()->user()->is_premium)
          <!-- PREMIUM: Full-width Detailed Itinerary -->
          <div class="col-lg-12 detailed-itinerary-box">
            <h2>Detailed Itinerary</h2>
            <div id="detailed-itinerary" class="fade-box expanded">
              {!! nl2br(e($cleanDetailed)) !!}
              <div class="fade-content">

                <br>
                <br>
                <br>

                <strong>MORE INFORMATIONS</strong><br><br>
                {!! $itinerary->transport_table !!}

                <br><br><br>
                <p><strong>Note:</strong> {{ strip_tags($itinerary->note) }}</p>

                <div class="hidden-culture" style="margin-top: 3rem; padding: 2rem; background-color: #fef6f0; border-radius: 10px;">
                  <h2 style="color: #2c3e50; text-align: center; margin-bottom: 1rem;">Hidden Traditions & Interesting Facts</h2>
                  <ul style="font-size: 18px; line-height: 1.8; padding-left: 1.5rem;">
                    @foreach(json_decode($itinerary->hidden_traditions, true) ?? [] as $fact)
                      <li>{{ strip_tags($fact) }}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        @else
          <!-- NON-PREMIUM: 2-Column Layout -->
          <div class="col-lg-6 day-itinerary">
            <h2>Day-to-Day Itinerary</h2>
            <ul>
              @foreach(explode("\n", $cleanDayText) as $line)
                @if(trim($line) !== '')
                  <li>{{ trim($line) }}</li>
                @endif
              @endforeach
            </ul>
          </div>

          <div class="col-lg-6 detailed-itinerary-box">
            <h2>Detailed Itinerary</h2>
            <div id="detailed-itinerary" class="fade-box">
              {!! nl2br(e($cleanDetailed)) !!}
              <div class="fade-overlay"></div>
            </div>

            <button id="see-more-btn" class="see-more-button">See More</button>

            <script>
              document.getElementById("see-more-btn").addEventListener("click", function () {
                const isLoggedIn = @json(Auth::check());
                const trekSlug = "{{ $itinerary->slug }}";

                if (!isLoggedIn) {
                  window.location.href = "/login?redirect=/itinerary/" + trekSlug;
                } else {
                  window.location.href = "/" + trekSlug + "/payment";
                }
              });
            </script>
          </div>
        @endif
      </div>

    </div>
  </div>

</main>
<button onclick="scrollToTop()" id="scrollTopBtn" title="Go to top">&#8679;</button>

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
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    }
    </script>

<script>
  // Auto image slider
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

  showSlide(currentSlide);
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
    scrollBtn.style.display = (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) ? "block" : "none";
  };
  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: "smooth" });
  }
</script>
<footer class="footer">
    <div class="footer-container">
      <p>&copy; All rights reserved.</p>
      <p>Developed by SpecTrek Team</p>
    </div>
  </footer>
@endsection

