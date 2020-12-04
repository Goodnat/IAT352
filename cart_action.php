<?php
//check log in 
//This php implemet the order function and bind delivery and payment information
include("auth_sessionNotActiveCheck.php");
require('db.php');

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//initial variable to null
$sucessful = "";

//sign post value to variable in payment information
$card_name = test_input(!empty($_POST['card_name']) ? $_POST['card_name'] : "");
$card_number = test_input(!empty($_POST['card_number']) ? $_POST['card_number'] : "");
$expiry_date = test_input(!empty($_POST['expiry_date']) ? $_POST['expiry_date'] : "");
$card_cvc = test_input(!empty($_POST['card_cvc']) ? $_POST['card_cvc'] : "");

//sign post value to variable in delivery information
$recipient_name = test_input(!empty($_POST['recipient_name']) ? $_POST['recipient_name'] : "");
$recipient_phone = test_input(!empty($_POST['recipient_phone']) ? $_POST['recipient_phone'] : "");
$street_address = test_input(!empty($_POST['street_address']) ? $_POST['street_address'] : "");
$city = test_input(!empty($_POST['city']) ? $_POST['city'] : "");
$province = test_input(!empty($_POST['province']) ? $_POST['province'] : "");
$country = test_input(!empty($_POST['country']) ? $_POST['country'] : "");
$postal_code = test_input(!empty($_POST['postal_code']) ? $_POST['postal_code'] : "");

//check user name in session and select
$username = $_SESSION['username'];
$idsql = "SELECT users.user_id from `users` where users.username = '$username';";
$idresult = mysqli_query($conn, $idsql);

//crawl user id sign to variable
while ($row1 = mysqli_fetch_array($idresult)) {
    $id = $row1['user_id'];
}

//if click input name equal palce_an_order
if (isset($_POST["action"])) {
    if ($_POST["action"] == "insert") {
        //insert value to orders
        $sql_orders = "INSERT INTO `orders` (order_date)
                    VALUES ('" . date('Y-m-d H:i:s') . "'); ";
        $result = mysqli_query($conn, $sql_orders);

        //select order id from orders
        $sql = "SELECT order_id FROM orders order by order_id DESC limit 1";
        $result = mysqli_query($conn, $sql);
        $order_id = mysqli_fetch_assoc($result)["order_id"];

        //insert payment value to table payment_required
        $sql_payment_required = "INSERT INTO `payment_required` (order_id,card_name, card_number, expiry_date, card_cvc)
                     VALUES ('$order_id','$card_number','$card_name','$expiry_date','$card_cvc'); ";
        $result_payment_required = mysqli_query($conn, $sql_payment_required);

        //insert delivery value to table delivery_required
        $sql_delivery_required = "INSERT INTO `delivery_required` (order_id,create_time,recipient_name,recipient_phone, street_address, city,province,country,postal_code)
                     VALUES ('$order_id','" . date('Y-m-d H:i:s') . "','$recipient_name','$recipient_phone','$street_address','$city','$province','$country','$postal_code'); ";
        $result_delivery_required = mysqli_query($conn, $sql_delivery_required);

        //for loop shopping_cart value
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            $item_id = $values["item_id"];
            $item_quantity = $values["item_quantity"];
            $item_price = $values["item_price"];

            //insert the value in the session to order detail
            $sql_order_detail = "INSERT INTO `order_detail` (order_id, product_id, quantity, unit_price)
                VALUES ('$order_id', '$item_id','$item_quantity', '$item_price'); ";
            $result_order_detail = mysqli_query($conn, $sql_order_detail);

            //insert the order id in the session to mange order
            $sql_manage_order = "INSERT INTO `manage_order`(order_id,user_id)
                VALUES('$order_id','$id')";
            $result_manage_order  = mysqli_query($conn,  $sql_manage_order);
        }

        //after placed the order set value in $_SESSION["shopping_cart"] equal to 0
        $_SESSION["shopping_cart"] = array();
    }
}

?>