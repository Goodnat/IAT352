<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
<?php

$servername="localhost";
$username="root";
$password="";
$dbname="pengyu_li";

$conn=new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
 	 die("Connection failed: " . $conn->connect_error);
 }

?>
