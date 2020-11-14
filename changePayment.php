<?php
require('db.php'); //connection to db code
include("auth_sessionNotActiveCheck.php");

$name = $_SESSION['username'];
$idsql = "SELECT users.user_id FROM `users` WHERE users.username = '$name';";
$idresult = mysqli_query($conn, $idsql);
while ($row1 = mysqli_fetch_array($idresult)) {
	$id = $row1['user_id'];
}

//post the value from form
$cardName = (!empty($_POST['card_name']) ? $_POST['card_name'] : "");
$cardNumber = (!empty($_POST['card_number']) ? $_POST['card_number'] : "");
$expiryDate = (!empty($_POST['expiry_date']) ? $_POST['expiry_date'] : "");
$cardcvc = (!empty($_POST['card_cvc']) ? $_POST['card_cvc'] : "");
$hidden_order_id = (!empty($_POST['change_order_id']) ? $_POST['change_order_id'] : "");

if (!empty($_POST["change_order_id"])) {
	$hint = "";
} else {
	$hint = "<P class='text-danger float-right'>choose an order before to change</P>";
}

$query = "UPDATE `payment_required` SET card_number ='$cardNumber', card_name= '$cardName', expiry_Date= '$expiryDate ',card_cvc= '$cardcvc' 
WHERE order_id = '$hidden_order_id';";

if (isset($_POST["change_payment"])) {
	$result = mysqli_query($conn, $query);
	echo '<script>alert("Order #' . $hidden_order_id . ' Payment Changed")</script>';
	echo '<script>window.location="changePayment.php"</script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Change Address</title>
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


		<div class="container mb-5">
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

		<div class="container">

			<?php
			echo $hint;

			echo "<div class='table-responsive'>
					<table class='table table-bordered'>
						<tr>
							<th width='20%'>Order Number</th>
							<th width='20%'>OrderDate</th>
							<th width='20%'>Card Number</th>
							<th width='15%'>Name on Card</th>
							<th width='15%'>Card CVC</th>
							<th width='10%'>Choose</th>
						</tr>
					</div>";
			?>
			<form id="form" method="post" action="changePayment.php">

				<?php

				$cursql = "SELECT orders.order_id,orders.order_date,payment_required.card_number,payment_required.card_name ,payment_required.card_cvc
				FROM orders inner join payment_required 
				on orders.order_id = payment_required.order_id 
				inner join manage_order 
				on orders.order_id = manage_order.order_id 
				where manage_order.user_id='$id'";

				$curresult = mysqli_query($conn, $cursql);

				while ($row = mysqli_fetch_array($curresult)) {

					$curid = $row["order_id"];
					echo "<tr>";
					echo "<td>" . $row["order_id"] . "</td>";
					echo "<td>" . $row["order_date"] . " </td>";
					echo "<td>" . $row["card_number"] . " </td>";
					echo "<td>" . $row["card_name"] . " </td>";
					echo "<td>" . $row["card_cvc"] . " </td>";
					echo "<td><input type='radio' value='" . $curid . "' name = 'change_payment' onclick='document.getElementById(\"change\").value=this.value'></td>";
					echo "</tr>";
				}

				echo "
				</table>
				</div>";
				?>
				<input type="hidden" id="change" name="change_order_id">
				<div class="row">
					<div class="col-md-5 mt-5">
						<h4 class="mb-3">Payment</h4>

						<div class="mb-3">
							<label for="cc-name">Name on card</label>
							<input type="text" class="form-control" name="card_name" required>
							<small class="text-muted">Full name as displayed on card</small>
						</div>

						<div class="mb-3">
							<label for="cc-number">Credit card number</label>
							<input type="text" class="form-control" name="card_number" required>
						</div>

						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="cc-expiration">Expiration</label>
								<input type="date" class="form-control" name="expiry_date" required>
							</div>

							<div class="col-md-6 mb-3">
								<label for="cc-cvv">CVV</label>
								<input class="form-control" type="number" maxlength="3" pattern="([0-9]|[0-9]|[0-9])" name="card_cvc" required>
							</div>
						</div>

						<input class='btn btn-secondary' type='submit' value='Change'>

					</div>
				</div>
			</form>

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


	</main>
</body>

<!-- Jquery js file-->
<script src="js/jquery.3.5.1.js"></script>

<!-- Boostrap js file-->
<script src="js/bootstrap.min.js"></script>

</html>