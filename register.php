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
				<h1>ESHOP</h1>
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

	if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
		$data = $_POST['username'] . "," . $_POST['email'] . "," . $_POST['password'] . "\n";
		//echo ($data);

		if ($handle = fopen('./filetest.txt', 'a+')) {
			// read this Hello World! from filetest.txt
			// fill in your own code. Hint! each character is 1 byte
			fwrite($handle, $data);
			fclose($handle);

			echo "<p>Successfull registration</p>";
			echo "<p>Go to <a href='login.php'>Logo in</a> page</p>";
		}
	} else {
	?>
		<div class="form register">
			<h1>Registration</h1>
			<form name="registration" action="register.php" method="post">
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