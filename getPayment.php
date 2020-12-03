
<?php

require('db.php');
$result_array = array();

if (mysqli_connect_errno()) {
	die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
}

$idc = $_GET["user_id"];

$sql = "SELECT orders.order_id,orders.order_date,payment_required.card_number,payment_required.card_name ,payment_required.card_cvc
				FROM orders inner join payment_required 
				on orders.order_id = payment_required.order_id 
				inner join manage_order 
				on orders.order_id = manage_order.order_id 
				where manage_order.user_id ='$idc'";

$result = mysqli_query($conn, $sql);
$results_rows = mysqli_num_rows($result);
if ($results_rows > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($result_array, $row);
	}
}
echo json_encode($result_array);


?>

	
	
