<?php
require('db.php'); //connection to db code
include("auth_sessionNotActiveCheck.php");
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
				<p><a class="btn btn-secondary" href="logout.php" role="button">Log out&raquo;</a></p>
				<p><a class="btn btn-secondary" href="new_pass.php" role="button">Reset Password&raquo;</a></p>
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
							<p><a class="btn btn-secondary" href="./addCard.php" role="button">Change Payment Info &raquo;</a></p>
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
			if (!isset($_POST['submit'])) {
				//如果没有表单提交，显示一个表单 
			?>

				<div>
					<!-- <h2>your order Number is : <?php echo "$order_id"; ?></h2> -->
					<?php
					$name = $_SESSION['username'];

					$idsql = "select users.user_id from `users` where users.username = '$name';";

					$idresult = mysqli_query($conn, $idsql);

					while ($row1 = mysqli_fetch_array($idresult)) {
						$id = $row1['user_id'];
					}

					$cursql = "SELECT manage_order.order_id,delivery_required.recipient_name,delivery_required.recipient_phone,delivery_required.street_address,delivery_required.city,delivery_required.province,delivery_required.country,delivery_required.postal_code 
					from delivery_required inner join manage_order 
					on delivery_required.order_id=manage_order.order_id 
					where manage_order.user_id = '$id'";
					$curresult = mysqli_query($conn, $cursql);

					echo "<div class='table-responsive'>
            <table class='table table-bordered'>
                <tr>
                    <th width='15%'>Order Number</th>
                    <th width='10%'>Name</th>
                    <th width='10%'>phone</th>
                    <th width='40%'>Address</th>
                    <th width='5%'>Postcode</th>
                    <th width='5%'>Edit</th>
                </tr></div>";
					?>
					<?php

					while ($row = $curresult->fetch_assoc()) {
						if ($row > 0) {
							echo "<tr>";
							echo "<td>" . $row["order_id"] . "</td>";
							$order_id = $row["order_id"];
							echo "<td>" . $row["recipient_name"] . " </td>"; //display name
							echo "<td>" . $row["recipient_phone"] . " </td>";
							echo "<td>" . $row["street_address"] . "," . $row["city"] . "," . $row["province"] . "</td>";
							echo "<td>" . $row["postal_code"] . " </td>"; //display price
							echo "<td><button id='button' onclick='Click()'> Edit</button></td>";
							echo "</tr>";
						}
					}
					echo "</table>";
					?>


				</div>
				<form id="form" style="display:none" method="post" action="">
					<div class="row">
						<div class="col-7 mt-5 cart">
							<!--Shipping address-->
							<h4 class="mb-3">Shipping address</h4>
							<div class="mb-3">
								<label for="name">Recipient Name</label>
								<input type="text" class="form-control" name="recipient_name" placeholder="Nick_Peter" value="" required>
							</div>

							<div class="mb-3">
								<label for="phone">Phone</label>
								<input type="text" class="form-control" name="recipient_phone" placeholder="xxxxxxxxxx" required>
							</div>

							<div class="mb-3">
								<label for="address">Address</label>
								<input type="text" class="form-control" name="street_address" placeholder="1234 Main St" required>
							</div>

							<div class="row">
								<div class="col-md-3 mb-3">
									<label for="address">City</label>
									<input type="text" class="form-control" name="city" placeholder="Surrey" required>
								</div>

								<div class="col-md-3 mb-3">
									<label for="address">Province</label>
									<input type="text" class="form-control" name="province" placeholder="BC" required>
								</div>

								<div class="col-md-3 mb-3">
									<label for="country">Country</label>
									<input type="text" class="form-control" name="country" placeholder="Canada" required>
								</div>
							</div>

							<div class="mb-3">
								<label for="zip">Zip</label>
								<input type="text" class="form-control" name="postal_code" placeholder="xxxxxx" required>
							</div>
							<input type="submit" name="palce_an_order" class="btn btn-secondary mt-3  mt-3" value="Change">

						</div>
					</div>
				<?php
			} else {

				$name = empty($_POST['recipient_name']) ? die("plase enter your number") : ($_POST['recipient_name']);
				$phone = empty($_POST['recipient_phone']) ? die("plase enter name") : ($_POST['recipient_phone']);
				$street = empty($_POST['street_address']) ? die("plase enter Street") : ($_POST['street_address']);
				$city = empty($_POST['city']) ? die("plase enter City") : ($_POST['city']);
				$province = empty($_POST['province']) ? die("plase enter code") : ($_POST['province']);
				$country = empty($_POST['country']) ? die("plase enter country") : ($_POST['country']);
				$code = empty($_POST['postal_code']) ? die("plase enter Zip code") : ($_POST['postal_code']);

				$query = "UPDATE delivery_required SET recipient_name ='$name', recipient_phone= '$phone', street_address= '$street',city= '$city',country ='$country', postal_code = '$code' where order_id = '$order_id';";

				$result = mysqli_query($conn, $query);
				echo "add Successful";
			}
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
<script>
	function Click() {


		var div = document.getElementById('form');
		if (div.style.display = "none") {
			div.style.display = "block";
		} else if (div.style.display = "block") {
			div.style.display = "none";
		}


	}
</script>



</html>