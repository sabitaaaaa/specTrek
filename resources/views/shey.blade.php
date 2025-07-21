<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Shey Phoksundo</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      line-height: 1.5;
      background-color: #f9f9f9;
    }

    .navbar {
      background-color: #027478;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 50px;
      height: 90px;
      border-bottom: 2px solid #ddd;
    }

    .navbar-brand img {
      height: 73px;
      object-fit: contain;
      margin-top: 15px;
      margin-left: 70px;
    }

    .nav-links {
      display: flex;
      list-style: none;
      gap: 18px;
    }

    .nav-links a {
      text-decoration: none;
      color: white;
      font-size: 18px;
      font-weight: 500;
      padding: 6px 10px;
      transition: color 0.3s;
    }

    .nav-links a.btn:hover {
      color: #ccc;
    }

    header {
      padding-top: 14px;
      text-align: center;
    }

    h1 {
      color: #010102;
      font-size: 3rem;
      margin-bottom: 0;
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
/* ------------------------------------------------------slider ---------------------- */
    .slider {
      position: relative;
      width: 100%;
      height: 400px;
      overflow: hidden;
      border-radius: 8px;
    }

    .slide {
      width: 100%;
      height: 100%;
      display: none;
      object-fit: cover;
      border-radius: 8px;
      transition: opacity 0.5s ease-in-out;
    }

    img {
      width: 100%;
      border-radius: 8px;
    }
/*--------------------------------------- text part -------------------------- */
    .quote {
      margin-top: 1.5rem;
      padding: 1rem 2rem;
      text-align: center;
      color: #2c3e50;
      font-size: 21px;
    }

    .border-box {
      border-left: 5px solid #2c3e50;
      border-right: 5px solid #2c3e50;
      padding: 2rem 1.5rem;
      background-color: #ffffff;
      border-radius: 0.5rem;
    }

    .best-time {
      background-color: #ffffff;
      padding: 1rem;
      border-radius: 0.5rem;
      margin-top: 1rem;
    }

    ul {
      padding-left: 1.2rem;
      text-align: left;
    }

    /* -----------------------------------------------------itinerary section ------------------------------------------------ */
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

@media (max-width: 768px) {
  .col-lg-6 {
    flex: 0 0 100%;
  }
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


/*----------------------------------------- for full screen ---------------------------- */
/*for the  Wrapper that becomes full width when expanded */
.itinerary-wrapper.fullscreen .itinerary-section {
  flex-direction: column;
  align-items: center;
  gap: 2rem;
  max-width: 100%;
  padding: 2rem 5%;
}

/*To  Hide the day-to-day itinerary in fullscreen */
.itinerary-wrapper.fullscreen .day-itinerary {
  display: none;
}

/* Expand detailed itinerary to full width */
.itinerary-wrapper.fullscreen .detailed-itinerary-box {
  width: 100%;
}

/* Make fade-box breathe more in full screen */
.itinerary-wrapper.fullscreen .fade-box {
  max-height: none;
  background-color: #fafafa;
  padding: 2rem;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
  border-radius: 10px;
}

/* ------------------------------------map image --------------- */

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
    height:400px;
    width:600px;
    margin-left:270px;
    box-shadow: 0 0 20px rgba(2, 2, 2, 0.5);
    border-radius: 30px;
 }
 .nonInteractiveMap img:hover{
    box-shadow: 0 8px 200px rgba(0, 0, 0, 0.4); /* deeper hover shadow */
    border-radius: 25px;
    transform: scale(1.02); /* slight zoom effect */
}
/* --------to fit the contents in itienary--------------- */
    .row {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  justify-content: center;
}

.col-lg-6 {
  flex: 0 0 45%; /* 45% + 45% + 2rem gap fits nicely */
}

/*-------------------- arrow button ------------------ */
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
/* -----------------------------------------------------footer part -------------------- */
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
      /* font-size: 14px; */
    }


  </style>
