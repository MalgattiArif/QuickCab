<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>QuickCab - Book Your Ride</title>
    <link rel="stylesheet" href="css\style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  </head>
  <body>
    <nav class="navbar">
      <div class="container">
        <a href="/" class="logo">QuickCab</a>
        <div class="nav-links">
          <a href="#home" class="active">Home</a>
          <a href="#services">Why Us</a>
          <a href="#about">About</a>
          <a href="#contact">Contact</a>
          <a href="login.php">Login</a>
          <a href="signup.php">Signup</a>
        </div>
        <button class="menu-toggle">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </nav>

    <header class="hero" id="home">
      <div class="container">
        <div class="hero-content">
          <h1>Your Ride, Your Way</h1>
          <p>Book a comfortable ride in minutes. Available 24/7 for your convenience.</p>
          <div class="booking-form">
            <h2>Book Your Ride</h2>
<form id="bookingForm" action="book.php" method="POST">
  <div class="form-group">
    <input type="text" id="pickup" name="pickup" placeholder="Pickup Location" required />
  </div>
  <div class="form-group">
    <input type="text" id="dropoff" name="dropoff" placeholder="Drop-off Location" required />
  </div>
  <div class="form-group">
    <input type="tel" id="phone" name="phone" placeholder="Phone Number" required />
  </div>
  <div class="form-row">
    <div class="form-group">
      <input type="datetime-local" id="datetime" name="datetime" required />
    </div>
    <div class="form-group">
      <select id="carType" name="car_type" required>
        <option value="">Select Car Type</option>
        <option value="hatchback">Hatchback (20 Rs/km)</option>
        <option value="sedan">Sedan (25 Rs/km)</option>
        <option value="suv">SUV (30 Rs/km)</option>
        <option value="muv">MUV (40 Rs/km)</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <input type="number" id="distance" name="distance" placeholder="Distance (km)" step="0.1" required />
  </div>
  <div class="form-group">
    <input type="text" id="fare" name="fare" placeholder="Fare (calculated)" readonly />
  </div>
  <button type="submit" class="book-btn">Book Now</button>
</form>
            <a href="tel:+919876543210" class="contact-btn">Contact Us</a>
          </div>
        </div>
      </div>
    </header>

    <!-- Features Section -->
    <section class="features" id="services">
      <div class="container">
        <h2>Why Choose Us</h2>
        <div class="features-grid">
          <div class="feature-card">
            <div class="feature-icon">🚗</div>
            <h3>Safe Rides</h3>
            <p>Professional drivers and regularly maintained vehicles for your safety.</p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">⚡</div>
            <h3>Quick Pickup</h3>
            <p>Get picked up within minutes of booking your ride.</p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">💰</div>
            <h3>Best Rates</h3>
            <p>Competitive prices with no hidden charges.</p>
          </div>
          <div class="feature-card">
            <div class="feature-icon">🎯</div>
            <h3>Live Tracking</h3>
            <p>Track your ride in real-time through our app.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
      <div class="container">
        <h2>What Our Customers Say</h2>
        <div class="testimonials-slider">
          <div class="testimonial-card active">
            <div class="testimonial-content">
              <p>"Amazing service! The driver was punctual and professional."</p>
              <div class="testimonial-author">
                <img src="" alt="" />
                <div>
                  <h4>Suresh M</h4>
                  <span>Regular Customer</span>
                </div>
              </div>
            </div>
          </div>
          <div class="testimonial-card">
            <div class="testimonial-content">
              <p>"Best taxi service in the city. Clean cars and friendly drivers."</p>
              <div class="testimonial-author">
                <img src="" alt="" />
                <div>
                  <h4>Dr.kamat</h4>
                  <span>Regular Customer</span>
                </div>
              </div>
            </div>
          </div>
          <div class="slider-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="container">
        <div class="footer-content">
          <div class="footer-info">
            <h3>QuickCab</h3>
            <p>Your trusted ride partner.</p>
          </div>
          <div class="footer-links">
            <div class="footer-column">
              <h4>Company</h4>
              <a href="#about">About Us</a>
              <a href="#services">Services</a>
              <a href="#contact">Contact</a>
              <a href="#careers">Careers</a>
            </div>
            <div class="footer-column">
              <h4>Legal</h4>
              <a href="#privacy">Privacy Policy</a>
              <a href="#terms">Terms of Service</a>
              <a href="#faq">FAQ</a>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <p>&copy; 2025 QuickCab. All rights reserved.</p>
        </div>
      
    </footer>

    <script src="js/script.js"></script>
  </body>
</html>