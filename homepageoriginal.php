<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
  overflow: hidden; /* To hide scrollbars */
  max-height: 100vh;
  overflow-y: auto;
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
  background-image: url("img.jpg");
  min-height: 680px;
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

/* Sidebar */
.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:  white;;
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
.sidebar a:hover {
  color: #f1f1f1;
}

/* On hover */
.sidebar a:hover {
  color: blue;
}
.navbar-toggler-icon {
  background-color: white; /* This line changes the color */
}

/* Close button */
.closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.topnav {
            overflow: hidden;
            background-color: transparent;
            top: 20px; /* Adjust as needed */
            right: 20px;
            position: absolute; /* Adjust positioning as needed */
            z-index: 1000; /* Ensure it's above other content */
        }
        
        /* Navbar links */
        .topnav a {
            float: left;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        
        .topnav a:hover {
            background-color: transparent;
            opacity: 0.3;
            color: transparent;
        }

        /* CSS for the LOGIN and REGISTRATION links */
        .topnav-links a {
            color: white;
            text-decoration: none;
            font-size: 17px;
            margin-right: 50px; /* Add horizontal spacing between the links */
        }

        /* Hover styles for the links */
        .topnav-links a:hover {
            background-color: transparent;
            opacity: 0.3;
            color: transparent;
        }

        /* CSS to center the topnav-links container */
        .topnav-links {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 100px;
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

/* Top navigation */
.topnav {
  overflow: hidden;
  background-color: transparent;
  top: 20%; /* Adjust as needed */
  right: 20px;
}

/* Navbar links */
.topnav a {
  float: left;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  
}

.topnav a:hover {
  background-color: transparent;
  opacity: 0.3;
  color: transparent;
}

/* CSS to center the topnav-links container */
.topnav-links {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 100px;
  
}

/* CSS for the LOGIN and REGISTRATION links */
.topnav-links a {
  color: white;
  text-decoration: none;
  font-size: 17px;
  margin-right:  50px; /* Add horizontal spacing between the links */
}

/* Hover styles for the links */
.topnav-links a:hover {
  background-color: transparent;
  opacity: 0.3;
  color: transparent;
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

<div class="video-container">
  <video autoplay muted loop>
    <source src="video 2.mp4" type="video/mp4">
  </video>
</div>



<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<a href="adminhome.php">Admin Home</a>
  <!-- <a href="adminlogin.php">Admin Login</a>
  <a href="adminregistration.php">Admin Registration</a> -->
  <a href="contact.php">CONTACT US</a>
  <a href="aboutus.html">ABOUT US</a>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
</div>

<!-- Top navigation -->
<nav class="navbar navbar-light bg-transparent">
  <button class="navbar-toggler" type="button" onclick="openNav()">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="container">
  <div class="topnav-links">
      <a href="login.php"><b>LOGIN<b></a>
      <a href="registration.php">REGISTRATION</a>
    </div>
  </div>
</nav>

<div class="container">
  <div class="hero-text">
    <h1 style="font-size:70px">RFID ATTENDANCE SYSTEM</h1>
    <h3 style="font-size:30px"></h3>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
}
</script>

</body>
</html>
