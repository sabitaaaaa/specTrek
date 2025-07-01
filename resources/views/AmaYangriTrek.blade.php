<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AmaYangri</title>
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

/* --------to fit the contents in itienary--------------- */
/* .row {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  justify-content: center;
} */

.col-lg-6 {
  flex: 0 0 45%; /* 45% + 45% + 2rem gap fits nicely */
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
    <h1>AmaYangri</h1>
    <p class="subtitle">Explore the serene beauty of the Himalayan foothills</p>
  </header>

  <main>
    <div class="row">
      <div class="col-lg-7">

{{------------------------------------------- images -------------------------------------------}}

        <div class="slider">
            <img class="slide active" src="{{ asset('images/a1.jpg') }}" alt="AmaYangri Trek 1" />
            <img class="slide" src="{{ asset('images/a2.jpg') }}" alt="AmaYangri Trek 2" />
            <img class="slide" src="{{ asset('images/a3.jpg') }}" alt="AmaYangri Trek 3" />
            <img class="slide" src="{{ asset('images/a4.jpg') }}" alt="AmaYangri Trek 4" />
            <img class="slide" src="{{ asset('images/a5.jpg') }}" alt="AmaYangri Trek 5" />
          </div>

        <section class="itinerary">
          <h4 >"Crowned in clouds and wrapped in prayer, Ama Yangri rises not just as a peak  but as a mother watching over her children, quiet, strong, eternal." </h4>
        </section>
      </div>

      <div class="col-lg-4">
        <div class="border-box">
          <div>
            <h2 style="color: #2c3e50;">Hidden Gems</h2>
            <ul>
              <li>Secret Cave for Hermits</li>
              <li>Blue Sheep &amp; Himalayan Monals</li>
              <li>Spiritual Energy and Meditation Spot</li>
              <li>Yulsung Festival</li>
              <li>Local Belief: Ama Yangri is a Goddess</li>
            </ul>
          </div>
          <div class="best-time">
            <h3 style="color: #2c3e50;">Best Time to Visit</h3>
            <p>
                Spring (March to May) and Autumn (October to November) are the best times to visit, with clear skies and excellent mountain views. The weather is pleasant, and the trails are dry, making it ideal for hiking and sightseeing. Try to avoid the monsoon season (June to August), as rain can make the paths slippery and the views less visible due to clouds and mist.
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
      </div>

      <div class="col-lg-6 detailed-itinerary-box">
        <h2>Detailed Itinerary</h2>
        <div id="detailed-itinerary" class="fade-box">
        <div class="fade-content">
                <p><strong>Day 1: Kathmandu to Melamchi Ghyang via Timbu</strong><br>Your journey begins with a scenic drive from Kathmandu, situated at an elevation of 1,400 meters, heading northeast through the lush hills of the Sindhupalchok District. The road winds past traditional villages, cascading rivers, and terraced farmlands. After approximately 5 to 6 hours of driving, you will reach Timbu, a small village that serves as a gateway to the Helambu region. From Timbu, you either continue the short drive or take a light uphill walk to reach Melamchi Ghyang at 2,530 meters. This peaceful Sherpa village is surrounded by dense forests and features traditional stone houses, Buddhist prayer wheels, and a serene environment. It’s a perfect place to begin your acclimatization and get a feel for mountain village life. You will spend the night in a locally run teahouse.
                </p>
                <p><strong>Day 2: Trek from Melamchi Ghyang to Tarkeghyang</strong><br>Today’s trek leads you deeper into the Helambu region. The trail passes through thick forests filled with pine, oak, and rhododendron trees. Along the way, you will encounter traditional Buddhist symbols such as prayer flags, mani walls, and stone chortens. These elements reflect the deep spiritual culture of the local Sherpa and Tamang communities. As you ascend gradually, the views of the hills and valleys become more expansive. After about 4 to 5 hours of walking, you arrive in Tarkeghyang, a charming village at an elevation of 2,600 meters, known for its historic monastery and warm hospitality. The village has a peaceful atmosphere, with narrow stone-paved paths and colorful homes. You will spend the night in a local teahouse.
                </p>
                <p><strong>Day 3: Trek from Tarkeghyang to Yangri Village</strong><br>The trail today becomes quieter and more remote as you leave the main route and head toward the hidden gem of Yangri Village. You’ll walk through dense forests filled with chirping birds, moss-covered rocks, and an occasional clearing that offers glimpses of distant snow-capped peaks. The peacefulness of the trail is one of its highlights. You will pass small hamlets and grazing areas used by local herders. The final stretch to Yangri is a gentle uphill walk that takes you to this secluded village, located at approximately 2,800 meters. Yangri is rarely visited by trekkers, making it an ideal spot to enjoy authentic local culture and unspoiled natural surroundings. Overnight stay will be in a basic lodge or homestay.
                </p>
                <p><strong>Day 4: Rest Day and Exploration in Yangri Village</strong><br>Today is a rest day in Yangri Village, giving your body time to acclimatize to the higher elevation. Use this day to explore the village and its surroundings. You can take a short hike to nearby viewpoints or visit local homes to learn about the Sherpa and Tamang way of life. The villagers are welcoming and proud to share their customs. You may also come across prayer flags on hilltops, small chortens, and grazing yaks. The relaxed pace of the day allows you to enjoy the fresh mountain air and connect more deeply with the landscape and community. Rest well, as the next day brings a more challenging ascent.
                </p>
                <p><strong>Day 5: Trek from Yangri Village to Ama Yangri Base Camp</strong><br>Today’s trek leads you steadily uphill toward Ama Yangri Base Camp, situated around 3,500 meters above sea level. The trail becomes steeper as you ascend through forests of fir and rhododendron. You may notice the temperature dropping and the landscape becoming more alpine in character. As you climb higher, the forest thins, and the ridgelines offer increasingly wide views of the surrounding valleys. After 5 to 6 hours of walking, you will reach Base Camp—a simple, serene area set on an open ridge. The location is remote and peaceful, perfect for resting and preparing for the final summit push the following day.
                </p>
            <div class="extra-content">
                <p><strong>Day 6: Hike to Ama Yangri Peak and Return to Base Camp</strong><br> Wake up early to begin the final ascent to Ama Yangri Peak, which stands at 3,771 meters. The trail is steep and challenging but well worth the effort. After about 2 to 3 hours of climbing, you’ll reach the summit. At the top, you’ll be rewarded with a stunning 360-degree panorama that includes the Langtang, Ganesh, and Jugal Himal ranges, as well as distant views of the Everest region on clear days. Ama Yangri is considered a sacred site by locals, and a small stupa and prayer flags mark the summit. After spending time enjoying the incredible scenery, you’ll return to Base Camp for the night, retracing your steps carefully along the ridgeline.
                </p>
                <p><strong>Day 7: Trek from Ama Yangri Base Camp back to Tarkeghyang</strong><br>Today’s journey involves descending from the high ridges back to the familiar village of Tarkeghyang. The route is the reverse of the uphill trail, but the downhill walk allows for more relaxed pacing and new perspectives on the landscape. You’ll pass through the same serene forests, listening to the rustling leaves and mountain birds. By afternoon, you’ll arrive in Tarkeghyang, where a warm Sherpa meal and a cozy teahouse welcome you back. After the demanding days at higher altitudes, this return to village life brings comfort and relaxation.
                </p>
                <p><strong>Day 8: Trek from Tarkeghyang to Sermathang</strong><br>The trail today is gentler and mostly flat or downhill. You’ll walk through forests and terraced fields as you head toward Sermathang, another beautiful Sherpa village at around 2,600 meters. Known for its fruit orchards, colorful houses, and panoramic views of the surrounding hills, Sermathang has a more open and lively feel compared to the other villages. It’s a good place to unwind and reflect on the trek so far. You may also explore the local monastery and interact with villagers who are always eager to share stories about their culture and lifestyle.
                </p>
                <p><strong>Day 9: Trek from Sermathang to Melamchi Pul Bazaar</strong><br> This is your final day of trekking. The trail descends gradually through rhododendron forests, past hillside farms, and through traditional Tamang and Sherpa settlements. As you descend, the climate becomes warmer, and the greenery thickens. After about 5 to 6 hours of walking, you arrive at Melamchi Pul Bazaar, a bustling market town located near the Melamchi River. This town marks the end of your trekking journey. You can enjoy a proper meal, a hot shower, and celebrate the completion of your trek with your fellow trekkers and guides.
                </p>
                <p><strong>Day 10: Drive from Melamchi Pul Bazaar to Kathmandu</strong><br> After breakfast, begin your return drive to Kathmandu. The road climbs out of the Melamchi Valley and re-enters the rolling hills and countryside. As you travel, take in the last views of the Himalayan foothills, rivers, and rural villages. After approximately 5 to 6 hours, you’ll arrive in Kathmandu, where you can check into your hotel and enjoy the comforts of the city. The trek concludes with fond memories of the mountains, the people you met, and the incredible natural beauty of the Helambu region.
                </p>
            </div>
            <strong>MORE INFORMATIONS</strong>
            <br>
            <br>
                        {{------------------------------------------- Table -------------------------------------------}}

            <table style="width: 100%; border-collapse: collapse; background: white;">
                <thead style="background-color: #027478; color: white;">
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
                <h2 style="color: #2c3e50; text-align: center; margin-bottom: 1rem;">Hidden Traditions & Interesting Facts of Ama Yangri</h2>

                <ul style="font-size: 18px; line-height: 1.8; padding-left: 1.5rem;">
                  <li><strong>Goddess of Protection:</strong> Ama Yangri is revered by locals as a manifestation of a protective female deity who watches over the entire Helambu region. “Ama” means mother, she is seen as a guardian spirit of the mountains.</li>

                  <li><strong>No Shoes on the Summit:</strong> At the summit stupa, visitors are traditionally expected to remove their shoes as a sign of respect. The peak is considered a sacred space, not just a viewpoint.</li>

                  <li><strong>360° Spiritual Views:</strong> Locals believe that on clear days, when Ama Yangri reveals the Himalayas from all sides including views of Langtang, Dorje Lakpa, and even Everest it is a blessing from the goddess herself.</li>

                  <li><strong>Prayer Flag Rituals:</strong> Pilgrims and monks frequently hike to the summit to tie new prayer flags. Each color represents a natural element and is believed to carry blessings across the wind to all beings.</li>

                  <li><strong>Annual Local Pilgrimage:</strong> Every year, Tamang and Sherpa communities organize local pujas (prayer ceremonies) at the top of Ama Yangri to pray for peace, safety, and good harvests.</li>

                  <li><strong>Ancient Energy Spot:</strong> Monks from nearby monasteries claim that Ama Yangri’s peak holds a special energy, making it an ideal place for meditation and reflection. It is often used for solo retreats by high lamas.</li>

                  <li><strong>Storm Belief:</strong> Villagers believe that if someone behaves disrespectfully on the trail or summit (like shouting or littering), storms will form quickly a sign of the goddess’s displeasure.</li>
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
    <h1> "Here is a Normal map for AmaYangri" </h1>
    <img src="{{ asset('images/amap.jpg') }}">
    <button onclick="scrollToTop()" id="scrollTopBtn" title="Go to top">&#8679;</button>
    <footer class="footer">
      <div class="footer-container">
        <p>&copy; 2025 AmaYangri Trek. All rights reserved.</p>
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
s
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