</head>
<body>

  <nav class="navbar">
    <a href="#" class="navbar-brand">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" />
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
    <h1>Shey Phoksundo trek</h1>
    <p class="subtitle">“Where the trails are ancient and the silence sacred..”</p>
  </header>

  <main>
    <div class="row">
      <div class="col-lg-7">
        <div class="slider">
          <img src="{{ asset('images/shey1.jpeg') }}" class="slide" style="display: block;" />
          <img src="{{ asset('images/shey2.jpeg') }}" class="slide" />
          <img src="{{ asset('images/shey3.jpeg') }}" class="slide" />
          <img src="{{ asset('images/shey4.jpeg') }}" class="slide" />
          <img src="{{ asset('images/shey5.jpeg') }}" class="slide" />
        </div>
        <section class="quote">
          <h4>“Lose yourself in the mystic beauty of Phoksundo, where nature remains untouched and time stands still.”</h4>
        </section>
      </div>

      <div class="col-lg-4">
        <div class="border-box">
          <div>
            <h2 style="color: #2c3e50;">Hidden Gems</h2>
            <ul>
              <li>Ringmo village, a traditional Bon village perched near the lake.</li>
              <li>Tshowa Gompa, A 900-year-old Bon monastery that sits on a cliff above Phoksundo Lake.</li>
              <li>Dho Tarap villge, A traditional Tibetan village with walled compounds, barley fields, and Tibetan-style houses.</li>
            
            </ul>
          </div>
          <div class="best-time">
            <h3 style="color: #2c3e50;">Best Time to Visit</h3>
            <p>The best time to visit Shey Phoksundo is during spring and autumn when the weather is stable, skies are clear, and trekking conditions are at their best</p>
          </div>
        </div>
      </div>
    </div>

 <!-- WRAPPER THAT CAN GO FULL WIDTH -->
  <div id="itinerary-wrapper" class="itinerary-wrapper">
    <div class="row itinerary-section">
      <!-- LEFT SIDE: Day-to-Day Itinerary -->
      <div class="col-lg-6 day-itinerary">
        <h2>Day-to-Day Itinerary</h2>
        <ul>
          <li><strong>Day 1:</strong> Fly from Nepalgunj to Juphal and trek to Sulighat via Tripura Sundari Temple.</li>
          <li><strong>Day 2:</strong> Trek from Sulighat through Kageni to Chunuwa, entering Shey Phoksundo National Park.</li>
          <li><strong>Day 3:</strong> Trek from Sulighat through Kageni to Chunuwa, entering Shey Phoksundo National Park.</li>
          <li><strong>Day 4:</strong> Rest and acclimatize at Phoksundo Lake with optional visit to Tshowa Gompa.</li>
          <li><strong>Day 5:</strong> Descend from Phoksundo Lake through forests to Chhepka village.</li>
          <li><strong>Day 6:</strong> Trek from Chhepka to Juphal via Sulighat, completing the circuit.</li>
          <li><strong>Day 7:</strong> Take a scenic morning flight from Juphal back to Nepalgunj.</li>
       
          <p><strong> END OF TREK !! </strong></p>

        </ul>
        
      </div>
    

      <!-- RIGHT SIDE: Detailed Itinerary -->
      <div class="col-lg-6 detailed-itinerary-box">
        <h2>Detailed Itinerary</h2>
        <div id="detailed-itinerary" class="fade-box">
          <div class="fade-content">
            <p><strong>Day 1: Nepalgunj to Juphal – Trek to Sulighat via Tripura Sundari </strong></p><p> The journey begins with a scenic early morning flight from Nepalgunj to Juphal, which takes approximately 35 minutes. Juphal is a small airstrip located in the Dolpa district and serves as the gateway to the Shey Phoksundo region. From Juphal, the trek begins with a gentle descent through terraced fields and traditional villages. After a brief stop at the revered Tripura Sundari Temple, trekkers continue walking along the Bheri River until reaching Sulighat. This pleasant walk introduces the natural beauty and cultural richness of the region. Overnight stay at Sulighat.</p>
            <p><strong>Day 2: Sulighat to Chunuwa via Kageni</strong></p><p> The second day’s trek starts from Sulighat and continues through a lush forest trail filled with pine, bamboo, and walnut trees. The trail ascends gradually to the small village of Kageni, offering glimpses of local agriculture and Himalayan wildlife. From Kageni, the route continues toward Chunuwa, which is the entry checkpoint for Shey Phoksundo National Park. The path is tranquil, and the sound of the flowing river accompanies trekkers throughout the journey. Overnight stay at Chunuwa.</p>
            <p><strong>Day 3: Chunuwa to Phoksundo Lake</strong></p> <p> On this day, trekkers follow the trail upstream along the Phoksundo River. The path includes several suspension bridge crossings and passes through small settlements. The trek features a steep climb before revealing one of the highlights of the journey – a breathtaking waterfall (Nepal’s highest). As the trail levels off, the mesmerizing turquoise waters of Phoksundo Lake come into view. The lake is surrounded by rugged cliffs and bordered by the beautiful Ringmo village. The day ends with a peaceful overnight stay near the lake.</p>
            <p><strong>Day 4: Rest Day at Phoksundo Lake</strong></p><p> Day four is reserved for rest and acclimatization at Phoksundo Lake. Trekkers can take the opportunity to explore the serene surroundings, walk along the lake’s edge, and visit the centuries-old Tshowa Gompa monastery situated on a ridge above the lake. This day is also perfect for capturing stunning photographs of the clear blue lake against the backdrop of stark Himalayan landscapes. It offers a chance to absorb the spiritual and natural tranquility of the region before beginning the return journey.</p>
            <p><strong>Day 5: Phoksundo Lake to Chhepka </strong></p><p>The return trek begins with a descent from Phoksundo Lake, retracing the trail through Ringmo village and into the dense forests. The path gradually slopes down and passes through familiar villages and suspension bridges. The lush vegetation and sounds of the river create a soothing trekking experience. After a full day’s walk, trekkers reach the village of Chhepka, located at an altitude of 2,667 meters. Overnight stay at Chhepka.</p>
            <div class="extra-content">
              <p><strong>Day 6: Chhepka to Juphal via Sulighat</strong></p> <p> From Chhepka, the trail continues downhill through the same forested trails and small riverside settlements. Trekkers pass through Sulighat again before making a final climb back up to Juphal. This marks the end of the trekking portion of the journey. The walk is a mix of gentle ups and downs and offers a chance to reflect on the incredible experiences of the past few days. Overnight stay in Juphal.</p>
              <p><strong>Day 7: Juphal to Nepalgunj</strong></p> <p> The final day begins with a morning flight from Juphal back to Nepalgunj. The short but scenic flight concludes the journey through one of Nepal’s most remote and naturally captivating trekking routes. From Nepalgunj, trekkers can either connect to Kathmandu or continue their onward travel.</p>
              <p><strong> END OF THE TREK!!</strong><p>
            </div>
            <strong>MORE INFORMATIONS</strong>
            <br>
            <br>
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
                    <td style="padding: 10px; border: 1px solid #ccc;">Flight to Juphal</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 5,000–7,500</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">35 minutes	</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Moderate</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Scenic morning flight from Nepalgunj to Juphal airstrip. Fastest way to reach trailhead.</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Shared Jeep to Sulighat</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 1,500–2,500</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">3–4 hours</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Basic</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Shared local jeeps that leave when full. Bumpy off-road ride, affordable.</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Private Jeep to Sulighat</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 12,000–18,000</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">3 hours</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">High</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Private 4x4 jeep, comfortable and flexible schedule with hotel pickup.</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Helicopter Charter</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 120,000+ (Group)	</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">45–60 minutes	</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Luxury</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Direct helicopter to Phoksundo Lake or Juphal. Scenic, very fast, great for luxury travel.</td>
                  </tr>
                </tbody>
              </table>
              <p style="margin-top: 1.5rem; font-size: 17px; line-height: 1.7;">
                <strong>Note:</strong> All road and flight options require travel to Juphal, the starting point of the Shey Phoksundo trek. There is no direct road or flight to Phoksundo Lake itself,  you must trek on foot from Juphal through Sulighat, Chhepka, and other villages to reach the lake.If you travel by private vehicle, parking is available in towns like Nepalgunj or at Sulighat trailhead areas, but there is <strong> no vehicle access or parking beyond Sulighat </strong> inside Shey Phoksundo National Park.
              </p>
              <div class="hidden-culture" style="margin-top: 3rem; padding: 2rem; background-color: #fef6f0; border-radius: 10px;">
                <h2 style="color: #2c3e50; text-align: center; margin-bottom: 1rem;">Hidden Traditions & Interesting Facts of Shey Phoksundo</h2>

                <ul style="font-size: 18px; line-height: 1.8; padding-left: 1.5rem;">
                  <li><strong>Ancient Bon Practices:</strong> The Dolpo people practice Bon, an ancient pre-Buddhist religion. Rituals involve sacred chants, prayer flags, and smoke offerings at Tshowa Gompa, the centuries-old monastery above Phoksundo Lake.</li>

                  <li><strong>Sacred Phoksundo Lake Legend:</strong> Locals believe the turquoise lake was created by a divine goddess. They say its water is so pure that it’s forbidden to swim or fish, preserving its sacred energy and tranquil beauty.</li>

                  <li><strong>Crystal Mountain Reverence:</strong> Crystal Mountain near Shey Gompa is a pilgrimage site where devotees circle the mountain, believing that doing so will cleanse their sins and bring spiritual merit.</li>

                  <li><strong>No Killing Rule:</strong> Within Shey Phoksundo National Park, killing animals is strictly prohibited. This custom reflects the deep spiritual respect locals have for all life, especially near sacred places like Shey Gompa and Ringmo village.</li>

                  <li><strong>Traditional Salt Trade Routes:</strong> Dolpo was once part of the historic salt trade route to Tibet. Nomadic yak caravans carrying salt and grain still traverse the region during summer months, keeping this ancient tradition alive.</li>

                  <li><strong>Blessed Herbal Medicine:</strong> Dolpo’s people still use traditional Tibetan medicine. Rare herbs gathered in the high hillsides around Phoksundo are blended into healing remedies, which local amchis (healers) believe can cure a range of illnesses.</li>

                  <li><strong>Mysterious Bon Monasteries:</strong> Hidden away in the hills around the lake are small Bonpo shrines, often accessible only on foot. Inside, murals and statues hold centuries of spiritual history, and locals light butter lamps here to pay homage to their ancestors.</li>
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
    <h1> "Here is a Normal map for Shey Phoksundo Trek" </h1>
    <img src="{{ asset('images/map2.jpg') }}">
    
<button onclick="scrollToTop()" id="scrollTopBtn" title="Go to top">&#8679;</button>

  </div>



    <!-- Footer -->
    <footer class="footer">
      <div class="footer-container">
        <p>&copy; 2025 AmaYangri Trek. All rights reserved.</p>
        <p>Developed by SpecTrek Team</p>
      </div>
    </footer>
  </main>



  <script>

    //for image slider

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

  seeMoreBtn.addEventListener('click', () => {
    fadeBox.classList.toggle('expanded');
    wrapper.classList.toggle('fullscreen');

    if (fadeBox.classList.contains('expanded')) {
      seeMoreBtn.textContent = 'See Less';
    } else {
      seeMoreBtn.textContent = 'See More';
    }
  });
</script>

<!-- ----------------arrow script ------ -->
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



</body>
</html>
