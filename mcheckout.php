<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LEEP</title>

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
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html"><span>LEEP</span></a>
			</div>
		<!--	<div class="navbar-collapse collapse">							
			<!--	<div class="menu">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="index.html">Home</a></li>
						<li role="presentation"><a href="Aboutus.php">About Us</a></li>
						<li role="presentation"><a href="contact.html">Contact</a></li>
						<li role="presentation"><a href="Product.php">Product</a></li>	
	                    <li role="presentation"><a href="signup.php">Sign up</a></li>
					    <li role="presentation"><a href="login.php">Login</a></li>						
					</ul>
				</div>
			</div>	-->		
		</div>
	</nav>
	
	<?php 
try{
	include 'db_conection.php';
	$method_name=$_SERVER["REQUEST_METHOD"];
	if($_SERVER["REQUEST_METHOD"])
	{

		switch ($method_name) 
		{
		  case 'GET':
		      global $order_id,$cust_id;
		   // $order_id=$_REQUEST['order_id'];
			$cust_id=$_REQUEST['cust_id'];
			$_SESSION["cust_id"] = $cust_id;
		$username = $_POST['TXN_AMOUNT'];
		echo "user data </br></br></br>$username";
		   
		}
		$check_user="INSERT INTO `orders`(`cust_id`, `amount`, `payment_status`) VALUES ($cust_id,0,0)";
        $run=mysqli_query($dbcon,$check_user);
        
        $sql = "SELECT max(order_id) from orders WHERE cust_id=$cust_id";
        $result = mysqli_query($dbcon, $sql);

        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
         //echo  "id: " .$row["max(order_id)"];
         $order_id=$row["max(order_id)"];
         $_SESSION["order_id"] = $order_id;
         
          }
         } else {
         echo "0 results";
          }
            
		//echo json_encode($data);
	}
	else{
		$data=array("status"=>"0","message"=>"Please enter proper request method !! ");
		echo json_encode($data);
	}
	
}
catch(Exception $e) {
	 echo 'Caught exception: ',  $e->getMessage(), "\n";
}


?>
	
	<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Recharge</h3>
                </div>
                         <div class="panel-body">
                    <form role="form" method="post" action="pgRedirect.php">
                   &nbsp  &nbsp   &nbsp  &nbsp   <b>OrderID:  </b>
                     &nbsp  &nbsp  &nbsp  &nbsp<input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $order_id ?>">
                        </br></br>
                        
                 &nbsp  &nbsp  &nbsp  &nbsp   &nbsp  &nbsp<b>CustID: </b>&nbsp  &nbsp  &nbsp  &nbsp
                    <input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $cust_id?>"></br></br>
                &nbsp  &nbsp  &nbsp  &nbsp    &nbsp  &nbsp&nbsp  &nbsp<b>Type: </b>&nbsp  &nbsp  &nbsp  &nbsp
                    <input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></br></br>
                 &nbsp  &nbsp  &nbsp  &nbsp   &nbsp  &nbsp &nbsp  &nbsp &nbsp   <b>Id: </b>&nbsp  &nbsp  &nbsp  &nbsp &nbsp
                    <input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB"></br></br>
                  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<b>Price: </b>&nbsp  &nbsp  &nbsp  &nbsp
                    <input title="TXN_AMOUNT" tabindex="10"  name="TXN_AMOUNT" value="<?php echo 1 ?>"readonly></br></br>
                   
                    &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp  <input value="CheckOut" type="submit">
                    </form>
                   <!-- <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

	<footer>
		<div class="inner-footer">
			<div class="container">
				<div class="row">
					<!--<div class="col-md-4 f-about">
						<a href="index.html"><h1><span>Encompass Compute</span></h1></a>
						<p>Encompass Compute is a two decade old company with in-depth knowledge
						and expertise in power electronics, EDA and  embedded domain. 
						The company is run by a group of professionals who are very strong  in  
						fundamentals  of  engineering and physical sciences, offering global solutions
						with knowledge and technology as the base.
						</p>
					</div>
					<div class="col-md-4 l-posts">
						<h3 class="widgetheading">Latest Posts</h3>
							<ul>
							<li><a href="https://www.youtube.com/watch?v=KYe81tfbxj8">https://www.youtube.com/watch?v=KYe81tfbxj8</a></li>
							<!--<li><a href="#">Awesome features are awesome</a></li>
							<li><a href="#">Create your own awesome startup</a></li>
							<li><a href="#">Wow, this is fourth post title</a></li>
						</ul>
					</div>
					<div class="col-md-4 f-contact">
						<h3 class="widgetheading">Stay in touch</h3>
						<a href="#"><p><i class="fa fa-envelope"></i> ramanujan@vget.org</p></a>
						<p><i class="fa fa-phone"></i>9360309098 </p>
						<p><i class="fa fa-home"></i> Encompass Compute PVT LTD 414/B,Rangopandith Agraharam ,Hosur-635109
							 <br>
							Tamil Nadu, Ind</p>
					</div>-->
				</div>
			</div>
		</div>
			
		<div class="last-div">
			<div class="container">
				<div class="row">
					<div class="copyright">
						Â© 2018 LEEP Technologies | <a target="_blank" href="http://www.encompasscompute.com/">LEEP Technologies</a> | <a href="pp.php">Privacy Policy </a>|<a href="tc.php"> Terms & Conditions  </a> | <a href="rrc.php">Refund & Cancellation Policy</a>
					</div>		
                    <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=eNno
                    -->			
				</div>
			</div>
			<div class="container">
				<div class="row">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-1x"></i></a></li>
					</ul>
				</div>
			</div>
		</div>			
	</footer>
	
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