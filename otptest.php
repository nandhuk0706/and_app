
<?php 
try{
	include 'db_conection.php';
	$method_name=$_SERVER["REQUEST_METHOD"];
	if($_SERVER["REQUEST_METHOD"])
	{

		switch ($method_name) 
		{
		  case 'GET':
		      global $otp;
		      
		   // $order_id=$_REQUEST['order_id'];
	    	//$otp=$_REQUEST['otp'];
		//	$_SESSION["otp"] = $otp;
			
		
		   
		}
	$sql = "SELECT otp FROM otp_test1";
    $result = mysqli_query($dbcon, $sql);
    
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo  $row["otp"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
//     while ($row = $result->fetch_assoc()) {
//     echo $row['classtype']."<br>";
// }
	echo "the number is:$result <br>";
	}
}
catch(Exception $e) {
	 echo 'Caught exception: ',  $e->getMessage(), "\n";
}


?>