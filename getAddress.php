
<?php

require('db.php');
$result_array = array();

if (mysqli_connect_errno()) {
	die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
}

$idc = $_GET["user_id"];




	
	$sql = "SELECT manage_order.order_id,delivery_required.recipient_name,delivery_required.recipient_phone,delivery_required.street_address,delivery_required.city,delivery_required.province,delivery_required.country,delivery_required.postal_code 
				from delivery_required inner join manage_order 
				on delivery_required.order_id=manage_order.order_id 
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

	
	
