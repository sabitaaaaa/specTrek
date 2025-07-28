<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ $itinerary->title }}</title>
  </head>
<body>
  <header>
    <h1>{{ $itinerary->title }}</h1>
    <p class="subtitle">{{ $itinerary->subtitle }}</p>
  </header>

  <main>
    <div class="row">
      <div class="col-lg-7">
         <div class="slider">
            @foreach($itinerary->images as $image)
              <img class="slide @if($loop->first) active @endif" src="{{ asset($image) }}" alt="{{ $itinerary->title }}" />
            @endforeach
          </div>

        <section class="quote">
          <h4>“{{ $itinerary->quote }}”</h4>
        </section>
      </div>

      <div class="col-lg-4">
        <div class="border-box">
          <div>
            <h2 style="color: #2c3e50;">Hidden Gems</h2>
            <ul>
             @foreach($itinerary->hidden_gems as $gem)
               <li>{{ $gem }}</li>
             @endforeach
            </ul>
          </div>
          <div class="best-time">
            <h3 style="color: #2c3e50;">Best Time to Visit</h3>
            <p>{{ $itinerary->best_time_to_visit }}</p>
          </div>
        </div>
      </div>
    </div>

    <div id="itinerary-wrapper" class="itinerary-wrapper">
      <div class="row itinerary-section">
        <div class="col-lg-6 day-itinerary">
          <h2>Day-to-Day Itinerary</h2>
          <ul>
            @foreach($itinerary->day_itinerary as $day)
              <li>{{ $day }}</li>
            @endforeach
            <p><strong> END OF TREK !! </strong></p>
          </ul>
        </div>

        <div class="col-lg-6 detailed-itinerary-box">
          <h2>Detailed Itinerary</h2>
          <div id="detailed-itinerary" class="fade-box">
            <div class="fade-content">
              @foreach($itinerary->detailed_itinerary as $day => $content)
                <p><strong>{{ $day }}:</strong><br>{{ $content }}</p>
              @endforeach
            </div>
            <div class="fade-overlay"></div>
          </div>
          <button id="see-more-btn" class="see-more-button">See More</button>
        </div>
      </div>
    </div>
  </main>
  </body>
</html>
