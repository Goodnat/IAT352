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



	<?php
	require('db.php'); //connection to db code
	include("auth_sessionNotActiveCheck.php");
	?>
		<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<title> Members Only</title>
	</head>

	<body>
		<div class="jumbotron">
			<div class="container">
				<h1 class="display-3">Welcome, <?php echo $_SESSION['username']; ?>!</h1>
				<p>You're successfully be our members!</p>
				<p>You can check you last order, change the order payment, change the order delivery</p>
				<p><a class="btn btn-secondary" href="logout.php" role="button">Log out&raquo;</a></p>
				<p><a class="btn btn-secondary" href="new_pass.php" role="button">Reset Password&raquo;</a></p>
			</div>
		</div>
		<div class="container">
			<?php
			$name=$_SESSION['username'];
			
			$idsql = "select users.user_id from `users` where users.username = '$name';";
			
			$idresult = $conn->query($idsql);
			
			while ($row1 = $idresult->fetch_assoc()) {
            $id= $row1['user_id'];}
			$sql = "select delivery_required.delivery_id,delivery_required.recipient_name,delivery_required.recipient_phone,delivery_required.city from delivery_required inner join manage_order on delivery_required.order_id = manage_order.order_id where manage_order.user_id='$id'";
            $result = $conn->query($sql);
            echo"$sql";
            echo "<table class='table-striped table-hover table-bordered display-5 '>";
            echo "<tr ><td class='p-2'>Order ID</td>
            <td class='p-2'>Product Name</td>
            <td class='p-2'>Price</td>
            <td class='p-2'>Quantity</td>
            <td class='p-2'>Date</td>
            <td class='p-2'>Total Price</td>
            <td class='p-2'>Edit Address</td></tr>";?>
<?php
           
            while($row = $result->fetch_assoc()){
        

echo "<tr>";
echo "<td>".$row["order_id"]."</td>"; 
 //display ID
echo "<td>".$row["name"]." </td>"; //display name
echo "<td>".$row["price"]." </td>";//display price
echo "<td>".$row["quantity"]." </td>"; //display number
echo "<td>".$row["order_date"]." </td>"; //display date
$singleprice=$row["price"];
$quantityeach=$row["quantity"];
$total=$singleprice * $quantityeach;
echo"<td>".$total."</td>";
echo"<td><a href='addCard.php'><p>edit</p></a></td>";
echo"<td><button onclick='change()'> Edit</button></td>";
$_SESSION
        [
        'order_id'
        ]=$row["order_id"];

echo "</tr>";
}


echo "</table>";
            ?>
		</div>
		<div  style ="display:none"id="form2" class="container">
            <form class="needs-validation" method="post" action="">
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
                    <div class="col-md-4 mb-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" name="country" placeholder="Canada" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="address">Province</label>
                        <input type="text" class="form-control" name="province" placeholder="BC" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="address">City</label>
                        <input type="text" class="form-control" name="city" placeholder="Surrey" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" name="postal_code" placeholder="xxxxxx" required>
                </div>

                <hr class="mb-4">

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                </div>

                <hr class="mb-4">

                <button class="btn btn-dark btn-lg" type="submit">Place Order</button>
            </form>
            <?php
            require('db.php');

            $recipientName = (!empty($_POST['recipient_name']) ? $_POST['recipient_name'] : "");
            $recipientPhone = (!empty($_POST['recipient_phone']) ? $_POST['recipient_phone'] : "");
            $streetAddress = (!empty($_POST['street_address']) ? $_POST['street_address'] : "");
            $country = (!empty($_POST['country']) ? $_POST['country'] : "");
            $province = (!empty($_POST['province']) ? $_POST['province'] : "");
            $city = (!empty($_POST['city']) ? $_POST['city'] : "");
            $postalCode = (!empty($_POST['postal_code']) ? $_POST['postal_code'] : "");

            $sql = "INSERT INTO `delivery` (recipient_name, recipient_phone, street_address, country, province, city, postal_code)
                     VALUES ('$recipientName',' $recipientPhone','$streetAddress','$country', ' $province', '$city', '$postalCode') ON DUPLICATE KEY UPDATE deliverey_id= '$recipientPhone'+1 ; ";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo  '
                <p>Submit Successfully</p>
                <p><a class="btn btn-secondary w-25" href="order.php" role="button">Next Step&raquo;</a></p>
                ';
            } else {
                echo '
                <button class="btn btn-dark btn-lg" type="submit"  name="submit" value ="submit">Submit</button>
                ';
            }
            mysqli_close($conn);

            ?>
        </div>




	</body>
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
									<li><a class="text-muted" href="cart.php">My Cart</a></li>
									<li><a class="text-muted" href="membersLogin.php">Order History</a></li>
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


	<!-- Jquery js file-->
	<script src="js/jquery.3.5.1.js"></script>

	<!-- Boostrap js file-->
	<script src="js/bootstrap.min.js"></script>
	<script>
	

	function change(){
		
		
	    var div = document.getElementById('form2');
		if(div.style.display="none"){
			div.style.display="block";
		}
		else{
			div.style.display="none";
		}


	}

</script>



</html>