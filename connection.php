<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "tms";


try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
	echo"connected succesfully";
}
catch(PDOException $e){
	echo $e->getMessage();
}


?>