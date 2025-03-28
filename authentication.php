<?php
// Database configuration
$servername = "localhost";
$username = "root"; // removed the extra space
$password = "";
$database = "rfidattendancesystem";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Function to authenticate user
function authenticateUser($username, $password) {
    global $conn;
    $username = $conn->real_escape_string($username); // Sanitize input to prevent SQL injection
    $password = $conn->real_escape_string($password);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        return 'success'; // Authentication successful
    } else {
        return 'failure'; // Authentication failed
    }
}

// Check if POST data is set
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Authenticate user
    $authenticationResult = authenticateUser($username, $password);

    echo $authenticationResult;
}

// Close connection
$conn->close();
?>
