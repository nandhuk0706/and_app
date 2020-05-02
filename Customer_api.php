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
		  
			 $admin_name=$_REQUEST['admin_name'];
			$admin_pass=$_REQUEST['admin_pass'];
			//$qty=$_REQUEST['qty'];
			//$qry="SELECT * from product";
			
			
	    	$check_user="select * from admin WHERE admin_name='$admin_name'AND admin_pass='$admin_pass'";
	    	$run=mysqli_query($dbcon,$check_user);

            if(mysqli_num_rows($run))
            {
                $qry = "select * from customers";
			//	$data=array("status"=>"1","message"=>"success","result"=>"Product add successfully");
				$result=mysqli_query($dbcon, $qry);
				$dbdata = array();
				$json_response = array();
				while ($row=mysqli_fetch_row($result))
			    {
			      $dbdata['ID'] = $row[0];
			      $dbdata['Fname'] = $row[1];
			      $dbdata['Vehicle'] = $row[4];
			      $dbdata['Location'] = $row[5];
		//	$dbdata[]=$row;
		array_push($json_response,$dbdata);  
		
			    }
			    
                 $data=$dbdata;

                }
                
             
            else
             {
                $data=array("message"=>"success","result"=>"Something wrong!!!","status"=>"0");   
                }

		}
//	echo json_encode($data);
	echo json_encode($json_response);  
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