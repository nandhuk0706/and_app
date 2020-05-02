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

	    	$check_user="select * from table6 WHERE cust_id ='$client_id'";
	    	$run=mysqli_query($dbcon,$check_user);

            if(mysqli_num_rows($run))
            {
                $qry = "select * from table6 WHERE cust_id ='$client_id'";
			//	$data=array("status"=>"1","message"=>"success","result"=>"Product add successfully");
				$result=mysqli_query($dbcon, $qry);
				while ($row=mysqli_fetch_row($result))
			    {
				$temp_cat = array("client_id"=>$row[0],"order_id"=>$row[1],"gps_lat"=>$row[2],"gps_long"=>$row[3]);
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