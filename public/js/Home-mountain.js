// public/js/home.js
window.addEventListener("scroll", () => {
  const scrollY = window.scrollY;

  const bg = document.querySelector(".bg");
  const mid = document.querySelectorAll(".mid");
  const front = document.querySelector(".front");

  if (bg) bg.style.transform = `translateY(${scrollY * 0.1}px)`;
  mid.forEach(m => m.style.transform = `translateY(${scrollY * 0.2}px)`);
  if (front) front.style.transform = `translateY(${scrollY * 0.3}px)`;
});


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

setInterval(nextTestimonial, 5000); // Auto-slide every 5 seconds
window.addEventListener('scroll', function() {
  const navbar = document.querySelector('.navbar');
  if (window.scrollY > 50) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});


