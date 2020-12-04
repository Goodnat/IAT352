<?php
// This page is designed as change password page-->
// User can enter the new password and then confirm the new password in this page
// If the user enter the matched new password, then password changed successfully
// At this time, user will turn into a page showing password successfully reset
// If the user enter the unmatched password, show fail to change password

require 'db.php'; //connection to db code
include "auth_sessionNotActiveCheck.php";

$errors = [];

//when user press the submit button
if (isset($_POST['new_password'])) {
	$new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
	$new_pass_c = mysqli_real_escape_string($conn, $_POST['new_pass_c']);

	//when user enter an empty psw, show warnings
	if (empty($new_pass) || empty($new_pass_c)) {
		array_push($errors, "Password is required");
	}

	//when the new psw doesn't match each other, show warnings
	if ($new_pass !== $new_pass_c) {
		array_push($errors, "Password do not match");
	}

	//if there is no error
	if (count($errors) == 0) {

		$new_pass = md5($new_pass);
		//update the password
		$sql = "UPDATE users SET `password`='$new_pass' where username='" . $_SESSION['username'] . "'";
		echo $sql;
		$results = mysqli_query($conn, $sql);
		//when psw successfully changed, turn inton resetpswsuccessful page
		header('location: resetpswsuccessful.php');
	}
}

?>

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
	<link rel="stylesheet" type="text/css" href="css/mainStyle.css">
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
							<a class="nav-link" href="index.php">Shop</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="membersLogin.php">Account<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="membersLogin.php">Cart</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>



	<main>
		<div class="form register container mx-auto my-5">
			<h2>Change password</h2>
			<?php
			if (count($errors) > 0) {
				echo "<h5>ERROR: </h5>";
				echo "<ul style='color:red'>";
				foreach ($errors as $value) {
					echo "<li>$value </li>";
				}
				echo "</ul>";
			}
			?>
			<form action="new_pass.php" method="post" name="login">
				<div>
					<label>New password</label>
					<input type="password" name="new_pass">
				</div>

				<div>
					<label>Confirm new password</label>
					<input type="password" name="new_pass_c">
				</div>
				<br><input name="new_password" type="submit" value="submit" />

			</form>
			<p>Not registered yet? <a href='register.php'>Register Here</a></p>
		</div>
	</main>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-6">
					<div class="row ">
						<div class="col-6">

							<div class="text">
								<h5>ERSHOP</h5>
								<ul class="list-unstyled text-small">
									<li><a class="text-muted" href="index.php">Shop</a></li>
									<li><a class="text-muted" href="membersLogin.php">Account</a></li>
									<li><a class="text-muted" href="cart.php">Cart</a></li>
								</ul>
							</div>
						</div>
						<div class="col-6">
							<div class="text">
								<h5>Services</h5>
								<ul class="list-unstyled text-small">
									<li><a class="text-muted" href="login.php">Login</a></li>
									<li><a class="text-muted" href="register.php">Register</a></li>
									<li><a class="text-muted" href="membersLogin.php">Order History</a></li>
									<li><a class="text-muted" href="membersLogin.php">Change Info</a></li>
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




	<!-- Jquery js file-->
	<script src="js/jquery.3.5.1.js"></script>

	<!-- Boostrap js file-->
	<script src="js/bootstrap.min.js"></script>

</body>

</html>