<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Annapurna Base Camp</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}">
  <link rel="stylesheet" href="{{ asset('css/abc.css') }}">
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


    
  </main>
<!-- Footer -->
    <footer class="footer">
      <div class="footer-container">
        <p>&copy; All rights reserved.</p>
        <p>Developed by SpecTrek Team</p>
      </div>
    </footer>


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