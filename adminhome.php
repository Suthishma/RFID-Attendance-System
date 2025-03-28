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
  background-image: url("img10.jpg");
  min-height: 880px;
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

/* Top navigation */
.topnav {
  overflow: hidden;
  background-color: transparent;
  top: 20px; /* Adjust as needed */
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

<!-- <div class="video-container">
  <video autoplay muted loop>
    <source src="video 4.mp4" type="video/mp4">
  </video>
</div> -->

<div class="bg-img"></div>

<!-- Sidebar -->
<div class="sidebar" id="mySidebar">

  <a href="signout.php">Sign Out</a>
  <a href="contact.php">CONTACT US</a>
  <a href="pages html mini\about us.php">ABOUT US</a>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
</div>

<!-- Top navigation -->
<nav class="navbar navbar-light bg-transparent">
  <button class="navbar-toggler" type="button" onclick="openNav()">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="container">
    <div class="topnav">
      <a href="adminlogin.php">ADMIN LOGIN</a>
      <a href="adminregistration.php">ADMIN REGISTRATION</a>
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
