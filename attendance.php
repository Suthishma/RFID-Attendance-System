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
            background-color: FFFFFF; /* Set background color to transparent */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: slideIn 1s ease-in-out;
        }

        .btn-primary {
            background-color: black; /* Set button color to black */
            border-color: black; /* Set border color to black */
            color: white; /* Set text color to white */
        }

        /* Custom button hover style */
        .btn-primary:hover {
            background-color: #333; /* Change to the desired hover color */
            border-color: #000; /* Change to the desired hover color */
        }

        body {
            background: #000;
            color: #fff;
            overflow: hidden;
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

        
/* Sidebar */
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

/* Sidebar links */
.sidebar a {
  padding: 10px 15px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* On hover */
.sidebar a:hover {
  color: #f1f1f1;
}

/* Close button */
.closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.table-container {
    max-height: 500px; /* Set the maximum height for the container */
    overflow: auto; /* Add scrollbars when content overflows */
}


    </style>
</head>
<div class="video-container">
        <video autoplay muted loop>
            <source src="video 5.mp4" type="video/mp4">
            
        </video>
    </div>
</head>
<body>
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
  <div class="container">
    
  </div>
</nav>

    

<div class="container mt-5">
    <h1 class="mb-4">Admin Panel</h1>
    <div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Date and Time</th>
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
            // Fetch attendance records from the database
            $query = "SELECT * FROM attendance";
            $result = mysqli_query($conn, $query);
            if ($result) {
                // Display attendance data in table rows
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['datetime'] . "</td>";
                    echo"<td>
                    <form id='deleteForm_".$row['id']."' method='POST' action='deleteid.php'>
                    <input type='hidden' name='id' value='".$row['id']."'>
                    <button type='submit' class='btn btn-danger'>Delete</button>
                </form>

                </td>";
                    echo "</tr>";
                }
            } else {
                // Display error message if query fails
                echo "<tr><td colspan='5'>Error: " . mysqli_error($conn) . "</td></tr>";
            }
            // Close database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
    <button class="btn btn-primary" onclick="printAttendance()">Print Information</button>
</div>
        </div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
   
    function printAttendance() {
        window.print();
    }
</script>


<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>

function printAttendance() {
        window.print();
    }
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
}
</script>


</body>
</html>
