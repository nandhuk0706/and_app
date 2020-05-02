<!--
//
// $timestamp = date("d-m-Y - H:i:s");
// $datastring = $_POST["params"];
// $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
// $txt = $timestamp . " - ".$datastring."\n";
// fwrite($myfile, $txt);
// fclose($myfile);
// echo $txt;
// ?>
-->
<?php 
try{
	include 'db_conection.php';
	$method_name=$_SERVER["REQUEST_METHOD"];
		if($_SERVER["REQUEST_METHOD"])
	{

		switch ($method_name) 
		{
		  case 'GET':
			$qry="SELECT * from table6";
			$result=mysqli_query($conn, $qry);
			
			while ($row=mysqli_fetch_row($result))
			{
				$temp_cat=$_POST["params"];
				//$temp_cat = str_replace('\"', '', $temp_cat);
			}

			$data=$temp_cat;
			break;
			
		  
		}
		echo $data;
	}
	else{
		$data=array("status"=>"0","message"=>"Please enter proper request method !! ");
		echo json_encode($data);
	}
	
// 	if($_SERVER["REQUEST_METHOD"])
// 	{
// 	    $qry="SELECT * from table6";
// 	    $timestamp = date("d-m-Y - H:i:s");
//         $datastring = $_POST["params"];
//         $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
//         $txt = $timestamp . " - ".$datastring."\n";
//         fwrite($myfile, $txt);
//         fclose($myfile);
//         echo $txt;
// 	}

}
catch(Exception $e) {
	 echo 'Caught exception: ',  $e->getMessage(), "\n";
}


?>