<?php
@include 'db.php'; // Include database connection

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if the username exists in the database
    $query = "SELECT * FROM user_tbl WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Check if the username is "admin" or another user
            if ($username === 'admin') {
                // Redirect to admin.php if username is admin
                echo "<script>alert('Welcome back Admin!'); window.location.href='admin.php';</script>"; 
                exit();
            } else {
                // Redirect to home.php for other users
                echo "<script>alert('Welcome Traveler!'); window.location.href='home.php';</script>"; 
                exit();
            }
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "Username not found. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
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
      <h1 class="login-title">Login</h1>

      <div class="input-box">
        <i class="bx bxs-user"></i>
        <input type="text" name="username" placeholder="Username" required />
      </div>

      <div class="input-box">
        <i class="bx bxs-lock-alt"></i>
        <input type="password" name="password" placeholder="Password" required />
      </div>

      <button type="submit" class="login-btn">Login</button>

      <p class="register">
        Don't have an account?
        <a href="signup.php">Register</a>
      </p>
    </form>
  </body>
</html>
