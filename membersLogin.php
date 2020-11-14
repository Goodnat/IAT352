<!--This page is designed as members' log in page-->
<!--After user sucessfully register, the website wil turn to this page-->
<!--If the user enter the right user name and password, show successfully log in-->
<!--If the user enter the wrong information, show fail to log in-->

<?php
require('db.php'); //connection to db code
include("auth_sessionNotActiveCheck.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Welcome <?php echo $_SESSION['username']; ?></title>
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
							<a class="nav-link" href="cart.php">Cart</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>

	<main>
		
		<div class="jumbotron">
			<div class="container">
				<h1 class="display-3">Welcome, <?php echo $_SESSION['username']; ?>!</h1>
				<p>You're successfully be our members!</p>
				<p>You can check you last order, change the order payment, change the order delivery</p>
				<p>
					<a class="btn btn-secondary" href="logout.php" role="button">Log out &raquo;</a>
					<a class="btn btn-secondary" href="new_pass.php" role="button">Reset Password &raquo;</a>
				</p>
				<p><a class="btn btn-secondary" href="index.php" role="button">Go Shopping &raquo;</a></p>
			</div>
		</div>

		<div class="container">
			<!-- Example row of columns -->
			<div class="row mt-5">
				<div class="col-md-4">
					<div class="card" style="width: 20rem;">
						<div class="card-body">
							<h2>Order History</h2>
							<p class="card-text">Track your recent purchases and view past orders with ease.</p>
							<p><a class="btn btn-secondary" href="./orderHistory.php" role="button">View details &raquo;</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="width: 20rem;">
						<div class="card-body">
							<h2>Order Payment</h2>
							<p class="card-text">Manage your payment details for the order.</p>
							<p><a class="btn btn-secondary" href="./changePayment.php" role="button">Change Payment Info &raquo;</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 ">
					<div class="card" style="width: 20rem;">
						<div class="card-body">
							<h2>Order Delivery</h2>
							<p class="card-text">Manage your delivery details for the order.</p>
							<p><a class="btn btn-secondary" href="./changeAddress.php" role="button">Change Delivery Info &raquo;</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</main>

	<!-- <div class="form register container mx-auto my-5">
		<h1>Log In</h1>
		<form action="" method="post" name="login">
			<input type="text" name="username" placeholder="Username" required />
			<input type="password" name="password" placeholder="Password" required />
			<input name="submit" type="submit" value="Login" />
		</form>
		<p>Not registered yet? <a href='register.php'>Register Here</a></p>
	</div> -->


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

</body>
<!-- Jquery js file-->
<script src="js/jquery.3.5.1.js"></script>

<!-- Boostrap js file-->
<script src="js/bootstrap.min.js"></script>



</html>