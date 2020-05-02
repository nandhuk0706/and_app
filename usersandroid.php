<?php 
try{
	include('db_conection.php');
	$method_name=$_SERVER["REQUEST_METHOD"];
	if($_SERVER["REQUEST_METHOD"])
	{

		switch ($method_name) 
		{
		  case 'GET':


			
			
		  case 'POST':
		  
			 $client_id=$_REQUEST['client_id'];

	    	$check_user="select * from admin WHERE cust_id ='$client_id'";
	    	$run=mysqli_query($dbcon,$check_user);

            if(mysqli_num_rows($run))
            {
                $qry = "select * from admin WHERE cust_id ='$client_id'";
			//	$data=array("status"=>"1","message"=>"success","result"=>"Product add successfully");
				$result=mysqli_query($dbcon, $qry);
				while ($row=mysqli_fetch_row($result))
			    {
				$temp_cat = array("client_id"=>$row[0],"admin_name"=>$row[1],"admin_pass"=>$row[2],"admin_email"=>$row[3]);
			    }
                 $data=$temp_cat;
			   break;

                }
            else
             {
                $data=array("message"=>"success","result"=>"Something wrong!!!","status"=>"0");   
                }

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