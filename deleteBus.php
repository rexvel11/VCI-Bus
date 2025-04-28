<?php
@include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // First, fetch the image to delete it from uploads
    $result = mysqli_query($conn, "SELECT image FROM bus_tbl WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    
    if ($row) {
        $image_path = 'uploads/' . $row['image'];
        if (file_exists($image_path)) {
            unlink($image_path); // delete the image file
        }
        
        // Then delete from database
        $delete = mysqli_query($conn, "DELETE FROM bus_tbl WHERE id = $id");
        
        if ($delete) {
            echo "<script>alert('Bus deleted successfully!'); window.location.href='admin.php';</script>";
        } else {
            echo "<script>alert('Failed to delete bus.'); window.location.href='admin.php';</script>";
        }
    }
} else {
    header('Location: admin.php');
    exit();
}
?>
