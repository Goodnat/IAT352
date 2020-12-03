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

	<!-- Jquery js file-->
	<script src="js/jquery.3.5.1.js"></script>

	<!-- Boostrap js file-->
	<script src="js/bootstrap.min.js"></script>
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
				<p>You can check you last order, order payment, and order delivery</p>
				<p>
					<a class="btn btn-secondary" href="logout.php" role="button">Log out &raquo;</a>
					<a class="btn btn-secondary" href="new_pass.php" role="button">Reset Password &raquo;</a>
				</p>

				<!--promotion selection-->
				<p>Set your preferences to show the promotion or not:</p>
				<label for="name">Promotion:</label>
				<div>
					<?php

					$sql = "SELECT promotion FROM users WHERE username='" . $_SESSION["username"] . "'";

					$result = mysqli_query($conn, $sql);
					$results_rows = mysqli_num_rows($result);
					if ($results_rows > 0) {
						$row = mysqli_fetch_assoc($result);
						$promotion_value = $row["promotion"];
						if ($promotion_value == "0") {
							echo "<label class=\"radio-inline\">
							<input type=\"radio\" name=\"optionsRadiosinline\" id=\"optionsRadios1\" value=\"1\"> show
						</label>
						<label class=\"radio-inline\">
							<input type=\"radio\" name=\"optionsRadiosinline\" id=\"optionsRadios2\"  value=\"0\" checked> hide
						</label>";
						} else {
							echo "<label class=\"radio-inline\">
							<input type=\"radio\" name=\"optionsRadiosinline\" id=\"optionsRadios1\" value=\"1\" checked> show
						</label>
						<label class=\"radio-inline\">
							<input type=\"radio\" name=\"optionsRadiosinline\" id=\"optionsRadios2\"  value=\"0\"> hide
						</label>";
						}
					}
					?>
				</div>
				<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
				<!--promotion selection end-->
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
							<p><button id="showHistory" class="btn btn-secondary" role="button">View orders details &raquo;</button></p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="width: 20rem;">
						<div class="card-body">
							<h2>Order Payment</h2>
							<p class="card-text">Manage your payment details for the order.</p>
							<p><button id="showPayment" class="btn btn-secondary" role="button">View payments details &raquo;</button></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 ">
					<div class="card" style="width: 20rem;">
						<div class="card-body">
							<h2>Order Delivery</h2>
							<p class="card-text">Manage your delivery details for the order.</p>
							<p><button id="showAddress" class="btn btn-secondary" role="button">View deliveries details &raquo;</button></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div id="history" class="text-center"></div>
			<div id="payment" class="text-center"></div>
			<div id="address" class="text-center"></div>
			<div id="page" class="float-right"></div>
		</div>


		</div>

	</main>

	<?php
	$name = $_SESSION['username'];

	$idsql = "select users.user_id from `users` where users.username = '$name';";

	$idresult = mysqli_query($conn, $idsql);

	while ($row1 = mysqli_fetch_array($idresult)) {
		$id = $row1['user_id'];
	}
	?>
	<script>
		//history
		var offset = 6;

		function displayHistory(p) {
			console.log(p);
			var string = '<div class="mt-3 table-responsive"><table class="table table-bordered"><tr><th width="20%">Order Number</th><th width="40%">Product Name</th><th width="10%">Price</th><th width="10%">Quantity</th><th width="20%">Order Date</th></tr></div>'
			var start = p * offset;
			var stop = p * offset + offset > result.length ? result.length : p * offset + offset;
			console.log(start + "  " + stop);

			for (i = start; i < stop; i++) {
				string += "<tr><td>" + result[i].order_id + "</td><td>" + result[i].name + "</td><td>" + result[i].price + "</td><td>" + result[i].quantity + "</td><td>" + result[i].order_date + "</td><tr>";
			}

			string += "</table>";
			$("#history").html(string);
			$("#payment").html("");
			$("#address").html("");
			var pages = "";
			for (i = 0; i < Math.ceil(result.length / offset); i++) {
				if (p == i) {
					pages += " <a href='javascript:void(0)' class='currentPage display-4' onclick='displayHistory(" + i + ");'> " + (i + 1) + " </a>";
				} else {
					pages += " <a href='javascript:void(0)'class='display-4' onclick='displayHistory(" + i + ");'> " + (i + 1) + " </a>";
				}
			}
			$("#page").html(pages);
		}

		$("#showHistory").on("click", function() {

			var id = <?php echo $id ?>;

			$.ajax({
				method: "GET",
				url: "getDataTest.php",
				data: {
					user_id: id
				}

			}).done(function(data) {

				console.log(data);
				result = $.parseJSON(data);
				console.log(result);
				if (result.length > 0) {
					displayHistory(0);
				} else {
					$("#history").html("No math records");
				}
			});


		});

		function displayPayment(p) {
			console.log(p);
			var string = '<div class="mt-3 table-responsive"><table class="table table-bordered"><tr><th width="20%">Order Number</th><th width="20%">Order Date</th><th width="20%">Card Number</th><th width="20%">Name on Card</th><th width="20%">Card CVC</th></tr></div>';
			var start = p * offset;
			var stop = p * offset + offset > result.length ? result.length : p * offset + offset;
			console.log(start + "  " + stop);

			for (i = start; i < stop; i++) {
				string += "<tr><td>" + result[i].order_id + "</td><td>" + result[i].order_date + "</td><td>" + result[i].card_number + "</td><td>" + result[i].card_name + "</td><td>" + result[i].card_cvc + "</td><tr>";
			}

			string += "</table>";
			$("#payment").html(string);
			$("#history").html("");
			$("#address").html("");
			var pages = "";
			for (i = 0; i < Math.ceil(result.length / offset); i++) {
				if (p == i) {
					pages += " <a href='javascript:void(0)' class='currentPage display-4' onclick='displayPayment(" + i + ");'> " + (i + 1) + " </a>";
				} else {
					pages += " <a href='javascript:void(0)'class='display-4' onclick='displayPayment(" + i + ");'> " + (i + 1) + " </a>";
				}
			}
			$("#page").html(pages);
		}
		$("#showPayment").on("click", function() {

			var id = <?php echo $id ?>;

			$.ajax({
				method: "GET",
				url: "getPayment.php",
				data: {
					user_id: id
				}

			}).done(function(data) {

				console.log(data);
				result = $.parseJSON(data);
				console.log(result);
				if (result.length > 0) {
					displayPayment(0);
				} else {
					$("#payment").html("No math records");
				}
			});


		});

		function displayAddress(p) {
			console.log(p);
			var string = '<div class="mt-3 table-responsive"><table class="table table-bordered"><tr><th width="20%">Order Number</th><th width="15%">Name</th><th width="15%">Phone</th><th width="40%">Address</th><th width="10%">Postcode</th></tr></div>'
			var start = p * offset;
			var stop = p * offset + offset > result.length ? result.length : p * offset + offset;
			console.log(start + "  " + stop);

			for (i = start; i < stop; i++) {
				string += "<tr><td>" + result[i].order_id + "</td><td>" + result[i].recipient_name + "</td><td>" + result[i].recipient_phone + "</td><td>" + result[i].street_address + result[i].city + result[i].province + "</td><td>" + result[i].postal_code + "</td><tr>";
			}

			string += "</table>";
			$("#address").html(string);
			$("#history").html("");
			$("#payment").html("");

			var pages = "";
			for (i = 0; i < Math.ceil(result.length / offset); i++) {
				if (p == i) {
					pages += " <a href='javascript:void(0)' class='currentPage display-4' onclick='displayAddress(" + i + ");'> " + (i + 1) + " </a>";
				} else {
					pages += " <a href='javascript:void(0)'class='display-4' onclick='displayAddress(" + i + ");'> " + (i + 1) + " </a>";
				}
			}
			$("#page").html(pages);
		}


		$("#showAddress").on("click", function() {
			var id = <?php echo $id ?>;

			$.ajax({
				method: "GET",
				url: "getAddress.php",
				data: {
					user_id: id
				}

			}).done(function(data) {

				console.log(data);
				result = $.parseJSON(data);
				console.log(result);
				if (result.length > 0) {
					displayAddress(0);
				} else {
					$("#address").html("No math records");
				}
			});

		});

		$(function() {
			$("input[name='optionsRadiosinline']").on('change', function() {
				$.ajax({
					method: "GET",
					url: "getpromotion_selection.php",
					data: {
						promotion: $("input[name='optionsRadiosinline']:checked").val()
					}
				}).done(function(data) {});
			});
		});
	</script>

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

</html>