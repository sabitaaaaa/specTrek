<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Shivapuri</title>
  <link rel="icon" href="{{ asset('images/logo.jpg') }}">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      line-height: 1.5;
    }
    .navbar {
    background-color: #027478;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 50px;
    height: 90px;
    position: relative;
    z-index: 1000;
    border-bottom: 2px solid #ddd; /* horizontal line */
}

    .navbar-brand img {
      height: 120px;
      margin-top: 15px;
    }

    .nav-links {
      display: flex;
      list-style: none;
      gap: 20px;
    }

    .nav-links a {
      text-decoration: none;
      color: white;
      font-size: 18px;
      font-weight: 500;
      padding: 6px 10px;
    }

    .nav-links a.btn {
      background: none;
      border-radius: 0;
      padding: 6px 10px;
      color: white;
    }

    header {
      padding-top: 14px;
      text-align: center;
    }

    h1 {
      color: #010102;
      font-size: 3rem;
      margin-bottom: 0;
      line-height: 1.1;
    }

    .subtitle {
      font-size: 1.25rem;
      color: #010102;
      margin-top: 0.2rem;
      font-weight: 500;
    }

    main {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 0 1rem;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      justify-content: center;
    }

    .col-lg-7 {
      flex: 0 0 60%;
    }

    .col-lg-4 {
      flex: 0 0 35%;
    }

    .itinerary {
      margin-top: 1.5rem;
      padding: 1rem 2rem;
      background-color: #e7e9eb;
      border-radius: 0.5rem;
      text-align: center;
      color: #2c3e50;
      font-size: 21px;
    }

    .border-box {
      border-left: 5px solid #2c3e50;
      border-right: 5px solid #2c3e50;
      padding: 2rem 1.5rem;
      background-color: #f8f9fa;
      border-radius: 0.5rem;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .best-time {
      background-color: #f4f4f4;
      padding: 1rem;
      border-radius: 0.5rem;
      margin-top: 1rem;
    }

    ul {
      padding-left: 1.2rem;
      text-align: left;
    }

    .slider {
      position: relative;
      width: 100%;
      height: auto;
      overflow: hidden;
    }

    .slide {
      display: none;
      width: 100%;
      height: 400px;
      object-fit: cover;
      border-radius: 8px;
    }

    .slide.active {
      display: block;
    }

.itinerary-section {
  margin-top: 2rem;
  background-color: #ffffff;
  padding: 2rem;
  border-radius: 0.5rem;
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
}

.col-lg-6 {
  flex: 0 0 48%;
}

    .itinerary-section h2 {
      color: #2c3e50;
      margin-bottom: 1rem;
    }

    .itinerary-section ul li {
      margin-bottom: 0.5rem;
    }

.fade-box {
  position: relative;
  max-height: 370px;
  overflow: hidden;
  transition: max-height 0.4s ease-in-out;
  padding-right: 10px;
}

.fade-content p {
  margin-bottom: 1rem;
  line-height: 1.7; /* more vertical space between lines */
}

.extra-content {
  opacity: 0;
  height: 0;
  overflow: hidden;
  transition: opacity 0.6s ease, height 0.6s ease;
  padding-top: 1rem;
}


.extra-content {
  opacity: 0;
  height: 0;
  overflow: hidden;
  transition: opacity 0.6s ease, height 0.6s ease;
}

.fade-box.expanded {
  max-height: 2000px;
}

.fade-box.expanded .extra-content {
  opacity: 1;
  height: auto;
}

.fade-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 80px;
  background: linear-gradient(to top, white, transparent);
  pointer-events: none;
  transition: opacity 0.4s ease;
}

.fade-box.expanded .fade-overlay {
  opacity: 0;
}

