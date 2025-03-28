<?php
session_start(); // Start the session

// Include database connection file
$servername = "localhost";
$username = "root";
$password = "";
$database = "rfidattendancesystem";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the POST data contains the user name to delete
if(isset($_POST['name'])) {
    // Sanitize the input to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    // Construct the SQL query to delete the user record
    $query = "DELETE FROM login WHERE name = '$name'";

    // Execute the query
    if(mysqli_query($conn, $query)) {
        $_SESSION['delete_success'] = "User deleted successfully"; // Set the success message in session variable
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "No user name provided";
}

// Close database connection
mysqli_close($conn);

// Redirect back to userdetails.php page
header("Location: userdetails.php");
exit();
?>
