<?php
session_start();

if(!isset($_SESSION["username"])){
  // if session variable 'username'is not set
	//redirect to login page
  header("Location: login.php");
  exit(); }

?>