.see-more-button {
  margin-top: 10px;
  background-color: #027478;
  color: white;
  padding: 8px 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.see-more-button:hover {
  background-color: #035e61;
}

.itinerary-wrapper.fullscreen .itinerary-section {
  flex-direction: column;
  align-items: center;
  gap: 2rem;
  max-width: 100%;
  padding: 2rem 5%;
}

.itinerary-wrapper.fullscreen .day-itinerary {
  display: none;
}

.itinerary-wrapper.fullscreen .detailed-itinerary-box {
  width: 100%;
}

.itinerary-wrapper.fullscreen .fade-box {
  max-height: none;
  background-color: #fafafa;
  padding: 2rem;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
  border-radius: 10px;
}

/* ----------------------- map ----------------------- */


.nonInteractiveMap{
    margin-top: 50px;
}
.nonInteractiveMap h1{
    text-align: center;
    color:rgb(23, 30, 38);
    font-size: 31px;
    margin-bottom: 50px;
 }
 .nonInteractiveMap img{
    height:500px;
    width:600px;
    margin-left:270px;
    box-shadow: 0 0 20px rgba(2, 2, 2, 0.5);
    border-radius: 30px;
 }
 .nonInteractiveMap img:hover{
    box-shadow: 0 8px 200px rgba(0, 0, 0, 0.4); /* deeper hover shadow */
    border-radius: 25px;
    transform: scale(1.02); /* slight zoom effect */
}

/* -------------------------- footer ------------------------- */

.footer {
      background-color: #027478;
      color: white;
      text-align: center;
      padding: 1rem 0;
      margin-top: 3rem;
    }

    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
    }

        /* ------------------------ scrollbtn ----------------------- */

    #scrollTopBtn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 999;
  font-size: 22px;
  background-color: #027478;
  color: white;
  border: none;
  outline: none;
  padding: 12px 16px;
  border-radius: 50%;
  cursor: pointer;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
  display: none;
  transition: background-color 0.3s, transform 0.3s;
}

#scrollTopBtn:hover {
  background-color: #035e61;
  transform: scale(1.1);
}

  </style>
</head>
<body>

  <nav class="navbar">
    <a href="#" class="navbar-brand">
      <img src="{{ asset('images/logo.jpg') }}" alt="Logo" />
    </a>
    <ul class="nav-links">
      <li><a href="#">Emergency</a></li>
      <li><a href="#">Tour</a></li>
      <li><a href="#">User</a></li>
      <li><a href="#" class="btn">Login</a></li>
      <li><a href="#" class="btn">Signup</a></li>
    </ul>
  </nav>

  <header>
    <h1>Shivapuri</h1>
    <p class="subtitle">Explore the serene beauty of the Himalayan foothills</p>
  </header>

  <main>
    <div class="row">
      <div class="col-lg-7">

