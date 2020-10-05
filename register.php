<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<title>Registration</title>
	<!-- Boostrap css file-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<!-- font awesome icon-->
	<link rel="stylesheet" type="text/css" href="css/all.min.css">

	<!-- main css -->
	<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
</head>

<body class="register">
	<?php
	require('db.php');
	if (isset($_REQUEST['username'])) {
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($conn, $username);
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($conn, $email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn, $password);
		$trn_date = date("Y-m-d H:i:s");
		$sql = "INSERT into `users` (username, password, email, trn_date)
	VALUES ('$username', '" . md5($password) . "', '$email', '$trn_date')";
		$result = $conn->query($sql);
		if ($result) {
			echo "<div class='form'>
		<h3>You are registered successfully.</h3>
		<br/>Click here to <a class='login' href='login.php'>Login</a></div>";
		}
	} else {
	?>


		<div class="form">
			<h1>Registration</h1>
			<form name="registration" action="" method="post">
				<input type="text" name="username" placeholder="Username" required />
				<input type="email" name="email" placeholder="Email" required />
				<input type="password" name="password" placeholder="Password" required />
				<input type="submit" name="submit" value="Register" />
			</form>
		</div>
	<?php } ?>
	
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