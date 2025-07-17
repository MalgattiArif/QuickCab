document.addEventListener("DOMContentLoaded", () => {
  // Mobile Menu Toggle
  const menuToggle = document.querySelector(".menu-toggle");
  const navLinks = document.querySelector(".nav-links");

  menuToggle?.addEventListener("click", () => {
    navLinks.style.display =
      navLinks.style.display === "flex" ? "none" : "flex";
    menuToggle.classList.toggle("active");
  });

  // Booking Form Fare Calculation
  const bookingForm = document.getElementById("bookingForm");
  const distanceInput = document.getElementById("distance");
  const carTypeSelect = document.getElementById("carType");
  const fareInput = document.getElementById("fare");

  const rates = {
    hatchback: 20,
    sedan: 25,
    suv: 30,
    muv: 40,
  };

  function calculateFare() {
    const distance = parseFloat(distanceInput.value);
    const carType = carTypeSelect.value;
    if (distance && carType) {
      const fare = distance * rates[carType];
      fareInput.value = `₹${fare.toFixed(2)}`;
    } else {
      fareInput.value = "";
    }
  }

  distanceInput?.addEventListener("input", calculateFare);
  carTypeSelect?.addEventListener("change", calculateFare);

  // Smooth scroll for navigation links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({ behavior: "smooth", block: "start" });
        navLinks.style.display = "";
        menuToggle.classList.remove("active");
      }
    });
  });

  // Set minimum datetime
  const datetimeInput = document.getElementById("datetime");
  if (datetimeInput) {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, "0");
    const day = String(now.getDate()).padStart(2, "0");
    const hours = String(now.getHours()).padStart(2, "0");
    const minutes = String(now.getMinutes()).padStart(2, "0");
    datetimeInput.min = `${year}-${month}-${day}T${hours}:${minutes}`;
  }

  // Animate features on scroll (unchanged)
  const features = document.querySelectorAll(".feature-card");
  const observerOptions = { threshold: 0.2, rootMargin: "0px" };
  const featureObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.transform = "translateY(0)";
        entry.target.style.opacity = "1";
      }
    });
  }, observerOptions);

  features.forEach((feature) => {
    feature.style.transform = "translateY(20px)";
    feature.style.opacity = "0";
    feature.style.transition = "all 0.6s ease";
    featureObserver.observe(feature);
  });

  // Testimonials Slider (unchanged)
  const testimonials = document.querySelectorAll(".testimonial-card");
  const dots = document.querySelectorAll(".dot");
  let currentSlide = 0;

  function showSlide(index) {
    testimonials.forEach((slide) => slide.classList.remove("active"));
    dots.forEach((dot) => dot.classList.remove("active"));
    testimonials[index].classList.add("active");
    dots[index].classList.add("active");
  }

  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      currentSlide = index;
      showSlide(currentSlide);
    });
  });

  setInterval(() => {
    currentSlide = (currentSlide + 1) % testimonials.length;
    showSlide(currentSlide);
  }, 5000);
});
