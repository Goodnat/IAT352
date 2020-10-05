<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<title>Dashboard - Secured Page</title>
	<!-- Boostrap css file-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<!-- font awesome icon-->
	<link rel="stylesheet" type="text/css" href="css/all.min.css">

	<!-- main css -->
	<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
</head>

<body class="register">
	<div class="form">
		<p>Dashboard</p>
		<p><a class='log' href="index.php">Home</a></p>
		<a class='log' href="logout.php">Logout</a>
	</div>
	
    <!-- Jquery js file-->
    <script src="js/jquery.3.5.1.js"></script>

    <!-- Boostrap js file-->
    <script src="js/bootstrap.min.js"></script>

    <!--  my js file  -->
    <script src="js/product.js"></script>

    <!--  isotope js library  -->
    <script src="js/isotope.min.js"></script>
</body>

</html>