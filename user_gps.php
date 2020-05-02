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
		  
			 $cust_id=$_REQUEST['cust_id'];
		
                $qry = "select * from user_info WHERE cust_id='$cust_id'";
				$result=mysqli_query($dbcon, $qry);
				while ($row=mysqli_fetch_row($result))
			    {
				$temp_cat = array("id"=>$row[1],"user_voltage"=>$row[2],"user_lat"=>$row[3],"user_long"=>$row[4]);
			    }
			  
                 $data=$temp_cat;
			   break;

                
         
	
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