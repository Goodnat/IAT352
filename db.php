<!--This file is used to connect to the database-->
<?php

$servername="localhost";
$username="root";
$password="";
$dbname="Eshop";

$conn=new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
 	 die("Connection failed: " . $conn->connect_error);
 }

?>
