<!--
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
      <!-- Slider with multiple images -->
      <div class="slider">
        @foreach ([$itinerary->image1, $itinerary->image2, $itinerary->image3, $itinerary->image4] as $img)
          @if($img)
            <img class="slide {{ $loop->first ? 'active' : '' }}" src="{{ asset('storage/' . $img) }}" alt="Trek Image {{ $loop->iteration }}" />
          @endif
        @endforeach
      </div>

      <!-- Optional static image preview -->
      <div>
        <img src="{{ asset('storage/' . $itinerary->image1) }}" alt="Preview Image" class="img-fluid rounded my-3">
      </div>

      <section class="quote">
        <h4><p>{{ strip_tags($itinerary->description) }}</p></h4>
      <section class="quote">
        <h4>“<p>{{ strip_tags($itinerary->description) }}</p>”</h4>
      </section>
    </div>

    <div class="col-lg-4">
      <div class="border-box">
        <div>
          <h2 style="color: #2c3e50;">Hidden Gems</h2>
          <ul>
            @foreach(json_decode($itinerary->hidden_gems, true) ?? [] as $gem)
              <li>{{ strip_tags($gem) }}</li>
            @endforeach
          </ul>
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
        $decoded = json_decode($itinerary->day_to_day_itinerary, true);
        $text = is_array($decoded) ? implode("\n", $decoded) : $itinerary->day_to_day_itinerary;
        $cleanText = strip_tags($text);
        $cleanText = preg_replace('/(?<!\s)(Day \d+:)/', "\n$1", $cleanText);
      @endphp

      <div class="col-lg-6 day-itinerary">
        <h2>Day-to-Day Itinerary</h2>
        <ul>{!! nl2br(e($cleanText)) !!}</ul>
    @php
  $decodedDayText = html_entity_decode(strip_tags($itinerary->day_to_day_itinerary));
  $cleanDayText = preg_replace('/(?<!\s)(Day \d+:)/', "\n$1", $decodedDayText);
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
          $cleanDetailed = strip_tags($itinerary->detailed_itinerary);
          $cleanDetailed = preg_replace('/(?<!\s)(Day \d+:)/', "\n$1", $cleanDetailed);
        @endphp

        <div id="detailed-itinerary" class="fade-box">
          {!! nl2br(e($cleanDetailed)) !!}

          <div class="fade-content">
            <strong>MORE INFORMATIONS</strong><br><br>
            {!! $itinerary->transport_table !!}

            <p style="margin-top: 1.5rem; font-size: 17px; line-height: 1.7;">
              <strong>Note:</strong> {{ strip_tags($itinerary->note) }}
            </p>

            <div class="hidden-culture" style="margin-top: 3rem; padding: 2rem; background-color: #fef6f0; border-radius: 10px;">
              <h2 style="color: #2c3e50; text-align: center; margin-bottom: 1rem;">Hidden Traditions & Interesting Facts</h2>
              <ul style="font-size: 18px; line-height: 1.8; padding-left: 1.5rem;">
                @foreach(json_decode($itinerary->hidden_traditions, true) ?? [] as $fact)
                  <li>{{ strip_tags($fact) }}</li>
                @endforeach
              </ul>

        @php
  $decodedDetailed = html_entity_decode(strip_tags($itinerary->detailed_itinerary));
  $cleanDetailed = preg_replace('/(?<!\s)(Day \d+:)/', "\n$1", $decodedDetailed);
@endphp


        <div id="detailed-itinerary" class="fade-box">
          <ul>
            @foreach(explode("\n", $cleanDetailed) as $line)
              @if(trim($line) !== '')
                <li>{{ trim($line) }}</li>
              @endif
            @endforeach
          </ul>

          <br>
          <br>

          <div class="fade-content">
            <strong>MORE INFORMATIONS</strong>
@php
    // Decode entities like &nbsp;, strip any HTML, and split by full stop
    $transportText = html_entity_decode(strip_tags($itinerary->transport_table));
    $transportSentences = preg_split('/\.\s+|\.$/', $transportText, -1, PREG_SPLIT_NO_EMPTY);
@endphp

<div class="transport-section" style="margin-top: 2rem;">
  {{-- <h3 style="color: #2c3e50;">Transport Options</h3> --}}
  <ul style="font-size: 17px; line-height: 1.7;">
    @foreach($transportSentences as $sentence)
      @if(trim($sentence) !== '')
        <li>{{ trim($sentence) }}.</li>
      @endif
    @endforeach
  </ul>
</div>


{{-- for note --}}
{{ strip_tags($itinerary->note) }}
            </p>

            @php
  // 1. Strip all HTML tags to get plain text
  $plainText = strip_tags($itinerary->hidden_traditions);

  // 2. Split the text by full stops (periods) followed by space or end of string
  // The regex splits on ". " or "." at the end, but keeps the sentences clean.
  $sentences = preg_split('/\.\s+|\.$/', $plainText, -1, PREG_SPLIT_NO_EMPTY);
@endphp

<div class="hidden-culture" style="margin-top: 3rem; padding: 2rem; background-color: #fef6f0; border-radius: 10px;">
  <h2 style="color: #2c3e50; text-align: center; margin-bottom: 1rem;">Hidden Traditions & Interesting Facts</h2>
  <ul style="font-size: 18px; line-height: 1.8; padding-left: 1.5rem;">
    @foreach($sentences as $sentence)
      <li>{!! trim($sentence) !!}.</li> {{-- Add period back since split removes it --}}
    @endforeach
  </ul>
</div>

            </div>
          </div>
          <div class="fade-overlay"></div>
        </div>
        <button id="see-more-btn" class="see-more-button">See More</button>
      </div>
    </div>
  </div>
</main>

{{-- 🔁 Based on Your Recently Viewed Treks --}}
@if($recommendations->isNotEmpty())
  <h3>Recommended Based on Your Views</h3>
  <div class="row">
    @foreach ($recommendations as $rec)
      <div class="col-md-4">
        <div class="card mb-3">
          @if($rec->image1)
            <img src="{{ asset('storage/' . $rec->image1) }}" class="card-img-top" alt="{{ $rec->title }}">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $rec->title }}</h5>
            <p class="card-text">
              Region: {{ $rec->region }}<br>
              Difficulty: {{ $rec->difficulty }}
            </p>
            <a href="{{ route('itinerary.show', $rec->slug) }}" class="btn btn-primary">View Itinerary</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endif

{{-- ⭐ Based on Your Preferences --}}
@if($preferenceRecommendations->isNotEmpty())
  <h3>Recommended for Your Preferences</h3>
  <div class="row">
    @foreach ($preferenceRecommendations as $rec)
      <div class="col-md-4">
        <div class="card mb-3">
          @if($rec->image1)
            <img src="{{ asset('storage/' . $rec->image1) }}" class="card-img-top" alt="{{ $rec->title }}">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{$rec->title }}</h5>
            <p class="card-text">
              Budget: Rs. {{ $rec->price }}<br>
              Days: {{ $rec->duration_days }}
            </p>
            <a href="{{ route('itinera.show', $rec->id) }}" class="btn btn-success">View Trek</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endif
<button onclick="scrollToTop()" id="scrollTopBtn" title="Go to top">&#8679;</button>

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
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
      scrollBtn.style.display = "block";
    } else {
      scrollBtn.style.display = "none";
    }
    scrollBtn.style.display = (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) ? "block" : "none";
  };
  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: "smooth" });
  }
</script>
@endsection























@endsection
