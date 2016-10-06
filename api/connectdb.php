<?php
 $host = 'localhost';
 $username = 'u955032739_sport';
 $password = 'nice.18511';
 $database =  'u955032739_sport';
 $con = mysqli_connect($host,$username,$password,$database);
 if (mysqli_connect_errno())
  {
  	echo "Failed to connect to Database: " . mysqli_connect_error();
  }
  $con->query("SET NAMES UTF8");
?>
