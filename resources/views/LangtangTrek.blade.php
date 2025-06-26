<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Langtang</title>
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
    <h1>Langtang</h1>
    <p class="subtitle">Explore the serene beauty of the Himalayan foothills</p>
  </header>

  <main>
    <div class="row">
      <div class="col-lg-7">
{{------------------------------------------- images -------------------------------------------}}
        <div class="slider">
            <img class="slide active" src="{{ asset('images/l1.jpg') }}" alt="Langtang Trek 1" />
            <img class="slide" src="{{ asset('images/l2.jpg') }}" alt="Langtang Trek 2" />
            <img class="slide" src="{{ asset('images/l3.jpg') }}" alt="Langtang Trek 3" />
            <img class="slide" src="{{ asset('images/l4.jpg') }}" alt="Langtang Trek 4" />
            <img class="slide" src="{{ asset('images/l5.jpg') }}" alt="Langtang Trek 5" />
          </div>

        <section class="itinerary">
          <h4 >“The trails of Langtang don’t just lead to peaks, they lead to peace.”</h4>
        </section>
      </div>

      <div class="col-lg-4">
        <div class="border-box">
          <div>
            <h2 style="color: #2c3e50;">Hidden Gems</h2>
            <ul>
              <li>Red Panda Habitat Zone (near Rimche)</li>
              <li>Rock with 'Self-Appeared' Footprint (Tamang belief)</li>
              <li> The Whispering Cliff (“Chhuchhuk Phyang”)</li>
              <li>The Hidden Glacier Cave near Langtang Lirung Base</li>
              <li>Abandoned Meditation Caves in the Bamboo Forests</li>
            </ul>
          </div>
          <div class="best-time">
            <h3 style="color: #2c3e50;">Best Time to Visit</h3>
                <p>
                  The best time to visit Langtang is in spring (March to May) and autumn (September to November), when the weather is clear and pleasant. Avoid the monsoon season (June to August) due to rain and landslides. Winter (December to February) is cold but peaceful with snowy views.
                </p>
          </div>
        </div>
      </div>
    </div>
{{------------------------------------------- Day-to-Day Itinerary -------------------------------------------}}

  <div id="itinerary-wrapper" class="itinerary-wrapper">
    <div class="row itinerary-section">
      <div class="col-lg-6 day-itinerary">
        <h2>Day-to-Day Itinerary</h2>
        <ul>
        <li>Day 1: Drive from Kathmandu to Syabrubesi (7–8 hours)</li>
  <li>Day 2: Trek from Syabrubesi to Lama Hotel (6–7 hours)</li>
  <li>Day 3: Trek from Lama Hotel to Langtang Village (5–6 hours)</li>
  <li>Day 4: Trek from Langtang Village to Kyanjin Gompa (3–4 hours)</li>
  <li>Day 5: Acclimatization day explore Kyanjin Gompa or hike to Kyanjin Ri</li>
  <li>Day 6: Optional hike to Tserko Ri (early morning) </li>
  <li>Day 7: Trek back from Kyanjin Gompa to Lama Hotel (6–7 hours)</li>
  <li>Day 8: Trek from Lama Hotel to Syabrubesi (5–6 hours)</li>
  <li>Day 9: Drive back from Syabrubesi to Kathmandu</li>
  <li>Day 10: Rest or buffer day in Kathmandu</li>
          </ul>
      </div>

      <div class="col-lg-6 detailed-itinerary-box">
        <h2>Detailed Itinerary</h2>
        <div id="detailed-itinerary" class="fade-box">

        <div class="fade-content">
                <p><strong>Day 1: Kathmandu to Syabrubesi (1,460m)</strong> <br> Your journey begins with a scenic drive from Kathmandu to Syabrubesi, which takes around 7 to 9 hours depending on road conditions.
                    The road winds through lush hills, picturesque terraced fields, and charming rural villages.
                    As you leave the city behind, the landscapes become more dramatic with distant views of the Ganesh Himal and Manaslu ranges on clear days.
                     The final stretch of the drive, especially after Dhunche, can be bumpy and winding, so it’s wise to carry motion sickness medication.
                     Syabrubesi, a small village on the banks of the Bhote Koshi River, serves as the gateway to the Langtang region and is surrounded by forested hills.
                </p>
                <p><strong>Day 2: Syabrubesi to Lama Hotel (2,470m)</strong> <br>The trek begins with a steady walk through dense oak, pine, and bamboo forests.
                     You’ll cross several suspension bridges over the Langtang River and gradually gain altitude.
                     Along the way, you may encounter playful langur monkeys and hear the calls of Himalayan birds.
                     The trail alternates between gentle ascents and short, steep climbs, passing through small settlements like Domen and Riverside.
                    After trekking for about 5 to 6 hours, you’ll reach Lama Hotel, a quiet hamlet nestled deep in the forested mountainside.
                </p>
                <p><strong>Day 3: Lama Hotel to Langtang Village (3,430m)</strong><br> Today’s trek continues along the Langtang River with a noticeable gain in altitude.
                    The trail ascends steadily through beautiful forests and opens up to alpine meadows with views of snow-covered peaks. As you approach Ghodatabela,
                    you’ll begin to see the massive Langtang Lirung (7,227m) towering above the valley. From there, the path takes you through yak pastures and traditional Tamang villages.
                    After about 6 to 7 hours of trekking, you’ll arrive at Langtang Village,
                     which was rebuilt after the 2015 earthquake and now offers a mix of modern guesthouses and authentic cultural experiences.
                </p>
                <p><strong>Day 4: Acclimatization Day in Langtang Village </strong><br> This day is reserved for rest and acclimatization.
                     Take it easy to help your body adjust to the higher altitude. You can explore the village, visit the local monastery, or take a short hike to nearby viewpoints or yak pastures.
                    The slower pace allows you to connect with the local Tamang culture and enjoy panoramic views of the Langtang Valley, framed by towering peaks and prayer flags fluttering in the wind.
                </p>
                <p><strong>Day 5: Langtang Village to Kyanjin Gompa (3,870m)</strong><br> The trek to Kyanjin Gompa is shorter but scenic, taking about 4 to 5 hours through wide alpine meadows and glacial streams.
                     The landscape changes as you move above the tree line, with sweeping views of Langtang Lirung and other surrounding peaks. Upon arrival, you’ll find a picturesque village with a Buddhist monastery, traditional stone houses, and a famous yak cheese factory.
                     Spend the afternoon exploring or relaxing in this high mountain setting.
                </p>
            <div class="extra-content">

                <p><strong>Day 6: Hike to Kyanjin Ri (4,773m) or Tserko Ri (4,984m)</strong><br>Wake up early for a sunrise hike to either Kyanjin Ri or the more challenging Tserko Ri. These viewpoints offer some of the best panoramic views of the Langtang range, including Langtang Lirung, Dorje Lakpa, and even Shishapangma in Tibet on very clear days. The climb is steep and challenging, especially due to the thin air, but the 360° views from the top are a rewarding highlight of the trek. Return to Kyanjin Gompa by late morning and rest for the remainder of the day.
                </p>
                <p><strong>Day 7: Kyanjin Gompa to Lama Hotel</strong><br> Begin your descent as you retrace your steps back down the valley. The return journey takes around 6 to 7 hours and is mostly downhill, making it easier on the lungs but more taxing on the knees. You’ll pass familiar villages and forests, and with less urgency, you can enjoy the peaceful mountain atmosphere and maybe spot more wildlife along the way. Spend the night again in the forested quiet of Lama Hotel.
                </p>
                <p><strong>Day 8: Lama Hotel to Syabrubesi</strong><br> On your last day of trekking, descend further through the forests and alongside the river as you make your way back to Syabrubesi. The walk takes about 5 to 6 hours and allows for some final moments to soak in the beauty of the Langtang Valley. Celebrate the end of your trek with a warm meal and perhaps a hot shower, now that you’re back in civilization.
                </p>
                <p><strong>Day 9: Syabrubesi to Kathmandu</strong> <br>After breakfast, begin the long but scenic drive back to Kathmandu. This is a good time to relax, enjoy the views from the window, and reflect on the amazing journey you’ve just completed. Once in the city, check into your hotel and rest or go for a short walk in the lively streets of Thamel.
                </p>
                <p><strong>Day 10: Explore Kathmandu</strong><br> Use this final day to rest and recover from the trek. If you have energy, consider exploring some of Kathmandu’s cultural gems like Swayambhunath (Monkey Temple), Boudhanath Stupa, or the ancient city of Bhaktapur. It’s also a great day for souvenir shopping or enjoying a traditional Nepali meal before your onward journey.
                </p>
            </div>
            <strong>MORE INFORMATIONS</strong>
            <br>
            <br>
{{------------------------------------------- Table -------------------------------------------}}
<table style="width: 100%; border-collapse: collapse; background: white;">
                <thead style="background-color: #027478; color: white;">
                  <tr>
                    <th style="padding: 12px; border: 1px solid #ccc;">Option</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">Cost (Approx)</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">Duration</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">Comfort</th>
                    <th style="padding: 12px; border: 1px solid #ccc;">Details</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Local Bus</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 800–1,100</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">7–9 hours</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Basic</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Departs from Machhapokhari, crowded and slow but cheap</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Shared Jeep</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 2,000–3,000</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">5–6 hours</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Moderate</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Faster than bus, 7–8 seats, leaves when full</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Private Jeep</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 20,000–30,000</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">5 hours</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">High</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Flexible, hotel pickup, comfortable and scenic</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Helicopter</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Group Price (Expensive)</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">1 hour</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Luxury</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Lands at Kyanjin Gompa, fastest and scenic option</td>
                  </tr>
                </tbody>
              </table>
              <p style="margin-top: 1.5rem; font-size: 17px; line-height: 1.7;">
                <strong>Note:</strong> All road options require travel to Syabrubesi, the starting point of the Langtang trek. There is no direct road or flight to Langtang Village itself. You must walk from Syabrubesi. If you have a private vehicle, parking is available at some lodges in Syabrubesi, but there is <strong>no vehicle access or parking</strong> beyond that point inside the Langtang Valley.
              </p>
              <div class="hidden-culture" style="margin-top: 3rem; padding: 2rem; background-color: #fef6f0; border-radius: 10px;">
                <h2 style="color: #2c3e50; text-align: center; margin-bottom: 1rem;">Hidden Traditions & Interesting Facts of Langtang</h2>

                <ul style="font-size: 18px; line-height: 1.8; padding-left: 1.5rem;">
                  <li><strong>Tamang Shamanism:</strong> The Tamang people practice a mix of Tibetan Buddhism and ancient animist rituals. Traditional healers called "Bonpo" or "Jhankri" perform ceremonies using chants, incense, and rhythmic drum beats.</li>

                  <li><strong>Whispering Cliff Legend:</strong> Locals believe that a specific rock face near Langtang Lirung echoes with whispers if you listen closely believed to be voices of lost souls or spirits of the mountains.</li>

                  <li><strong>Self Appeared Footprint Rock:</strong> In a remote part of the trail, there is a sacred rock believed to have the footprint of a Buddhist saint that naturally appeared. It is considered a site of spiritual power by Tamang pilgrims.</li>

                  <li><strong>No Slaughter in Kyanjin:</strong> In Kyanjin Gompa, it's traditionally forbidden to kill any animal. Locals believe it disturbs the spiritual peace of the valley, especially around sacred places.</li>

                  <li><strong>Cheese with Blessings:</strong> The yak cheese made at Kyanjin is blessed by monks before distribution. Many locals believe it brings good health and energy for high-altitude trekking.</li>

                  <li><strong>Post-Earthquake Rebirth:</strong> After the devastating 2015 earthquake, Langtang Village was rebuilt not only physically but spiritually with memorial walls, prayer flags, and stupas dedicated to those lost in the avalanche.</li>

                  <li><strong>Hidden Glacier Cave:</strong> Near the Langtang Lirung base, there are rarely explored glacier caves. Some guides may take you if weather allows, but locals say the caves change shape each year as the glacier shifts.</li>
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
    <h1> "Here is a Normal map for Langtang" </h1>
    <img src="{{ asset('images/lmap.jpg') }}">
    <button onclick="scrollToTop()" id="scrollTopBtn" title="Go to top">&#8679;</button>

    <footer class="footer">
      <div class="footer-container">
        <p>&copy; 2025 Langtang Trek. All rights reserved.</p>
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
