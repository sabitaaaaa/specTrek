<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Manaslu Circuit Trek</title>
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
    <h1>Manaslu Circuit Trek</h1>
    <p class="subtitle">Manaslu,Where the mountains meet the soul</p>
  </header>

  <main>
    <div class="row">
      <div class="col-lg-7">
        <div class="slider">
          <img src="{{ asset('images/manaslu5.jpg') }}" class="slide" style="display: block;" />
          <img src="{{ asset('images/manaslu2.jpg') }}" class="slide" />
          <img src="{{ asset('images/manaslu3.jpg') }}" class="slide" />
          <img src="{{ asset('images/manaslu1.jpg') }}" class="slide" />
          <img src="{{ asset('images/manaslu4.jpg') }}" class="slide" />
        </div>
        <section class="quote">
          <h4>"Journey of breathtaking landscapes, remote villages, and serene mountain views, where every step brings you closer to nature and to yourself."</h4>
        </section>
      </div>

      <div class="col-lg-4">
        <div class="border-box">
          <div>
            <h2 style="color: #2c3e50;">Hidden Gems</h2>
            <ul>
              <li>Pungyen Gompa: A remote monastery near Samagaon.</li>
              <li>Birendra Tal: A beautiful glacial lake </li>
              <li>Manaslu Base Camp Side Trip: A challenging day hike from Samagaon</li>
              <li>Ribung Gompa: An ancient Tibetan monastery in Samagaon</li>
              <li>Lihi and Sho Villages: Traditional Tibetan-style villages with stone houses</li>
            </ul>
          </div>
          <div class="best-time">
            <h3 style="color: #2c3e50;">Best Time to Visit</h3>
            <p>The best time to trek the Manaslu Circuit is during autumn (September to November) and spring (March to May) when the weather is stable, skies are clear, and mountain views are at their best.</p>
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
          <li><strong>Day 1:</strong> Drive from Kathmandu to Soti Khola.</li>
          <li><strong>Day 2:</strong> Trek from Soti Khola to Machha Khola. </li>
          <li><strong>Day 3:</strong> Trek from Machha Khola to Jagat </li>
          <li><strong>Day 4:</strong> Trek from Jagat to Deng.</li>
          <li><strong>Day 5:</strong> Trek from Deng to Namrung.</li>
          <li><strong>Day 6:</strong> Trek from Namrung to Lho.</li>
          <li><strong>Day 7:</strong> Trek from Lho to Samagaon .</li>
          <li><strong>Day 8:</strong> Acclimatization and rest day at Samagaon.</li>
          <li><strong>Day 9:</strong> Trek from Samagaon to Samdo. </li>
          <li><strong>Day 10:</strong>Trek from Samdo to Dharamsala / Larkya Phedi</li>
          <li><strong>Day 11:</strong>Cross Larkya La Pass and trek down to Bimthang .</li>
          <li><strong>Day 12:</strong> Trek from Bimthang to Tilije.</li>
          <li><strong>Day 13:</strong> Trek from Tilije to Dharapani.</li>
          <li><strong>Day 14:</strong> Drive from Dharapani to Besisahar..</li>
          <li><strong>Day 15:</strong>Drive from Besisahar back to Kathmandu.</li>

          <p><strong> END OF TREK !! </strong></p>

        </ul>
        
      </div>
    

      <!-- RIGHT SIDE: Detailed Itinerary -->
      <div class="col-lg-6 detailed-itinerary-box">
        <h2>Detailed Itinerary</h2>
        <div id="detailed-itinerary" class="fade-box">
          <div class="fade-content">
            <p><strong>Day 1: Kathmandu to Soti Khola</strong></p><p> Your adventure begins with an 8 to 9-hour scenic drive from Kathmandu (1,400m) to Soti Khola (710m). The journey passes through lush hills, terraced fields, and along the Trishuli and Budhi Gandaki Rivers. The first part is on a paved road until Dhading Besi, after which the road becomes bumpy and off-road until Soti Khola.</p>
            <p><strong>Day 2: Soti Khola to Machha Khola</strong></p><p> Starting at 710m, the trail winds through dense Sal forests and climbs over rocky ridges alongside the Budhi Gandaki River. After crossing several suspension bridges and passing the village of Lapubesi, you’ll reach Machha Khola (900m) after around 6 to 7 hours of walking.</p>
            <p><strong>Day 3: Machha Khola to Jagat</strong></p> <p> Leaving Machha Khola, you’ll trek for about 6 to 7 hours, gradually ascending to Jagat (1,410m). The trail involves several ups and downs, suspension bridge crossings, and passes through Tatopani (hot springs) and Doban, with beautiful river views along the way.</p>
            <p><strong>Day 4: Trek from Jagat to Deng </strong></p><p> From Jagat (1,410m), the trail climbs steadily to Sirdibas and Philim, then narrows into a gorge with waterfalls and landslide-prone sections. After around 6 to 7 hours of trekking, you’ll arrive at Deng (1,804m), a small village surrounded by terraced fields.</p>
            <p><strong>Day 5: Trek from Deng to Namrung </strong></p><p> The trail from Deng (1,804m) rises gradually, passing through forests and small settlements like Rana and Bihi Phedi, with occasional glimpses of Siringi Himal. After trekking for 6 to 7 hours, you’ll reach Namrung (2,630m), a good place for mountain views and Tibetan-influenced village life.</p>
            <p><strong>Day 6: Trek from Namrung to Lho</strong>Starting at 2,630m, today’s trek is shorter and more scenic, taking about 4 to 5 hours to reach Lho (3,180m). The trail passes through Lihi and Sho, offering the first panoramic views of Ganesh Himal and Himal Chuli, before reaching the large monastery village of Lho.</p>
            <div class="extra-content">
              <p><strong>Day 7: Lho to Samagaon</strong></p> <p> From Lho (3,180m), the trail continues for about 4 to 5 hours through pine forests and along the Shyala village, offering 360-degree views of Manaslu, Himalchuli, and Peak 29. You’ll arrive at Samagaon (3,530m), a large village rich in Tibetan culture and home to Ribung Gompa.</p>
              <p><strong>Day 8: Acclimatization Day at Samagaon </strong></p> <p> Spend the day at 3,530m for altitude acclimatization. Optional side hikes include a full-day trek to Manaslu Base Camp (4,800m) or a shorter 3-hour hike to Pungyen Gompa (3,870m) for glacier and mountain views. Explore the village and visit Birendra Tal, a nearby glacial lake.</p>
              <p><strong>Day 9:Trek from Samagaon to Samdo</strong></p> <p> After leaving Samagaon, you’ll trek for 3 to 4 hours along yak pastures and glacial moraines, following the Budhi Gandaki River. Climbing gradually, you’ll reach Samdo (3,860m), the last permanent settlement before the pass and near the Tibetan border.</p>
              <p><strong>Day 10: Trek from Samdo to Dharamsala / Larkya Phedi </strong></p> <p>Today’s walk is shorter but at higher altitude. Trek for 3 to 4 hours, climbing from 3,860m at Samdo to 4,460m at Dharamsala (Larkya Phedi), the high camp for the pass crossing. The terrain is alpine and barren with great mountain views.</p>
              <p><strong>Day 11: Cross Larkya La Pass and Trek to Bimthang</strong></p> <p>Start before dawn for the toughest day of the trek. Ascend from 4,460m to the Larkya La Pass at 5,160m, which takes around 4 to 5 hours, enjoying stunning views of Himlung Himal, Cheo Himal, and Annapurna II. After the pass, descend steeply for another 4 hours to reach Bimthang (3,720m).</p>
              <p><strong>Day 12: Trek from Bimthang to Tilije</strong></p> <p>From 3,720m, descend for about 5 to 6 hours through rhododendron and pine forests with fantastic views of Lamjung Himal. Pass Yak Kharka and small villages like Gho, eventually reaching Tilije (2,300m).</p>
              <p><strong>Day 13: Trek from Tilije to Dharapani</strong></p> <p>After breakfast, walk downhill for 3 to 4 hours, passing through terraced fields and lush forests to reach Dharapani (1,960m), where the Manaslu trail meets the Annapurna Circuit Trail.</p>
              <p><strong>Day 14: Drive from Dharapani to Besisahar </strong></p> <p>From Dharapani (1,960m), take a jeep drive lasting 4 to 5 hours on a rough dirt road following the Marsyangdi River valley until you reach Besisahar (760m).</p>
              <p><strong>Day 15: Drive from Besisahar to Kathmandu</strong></p> <p>Conclude your adventure with a 6 to 7-hour drive back to Kathmandu (1,400m), enjoying views of rivers, villages, and terraced fields along the way.</p>
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
                    <td style="padding: 10px; border: 1px solid #ccc;">Local Bus</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 800–1,500</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">8–10 hours</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Basic</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Leaves from Gongabu Bus Park, Kathmandu to Arughat or Soti Khola, often crowded, with multiple local stops.</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Shared jeep</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 1,500–3,000 per person</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">7–9 hours</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Moderate</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Departs early morning from Kathmandu, more comfortable than a bus, suitable for budget trekkers.</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Private Jeep</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 18,000–25,000 (entire jeep)</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">7–8 hours</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">High</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Private and comfortable ride from Kathmandu to Soti Khola (or Machha Khola), good for small groups and off-road sections.</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Private Car (up to Arughat only)</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">NPR 10,000–14,000</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">6–7 hours</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Moderate</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Comfortable but only possible up to Arughat due to rough road beyond; switch to jeep after Arughat.</td>
                  </tr>
                  <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">Helicopter Charter</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">	NPR 120,000–160,000 per person (shared basis)</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">1–1.5 hours</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Luxury</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">Chartered flight from Kathmandu to Sama Gaon or nearby villages, rare and expensive, usually for emergency or special trips.</td>
                  </tr>
                </tbody>
              </table>
              <p style="margin-top: 1.5rem; font-size: 17px; line-height: 1.7;">
                <strong>Note:</strong> All road options require travel up to Soti Khola or Machha Khola, the usual starting points of the Manaslu Circuit Trek. There is <strong> no direct road access beyond these points</strong>, so trekking on foot is necessary from there onward. If you travel by private vehicle or jeep, <strong>parking is available in Soti Khola or nearby villages</strong>, but there is <strong>no vehicle access or parking beyond these locations</strong> inside the Manaslu Conservation Area.
              </p>
              <div class="hidden-culture" style="margin-top: 3rem; padding: 2rem; background-color: #fef6f0; border-radius: 10px;">
                <h2 style="color: #2c3e50; text-align: center; margin-bottom: 1rem;">Hidden Traditions & Interesting Facts of Annapurna Base Camp</h2>

                <ul style="font-size: 18px; line-height: 1.8; padding-left: 1.5rem;">
                  <li><strong>Tibetan Buddhist Culture:</strong> The Manaslu region is home to Tibetan-influenced communities such as the Gurung, Tamang, and Bhote people who preserve ancient Buddhist traditions, festivals, and rituals. Visitors often witness vibrant prayer flags, mani stones, and monastery ceremonies along the trail.</li>

                  <li><strong>SSacred Manaslu Sanctuary:</strong> The Manaslu Circuit passes through the Manaslu Conservation Area, considered a sacred Himalayan sanctuary. Locals believe that Mount Manaslu — the “Mountain of the Spirit” — watches over the land and its people, offering protection and blessings.</li>

                  <li><strong>Respect for Wildlife and Nature: </strong> Hunting and animal slaughter are traditionally forbidden in the region to protect the fragile ecosystem and honor the spiritual beliefs tied to the mountains and forests.</li>

                  <li><strong>Manaslu Base Camp Rituals:</strong> At villages like Samagaon and Samdo near the base camp, monks perform regular prayers and rituals at monasteries such as Ribung Gompa, seeking blessings for safe passage and good fortune for trekkers and locals alike.</li>

                  <li><strong>Traditional Teahouse Warmth:</strong> Along the trail, teahouses uphold the tradition of welcoming guests with hearty local meals like Dal Bhat and warm butter tea, sharing stories about the mountains and Tibetan culture.</li>

                  <li><strong>Glacial and Mountain Legends:</strong>Local folklore speaks of mountain spirits dwelling in the glaciers and peaks, believed to influence weather and harvests. These stories deepen the spiritual connection between the people and their environment.</li>

                  <li><strong>Ancient Trade and Pilgrimage Routes: </strong> The Manaslu Circuit overlaps old trade and pilgrimage routes connecting Nepal and Tibet, historically used by yak caravans and traders. Even today, these trails serve as vital links for remote communities.</li>
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
    <h1> "Here is a Normal map for Manasly Circuit Trek" </h1>
    <img src="{{ asset('images/map3.jpg') }}">

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

