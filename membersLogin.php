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
<?php
$cardName = test_input(!empty($_POST['card_name']) ? $_POST['card_name'] : "");
$cardNumber = test_input(!empty($_POST['card_number']) ? $_POST['card_number'] : "");
$expiryDate = test_input(!empty($_POST['expiry_date']) ? $_POST['expiry_date'] : "");
$cardcvc = test_input(!empty($_POST['card_cvc']) ? $_POST['card_cvc'] : "");
$name = test_input(!empty($_POST['recipient_name']) ? $_POST['recipient_name'] : "");
$phone = test_input(!empty($_POST['recipient_phone']) ? $_POST['recipient_phone'] : "");
$street = test_input(!empty($_POST['street_address']) ? $_POST['street_address'] : "");
$city = test_input(!empty($_POST['city']) ? $_POST['city'] : "");
$province = test_input(!empty($_POST['province']) ? $_POST['province'] : "");
$country = test_input(!empty($_POST['country']) ? $_POST['country'] : "");
$code = test_input(!empty($_POST['postal_code']) ? $_POST['postal_code'] : "");
$hidden_order_id = test_input(!empty($_POST['change_order_id']) ? $_POST['change_order_id'] : "");

if (!empty($_POST["change_order_id"])) {
	$hint = "";
} else {
	$hint = "<P class='text-danger float-right'>choose an order before to change</P>";
}

$query1 = "UPDATE `payment_required` SET card_number ='$cardNumber', card_name= '$cardName', expiry_Date= '$expiryDate ',card_cvc= '$cardcvc' 
WHERE order_id = '$hidden_order_id';";

if (isset($_POST["change_payment"])) {
	$result = mysqli_query($conn, $query1);
	echo '<script>alert("Order #' . $hidden_order_id . ' Payment Changed")</script>';
	echo '<script>window.location="changePayment.php"</script>';
}
$query2 = "UPDATE delivery_required SET recipient_name ='$name', recipient_phone= '$phone', street_address= '$street',city= '$city',country ='$country', postal_code = '$code' where order_id = '$hidden_order_id';";

