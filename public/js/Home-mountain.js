window.addEventListener("scroll", () => {
  const scrollY = window.scrollY;

  const bg = document.querySelector(".bg");
  const mid = document.querySelectorAll(".mid");
  const front = document.querySelector(".front");

  if (bg) bg.style.transform = `translateY(${scrollY * 0.1}px)`;
  mid.forEach(m => m.style.transform = `translateY(${scrollY * 0.2}px)`);
  if (front) front.style.transform = `translateY(${scrollY * 0.3}px)`;
});

// Navbar scroll color
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
  });

  testimonials[index].classList.add("active");
  testimonials[index].style.left = "0";

  dots.forEach(dot => dot.classList.remove("active"));
  dots[index].classList.add("active");
}

function nextTestimonial() {
  currentIndex = (currentIndex + 1) % testimonials.length;
  showTestimonial(currentIndex);
}

dots.forEach((dot, i) => {
  dot.addEventListener("click", () => {
    currentIndex = i;
    showTestimonial(currentIndex);
  });
});
// review one
const modal = document.getElementById("reviewModal");

// Attach toggle function to global scope so inline onclick can find it
function toggleReviewModal(show) {
    const modal = document.getElementById('reviewModal');
    if (show) {
      modal.style.display = 'block';
    } else {
      modal.style.display = 'none';
    }
  }



