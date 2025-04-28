<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bus Hub</title>
    <link rel="stylesheet" href=".\assets\css\styles.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link href="https://fonts.cdnfonts.com/css/kochi" rel="stylesheet" />
    <link href="https://fonts.cdnfonts.com/css/manjari-2" rel="stylesheet" />
  </head>
  <body>
    <div class="background">
      <div class="logo">
        <a href=".\home.php"
          ><img
            src="assets/img/blogo__1_-removebg-preview.png  "
            alt="Pamana Plate"
        /></a>
      </div>

      <div class="header">
        <div class="navigation">
          <ul>
            <li><a href=".\home.php">Home</a></li>
            <li><a href=".\html\gallery.php">Gallery</a></li>
            <li><a href=".\html\aboutus.php">About us</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="content">
      <h1>Ultimate Bus Hub! <br /></h1>
      <p>
        Welcome to the ultimate Bus Hub!<br />
        — a virtual space exploring bus's.
      </p>
      <a href=".\html\gallery.php"><button class="btn">Explore Bus</button></a>
      <ul class="slider-nav">
        <li>
          <img
            class="slider-btn"
            data-rotator="-35"
            src="assets/img/b1-removebg-preview (1).png"
          />
        </li>
        <li>
          <img
            class="slider-btn"
            data-rotator="-125"
            src="assets/img/b2-removebg-preview (1).png"
          />
        </li>
        <li>
          <img
            class="slider-btn"
            data-rotator="-215"
            src="assets/img/b3-removebg-preview (1).png"
          />
        </li>
        <li>
          <img
            class="slider-btn"
            data-rotator="-305"
            src="assets/img/b4-removebg-preview (1).png"
          />
        </li>
        <span class="line"></span>
      </ul>
    </div>

    <div class="circle-container">
      <div class="big-circle">
        <div class="big-img big-img1">
          <img src="assets/img/b1-removebg-preview (1).png" />
        </div>
        <div class="big-img big-img2">
          <img src="assets/img/b2-removebg-preview (1).png" />
        </div>
        <div class="big-img big-img3">
          <img src="assets/img/b3-removebg-preview (1).png" />
        </div>
        <div class="big-img big-img4">
          <img src="assets/img/b4-removebg-preview (1).png" />
        </div>
      </div>
    </div>

    <div class="featured-recipes">
      <h1>FEATURED BUS</h1>
      <hr />

      <div class="container swiper">
        <div class="recipe-container">
          <div class="recipe-list swiper-wrapper">
            <div class="square swiper-slide">
              <img src="assets/img/b11.png" alt="Adobong Manok" />
              <h3>Black Panther Bus</h3>
              <p>
                A sleek, vibranium-infused bus with glowing accents, Wakandan
                tech, and the smoothest ride in the jungle. <br />
                <br />
                Aircon: Yes, with eco-friendly Wakandan air tech. <br />
                <br />
                Capacity: 48 passengers (Shuri’s lab gets VIP spots).
              </p>
            </div>

            <div class="square swiper-slide">
              <img src="assets/img/b22.png" alt="Lumpiang Shanghai" />
              <h3>Batman Bus</h3>
              <p>
                A sleek, all-black ride with glowing bat logos and a silent,
                smooth engine for stealthy night trips. <br />
                <br />
                Aircon: Yes, with bat-chill mode! <br />
                <br />
                Capacity: 40 passengers (but Alfred always keeps a seat
                reserved).
              </p>
            </div>

            <div class="square swiper-slide">
              <img src="assets/img/b33.png" alt="Pinakbet" />
              <h3>Darth Vader Bus</h3>
              <p>
                A dark and imposing double-decker with Imperial vibes, perfect
                for nation-wide domination. <br />
                <br />
                Aircon: Yes, set to “Sith Breeze” level. <br />
                <br />
                Capacity: 45 passengers (Free Light Sabers).
              </p>
            </div>

            <div class="square swiper-slide">
              <img src="assets/img/b44.png" alt="Sinigang na Bangus" />
              <h3>Iron Man Bus</h3>
              <p>
                A shiny red-and-gold bus with advanced AI, repulsor-powered
                wheels, and a dashboard that talks back. <br />
                <br />Aircon: Yes, with Jarvis temperature optimization. <br />
                <br />
                Capacity: 50 passengers (plus room for suits of armor).
              </p>
            </div>
          </div>

          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
    </div>

    <div class="history">
      <div class="person1">
        <h1>"Behind the <br />Bus"</h1>
        <p>
          Get to know who's the people<br />
          behind Bus Hub.
        </p>
        <a href=".\html\aboutus.html"
          ><button class="history-btn">Read More</button></a
        >
      </div>
      <img src="assets/img/logo.png" />
    </div>

    <div class="newsletter">
      <div class="subscribe-container">
        <h2 class="subscribe-title">Subscribe to our Newsletter</h2>
        <p class="subscribe-description">
          Get updates on the latest Filipino food stories and insights!
        </p>
        <form id="subscribe-form" class="subscribe-form">
          <input
            type="email"
            placeholder="Enter your email"
            class="email-input"
            required
          />
          <button type="submit" class="subscribe-button">Subscribe</button>
        </form>
      </div>
    </div>

    <div id="popup-modal" class="popup-modal">
      <div class="popup-content">
        <span class="close-button" id="close-popup">&times;</span>
        <h3>Coming Soon!</h3>
        <p>
          The website is under development and the newsletter is not available
          at the moment. Please check back later!
        </p>
      </div>
    </div>

    <footer class="footer">
      <div class="footer-container">
        <div class="footer-left">
          <label for="">Email:</label>
          <input
            type="email"
            placeholder="enter email here"
            class="email-input"
          />
        </div>

        <div class="footer-center">
          <h3>NAVIGATION</h3>
          <ul>
            <li><a href=".\home.php">Home</a></li>
            <li><a href=".\html\gallery.php">Gallery</a></li>
            <li><a href=".\html\aboutus.php">About Us</a></li>
          </ul>
        </div>

        <div class="footer-right">
          <h3>CONTACT US</h3>
          <div class="social-icons">
            <span class="icon"
              ><a href="#"><img src=".\assets\img\fb.png" /></a
            ></span>
            <span class="icon"
              ><a href="#"><img src=".\assets\img\ig.png" /></a
            ></span>
            <span class="icon"
              ><a href="#"><img src=".\assets\img\twitter.png" /></a
            ></span>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <p>© Copyright. All rights reserved.</p>
      </div>
    </footer>

    <script>
      document
        .getElementById("subscribe-form")
        .addEventListener("submit", function (event) {
          event.preventDefault();
          document.getElementById("popup-modal").style.display = "flex";
        });

      document
        .getElementById("close-popup")
        .addEventListener("click", function () {
          document.getElementById("popup-modal").style.display = "none";
        });

      window.onclick = function (event) {
        const modal = document.getElementById("popup-modal");
        if (event.target === modal) {
          modal.style.display = "none";
        }
      };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src=".\assets\js\script.js"></script>
  </body>
</html>
