<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Annapurna Base Camp</title>
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
    height:500px;
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
    <h1>Annapurna Base Camp</h1>
    <p class="subtitle">Every Step, a Closer View of the Annapurna</p>
  </header>

  <main>
    <div class="row">
      <div class="col-lg-7">
        <div class="slider">
          <img src="{{ asset('images/abc3.jpg') }}" class="slide" style="display: block;" />
          <img src="{{ asset('images/abc2.jpg') }}" class="slide" />
          <img src="{{ asset('images/abc1.jpg') }}" class="slide" />
          <img src="{{ asset('images/abc4.jpg') }}" class="slide" />
          <img src="{{ asset('images/abc5.jpg') }}" class="slide" />
        </div>
        <section class="quote">
          <h4>"Where the sky touches the silence of snow, ABC stands like a cathedral of light welcoming wanderers into the heart of the Himalayas."</h4>
        </section>
      </div>

      <div class="col-lg-4">
        <div class="border-box">
          <div>
            <h2 style="color: #2c3e50;">Hidden Gems</h2>
            <ul>
              <li>Bamboo Forest Near Dovan and Bamboo</li>
              <li>Machapuchare (Fishtail) Viewpoint</li>
              <li>Local Hot Springs in Landruk (Not Jhinu)</li>
              <li>Hidden Waterfall between Sinuwa and Bamboo</li>
              <li>Prayer Flag Forest near Deurali</li>
            </ul>
          </div>
          <div class="best-time">
            <h3 style="color: #2c3e50;">Best Time to Visit</h3>
            <p>During the spring (March to May) and autumn (mid-September to November) seasons when the weather is clear and stable, offering stunning mountain views and pleasant trekking conditions.</p>
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
          <li><strong>Day 1:</strong> Drive from Kathmandu to Pokhara and overnight by Lakeside</li>
          <li><strong>Day 2:</strong> Drive to Nayapul and trek to Ghandruk.</li>
          <li><strong>Day 3:</strong> Trek from Ghandruk to Chhomrong</li>
          <li><strong>Day 4:</strong> Trek from Chhomrong to Bamboo.</li>
          <li><strong>Day 5:</strong> Trek from Bamboo to Deurali.</li>
          <li><strong>Day 6:</strong> Trek from Deurali to Annapurna Base Camp (ABC).</li>
          <li><strong>Day 7:</strong> Trek from ABC back to Bamboo.</li>
          <li><strong>Day 8:</strong> Trek from Bamboo to Jhinu Danda and enjoy hot springs.</li>
          <li><strong>Day 9:</strong> Trek from Jhinu Danda to Nayapul, drive to Pokhara</li>
          <li><strong>Day 10:</strong> Drive back to Kathmandu.</li>
          <p><strong> END OF TREK !! </strong></p>

        </ul>
        
      </div>
    

      <!-- RIGHT SIDE: Detailed Itinerary -->
      <div class="col-lg-6 detailed-itinerary-box">
        <h2>Detailed Itinerary</h2>
        <div id="detailed-itinerary" class="fade-box">
          <div class="fade-content">
            <p><strong>Day 1: Kathmandu to pokhara </strong></p><p> Your journey begins with a scenic drive from Kathmandu to Pokhara, which takes around 6–7 hours. Along the way, you’ll travel alongside the winding Trishuli and Marsyangdi rivers, passing terraced hills, lush valleys, and small roadside villages. Once you arrive in Pokhara, check into your hotel and take an easy evening walk around Lakeside. The peaceful Phewa Lake and the Annapurna range in the distance make for a lovely introduction to this trek. Overnight in Pokhara.</p>
            <p><strong>Day 2: Pokhara → Nayapul → Ghandruk (Drive & Trek)</strong></p><p> Start the day with a short drive (about 1.5 hours) to Nayapul, the trailhead for your trek. From here, you’ll trek through charming villages and terraced farms before gradually ascending to Ghandruk, a traditional Gurung village. On reaching Ghandruk (approx. 5–6 hours of trekking), explore the local museum, chat with friendly locals, and admire the panoramic view of Annapurna South and Machhapuchhre. Overnight in a cozy lodge in Ghandruk.</p>
            <p><strong>Day 3: Ghandruk → Chhomrong (Trek)</strong></p> <p> Wake up to crisp mountain air and trek onwards to Chhomrong. The trail first descends steeply to Kimrong Khola, then climbs up through dense rhododendron and oak forests. It’s a steady 5–6 hours of trekking to reach Chhomrong, perched beautifully on a ridge. Upon arrival, enjoy spectacular sunset views of Annapurna South and Hiunchuli. Overnight in a teahouse at Chhomrong.</p>
            <p><strong>Day 4: Chhomrong → Bamboo (Trek)</strong></p><p> Begin your trek with a descent along steep stone steps to Chhomrong Khola, followed by a gentle climb through rhododendron and bamboo forests. Today’s trail is tranquil and shaded as you enter deeper into the Modi Khola valley. After about 5–6 hours, you’ll reach Bamboo, a small settlement surrounded by dense forest. Relax at a local teahouse and overnight in Bamboo.</p>
            <p><strong>Day 5: Bamboo → Deurali (Trek)</strong> Continue ascending alongside the Modi Khola and pass through lush forests dotted with waterfalls and mossy rocks. You’ll pass Dovan before reaching Deurali after 6–7 hours of trekking. Deurali lies just before the Annapurna sanctuary and offers a wonderful sense of isolation in the dramatic landscape. Overnight in Deurali.</p>
            <div class="extra-content">
              <p><strong>Day 6: Deurali → Annapurna Base Camp (Trek)</strong></p> <p> This is one of the most exciting days. Trek for about 7–8 hours as you leave forested trails behind and enter alpine terrain. Stop at Machhapuchhre Base Camp (3,700m) for lunch and incredible close-up views of Fishtail Mountain. Continue into the Annapurna Sanctuary, finally reaching Annapurna Base Camp at 4,130m. The 360-degree panorama of Annapurna I, Annapurna South, Hiunchuli, Gangapurna, and Machhapuchhre is breathtaking. Overnight at a teahouse at ABC.</p>
              <p><strong>Day 7: Annapurna Base Camp → Bamboo (Trek)</strong></p> <p> Wake up early to witness one of the most stunning sunrises you’ll ever see—golden light slowly illuminates the surrounding peaks. After breakfast, begin your descent back the way you came. It takes around 6–7 hours to reach Bamboo again. Along the way, you’ll appreciate the beauty of the sanctuary from a new perspective. Overnight in Bamboo.</p>
              <p><strong>Day 8: Bamboo → Jhinu Danda (Trek)</strong></p> <p> Today you’ll trek approximately 5–6 hours from Bamboo to Jhinu Danda. Retrace your steps past Chhomrong and descend steeply to Jhinu Danda. After checking in at a teahouse, you can take a short walk to the famous natural hot springs near the Modi Khola. Relaxing in the hot water surrounded by lush forest is a perfect way to soothe your tired legs. Overnight in Jhinu Danda.</p>
              <p><strong>Day 9: Jhinu Danda → Nayapul → Pokhara (Trek & Drive)</strong></p> <p>On your final trekking day, hike 5–6 hours back to Nayapul through pleasant villages and green hillsides. From Nayapul, drive about 1.5 hours back to Pokhara. Once in Pokhara, you can enjoy a well-deserved shower and a relaxing evening. Consider celebrating the trek’s completion with a lakeside dinner and some souvenir shopping. Overnight in Pokhara.</p>
              <p><strong>Day 10: Pokhara → Kathmandu (Drive)</strong></p> <p>On the last day, catch a morning tourist bus or private vehicle back to Kathmandu. The 6–7 hour drive takes you past familiar hillsides and rivers, allowing you one last chance to appreciate the landscape. Upon arrival in Kathmandu, you can explore the bustling Thamel district or catch your onward flight.</p>
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
                    <td style="padding: 10px; border: 1px solid #ccc;">Tourist Bus</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 900–1,500</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">6–7 hours</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Basic</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">	Leaves from Kathmandu to Pokhara; budget-friendly and scenic, with a few rest stops.</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Private Car</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 8,000–12,000</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">	6 hours</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Moderate</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">	Flexible schedule, hotel pickup, comfortable for small groups, multiple photo stops.</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Private Jeep</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 15,000–20,000</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">6 hours</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">High</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">	Spacious and comfy, ideal for rough roads up to Nayapul, can also accommodate luggage.</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Flight</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 3,000–4,500 (one-way)</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">25 minutes</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Luxury</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Quick and hassle-free Kathmandu–Pokhara option; followed by a drive to Nayapul (~1.5 hr).</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Helicopter</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 100,000–150,000 per person (shared)</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">1–2 hours	</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Luxury</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Direct helicopter charter from Kathmandu or Pokhara to Annapurna Base Camp. Offers spectacular aerial views of valleys, waterfalls, and Annapurna peaks. Lands at ABC with optional short stop for photos and tea. Requires advance booking due to limited slots and weather dependence.</td>
                  </tr>
                </tbody>
              </table>
              <p style="margin-top: 1.5rem; font-size: 17px; line-height: 1.7;">
                <strong>Note:</strong> All road options require travel to Nayapul, the starting point of the Annapurna Base Camp trek.<strong> There is no direct road or flight to Annapurna Base Camp itself</strong>. From Nayapul onward, you must continue on foot. If you have a private vehicle, parking is available at Nayapul or nearby lodges, but there is <strong>no vehicle access or parking beyond that point inside the Annapurna Conservation Area.</strong>
              </p>
              <div class="hidden-culture" style="margin-top: 3rem; padding: 2rem; background-color: #fef6f0; border-radius: 10px;">
                <h2 style="color: #2c3e50; text-align: center; margin-bottom: 1rem;">Hidden Traditions & Interesting Facts of Annapurna Base Camp</h2>

                <ul style="font-size: 18px; line-height: 1.8; padding-left: 1.5rem;">
                  <li><strong>Gurung and Magar Culture:</strong> The Annapurna region is home to Gurung and Magar communities who have preserved their rich traditions for centuries. Visitors often encounter traditional dances like Ghatu and Sorathi, especially during festivals and celebrations.</li>

                  <li><strong>Sacred Annapurna Sanctuary:</strong> Annapurna Base Camp lies inside a natural amphitheater surrounded by towering peaks. Locals consider this sanctuary sacred, believing that Annapurna — goddess of food and nourishment — watches over the valley.</li>

                  <li><strong>No Slaughter at Base Camp:</strong> In the Annapurna Sanctuary, killing animals is traditionally prohibited. This practice, respected by trekking lodges and locals alike, honors the sacredness of the area and ensures peace for all living beings.</li>

                  <li><strong>Spiritual Offerings at Machhapuchhre:</strong> Machhapuchhre (Fishtail Mountain), visible en route to ABC, is considered so sacred that climbing to its summit is banned. Locals make offerings at its base to protect the region from misfortune.</li>

                  <li><strong>Traditional Teahouse Hospitality:</strong> Every teahouse along the trail to Annapurna Base Camp follows the tradition of welcoming guests with warm Dal Bhat, herbal teas, and stories of the region. Hospitality is a key part of the local culture.</li>

                  <li><strong>Glacial Legends of Annapurna:</strong>According to local folklore, the glaciers of Annapurna hold the spirit of mountain gods. These glaciers feed rivers and farmlands, and pilgrims believe they must be treated with respect to ensure bountiful harvests.</li>

                  <li><strong>Ancient Trade Paths:</strong> The trails to Annapurna Base Camp overlap with centuries-old trade routes once used by Tibetan traders and local yak herders. Even today, porters and mule trains traverse these paths, carrying supplies to remote villages./li>
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
    <h1> "Here is a Normal map for Annapurna Base Camp" </h1>
    <img src="{{ asset('images/map.jpg') }}">

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
