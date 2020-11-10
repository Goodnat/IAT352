<!-- This page is used to check if there is an active session  -->
<!-- if there is no active session, user is not logged in, redirect user to login page-->


<?php
session_start();

if(isset($_SESSION["username"])){
  // if session variable 'username'is set 
  //redirect to members page
  header("Location: membersLogin.php");
  exit(); }

?>
