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
          <ul>
            @foreach(explode("\n", $itinerary->hidden_gems) as $gem)
              @if(trim($gem) !== '')
                <li>{{ trim($gem) }}</li>
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
        $cleanDayText = preg_replace('/(?<!\s)(Day \d+:)/', "\n$1", strip_tags($itinerary->day_to_day_itinerary));
      @endphp

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

        @php
          $cleanDetailed = preg_replace('/(?<!\s)(Day \d+:)/', "\n$1", strip_tags($itinerary->detailed_itinerary));
        @endphp

        <div id="detailed-itinerary" class="fade-box">
          <ul>
            @foreach(explode("\n", $cleanDetailed) as $line)
              @if(trim($line) !== '')
                <li>{{ trim($line) }}</li>
              @endif
            @endforeach
          </ul>

          <div class="fade-content">
            <strong>MORE INFORMATIONS</strong><br><br>

            {!! $itinerary->transport_table !!}

            <p style="margin-top: 1.5rem; font-size: 17px; line-height: 1.7;">
              <strong>Note:</strong> {{ strip_tags($itinerary->note) }}
            </p>

            <div class="hidden-culture" style="margin-top: 3rem; padding: 2rem; background-color: #fef6f0; border-radius: 10px;">
              <h2 style="color: #2c3e50; text-align: center; margin-bottom: 1rem;">Hidden Traditions & Interesting Facts</h2>
              <ul style="font-size: 18px; line-height: 1.8; padding-left: 1.5rem;">
                @foreach(explode("\n", $itinerary->hidden_traditions) as $fact)
                  @if(trim($fact) !== '')
                    <li>{{ trim($fact) }}</li>
                  @endif
                @endforeach
              </ul>
            </div>
          </div>
          <div class="fade-overlay"></div>
        </div>
        <button id="see-more-btn" class="see-more-button">See More</button>
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
@endsection
