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
	// if(isset($_POST['textdata'])){
	// 	$data=$_POST['textdata'];
	// 	$fp=fopen('data.txt','a');
	// 	fwrite($fp,$data);
	// 	fclose($fp);
	// }

	// echo "<html><head></head><body>";
	// $username=(!empty($_GET['username'])?$_GET['username']:"");
	//
	$fail = false;

	if (isset($_POST['username']) && isset($_POST['password'])) {
		$file = "filetest.txt";

		if ($handle = fopen("$file", "r")) {
			while (!feof($handle)) {
				$line = explode(",", trim(fgets($handle)));
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

	if ($fail == true) {
		echo "<p>Login fail try again</p>";
	}

	?>


	<div class="form register container">
		<h1>Log In</h1>
		<form action="" method="post" name="login">
			<input type="text" name="username" placeholder="Username" required />
			<input type="password" name="password" placeholder="Password" required />
			<input name="submit" type="submit" value="Login" />
		</form>
		<p>Not registered yet? <a href='register.php'>Register Here</a></p>
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