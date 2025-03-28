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
  margin: 20px;
  left: 500px;
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
  position: absolute;
  top: 20px;
  right: 20px;
}

/* Navbar links */
.topnav ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.topnav li {
  margin-bottom: 10px;
}

.topnav a {
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  opacity: 0.3;
}

/* User Details and Attendance Details section */
.details-section {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.details-section h2 {
  font-size: 40px;
  margin-bottom: 20px;
}

.details-section p {
  font-size: 18px;
  color: #666;
  margin-bottom: 10px;
}

.details-table {
  width: 80%;
  margin: 0 auto;
}

.details-table th, .details-table td {
  padding: 10px;
}

.details-table th {
  background-color: #f0f0f0;
}

.details-table td {
  text-align: center;
  vertical-align: middle;
}

.centered-button {
  text-align: center;
}

</style>

</head>
<body>

<div class="video-container">
  <video autoplay muted loop>
    <source src="video11.mp4" type="video/mp4">
  </video>
</div> 

<div class="bg-img"></div>


<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
  <a href="signout.php">Sign Out</a>
  <a href="adminhome.php">HOME</a>
  <a href="contact.php">CONTACT US</a>
  <a href="pages html mini\about us.php">ABOUT US</a>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
</div>


<!-- Top navigation -->
<nav class="navbar navbar-light bg-transparent">
  <button class="navbar-toggler" type="button" onclick="openNav()">
    <span class="navbar-toggler-icon"></span>
  </button>
  
</nav>
<div class="container">
  <div class="hero-text">
     <h1 style="font-size:70px">ADMIN PANEL</h1> 
    <h3 style="font-size:30px"></h3>
  </div>
</div>

<!-- User Details and Attendance Details section -->
<div class="details-section">
  <table class="table details-table">
    <thead>
      <tr>
        <th colspan="2">User Details</th>
      </tr>
    </thead>
    <tbody>
      <tr>
       
        <td>Here you can view and manage user details.</td>
      </tr>
      <tr class="centered-button">
        <td colspan="2"><a href="userdetails.php" class="btn btn-primary">View User Details</a></td>
      </tr>
    </tbody>
  </table>
  
  <table class="table details-table">
    <thead>
      <tr>
       <th colspan="2">Attendance Details</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        
        <td>Here you can view and manage attendance details.</td>
      </tr>
      <tr class="centered-button">
        <td colspan="2"><a href="attendance.php" class="btn btn-primary">View Attendance Details</a></td>
      </tr>
   

      </tbody>
  </table>
</div>

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

