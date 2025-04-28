<?php
@include 'db.php';

// Initialize empty variables
$busName = '';
$category = '';
$image = '';
$update_mode = false;

// Check if we're editing
if (isset($_GET['id'])) {
    $update_mode = true;
    $id = intval($_GET['id']);

    $select = mysqli_query($conn, "SELECT * FROM bus_tbl WHERE id = $id");
    if (mysqli_num_rows($select) > 0) {
        $bus = mysqli_fetch_assoc($select);
        $busName = $bus['name'];
        $category = $bus['category'];
        $image = $bus['image'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $busName = mysqli_real_escape_string($conn, $_POST['busName']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $upload_folder = 'uploads/';

  if (!is_dir($upload_folder)) {
      mkdir($upload_folder, 0777, true);
  }

  $imageUploaded = false;
  if (!empty($_FILES['busImage']['name'])) {
      $image = $_FILES['busImage']['name'];
      $tmp_name = $_FILES['busImage']['tmp_name'];
      $target_file = $upload_folder . basename($image);

      if (move_uploaded_file($tmp_name, $target_file)) {
          $imageUploaded = true;
      } else {
          echo "<script>alert('Failed to upload image. Please try again.'); window.location.href='addBus.php';</script>";
          exit();
      }
  }

  if (isset($_GET['id'])) {
      // UPDATE existing bus
      $id = intval($_GET['id']);
      
      if ($imageUploaded) {
          $update = "UPDATE bus_tbl SET name='$busName', category='$category', image='$image' WHERE id=$id";
      } else {
          $update = "UPDATE bus_tbl SET name='$busName', category='$category' WHERE id=$id";
      }

      $result = mysqli_query($conn, $update);

      if ($result) {
          echo "<script>alert('Bus updated successfully!'); window.location.href='admin.php';</script>";
      } else {
          echo "<script>alert('Failed to update bus.'); window.location.href='addBus.php?id=$id';</script>";
      }

  } else {
      // INSERT new bus
      if ($imageUploaded) {
          $insert = "INSERT INTO bus_tbl (name, category, image) VALUES ('$busName', '$category', '$image')";
          $result = mysqli_query($conn, $insert);

          if ($result) {
              echo "<script>alert('Bus Added successfully!'); window.location.href='admin.php';</script>";
          } else {
              echo "<script>alert('Failed to add bus. Please try again!'); window.location.href='addBus.php';</script>";
          }
      } else {
          echo "<script>alert('Image is required for adding a new bus.'); window.location.href='addBus.php';</script>";
      }
  }
}
?>

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
    <style>
      .container {
  max-width: 800px;
  margin: 50pxauto;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  border-top: 2px solid;
  
}

.header-row h2 {
  font-size: 24px;
  color: #333;
  text-align: center;
  margin-bottom: 20px;
}

form {
  display: flex;
  flex-direction: column;
}

.form-group {
  margin-bottom: 15px;
}

label {
  font-size: 16px;
  color: #555;
  margin-bottom: 5px;
  display: block;
}

input[type="text"],
input[type="file"],
select {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type="text"]:focus,
select:focus {
  border-color: #007bff;
  outline: none;
}

button[type="submit"] {
  padding: 12px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
  background-color: #0056b3;
}

input[type="file"] {
  padding: 10px;
}

.submit-btn {
  width: 100%;
  background-color: #28a745;
  color: white;
  padding: 12px;
  border-radius: 4px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s;
}

.submit-btn:hover {
  background-color: #218838;
}

/* Optional: Style for form error or success messages */
.success-message {
  color: green;
  font-size: 16px;
  text-align: center;
  margin-top: 20px;
}

.error-message {
  color: red;
  font-size: 16px;
  text-align: center;
  margin-top: 20px;
}

.back{
  padding: 12px 20px;
  background-color:rgb(211, 17, 17);
  color: #fff;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  margin-top: 20px;
}

.back a {
  text-decoration: none;
  display:block;
  text-align: center;
  color: white;
}
    </style>
  </head>
  <body>
    <div class="background">
      <div class="logo">
        <a href=".\home.html">
          <img
            src="assets/img/blogo__1_-removebg-preview.png"
            alt="Pamana Plate"
          />
        </a>
      </div>

      <div class="header">
        <div class="navigation">
          <ul>
            <li><a href="#">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="header-row">
      <h2><?php echo $update_mode ? 'Edit Bus' : 'Add New Bus'; ?></h2>
      </div>

      <!-- Form to Add Bus -->
      <form action="addBus.php<?php echo $update_mode ? '?id=' . $id : ''; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="busName">Bus Name</label>
          <input type="text" id="busName" name="busName" value="<?php echo htmlspecialchars($busName); ?>" placeholder="Enter bus name" required />
        </div>

        <div class="form-group">
          <label for="category">Category</label>
          <select id="category" name="category" required>
            <option value="Marvel" <?php if($category == 'Marvel') echo 'selected'; ?>>Marvel</option>
            <option value="DC" <?php if($category == 'DC') echo 'selected'; ?>>DC</option>
            <option value="Luxury" <?php if($category == 'Luxury') echo 'selected'; ?>>Luxury</option>
          </select>
        </div>

        <div class="form-group">
          <label for="busImage">Bus Image</label>
          <?php if ($update_mode && $image): ?>
            <img src="uploads/<?php echo htmlspecialchars($image); ?>" alt="Current Bus Image" style="width: 150px; margin-bottom: 10px;">
          <?php endif; ?>

          <input type="file" id="busImage" name="busImage" accept="image/*" <?php echo $update_mode ? '' : 'required'; ?> />

        </div>

        <button type="submit" class="submit-btn">Add Bus</button>
        <div class="back"><a href="admin.php">Back</a></div>
        
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src=".\assets\js\script.js"></script>
  </body>
</html>
