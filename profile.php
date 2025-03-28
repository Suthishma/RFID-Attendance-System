<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['name'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Database configuration
$servername = "localhost";
$username = "root"; 
$password = "";
$database = "rfidattendancesystem";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get name from session
$name = $_SESSION['name'];

// Query to fetch user details from login table
$userQuery = "SELECT * FROM login WHERE name = '$name'";
$userResult = mysqli_query($conn, $userQuery);

// Check for errors in user query
if (!$userResult) {
    die("Error fetching user details: " . mysqli_error($conn));
}

// Fetch user details including photo
if (mysqli_num_rows($userResult) > 0) {
    $userData = mysqli_fetch_assoc($userResult);
    $photoFileName = $userData['photo']; // Retrieve photo file name
} else {
    die("User not found in the login table.");
}

// Query to fetch attendance details for the user
$attendanceQuery = "SELECT * FROM attendance WHERE name = '$name'";
$attendanceResult = mysqli_query($conn, $attendanceQuery);

// Check for errors in attendance query
if (!$attendanceResult) {
    die("Error fetching attendance details: " . mysqli_error($conn));
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
  overflow: hidden; /* To hide scrollbars */
}

.video-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

video {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.bg-img {
  /* The image used */
  background-image: url("img16.jpg");
  min-height: 880px;
  position: absolute;
  width: 100%;
  z-index: -1; /* Place it behind the video */
}
/* Position the navbar container inside the image */
.container {
  position: absolute;
  margin: 200px;
  width: auto;
  z-index: 1; /* Place it above the video */
}

.hero-text {
  text-align: right;
  position: absolute;
  font-family: 'cursive';
  font-size: 150%;
  top: 500%;
  left: 0%;
  color: white;
}

</style>
</head>
<body>
<div class="bg-img"></div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                <img src="uploads/<?php echo $photoFileName; ?>" class="card-img-top" alt="User Photo">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $userData['name']; ?></h5>
                        <p class="card-text">Email: <?php echo $userData['email']; ?></p>
                        <p class="card-text">Phone: <?php echo $userData['phonenumber']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h2>Attendance Details</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Display attendance details
                        while ($row = mysqli_fetch_assoc($attendanceResult)) {
                            echo "<tr>";
                            echo "<td>" . $row['datetime'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
