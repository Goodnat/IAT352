<?php
session_start();

if(isset($_SESSION["username"])){
  // if session variable 'username'is set 
  //redirect to members page
  header("Location: membersLogin.php");
  exit(); }

?>
