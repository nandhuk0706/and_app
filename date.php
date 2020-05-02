<!DOCTYPE html>
<html>
<body>

<?php

$datetime = date("d-m-y");
echo $datetime. "<br>";

echo "The date and time is " .date("d-m-y") . date("h:i:sa")  . "<br>";

$d=strtotime("+1 Months"); 
echo date("Y-m-d h:i:sa", $d) . "<br>";
?>

</body>
</html>