{{------------------------------------------- images -------------------------------------------}}

        <div class="slider">
            <img class="slide active" src="{{ asset('images/s1.jpg') }}" alt="Shivapuri Trek 1" />
            <img class="slide" src="{{ asset('images/s2.jpg') }}" alt="Shivapuri Trek 2" />
            <img class="slide" src="{{ asset('images/s3.jpg') }}" alt="Shivapuri Trek 3" />
            <img class="slide" src="{{ asset('images/s4.jpg') }}" alt="Shivapuri Trek 4" />
            <img class="slide" src="{{ asset('images/s5.jpg') }}" alt="Shivapuri Trek 5" />
          </div>

        <section class="itinerary">
          <h4 >“Where the city fades, Shivapuri’s forest awakens the soul.”</h4>
        </section>
      </div>

      <div class="col-lg-4">
        <div class="border-box">
          <div>
            <h2 style="color: #2c3e50;">Hidden Gems</h2>
            <ul>
              <li>Baghdwar Healing Springs</li>
              <li>Nagi Monastery Meditation Spot</li>
              <li>Hidden Cave of the Forest Hermit </li>
              <li>Local Herb Gardens</li>
              <li>Mossy Log Bridge </li>
              <li>Ancient Mani Wall Ruins</li>
            </ul>
          </div>
          <div class="best-time">
            <h3 style="color: #2c3e50;">Best Time to Visit</h3>
                <p>
                    The best time to visit Shivapuri is in spring (March to May) and autumn (September to November) when the weather is mild and trails are clear. Avoid the monsoon (June to August) due to heavy rain and slippery paths. Winter (December to February) is cold but peaceful with occasional snow at higher spots.
                </p>
          </div>
        </div>
      </div>
    </div>

  <div id="itinerary-wrapper" class="itinerary-wrapper">
    <div class="row itinerary-section">
      <div class="col-lg-6 day-itinerary">

        {{------------------------------------------- Day-to-Day Itinerary -------------------------------------------}}

        <h2>Day-to-Day Itinerary</h2>
        <ul>
            <li>Day 1: Kathmandu to Budhanilkantha, trek to Baghdwar, overnight near park entrance.</li>
            <li>Day 2: Trek from Baghdwar to Nagi Monastery through forest, stay overnight.</li>
            <li>Day 3: Early hike to Shivapuri Peak for sunrise, descend back to Nagi, rest.</li>
            <li>Day 4: Explore nearby trails, waterfalls, Jhule Clearing, overnight near Nagi.</li>
            <li>Day 5: Trek back toward Baghdwar, visit Mani Wall and Tiger’s Footprint, stay near Baghdwar/Sundarijal.</li>
            <li>Day 6: Trek Baghdwar to Sundarijal, return to Kathmandu, rest or explore city.</li>
          </ul>

      </div>

      <div class="col-lg-6 detailed-itinerary-box">
        <h2>Detailed Itinerary</h2>
        <div id="detailed-itinerary" class="fade-box">
        <div class="fade-content">
                <p><strong>Day 1: Arrive in Kathmandu and Prepare for the Trek</strong><br>Arrive in Kathmandu and head to your hotel, preferably in the Thamel area, which is famous for its backpacker friendly vibe, gear shops, and local eateries. Take some time to settle in and rest after your journey. Use the day to double-check all your trekking gear—backpack, boots, water bottles, clothes, sleeping bag (if camping), and permits for Shivapuri Nagarjun National Park. If anything is missing, you can easily rent or buy it nearby. Once your gear is sorted, explore the local markets, try traditional Nepali food like momo or dal bhat, or simply relax at a rooftop café with views of the city.
                </p>
                <p><strong>Day 2: Drive to Budhanilkantha and Start Trekking into Shivapuri National Park</strong><br> Begin your day with a short 30-minute drive or taxi ride from Kathmandu to Budhanilkantha, home to a sacred reclining Vishnu statue. From there, enter Shivapuri Nagarjun National Park through the Pani Muhan gate. As you begin your trek, you'll walk through beautiful forests filled with pine and rhododendron trees, cross wooden bridges over small streams, and might even spot some monkeys or birds. Depending on your pace, you can either camp near the park entrance or continue deeper into the forest to find a guesthouse or campsite for the night. This day is great for easing into the hike while enjoying the peaceful natural environment.
                </p>
                <p><strong>Day 3: Trek to Bagdwar and Shivapuri Peak</strong><br>Today is a more challenging uphill trek through dense, mossy forests and narrow trails. Along the way, you'll pass the serene Buddhist Nagi Gumba monastery, a quiet spot often visited by nuns and meditators. Continuing upward, you’ll reach Bagdwar, the sacred source of the Bagmati River, where you can stop for lunch and rest. After a break, make the final push to Shivapuri Peak (2,732 meters), the highest point in the park. From here, soak in stunning panoramic views of the Kathmandu Valley below and Himalayan ranges like Langtang and Ganesh Himal in the distance. Descend back to Bagdwar or camp nearby for the night surrounded by nature.
                </p>
                <div class="extra-content">
                <p><strong>Day 4: Explore Alternate Trails or Begin Descent</strong><br>You have two options today. If you're up for more adventure, explore alternate trails such as the route toward Sundarijal Waterfall, passing through more forested paths, waterfalls, and traditional villages. Or you can hike toward Nagarkot, known for its sunrise views and mountain vistas. Both routes offer chances to spot local flora, birds, and wildlife. If you prefer a shorter day, begin your descent back toward Budhanilkantha, retracing your steps through the forest. Once back near the city outskirts, catch a ride back to Kathmandu. In the evening, rest at your hotel or enjoy a relaxing dinner at a traditional Nepali restaurant.
                </p>
                <p><strong>Day 5: Cultural Exploration in Kathmandu or Light Hike</strong><br>Use this day to explore Kathmandu’s rich cultural heritage. Visit iconic sites such as Swayambhunath Stupa (Monkey Temple) for spiritual vibes and panoramic views, the sacred Pashupatinath Temple, or the historic Durbar Square. Alternatively, if you still have energy for a short hike, head toward the Shivapuri View Tower or revisit Sundarijal for its forest trails and waterfalls. This is a great day to balance relaxation and exploration while soaking in the city's spiritual and cultural atmosphere.
                </p>
                <p><strong>Day 6: Rest, Extend Your Trek, or Prepare to Depart</strong> <br>On your final day, you can either rest and prepare for your onward journey or extend your adventure. If you're still feeling adventurous, consider combining your Shivapuri trek with nearby trails like the Nagarjun Forest or even hiking toward Chisapani, a quiet village with stunning views of the mountains and peaceful landscapes. If not, spend your last few hours in Kathmandu shopping for souvenirs, enjoying local food, or simply relaxing before heading home or continuing your travels.
                </p>
            </div>
            <strong>MORE INFORMATIONS</strong>
            <br>
            <br>

            {{------------------------------------------- Table -------------------------------------------}}

            <table style="width: 100%; border-collapse: collapse; background: white;">
                <thead style="background-color: #027478; color: white;">
                  <tr>
                    <th style="padding: 12px; border: 1px solid #ccc;">Entry Point</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">Access Method</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">Cost (Approx)</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">Parking Availability</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Budhanilkantha Gate</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Local bus to Budhanilkantha or private vehicle</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 30 (bus), NPR 700–1000 (taxi)</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Yes near the temple area, basic open parking</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Nagi Gompa Trail</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Hike from Budhanilkantha or motorbike</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Included in Budhanilkantha access</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Limited park below monastery trail</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Sundarijal Gate</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Local bus to Sundarijal or private hire</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 50–80 (bus), NPR 1000–1500 (taxi)</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Yes official parking space near entrance gate</td>
                  </tr>
                </tbody>
              </table>
              <p style="margin-top: 1.5rem; font-size: 17px; line-height: 1.7;">
                <strong>Note:</strong> Shivapuri National Park is easily accessible from Kathmandu and offers multiple entry points. Public buses go as far as Budhanilkantha or Sundarijal. Taxis and private vehicles can be used for flexible timing. All entry gates require a valid entry ticket. Parking is available near most gates, but overnight parking is not recommended unless staying at a guesthouse nearby.
              </p>
              <div class="hidden-culture" style="margin-top: 3rem; padding: 2rem; background-color: #fef6f0; border-radius: 10px;">
                <h2 style="color: #2c3e50; text-align: center; margin-bottom: 1rem;">Hidden Traditions & Interesting Facts of Shivapuri</h2>

                <ul style="font-size: 18px; line-height: 1.8; padding-left: 1.5rem;">
                  <li><strong>Shivapuri Baba:</strong> The park is named after the Indian yogi Shivapuri Baba, who meditated in the area for decades and lived to be over 130 years old. His hut still exists inside the park and is a pilgrimage spot for spiritual seekers.</li>

                  <li><strong>Monastic Life at Nagi Gompa:</strong> Nagi Gompa is a Buddhist nunnery located on the slope of Shivapuri Hill. Over 100 nuns live and study there. Visitors are welcome to observe prayers and enjoy panoramic views of the Kathmandu Valley.</li>

                  <li><strong>Water Source for Kathmandu:</strong> Shivapuri is home to the headwaters of the Bagmati and Bishnumati rivers, making it one of the main water catchment areas that supplies clean drinking water to the valley.</li>

                  <li><strong>Silent Forest Tradition:</strong> Locals and monks consider the upper regions of Shivapuri to be spiritually sacred. Silence is encouraged beyond certain points especially near the meditation caves and springs.</li>

                  <li><strong>Hidden Caves & Meditation Sites:</strong> There are ancient stone meditation caves scattered along lesser known paths. Many of them are unmarked and are still used by monks and ascetics today.</li>

                  <li><strong>Floral Offerings:</strong> On Shivaratri and other Hindu festivals, devotees offer flowers and incense inside the forest to honor Lord Shiva, believed to reside on the peak of Shivapuri Hill.</li>

                  <li><strong>No Loud Music Rule:</strong> Unofficial but culturally followed guides and locals often discourage playing loud music or shouting inside the core trekking zones to preserve the area's peaceful spiritual atmosphere.</li>
                </ul>
              </div>

        </div>
          <div class="fade-overlay"></div>
        </div>
        <button id="see-more-btn" class="see-more-button">See More</button>
      </div>
    </div>
  </div>

  <div class="nonInteractiveMap">
    <h1> "Here is a Normal map for Shivapuri" </h1>
    <img src="{{ asset('images/smap.jpg') }}">
    <button onclick="scrollToTop()" id="scrollTopBtn" title="Go to top">&#8679;</button>
    <footer class="footer">
      <div class="footer-container">
        <p>&copy; 2025 Shivapuri Trek. All rights reserved.</p>
        <p>Developed by SpecTrek Team</p>
      </div>
    </footer>
  </main>

  <script>
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

    setInterval(nextSlide, 3000); // change image every 3 seconds
  </script>

<script>
    const seeMoreBtn = document.getElementById('see-more-btn');
    const fadeBox = document.getElementById('detailed-itinerary');
    const wrapper = document.getElementById('itinerary-wrapper');

    seeMoreBtn.addEventListener('click', () => {
      fadeBox.classList.toggle('expanded');
      wrapper.classList.toggle('fullscreen');

      if (fadeBox.classList.contains('expanded')) {
        seeMoreBtn.textContent = 'See Less';
      } else {
        seeMoreBtn.textContent = 'See More';
      }
    });
    const scrollBtn = document.getElementById("scrollTopBtn");

    // Show button after scrolling 300px

  window.onscroll = function () {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
      scrollBtn.style.display = "block";
    } else {
      scrollBtn.style.display = "none";
    }
  };

  // Scroll to top

  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  }
  </script>
</body>
</html>

