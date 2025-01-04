<?php
$host = "sql310.infinityfree.com"; 
$dbUsername = "if0_38036813"; 
$dbPassword = "Sajidmir"; 
$dbname = "if0_38036813_EDUOPS"; 
//create connection 
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname); 
if (mysqli_connect_error()) 
   { 
      die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error()); 
	  echo"Error Please Try Again";
   } 
?>