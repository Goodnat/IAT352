<!--This page is designed for user registeration-->
<!--First, we need to determine whether user enter empty text, if so, remember-->
<!--Then, we need to see whether user enter an already exist user name, if so, let them change to a new one-->
<!--After successfully register, the page turns to log in page-->
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
							<a class="nav-link" href="index_login.php">Account</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>

	<?php

	
	//when user click the button
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		//test whether the username/password/email is empty
		if (empty($username)) {
			echo "Please enter a username<br>";
		} else $username = $username;

		if (empty($email)) {
			echo "Please enter a email address<br>";
		} else $email = $email;

		if (empty($password)) {
			echo "Please enter a password<br>";
		} else $password = $password;
		
		//data
		$data = $username . "," . $email . "," . $password . "\n";
		
		//create the file
		$handle = fopen('./filetest.txt', 'a+');
		$file = './filetest.txt';

		if (file_exists($file)) {
			$content = file_get_contents($file);
			$content = explode("\n", $content);

			$users = array();
			foreach ($content as $value) {
				$user = explode(',', $value);
				if (count($user) > 1) {
					$users[$user[0]] = $user[1];
				}
			}

			//if the username already exist
			if (isset($users[$_POST['username']])) {
				echo "
				 <div class='container text-center'>
				 <p>The user already exists, please enter a different user name.</p>
				 <p>Go back to <a href='register.php'>Register</a></p>
				 </div>";
			}
		} else {
			echo "NO";
		}

		//when the user fill all information and no same username
		if (!empty($username) && !empty($email) && !empty($password) && fwrite($handle, $data) && !isset($users[$_POST['username']])) {
			echo "
			 <div class='container text-center'>
			 <p>Successfull registration</p>
			 <p>Go to <a href='login.php'>Logo in</a> page</p>
			 </div>";
		}
		
		//close the file
		fclose($handle);
		$file = './filetest.txt';
	} else {
	?>
		<div class="form">
			<h1>Registration</h1>
			<form name="registration" action="register.php" method="post">
				<input type="text" name="username" placeholder="Username" required />
				<input type="email" name="email" placeholder="Email" required />
				<input type="password" name="password" placeholder="Password" required />
				<input type="submit" name="submit" value="Register" />
			</form>
		</div>

	<?php } ?>

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
