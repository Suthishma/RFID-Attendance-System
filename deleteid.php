<?php
session_start();
// Include database connection file
$servername = "localhost";
$username = "root";
$password = "";
$database = "rfidattendancesystem";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the POST data contains the user id to delete
if(isset($_POST['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // Construct the SQL query to delete the user record
    $query = "DELETE FROM attendance WHERE id = '$id'";

    // Execute the query
    if(mysqli_query($conn, $query)) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "No user id provided";
}

// Close database connection
mysqli_close($conn);
header("Location: attendance.php");
exit();
?>
