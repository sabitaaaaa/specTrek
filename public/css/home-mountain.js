// Parallax scroll effect
window.addEventListener("scroll", () => {
    const scrollY = window.scrollY;

    const bg = document.querySelector(".bg");
    const mid = document.querySelectorAll(".mid");
    const front = document.querySelector(".front");

<<<<<<< HEAD
  if (bg) bg.style.transform = `translateY(${scrollY * 0.1}px)`;
  mid.forEach(m => m.style.transform = `translateY(${scrollY * 0.2}px)`);
  if (front) front.style.transform = `translateY(${scrollY * 0.3}px)`;
});


// Navbar scroll color change
window.addEventListener('scroll', function () {
  const navbar = document.querySelector('.navbar');
  if (window.scrollY > 50) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});

// Testimonial slider
const testimonials = document.querySelectorAll(".testimonial");
const dots = document.querySelectorAll(".dot");
let currentIndex = 0;

function showTestimonial(index) {
  testimonials.forEach((testimonial, i) => {
    testimonial.classList.remove("active");
    testimonial.style.left = i < index ? "-100%" : "100%";
=======
    if (bg) bg.style.transform = `translateY(${scrollY * 0.1}px)`;
    mid.forEach(m => m.style.transform = `translateY(${scrollY * 0.2}px)`);
    if (front) front.style.transform = `translateY(${scrollY * 0.3}px)`;
>>>>>>> origin/merged-anushree
  });

  // Navbar scroll color change
  window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');
    if (navbar) {
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    }
  });

  // Testimonial slider
  const testimonials = document.querySelectorAll(".testimonial");
  const dots = document.querySelectorAll(".dot");
  let currentIndex = 0;

  function showTestimonial(index) {
    testimonials.forEach((testimonial, i) => {
      testimonial.classList.remove("active");
      testimonial.style.left = i < index ? "-100%" : "100%";
    });

<<<<<<< HEAD
// Automatically cycle testimonials (optional)
setInterval(nextTestimonial, 5000); // change every 5 seconds

dots.forEach((dot, i) => {
  dot.addEventListener("click", () => {
    currentIndex = i;
    showTestimonial(currentIndex);
  });
});

// Review modal toggle function
function toggleReviewModal(show) {
  const modal = document.getElementById('reviewModal');
  if (show) {
    modal.style.display = 'block';
  } else {
    modal.style.display = 'none';
=======
    testimonials[index].classList.add("active");
    testimonials[index].style.left = "0";

    dots.forEach(dot => dot.classList.remove("active"));
    dots[index].classList.add("active");
  }

  function nextTestimonial() {
    currentIndex = (currentIndex + 1) % testimonials.length;
    showTestimonial(currentIndex);
>>>>>>> origin/merged-anushree
  }

  // Automatically cycle testimonials every 5 seconds
  setInterval(nextTestimonial, 5000);

  // Dot click event listeners
  dots.forEach((dot, i) => {
    dot.addEventListener("click", () => {
      currentIndex = i;
      showTestimonial(currentIndex);
    });
  });

  // Review modal toggle function
  function toggleReviewModal(show) {
    const modal = document.getElementById('reviewModal');
    if (!modal) return;

    modal.style.display = show ? 'block' : 'none';
  }
