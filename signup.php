<?php 
@include 'db.php'; // Include database connection

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists in the database
    $query = "SELECT * FROM user_tbl WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Email already exists. Please try another one.";
    } else {
        // Insert user into the database
        $insertQuery = "INSERT INTO user_tbl (username, email, address, password) VALUES ('$username', '$email', '$address', '$hashedPassword')";
        
        if (mysqli_query($conn, $insertQuery)) {
            // Redirect to index.php on success
            echo "<script>alert('Registered successfully!'); window.location.href='index.php';</script>"; 
            exit(); // Ensure no further code is executed after redirect
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Form</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="logo">
      <img src="assets/img/blogo__1_-removebg-preview.png" alt="" />
    </div>
    <form action="" method="POST" class="login-form">
      <h1 class="login-title">Register</h1>

      <div class="input-box">
        <i class="bx bxs-user"></i>
        <input type="text" name="username" placeholder="Username" required />
      </div>

      <div class="input-box">
        <i class="bx bxs-envelope"></i>
        <input type="email" name="email" placeholder="Email" required />
      </div>

      <div class="input-box">
        <i class="bx bxs-home"></i>
        <input type="text" name="address" placeholder="Address" required />
      </div>

      <div class="input-box">
        <i class="bx bxs-lock-alt"></i>
        <input type="password" name="password" placeholder="Password" required />
      </div>

      <button type="submit" class="login-btn">Register</button>

      <p class="register">
        Already have an account?
        <a href="index.php">Login</a>
      </p>
    </form>
  </body>
</html>
