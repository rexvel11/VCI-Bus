<?php 
@include 'db.php'; // include your db connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bus Hub</title>
  <link rel="stylesheet" href="./assets/css/styles.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="https://fonts.cdnfonts.com/css/kochi" rel="stylesheet" />
  <link href="https://fonts.cdnfonts.com/css/manjari-2" rel="stylesheet" />
  <style>
    .action-btn {
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="background">
    <div class="logo">
      <a href="home.html">
        <img src="assets/img/blogo__1_-removebg-preview.png" alt="Pamana Plate" />
      </a>
    </div>

    <div class="header">
      <div class="navigation">
        <ul>
        <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="header-row">
      <h2>List of Bus's</h2>
      <a href="addBus.php" class="add-btn">ADD BUS</a>
    </div>

    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Category</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        // Fetch buses from the database
        $select = mysqli_query($conn, "SELECT * FROM bus_tbl");

        if(mysqli_num_rows($select) > 0){
          while($row = mysqli_fetch_assoc($select)){
        ?>
        <tr>
          <td><?php echo htmlspecialchars($row['name']); ?></td>
          <td><?php echo htmlspecialchars($row['category']); ?></td>
          <td>
          <img src="uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Bus Image" style="width: 100px;">
          </td>
          <td>
          <a href="addBus.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn">Edit</a>
            <a href="deleteBus.php?id=<?php echo $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this bus?');">Delete</a>
          </td>
        </tr>
        <?php 
          }
        } else {
          echo "<tr><td colspan='4' style='text-align: center;'>No buses found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="./assets/js/script.js"></script>
</body>
</html>
