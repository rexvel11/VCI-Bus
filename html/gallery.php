<?php 
@include '../db.php';

// Query the database for bus images
$query = "SELECT * FROM bus_tbl";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Gallery</title>
    <link rel="stylesheet" href="..\assets\css\gallery.css">
    <link href="https://fonts.cdnfonts.com/css/sigmar" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/unbounded" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>.search-container {
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

/* Styling for the search input box */
#searchBar {
    width: 50%;
    padding: 12px 20px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    outline: none;
    transition: all 0.3s ease;
    background-color: #f9f9f9;
}

/* Focus effect for the search input box */
#searchBar:focus {
    border-color: #007bff;
    background-color: #ffffff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Placeholder styling */
#searchBar::placeholder {
    color: #999;
    font-style: italic;
}

/* Styling for the search bar when there is no content */
#searchBar:empty::placeholder {
    color: #ccc;
}

/* Optional - Adding a small effect when hovering on the search bar */
#searchBar:hover {
    border-color: #007bff;
    background-color: #f1f1f1;
}

/* Make the search input responsive on smaller screens */
@media (max-width: 768px) {
    #searchBar {
        width: 80%;
    }
}

/* Style for the gallery items */
.gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 20px;
    margin-top: 30px;
}

.image {
    width: 250px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    position: relative;
    transition: all 0.3s ease;
}

.image img {
    width: 100%;
    height: auto;
    border-bottom: 2px solid #eee;
}

.image .caption {
    background-color: #fff;
    padding: 10px;
    text-align: center;
    font-size: 16px;
    color: #333;
    font-weight: bold;
}

/* Hover effect for the gallery items */
.image:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.image:hover .caption {
    background-color: #007bff;
    color: #fff;
}</style>
</head>
<body>
  <div class="arrow"> <a href="#" title="Back to Top"><img src="..\assets\img\arrow.png"></a> </div>
    <div class="background">
        <div class="logo">
          <a href="..\home.php"><img src="../assets/img/blogo__1_-removebg-preview.png " alt="Pamana Plate"></a>
        </div>

        <div class="header">
          <div class="navigation">
            <ul>
              <li><a href="..\home.php">Home</a></li>
              <li><a href="gallery.php">Gallery</a></li>
              <li><a href="aboutus.php">About us</a></li>
              <li><a href="..\logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
    </div>

      <div class="wrapper">
      <div class="search-container">
        <input type="text" id="searchBar" placeholder="Search for bus..." onkeyup="filterSearch()" />
    </div>

        <nav>
          <div class="items">
            <span class="item active" data-name="all">All Images</span>
            <span class="item" data-name="marvel">Marvel</span>
            <span class="item" data-name="dc">DC</span>
            <span class="item" data-name="luxury">Luxury</span>
          </div>
        </nav>
        
        <div class="gallery">

          <div class="image" data-name="marvel">
                <img src="../assets/img/m1.jpg" alt="Adobong Manok">
                <div class="caption">Hulk Express</div>
            </div>
        
            <div class="image" data-name="marvel">
              <img src="../assets/img/m2.jpg" alt="Chicken Curry">
              <div class="caption">Captain America Express</div>
          </div>

          <div class="image" data-name="marvel">
            <img src="../assets/img/m3.jpg" alt="Chicken Empanada">
            <div class="caption">SpiderMan Express</div>
        </div>

          <div class="image" data-name="marvel">
            <img src="../assets/img/b44.png" alt="Chicken Inasal">
            <div class="caption">Iron Man Express</div>
        </div>

          <div class="image" data-name="marvel">
            <img src="../assets/img/m4.jpg" alt="Pininyahang Manok">
            <div class="caption">Black Panther Express</div>
        </div>

          <div class="image" data-name="dc">
            <img src="../assets/img/dc1.jpg" alt="Adobong Sitaw">
            <div class="caption"> Batman Express</div>
        </div>

          <div class="image" data-name="dc">
            <img src="../assets/img/dc2.jpg" alt="Fried Eggplant">
            <div class="caption">The Flash Express</div>
        </div>

          <div class="image" data-name="dc">
            <img src="../assets/img/dc3.jpg" alt="Ginataang Kalabasa">
            <div class="caption">Wonder Express</div>
        </div>

          <div class="image" data-name="luxury">
            <img src="../assets/img/l1.jpg" alt="Ginisang Repolyo">
            <div class="caption">Mitsubishi Elite Bus</div>
        </div>

          <div class="image" data-name="luxury">
            <img src="../assets/img/l2.jpg" alt="Pinakbet">
            <div class="caption">Tantric Express</div>
        </div>

          <div class="image" data-name="luxury">
            <img src="../assets/img/l3.jpg" alt="Sarciadong Pechay">
            <div class="caption">Lamborghini 1.0 Express</div>
          </div>

          <div class="image" data-name="luxury">
            <img src="../assets/img/l4.jpg" alt="Adobong Pusit">
            <div class="caption">Parci Express</div>
          </div>

          <div class="image" data-name="luxury">
            <img src="../assets/img/l5.jpg" alt="Rellenong Bangus">
            <div class="caption">Mercedez Ultima</div>
          </div>

          <div class="image" data-name="luxury">
            <img src="../assets/img/l6.jpg" alt="Shrimp with Oyster Sauce">
            <div class="caption">Verstappen Express</div>
          </div>

          <div class="image" data-name="luxury">
            <img src="../assets/img/l7.jpg" alt="Sinigang na Bangus">
            <div class="caption">Hammilton Express</div>
          </div>

          <div class="image" data-name="luxury">
            <img src="../assets/img/l8.jpg" alt="Sweet and Sour Tilapia">
            <div class="caption">Lando Norris Edition</div>
          </div>

          <?php 
          // Check if there are any results
          if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $image = $row['image']; // Assuming the column for image is named 'image'
              $name = $row['name']; // Assuming the column for name is named 'name'
              $category = $row['category']; // Assuming the column for category is named 'category'
          ?>
          
          <div class="image" data-name="<?php echo strtolower($category); ?>">
              <img src="../uploads/<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($name); ?>">
              <div class="caption"><?php echo htmlspecialchars($name); ?></div>
          </div>

          <?php
            }
          } else {
            echo "<p>No buses found in the database.</p>";
          }
          ?>
          

        </div>
      </div>
      
      <div class="preview-box">
        <div class="details">
          <span class="icon fas fa-times"></span>
        </div>
        <div class="image-box"><img src="..\assets\img\" alt=""></div>
      </div>
      <div class="shadow"></div>
    
      <footer class="footer">
        <div class="footer-container">

            <div class="footer-left">
              <label for="">Email:</label>
                <input type="email" placeholder="enter email here" class="email-input">
            </div>

            <div class="footer-center">
                <h3>NAVIGATION</h3>
                <ul>
                    <li><a href="..\index.php">Home</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                </ul>
            </div>

            <div class="footer-right">
              <h3>CONTACT US</h3>
              <div class="social-icons">
                  <span class="icon"><a href="#"><img src="..\assets\img\fb.png"></a></span>
                  <span class="icon"><a href="#"><img src="..\assets\img\ig.png"></a></span>
                  <span class="icon"><a href="#><img src="..\assets\img\twitter.png"></a></span>
              </div> 
          </div>
      </div>

  
        <div class="footer-bottom">
            <p>© Copyright. All rights reserved.</p>
        </div>
    </footer>
    

      <script src="..\assets\js\gall.js"></script>
    
    </body>
    </html>