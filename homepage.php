<?php
error_reporting(0);
?>


<!DOCTYPE html>
<html>

<head>

   


	<meta name="viewport"
		content="width=device-width, initial-scale=1">
	<style>
		body {
			height: 100%;
			font-family: Arial, sans-serif;
		}
		
		* {
			box-sizing: border-box;
		}
		

    

.bg-img {
  /* The image used */
  background-image: url("rfidbg-transformed.jpeg");

  min-height: 685px;
min-width:34px;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
		h1 {
			position: relative;
			text-align:left;
			color:#4d1933;
			-webkit-text-stroke: 1px;
			float: left;
             width: 100%;
			 margin-top: 10px;
			 top: 50px;
			 left: 150px;
		}
		
		
		
	
		/* Styling the form container */
		b {
			color: white;
			font-size:16px;
			-webkit-text-stroke: 1px white;
		}
	
		/* Full-width input */
		input[type=text],
		input[type=password] {
			width: 100%;
			padding: 15px;g
			margin: 15px ;
			border: 1px maroon;
            background-color: #F5F5F5;
		}
		

	
		/* Styling the submit button */
		.button {
			position: relative;
			background-color: #483D8B;
			color: white;
			padding: 16px 6px;
			border: none;
			cursor: pointer;
			width: 100%;
			top: 50px;
			right: -50px;
		}
		
		.button:hover {
			transform: scale(1.1);
			transition: transform 0.3s;
		}

       
/* Add padding to containers */
.container {
  padding: 46px;
  text-align: left;
  float: left;
  width: 100%;
}

/* The "Forgot passwordword" text */
span.psw {
  float: center;
  padding-top: 16px;
}


	</style>
</head>

<body>


    
				



	<div class="bg-img">
        <br><br>
		<h1 style="font-size: 20; color: white;">LOGIN</h1>
		<center>
		<form  name="myForm" class="container" action=""  method="post">
                
     
             
			<br><br><br><br><br>
             
                        
                          <b>USERNAME  :</b>
			<input type="text"  placeholder="Username Please"
                      name="username" style="width: 200px;" required ><br><br><br>

			<b>PASSWORD  :</b>
			<input type="password"  placeholder="Enter password" name="password"  style="width: 200px;"required>
                         <br>
                        <br>	


			<a href="cc.php"><button type="submit" class="button" style="width: 200px;">Login</button></a><br><br>
             <a href=""><button type="cancel" class="button" value="cancel" style="width: 200px;">Cancel</button></td>
             <?php $pagename = "create0.php"; ?>

           <?php $pagename = basename($_SERVER['PHP_SELF']); ?>
              <a<?php if ($pagename == 'forget.php') {echo ' class="current"';} ?> href="forget.php"></a></li>
                 

           <a<?php if ($pagename == 'logintry.php') {echo ' class="current"';} ?> href="create0.php"></a></li>
		   
                 
		</form>
</center>
	</div>
                </body>

            </html>


			
<?php