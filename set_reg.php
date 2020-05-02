<?php

session_start();

$_SESSION['regName'] = $Nandhu;
$dbconnect=mysql_connect("localhost","root","")
$db =mysql_select_db("welcome",$dbconnect);

?>

<form method="get" action="get_reg.php">
    <input type="text" name="regName" value="">
    <input type="submit">
</form>


