<?php
require('db.php'); //connection to db code
include("auth_sessionNotActiveCheck.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Order History</title>
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

		<div class="container p-2">
			<?php
			$name = $_SESSION['username'];

			$idsql = "select users.user_id from `users` where users.username = '$name';";

			$idresult = mysqli_query($conn, $idsql);

			while ($row1 = mysqli_fetch_array($idresult)) {
				$id = $row1['user_id'];
			}



			$sql = "select order_detail.order_id,product.name,product.price,order_detail.quantity,orders.order_date from order_detail inner join product on product.product_id = order_detail.product_id inner join manage_order on order_detail.order_id = manage_order.order_id inner join orders on order_detail.order_id = orders.order_id where manage_order.user_id= '$id' ";
			$result = mysqli_query($conn, $sql);

			echo "<div class='table-responsive'>
            <table class='table table-bordered'>
                <tr>
                    <th width='15%'>Order Number</th>
                    <th width='35%'>Product Name</th>
                    <th width='5%'>Price</th>
                    <th width='5%'>Quantity</th>
                    <th width='15%'>Order Date</th>
                    <th width='10%'>Total</th>
                </tr></div>"; ?>
			<?php

			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row["order_id"] . "</td>"; //display ID
				echo "<td>" . $row["name"] . " </td>"; //display name
				echo "<td>" . $row["price"] . " </td>"; //display price
				echo "<td>" . $row["quantity"] . " </td>"; //display number
				echo "<td>" . $row["order_date"] . " </td>"; //display date
				$singleprice = $row["price"];
				$quantityeach = $row["quantity"];
				$total = $singleprice * $quantityeach;
				echo "<td>" . $total . "</td>";

				echo "</tr>";
			}


			echo "</table>";
			?>
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

</body>

<!-- Jquery js file-->
<script src="js/jquery.3.5.1.js"></script>

<!-- Boostrap js file-->
<script src="js/bootstrap.min.js"></script>


</html>