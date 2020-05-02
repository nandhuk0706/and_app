<?php 
try{
	include('db_conection.php');
	$method_name=$_SERVER["REQUEST_METHOD"];
	if($_SERVER["REQUEST_METHOD"])
	{

		switch ($method_name) 
		{
		  case 'GET':
		   // $user_email=$_REQUEST['user_name'];
		//	$user_pass=$_REQUEST['pass'];
			//$qty=$_REQUEST['qty'];
			//$qry="SELECT * from product";
			
			
	    //	$check_user="select * from users WHERE user_email='$user_email'AND user_pass='$user_pass'";
			
		//	if(mysqli_query($conn, $check_user))
		//	{
			   // $qry = "select * from product WHERE product_id='$qty'";
			//	$data=array("status"=>"1","message"=>"success","result"=>"Product add successfully");
				//$result=mysqli_query($conn, $qry);
				//while ($row=mysqli_fetch_row($result))
			    //{
				//$temp_cat[]=array("product_id"=>$row[0],"product_name"=>$row[1],"product_price"=>$row[2]//,"product_qty"=>$row[3],"status"=>"1","message"=>"success");
			    //}
			  //  $data=$temp_cat;
			   // break;
		//	}
			

			
			
		  case 'POST':
		  
			 $user_email=$_REQUEST['user_name'];
			$user_pass=$_REQUEST['pass'];
			//$qty=$_REQUEST['qty'];
			//$qry="SELECT * from product";
			
			
	    	$check_user="select * from customers WHERE email='$user_email'AND password='$user_pass'";
	    	$run=mysqli_query($dbcon,$check_user);

            if(mysqli_num_rows($run)&& $user_email !='')
            {
                $qry = "select * from customers WHERE email='$user_email'AND password='$user_pass'";
			//	$data=array("status"=>"1","message"=>"success","result"=>"Product add successfully");
				$result=mysqli_query($dbcon, $qry);
				while ($row=mysqli_fetch_row($result))
			    {
				$temp_cat = array("id"=>$row[0],"user_name"=>$row[1],"Email"=>$row[3],"status"=>"1","message"=>"1");
			    }
			  
                 $data=$temp_cat;
			   break;

                }
            else
             {
                $data=array("message"=>"success","result"=>"Something wrong!!!","status"=>"0");   
                }
		 // case 'PUT':
		//	$id=$_REQUEST['product_id'];
		//	$name=$_REQUEST['product_name'];
		//	$price=$_REQUEST['product_price'];
		//	$qty=$_REQUEST['product_qty'];
		//	$qry="UPDATE product SET product_name='".$name."', product_price='".$price."',product_qty='".$qty."' where product_id='".$id."' ";
		//	if(mysqli_query($conn, $qry))
		//	{
			//	$data=array("status"=>"1","message"=>"success","result"=>"Product Update successfully");
		//	}
		//	else{
		//		$data=array("status"=>"1","message"=>"success","result"=>"Something wrong!!!");
		//	}
		//	break;
			
		  //case 'DELETE':
			//$id=$_REQUEST['product_id'];
		//	$qry="delete from product where product_id='".$id."'";
		//	if(mysqli_query($conn, $qry))
		//	{
			//	$data=array("status"=>"1","message"=>"success","result"=>"Product Update successfully");
		//	}
			//else{
			//	$data=array("status"=>"1","message"=>"success","result"=>"Something wrong!!!");
		//	}
			//break;
		}
		echo json_encode($data);
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