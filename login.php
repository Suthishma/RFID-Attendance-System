

<?php
session_start();

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

// Function to authenticate user
function authenticateUser($name, $password) {
    global $conn;
    $name = $conn->real_escape_string($name); // Sanitize input to prevent SQL injection
    $password = $conn->real_escape_string($password);

    $query = "SELECT * FROM login WHERE name = '$name' AND password = '$password'";
    $result = $conn->query($query);

    // Log the SQL query for debugging
    error_log("SQL Query: $query");

    if ($result === false) {
        // Log any SQL errors
        error_log("SQL Error: " . $conn->error);
        return 'error';
    }

    // Log the number of rows returned for debugging
    error_log("Number of Rows Returned: " . $result->num_rows);

    if ($result->num_rows > 0) {
        return 'success'; // Authentication successful
    } else {
        return 'failure'; // Authentication failed
    }
}

// Check if POST data is set
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];

        // Authenticate user
        $authenticationResult = authenticateUser($name, $password);

        if ($authenticationResult === 'failure') {
            echo '<script>alert("Invalid name or password. Please try again.");</script>';
        }
        // Redirect or perform other actions based on authentication result

        else if($authenticationResult === 'success')
        {
            $_SESSION['name'] = $name;
            header("Location: profile.php");
        exit();
        }
    }
}

// Close connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFID Attendance System</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url("img2.jpg");
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1; /* Set z-index to move the video behind other content */
        }

        video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .container {
            position: relative;
            z-index: 1;
            margin-top: 50px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        .form-container {
    max-width: 400px;
    margin: 0 auto;
    background-color: 00FFFFFF;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    animation: slideIn 1s ease-in-out;
}


        h1 {
            color: pink; /* Set title color to pink */
        }

        .btn-primary {
            background-color: #FA8072; /* Set button color to pink */
            border-color: pink;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
            }
            to {
                transform: translateY(0);
            }
        }

        /* Add this CSS for button hover effect */
        .btn-primary:hover {
            background-color: #CD5C5C; /* Change to the desired hover color */
            border-color: #FF69B4; /* Change to the desired hover color */
            color: black; /* Change to the desired text color on hover */
        }
    </style>
</head>
<body>
    <div class="video-container">
        <video autoplay muted loop>
            <source src="video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="container">
        <h1 class="text-center mb-4">RFID Attendance System</h1>

        <!-- Login Form -->
        <div class="form-container" id="loginForm">
            <h3 class="mb-3"><font color="#FA8072">Login</font></h3>
            <form action="" method="post"> <!-- Removed onsubmit attribute -->
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="name" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button> <!-- Change type to submit -->
            </form>
        </div>

        <!-- RFID Attendance Form -->
        <form id="attendanceForm" style="display: none;">
            <div class="form-group">
                <label for="rfidNumber">Enter RFID Card Number:</label>
                <input type="text" class="form-control" id="rfidNumber" placeholder="RFID Card Number" required>
            </div>
            <button type="button" class="btn btn-success" onclick="recordAttendance()">Record Attendance</button>
        </form>

        <div id="attendanceResult" class="mt-4"></div>
    </div>

    <script>
        function recordAttendance() {
            var rfidNumber = document.getElementById('rfidNumber').value;
            // Add logic to record attendance using RFID number
            // This is a placeholder, replace it with your actual logic
            alert('Attendance recorded for RFID: ' + rfidNumber);
        }
    </script>

</body>
</html>
