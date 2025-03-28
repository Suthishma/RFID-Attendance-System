<?php
// Establish database connection
$servername = "localhost";
$username = "username"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "rfidattendancesystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Insert data into database
    $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
    
    // Execute SQL query
    $conn->query($sql);
}

// Close database connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* Basic CSS styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image : url('img6.jpg');
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: FFFFFF;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .contact-info {
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }
        .contact-info h3 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .contact-info p {
            margin-bottom: 5px;
            font-size: 16px;
            color: #555;
        }
        .contact-info a {
            color: #007bff;
            text-decoration: none;
        }
        .contact-info a:hover {
            text-decoration: underline;
        }
        form {
            margin-top: 30px;
        }
        label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            float: right;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="contact-info">
            <h3>Contact Information</h3>
            <p>Email: <a href="mailto:organization@example.com">organization@example.com</a></p>
            <p>Phone: 0475 2233456</p>
            <p>Address: 123 Main Street, City, Country</p>
            <p>Website: <a href="http://www.organization.com">www.organization.com</a></p>
        </div>
        <h2>Contact Us</h2>
        <form action="" method="post" onsubmit="return showMessage()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        function showMessage() {
            alert("Message sent successfully!");
            return true; // To allow form submission
        }
    </script>
</body>
</html>
