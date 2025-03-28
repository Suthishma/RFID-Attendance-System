<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>
        body {
            background: url("video.mp4") no-repeat center fixed;
            background-size: cover;
            color: white; /* Change the text color to match your video content */
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "rfidattendancesystem"; // Change this to your actual database name
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Fetch student data based on the provided username
    // Fetch student details from the database based on the username
$query = "SELECT * FROM studdetails WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $studdetails = mysqli_fetch_assoc($result);

        // Display student details
        echo '<div class="container">';
        echo '<h1>Student Details</h1>';
        echo '<p>Name: ' . $studdetails['name'] . '</p>';
        echo '<p>Department: ' . $studdetails['department'] . '</p>';
        echo '<p>Address: ' . $studdetails['address'] . '</p>';
        echo '<p>Email Id: ' . $studdetails['email'] . '</p>';
        echo '<p>Phone Number: ' . $studdetails['phonenumber'] . '</p>';
        echo '<p>Photo: ' . $studdetails['photo'] . '</p>';

        // Add more details as needed
        echo '</div>';
    } else {
        echo 'No records found for the given username.';
    }
} else {
    echo 'Error fetching student details: ' . mysqli_error($conn);
}

    ?>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
