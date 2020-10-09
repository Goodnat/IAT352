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
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<div class="mr-auto"></div>
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Shop</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Contact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="login.php">Account</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>

	<?php
	
	//success for now
	$fail = false;

	//create the file
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$file = "filetest.txt";

		//open the file
		if ($handle = fopen("$file", "r")) {
			while (!feof($handle)) {
				
				//use','to explode the file
				$line = explode(",", trim(fgets($handle)));
				
				//log in 
				if ($line[0] == $_POST['username'] && $line[2] == $_POST['password']) {
					//Header("Location: register.php");
					echo "
					<div class='form register container text-center'>
					<p>SUCESSFUL LOGIN: $line[0]<p>
					<a href='index.php'>HOME</a>
					</div>
					";
					exit;
				}
			}
			$fail = true;
		}
	}

	//if fail to log in, show some texts
	if ($fail == true) {
		echo "
		<div class='container text-center'>
			<p class='text-danger'>Failed to log in. Please try again!<p>
		</div>";
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
								<h5>Categories</h5>
								<ul class="list-unstyled text-small">
									<li><a class="text-muted" href="">Audio</a></li>
									<li><a class="text-muted" href="">Camera</a></li>
									<li><a class="text-muted" href="">Computer</a></li>
									<li><a class="text-muted" href="">TV</a></li>
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
								<p>xxx-xxx-xxxx</p>
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
