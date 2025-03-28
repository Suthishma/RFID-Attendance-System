<?php
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

// Check if POST data is set
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['email']) && isset($_POST['phonenumber'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];

        // Check if passwords match
        if ($password === $confirm_password) {
            // Insert user data into the 'admin' table
            $sql = "INSERT INTO admin (name, password, email, phonenumber) VALUES ('$name', '$password', '$email', '$phonenumber')";

            // Execute SQL query
            if (mysqli_query($conn, $sql)) {
                // Redirect the user to the login page after successful registration
                header("Location: adminlogin.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn); // Display SQL error, if any
            }
        } else {
            echo "Passwords do not match!";
        }
    } else {
        echo "All fields are required!";
    }
}


// Close connection
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFID Attendance System Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: #000;
            color: #fff;
            overflow: hidden;
        }
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: 00FFFFFF; /* Set background color to transparent */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: slideIn 1s ease-in-out;
        }
        .video-container {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%; 
            min-height: 100%;
            width: auto; 
            height: auto;
            z-index: -1000;
            background: url('your-video-file.mp4') no-repeat;
            background-size: cover;
            -webkit-transition: 1s opacity;
            transition: 1s opacity;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        .content {
            position: relative;
            z-index: 1;
            padding: 20px;
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            color: #000;
        }
        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.7);
            color: #000;
        }
    </style>
</head>
<body>
    <div class="video-container">
        <div class="overlay"></div>
        <!-- Change 'your-video-file.mp4' with your actual video file path -->
        <video autoplay muted loop id="myVideo">
            <source src="video9.mp4" type="video/mp4">
        </video>
    </div>
    
    <div class="content">
        <center><h2> ADMIN REGISTRATION</h2></center>
        <div class="form-container" id="loginForm">
            <form action="adminregistration.php" method="post">
                <div class="form-group">
                    <label for="name">Username:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password"> Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="phonenumber">Phone Number:</label>
                    <input type="phonenumber" id="phonenumber" name="phonenumber" class="form-control" required>
                </div>

                
                <center><button type="submit" class="btn btn-primary">Register</button></center>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
