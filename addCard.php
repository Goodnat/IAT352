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
	   // $order_id 
    //     = 
    //     $_SESSION
    //     [
    //     'order_id'
    //     ];
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
if(!isset($_POST['submit'])){ 
//如果没有表单提交，显示一个表单 
?> 

<div>
	<!-- <h2>your order Number is : <?php echo"$order_id";?></h2> -->
	<?php
	$name=$_SESSION['username'];
			
			$idsql = "select users.user_id from `users` where users.username = '$name';";
			
			$idresult = $conn->query($idsql);
			
			while ($row1 = $idresult->fetch_assoc()) {
            $id= $row1['user_id'];}
	
	$cursql = "select orders.order_id,orders.order_date,payment_required.card_number,payment_required.card_name from orders inner join payment_required on orders.order_id = payment_required.order_id inner join manage_order on orders.order_id = manage_order.order_id where manage_order.user_id='$id'";
            $curresult = $conn->query($cursql);
            
  echo"<div class='table-responsive'>
            <table class='table table-bordered'>
                <tr>
                    <th width='30%'>Order Number</th>
                    <th width='20%'>OrderDate</th>
                    <th width='20%'>Card Number</th>
                    <th width='15%'>Name on Card</th>
                    <th width='5%'>Edit</th>
                </tr></div>";
            ?>
            <?php
           
         while($row = $curresult->fetch_assoc()){
         	if($row>0){
        

echo "<tr>";
echo "<td>".$row["order_id"]."</td>"; //display ID
echo "<td>".$row["order_date"]." </td>"; //display name
echo "<td>".$row["card_number"]." </td>";//display price
echo "<td>".$row["card_name"]." </td>";
echo"<td><button id='button' onclick='Click()'> Edit</button></td>";


echo "</tr>";
}}


echo "</table>";
            ?>


</div>
<form  id="form"style ="display:none;"method="post" action="cart.php?action=add&id=<?php echo $values["item_id"]; ?>">
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

                    <hr class="mb-3">

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                    </div>

                    <hr class="mb-3">

                    <input type="hidden" name="hidden_quantity" value="<?php echo $values["item_quantity"]; ?>">
                    <input type="submit" name="palce_an_order" class="btn btn-secondary mt-3  mt-3" value="Change">
                </div>

                <hr class="mb-4">
            </div>
        </form>
    </div>
<?php 
} 
else
{ 

// 何问起 hovertree.com
//取得表单中的值，检查表单中的值是否符合标准，并做适当转义，防止SQL注入 
$num = empty($_POST['card_number'])? die("plase enter card number"): 
($_POST['card_number']); 
$name = empty($_POST['card_name'])? die("plase enter name"): 
($_POST['card_name']); 
$expiry = empty($_POST['expiry_date'])? die("plase enter expiry date"): 
($_POST['expiry_date']); 
$code = empty($_POST['card_cvc'])? die("plase enter code"): 
($_POST['card_cvc']); 


//打开数据库连接 

//构造一个SQL查询 
$query = "UPDATE payment_required SET card_number ='$num', card_name= '$name', expiry_Date= '$expiry',card_cvc= '$code' where order_id = '$order_id';";
//执行该查询 
// mysql_query($query);
$result=$conn->query($query);
//插入操作成功后，显示插入记录的记录号 
echo "add Successful";
//关闭当前数据库连接 

} 
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
	

	function Click(){
		
		
	    var div = document.getElementById('form');
		if(div.style.display="none"){
			div.style.display="block";
		}
		else if(div.style.display="block"){
			div.style.display="none";
		}


	}

</script>



</html>