<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
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
            background-color: FFFFFF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: slideIn 1s ease-in-out;
        }

        .btn-primary {
            background-color: black;
            border-color: black;
            color: white;
        }

        .btn-primary:hover {
            background-color: #333;
            border-color: #000;
        }

        body {
            background: #000;
            color: #fff;
            overflow: hidden;
            max-height: 100vh;
            overflow-y: auto;
        }

        .content {
            padding: 20px;
        }

        .table {
            color: #000;
        }

        .table th {
            background-color: #212529;
            color: #fff;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.05);
        }
        .table-container {
            max-height: 400px; /* Set the maximum height for the container */
            overflow: auto; /* Add scrollbars when content overflows */
        }


        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
    </style>
</head>
<body>
    <div class="video-container">
        <video autoplay muted loop>
            <source src="video 5.mp4" type="video/mp4">
        </video>
    </div>

    <div class="sidebar" id="mySidebar">
        <a href="signout.php">Sign Out</a>
        <a href="adminpanel.php">HOME</a>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    </div>

    <!-- Top navigation -->
    <nav class="navbar navbar-light bg-transparent">
        <button class="navbar-toggler" type="button" onclick="openNav()">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container"></div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Admin Panel</h1>
        <div class="container mt-5 table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="attendanceTable">

                <?php
                // Include database connection file
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "rfidattendancesystem";
                $conn = mysqli_connect($servername, $username, $password, $database);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                // Fetch user records from the database
                $query = "SELECT * FROM login";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    // Display user data in table rows
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phonenumber'] . "</td>";
                        echo "<td><img src='uploads/" . $row['photo'] . "' alt='User Photo' style='max-width: 100px; max-height: 100px;'></td>";
                        echo "<td>
                                <form id='deleteForm_".$row['name']."' method='POST' action='delete_record.php'>
                                    <input type='hidden' name='name' value='".$row['name']."'>
                                    <button type='submit' class='btn btn-danger'onclick='return confirmDelete()'>Delete</button>
                                </form>
                            </td>";
                        echo "</tr>";
                    }
                } 
                // Close database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <button class="btn btn-primary" onclick="printAttendance()">Print Information</button>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function confirmDelete() {
        return confirm("Are you sure you want to delete this user?");
    }

    
    // Function to print attendance information
    function printAttendance() {
        window.print();
    }

    // Function to open sidebar
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
    }

    // Function to close sidebar
    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
    }
    </script>
</body>
</html>
