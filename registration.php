<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BMS</title>

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
				<a class="navbar-brand" href="index.html"><span>BMS</span></a>
			</div>
			<div class="navbar-collapse collapse">							
				<div class="menu">
				<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="index.html">Home</a></li>
						<li role="presentation"><a href="Aboutus.php">About Us</a></li>
						<li role="presentation"><a href="contact.html">Contact</a></li>
						<li role="presentation"><a href="Product.php">Product</a></li>	
	                    <li role="presentation"><a href="registration.php">Sign up</a></li>
					    <li role="presentation"><a href="login.php">Login</a></li>						
					</ul>
				</div>
			</div>			
		</div>
	</nav>
	
	<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Registration</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="name" type="text" autofocus>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                            </div>
							
							 <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
							
							 <div class="form-group">
                                <input class="form-control" placeholder="Mobile" name="mobile" type="tel" value="" >
                            </div>



                            <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="register" >

                        </fieldset>
                    </form>
                    <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

<?php

include("db_conection.php");//make connection here
if(isset($_POST['register']))
{
    $user_name=$_POST['name'];//here getting result from the post array after submitting the form.
    $user_pass=$_POST['pass'];//same
    $user_email=$_POST['email'];//same
	$user_mobile=$_POST['mobile'];//same


    if($user_name=='')
    {
        //javascript use for input checking
        echo"<script>alert('Please enter the name')</script>";
exit();//this use if first is not work then other will not show
    }

    if($user_pass=='')
    {
        echo"<script>alert('Please enter the password')</script>";
exit();
    }

    if($user_email=='')
    {
        echo"<script>alert('Please enter the email')</script>";
    exit();
    }
	    if(!preg_match('/^[0-9]*$/', $user_mobile))
    {
        echo"<script>alert('Please enter Valid Mobile Number')</script>";
    exit();
    }
//here query check weather if user already registered so can't register again.
    $check_email_query="select * from users WHERE user_email='$user_email'";
    $run_query=mysqli_query($dbcon,$check_email_query);

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";
exit();
    }
//insert the user into the database.
    $insert_user="insert into users (user_name,user_pass,user_email,user_mobile) VALUE ('$user_name','$user_pass','$user_email','$user_mobile')";
    if(mysqli_query($dbcon,$insert_user))
    {
          echo"<script>window.open('login.php','_self')</script>";
    }

}

?>
	<footer>
		<div class="inner-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 f-about">
						<a href="index.html"><h1><span>Encompass Electronics</span></h1></a>
						<p>Encompass Electronics is a two decade old company with in-depth knowledge
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
							<li><a href="#">Wow, this is fourth post title</a></li>-->
						</ul>
					</div>
						<div class="col-md-4 f-contact">
						<h3 class="widgetheading">Stay in touch</h3>
						<a href="#"><p><i class="fa fa-envelope"></i> ramanujan@vget.org</p></a>
						<p><i class="fa fa-phone"></i>9360309098 </p>
						<p><i class="fa fa-home"></i> Encompass Electronics PVT LTD 414/B,Rangopandith Agraharam ,Hosur-635109
							 <br>
							Tamil Nadu, Ind</p>
					</div>
				</div>
			</div>
		</div>
			
		<div class="last-div">
			<div class="container">
				<div class="row">
					<div class="copyright">
						© 2018 Encompass Electronics | <a target="_blank" href="http://encompassindia.com/">Encompass Electronics</a> | <a href="pp.php">Privacy Policy </a>|<a href="tc.php"> Terms & Conditions  </a> | <a href="rrc.php">Refund & Cancellation Policy</a>
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