if (isset($_POST["change_delivery"])) {
	$result = mysqli_query($conn, $query2);
	echo '<script>alert("Order #' . $hidden_order_id . ' Payment Changed")</script>';
	echo '<script>window.location="changeAddress.php"</script>';
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

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

				<!--promotion selection-->
				<p>Set your preferences to show the promotion or not:</p>
				<label for="name">Promotion:</label>
			<div>
				<?php
				
				$sql="SELECT promotion FROM users WHERE username='".$_SESSION["username"]."'";
				
				$result = mysqli_query($conn, $sql);
				$results_rows = mysqli_num_rows($result);
				if ($results_rows > 0) {
					$row = mysqli_fetch_assoc($result);
					$promotion_value=$row["promotion"];
					if ($promotion_value == "0"){
						echo "<label class=\"radio-inline\">
							<input type=\"radio\" name=\"optionsRadiosinline\" id=\"optionsRadios1\" value=\"1\"> show
						</label>
						<label class=\"radio-inline\">
							<input type=\"radio\" name=\"optionsRadiosinline\" id=\"optionsRadios2\"  value=\"0\" checked> hide
						</label>";
					}else{
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
							<p><button  id ="showHistory" class="btn btn-secondary"  role="button">View details &raquo;</button></p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="width: 20rem;">
						<div class="card-body">
							<h2>Order Payment</h2>
							<p class="card-text">Manage your payment details for the order.</p>
							<p><button id="showPayment"class="btn btn-secondary" role="button">Change Payment Info &raquo;</button></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 ">
					<div class="card" style="width: 20rem;">
						<div class="card-body">
							<h2>Order Delivery</h2>
							<p class="card-text">Manage your delivery details for the order.</p>
							<p><button id="showAddress"class="btn btn-secondary"  role="button">Change Delivery Info &raquo;</button></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
		<div id="history"  style="text-align:center;"></div>
		<div id="payment" style="text-align:center;"></div>
		<div id="address" style="text-align:center;"></div>
		<div id="page" style="text-align:right;"></div>
	</div>
	<div  id="paymentForm" class="container" style="display:none">
	<form id="form" method="post" action="">
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
			<div id="addressForm"class="container" style="display:none">
			<form id="form" method="post" action="">
			<input type="hidden" id="change" name="change_order_id">
				<div class="row">
					<div class="col-12 mt-5 cart">
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

						<input class='btn btn-secondary' type='submit' value='Change'>

					</div>
				</div>

			</form>
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

<script>//history
	var offset = 10;
	function displayHistory(p){
		console.log(p);
var string = '<div class="table-responsive"><table class="table table-bordered"><tr><th width="15%">Order Number</th><th width="35%">Product Name</th><th width="5%">Price</th><th width="5%">Quantity</th><th width="15%">Order Date</th></tr></div>'
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
                pages += " <a href='javascript:void(0)' class='currentPage' onclick='displayResult(" + i + ");'>" + (i + 1) + "</a>";
            } else {
                pages += " <a href='javascript:void(0)' onclick='displayResult(" + i + ");'>" + (i + 1) + "</a>";
            }

        }
        $("#page").html(pages);
    }
    $("#showHistory").on("click",function() {
    
       var id = <?php echo $id?>;
      
        $.ajax({
            method: "GET",
            url: "getDataTest.php",
            data:{user_id:id}

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


	

</script>
<script>//payment
	var offset = 10;
	function displayPayment(p){
		console.log(p);
var string = '<div class="table-responsive"><table class="table table-bordered"><tr><th width="20%">Order Number</th><th width="20%">Order Date</th><th width="20%">Card Number</th><th width="15%">Name on Card</th><th width="15%">Card CVC</th><th width="10%">Choose</th></tr></div>';
 var start = p * offset;
        var stop = p * offset + offset > result.length ? result.length : p * offset + offset;
        console.log(start + "  " + stop);

        for (i = start; i < stop; i++) {
            string += "<tr><td>" + result[i].order_id + "</td><td>" + result[i].order_date + "</td><td>" + result[i].card_number + "</td><td>" + result[i].card_name + "</td><td>" + result[i].card_cvc + "</td><td><input type='radio' value='\" . $curid . \"' name = 'change_payment' onclick='document.getElementById(\"change\").value=this.value'></td>\"<tr>";
        }

        string += "</table>";
        $("#payment").html(string);
        $("#history").html("");
        $("#address").html("");
         var pages = "";
        for (i = 0; i < Math.ceil(result.length / offset); i++) {
            if (p == i) {
                pages += " <a href='javascript:void(0)' class='currentPage' onclick='displayResult(" + i + ");'>" + (i + 1) + "</a>";
            } else {
                pages += " <a href='javascript:void(0)' onclick='displayResult(" + i + ");'>" + (i + 1) + "</a>";
            }

        }
        $("#page").html(pages);
    }
    $("#showPayment").on("click",function() {
    
       var id = <?php echo $id?>;
       
        $.ajax({
            method: "GET",
            url: "getPayment.php",
            data:{user_id:id}

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


	

</script>
<script>//address
	var offset = 10;
	function displayAddress(p){
		console.log(p);
var string = '<div class="table-responsive"><table class="table table-bordered"><tr><th width="15%">Order Number</th><th width="10%">Name</th><th width="10%">Phone</th><th width="40%">Address</th><th width="5%">Postcode</th><th width="10%">Choose</th></tr></div>'
 var start = p * offset;
        var stop = p * offset + offset > result.length ? result.length : p * offset + offset;
        console.log(start + "  " + stop);

        for (i = start; i < stop; i++) {
            string += "<tr><td>" + result[i].order_id + "</td><td>" + result[i].recipient_name + "</td><td>" + result[i].recipient_phone + "</td><td>" + result[i].street_address+ result[i].city+ result[i].province+ "</td><td>" + result[i].postal_code + "</td><td><input type='radio' value='\" . $curid . \"' name = 'change_delivery' onclick='document.getElementById(\"change\").value=this.value'></td><tr>";
        }

        string += "</table>";
        $("#address").html(string);
        $("#history").html("");
        $("#payment").html("");
       
         var pages = "";
        for (i = 0; i < Math.ceil(result.length / offset); i++) {
            if (p == i) {
                pages += " <a href='javascript:void(0)' class='currentPage' onclick='displayResult(" + i + ");'>" + (i + 1) + "</a>";
            } else {
                pages += " <a href='javascript:void(0)' onclick='displayResult(" + i + ");'>" + (i + 1) + "</a>";
            }

        }
        $("#page").html(pages);
    }
    $("#showAddress").on("click",function() {
    
       var id = <?php echo $id?>;
      
        $.ajax({
            method: "GET",
            url: "getAddress.php",
            data:{user_id:id}

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

</script>
<script>
	var div1 = document.getElementById("paymentForm");
	var div2 = document.getElementById("addressForm");
	$("#showPayment").on("click",function() {
		
		if(div1.style.display="none"){
			div1.style.display="block";
			div2.style.display="none"

		}else{
			div1.style.display="";
			div2.style.display="none"

		}
	})
	$("#showAddress").on("click",function() {
		
		if(div2.style.display="none"){
			div2.style.display="";
			div1.style.display="none"

		}else{
			div2.style.display="";
			div1.style.display="none"

		}
	})

</script>
<script type="text/javascript"> 
    	$(function(){
    		$("input[name='optionsRadiosinline']").on('change',function(){
    			$.ajax({
    				method:"GET",
    				url:"getpromotion_selection.php",
    				data:{promotion:$("input[name='optionsRadiosinline']:checked").val()}
    			}).done(function(data){}); 
    		});
     	});


</script>

</html>