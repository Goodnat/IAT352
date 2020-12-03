
<?php

require('db.php');
$result_array = array();

if (mysqli_connect_errno()) {
	die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
}

$idc = $_GET["user_id"];




	
	$sql = "select order_detail.order_id,product.name,product.price,order_detail.quantity,orders.order_date from order_detail inner join product on product.product_id = order_detail.product_id inner join manage_order on order_detail.order_id = manage_order.order_id inner join orders on order_detail.order_id = orders.order_id where manage_order.user_id = '$idc'";

	$result = mysqli_query($conn, $sql);
	$results_rows = mysqli_num_rows($result);
	if ($results_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($result_array, $row);
		}
	}
		echo json_encode($result_array);
	

?>

	
	
