<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<title>Login</title>
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
	session_start();
	if (isset($_POST['username'])) {
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($conn, $username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn, $password);
		$sql = "SELECT * FROM `users` WHERE username='$username'
	and password='" . md5($password) . "'";
		$result = $conn->query($sql) or die($conn->connect_error);
		$rows = mysqli_num_rows($result);
		if ($rows == 1) {
			$_SESSION['username'] = $username;
			header("Location: index.php");
		} else {
			echo "<div class='form'>
	<h3>Username/password is incorrect.</h3>
	<br/>Click here to <a class='log' href='login.php'>Login</a></div>";
		}
	} else {
	?>
		<div class="form">
			<h1>Log In</h1>
			<form action="" method="post" name="login">
				<input type="text" name="username" placeholder="Username" required />
				<input type="password" name="password" placeholder="Password" required />
				<input name="submit" type="submit" value="Login" />
			</form>
			<p>Not registered yet? <a href='register.php'>Register Here</a></p>
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