<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AmaYangri</title>
  <link rel="stylesheet" href="{{ asset('css/amayangri.css') }}">
  <link rel="icon" href="{{ asset('images/logo.png') }}">
  <style>
    /* Slider fix: hide all slides except active */
    .slide {
      display: none;
    }
    .slide.active {
      display: block;
    }
  </style>
</head>
<body>

  <!-- ...navbar and header omitted for brevity... -->

  <main>
    <div class="row">
      <div class="col-lg-7">
        <div class="slider">
          <img class="slide active" src="{{ asset('images/a1.jpg') }}" alt="AmaYangri Trek 1" />
          <img class="slide" src="{{ asset('images/a2.jpg') }}" alt="AmaYangri Trek 2" />
          <img class="slide" src="{{ asset('images/a3.jpg') }}" alt="AmaYangri Trek 3" />
          <img class="slide" src="{{ asset('images/a4.jpg') }}" alt="AmaYangri Trek 4" />
          <img class="slide" src="{{ asset('images/a5.jpg') }}" alt="AmaYangri Trek 5" />
        </div>
        <section class="quote">
          <h4>Crowned in clouds and wrapped in prayer, Ama Yangri rises not just as a peak but as a mother watching over her children, quiet, strong, eternal.</h4>
        </section>
      </div>

      <div class="col-lg-4">
        <!-- ... content omitted for brevity ... -->
      </div>
    </div>

    <div id="itinerary-wrapper" class="itinerary-wrapper">
      <div class="row itinerary-section">
        <div class="col-lg-6 day-itinerary">
          <h2>Day-to-Day Itinerary</h2>
          <ul>
            <li><strong>Day 1:</strong> Drive from Kathmandu to Melamchi Ghyang (via Timbu)</li>
            <li><strong>Day 2:</strong> Trek from Melamchi Ghyang to Tarkeghyang</li>
            <li><strong>Day 3:</strong> Trek from Tarkeghyang to Yangri Village</li>
            <li><strong>Day 4:</strong> Acclimatization day and exploration around Yangri Village</li>
            <li><strong>Day 5:</strong> Trek from Yangri Village to Ama Yangri Base Camp</li>
            <li><strong>Day 6:</strong> Hike to Ama Yangri Peak (3,771 m), return to Base Camp</li>
            <li><strong>Day 7:</strong> Trek back to Tarkeghyang</li>
            <li><strong>Day 8:</strong> Trek from Tarkeghyang to Sermathang</li>
            <li><strong>Day 9:</strong> Trek down to Melamchi Pul Bazaar</li>
            <li><strong>Day 10:</strong> Drive back to Kathmandu</li>
          </ul>
          <p><strong>END OF TREK !!</strong></p>
        </div>

        <div class="col-lg-6 detailed-itinerary-box">
          <h2>Detailed Itinerary</h2>
          <div id="detailed-itinerary" class="fade-box">
            <div class="fade-content">
              <!-- Day 1 - Day 10 content omitted for brevity -->

              <p><strong>Day 1: Kathmandu to Melamchi Ghyang via Timbu</strong><br>Your journey begins with a scenic drive from Kathmandu ...</p>
              <!-- Continue with all days' detailed paragraphs -->

              <p><strong>Day 10: Drive from Melamchi Pul Bazaar to Kathmandu</strong><br> After breakfast, begin your return drive to Kathmandu. ...</p>

              <p><strong>END OF THE TREK!!</strong></p>

              <strong>MORE INFORMATIONS</strong>
              <br><br>
              <table style="width: 100%; border-collapse: collapse; background: white;">
                <thead style="background-color: #2e8b57; color: white;">
                  <tr>
                    <th style="padding: 12px; border: 1px solid #ccc;">Route</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">Access Method</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">Approximate Cost</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">Parking Availability</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Kathmandu to Tarkeghyang (via Melamchi)</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Local bus or jeep from Kathmandu to Melamchi, then jeep to Tarkeghyang</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 500–700 (bus + shared jeep)</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Yes, small open area in Tarkeghyang for cars and jeeps</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Private Taxi or Jeep</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Direct hire from Kathmandu to Tarkeghyang</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 8000–12,000 (one way)</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Yes, limited but safe parking near the monastery or lodges</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Trek Start Point (Tarkeghyang)</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Begin hike to Ama Yangri from here</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Free trekking route starts in village</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Yes, overnight parking possible with lodge owner's permission</td>
                  </tr>
                </tbody>
              </table>

              <p style="margin-top: 1.5rem; font-size: 17px; line-height: 1.7;">
                <strong>Note:</strong> The final stretch of road from Melamchi to Tarkeghyang is rough and best done by 4WD jeep. Public buses usually do not go all the way to Tarkeghyang, especially during the rainy season. It’s recommended to check local travel conditions in advance. Parking is available but limited, so early arrival is advised.
              </p>

              <div class="hidden-culture" style="margin-top: 3rem; padding: 2rem; background-color: #fef6f0; border-radius: 10px;">
                <h2 style="color: #2c3e50; text-align: center; margin-bottom: 1rem;">Hidden Traditions & Interesting Facts of Annapurna Base Camp</h2>
                <ul style="font-size: 18px; line-height: 1.8; padding-left: 1.5rem;">
                  <li><strong>No Shoes on the Summit:</strong> At the summit stupa, visitors are traditionally expected to remove their shoes as a sign of respect...</li>
                  <li><strong>360° Spiritual Views:</strong> Locals believe that on clear days, when Ama Yangri reveals the Himalayas from all sides ...</li>
                  <li><strong>Prayer Flag Rituals:</strong> Pilgrims and monks frequently hike to the summit to tie new prayer flags...</li>
                  <li><strong>Annual Local Pilgrimage:</strong> Every year, Tamang and Sherpa communities organize local pujas ...</li>
                  <li><strong>Ancient Energy Spot:</strong> Monks from nearby monasteries claim that Ama Yangri’s peak holds a special energy...</li>
                  <li><strong>Storm Belief:</strong> Villagers believe that if someone behaves disrespectfully on the trail or summit, storms will form quickly...</li>
                </ul>
              </div>
            </div>
            <div class="fade-overlay"></div>
          </div>
          <button id="see-more-btn" class="see-more-button">See More</button>
        </div>
      </div>
    </div>

    <!-- Map and Scroll button omitted for brevity -->

  </main>

  <!-- Footer omitted -->

  <script>
    // Image Slider
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
      });
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % totalSlides;
      showSlide(currentSlide);
    }

    setInterval(nextSlide, 3000);

    // See More button: login redirect + toggle content
    const seeMoreBtn = document.getElementById('see-more-btn');
    const fadeBox = document.getElementById('detailed-itinerary');
    const wrapper = document.getElementById('itinerary-wrapper');

    seeMoreBtn.addEventListener('click', () => {
      const isLoggedIn = @json(Auth::check());

      if (!isLoggedIn) {
        const intendedUrl = encodeURIComponent('/shivapuri/payment');
        window.location.href = "/login?redirect=" + intendedUrl;
        return;
      }

      // Toggle expanded class if logged in
      fadeBox.classList.toggle('expanded');
      wrapper.classList.toggle('fullscreen');

      seeMoreBtn.textContent = fadeBox.classList.contains('expanded') ? 'See Less' : 'See More';
    });

    // Scroll to top button script omitted for brevity

  </script>

</body>
</html>
