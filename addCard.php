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
	   $order_id 
        = 
        $_SESSION
        [
        'order_id'
        ];
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
	
	$cursql = "select orders.order_id,orders.order_date,payment_required.card_number from orders inner join payment_required on orders.order_id = payment_required.order_id where orders.order_id='$order_id'";
            $curresult = $conn->query($cursql);
            
  echo "<table class='table-striped table-hover table-bordered display-5 '>";
            echo "<tr ><td class='p-2'>Order ID</td>
            
            <td class='p-2'>date</td>
            <td class='p-2'>Card Number</td>
            <td class='p-2'>Edit</td>
            </tr>";
            ?>
            <?php
           
         while($row = $curresult->fetch_assoc()){
         	if($row>0){
        

echo "<tr>";
echo "<td>".$row["order_id"]."</td>"; //display ID
echo "<td>".$row["order_date"]." </td>"; //display name
echo "<td>".$row["card_number"]." </td>";//display price
echo"<td><button id='button' onclick='Click()'> Edit</button></td>";


echo "</tr>";
}}


echo "</table>";
            ?>


</div>
<form  style="display:none"id ="form"action="" method="post"> 
Card Number：<input type="text" name="num" /> <br>
Name On Card：<input type="text" name="name" /> <br>
Expirty Date：<input type="text" name="expiry" /> <br>
Code：<input type="text" name="code" /> <br>
<input type="submit" name="submit" value="Add" /> 
</form> 
<?php 
} 
else
{ 

// 何问起 hovertree.com
//取得表单中的值，检查表单中的值是否符合标准，并做适当转义，防止SQL注入 
$num = empty($_POST['num'])? die("plase enter card number"): 
($_POST['num']); 
$name = empty($_POST['name'])? die("plase enter name"): 
($_POST['name']); 
$expiry = empty($_POST['expiry'])? die("plase enter expiry date"): 
($_POST['expiry']); 
$code = empty($_POST['code'])? die("plase enter code"): 
($_POST['code']); 
//打开数据库连接 

//构造一个SQL查询 
$query = "UPDATE payment_required SET card_number ='$num', card_name= '$name', expiry_Date= '$expiry',card_cvc= '$code' where order_id = $order_id;";
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
		else{
			div.style.display="none";
		}


	}

</script>



</html>