<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'bus_db');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
