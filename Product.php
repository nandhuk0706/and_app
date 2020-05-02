<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LeeP eDrive</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link href="css/overwrite.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/set1.css" />
	<link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
    .login-panel {
        margin-top: 150px;

</style>
  </head>
  <body>
	<?php include 'header.php';?>
	
	<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    
        <br/>
        <br/>
         <br/>
        <br/>
         <br/>
        <br/>
        <a href="index.html"><h1><span>LEEP</span></h1></a>
        We now offer complete Electric vehicle Lithium-ion Battery storage Control System for EV systems from 1KW to 15KW powertrain for Electric Vehicle at Rs.396.
        <br>
        <br>
        <br>
        <div class="img-responsive">
									
			<img src="img/IMG-20180723-WA00078.jpg" alt=""/>
			<pstyle="margin-left:30px;font-size: 15px;"><b>Chargable Lithum EV Battery For Electric Auto</b>
			<style>
.dropbtn {
    background-color: #3498DB;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
   
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #2980B9;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

</style>


<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">Recharge</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="mcheckout.php">1Cycle-396</a>
    <a href="mcheckout1.php">2Cycles-792</a>
    <a href="mcheckout2.php">3Cycles-1176</a>
    <a href="mcheckout3.php">5Cycles-1960</a>
  </div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

			<!--<img src="img/image2.jpg" alt=""/>-->
			
				</div> <br>
				<!--<p style="color:green;font-size: 20px;"><i>₹396 PerCharge</i></p>
        
        
         <a href="mcheckout.php" class="btn btn-info" role="button">Recharge</a></p>
     
    -->
</div>
<br>
<br>
<meta name="viewport" content="width=device-width, initial-scale=1">

</body>

</html>

	<?php include 'footer.php';?>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script src="js/functions.js"></script>
	<script type="text/javascript">$('.portfolio').flipLightBox()</script>
  </body>
</html>