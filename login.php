<!--This page is designed as log in page-->
<!--After user sucessfully register, the website wil turn to this page-->
<!--If the user enter the right user name and password, show successfully log in-->
<!--If the user enter the wrong information, show fail to log in-->
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

<body>
	<header class="header_area">
		<!-- code source from https://getbootstrap.com/docs/4.5/components/navbar/ -->
		<div class="main-menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<h1><a class="logo" href="index.php">ESHOP</a></h1>
				<!--logo -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<div class="mr-auto"></div>
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Shop</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="login.php">Account</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="cart.php">Cart</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>



	<?php
	require('db.php');
	session_start();
	if (isset($_POST['username'])) {
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($conn, $username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn, $password);

		//check if the username in the database
		//check if the user enters the right password
		$sql = "SELECT * FROM `users` WHERE username='$username'
	and password='" . md5($password) . "'";
		$result = $conn->query($sql) or die($conn->connect_error);
		$rows = mysqli_num_rows($result);

		//if row equal 1 means user does exist
		if ($rows == 1) {
			$_SESSION['username'] = $username;
			header("Location: index.php");
		} else {

			//else means user enters the wrong username or password
			echo "<div class='form'>
	<h3>Username/password is incorrect.</h3>
	<br/>Click here to <a href='login.php'>Login</a></div>";
		}
	}
	?>


	<div class="form register container mx-auto my-5">
		<h1>Log In</h1>
		<form action="" method="post" name="login">
			<input type="text" name="username" placeholder="Username" required />
			<input type="password" name="password" placeholder="Password" required />
			<input name="submit" type="submit" value="Login" />
		</form>
		<p>Not registered yet? <a href='register.php'>Register Here</a></p>
	</div>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-6">
					<div class="row ">
						<div class="col-6">

							<div class="text">
								<h5>ERSHOP</h5>
                                <ul class="list-unstyled text-small">
                                    <li><a class="text-muted" href="index.php">Home</a></li>
                                    <li><a class="text-muted" href="index.php">Shop</a></li>
                                    <li><a class="text-muted" href="login.php">Account</a></li>
                                    <li><a class="text-muted" href="cart.php">Cart</a></li>
                                </ul>
							</div>
						</div>
						<div class="col-6">
							<div class="text">
								<h5>Services</h5>
								<ul class="list-unstyled text-small">
									<li><a class="text-muted" href="login.php">Login</a></li>
									<li><a class="text-muted" href="login.php">Register</a></li>
									<li><a class="text-muted" href="login.php">My Cart</a></li>
									<li><a class="text-muted" href="login.php">Checkout</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 text-center">
					<div class="row ">
						<div class="col-6">
						</div>
						<div class="col-6">
							<div class="social text">
								<h5>Contact</h5>
								<p>604-666-8488</p>
								<p>8888 University St</p>
								<a href="#"><i class="fab fa-facebook"></i></a>
								<a href="#"><i class="fab fa-instagram"></i></a>
								<a href="#"><i class="fab fa-youtube"></i></a>
								<a href="#"><i class="fab fa-twitter"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="copyrights text-center">
				<p class="para">
					<p>Copyright © 2018 ESHOP. All Rights Reserved. </p>
				</p>
			</div>
		</div>

	</footer>

	</main>


	<!-- Jquery js file-->
	<script src="js/jquery.3.5.1.js"></script>

	<!-- Boostrap js file-->
	<script src="js/bootstrap.min.js"></script>

</body>

</html>