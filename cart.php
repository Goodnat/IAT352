<?php
include("auth_sessionNotActiveCheck.php");
require('db.php');
if (isset($_GET["action"])) {
    $item_id = intval($_GET['id']);
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $item_id) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="cart.php?id=' . $item_id . '"</script>';
            }
        }
    }
}

$sucessful = "";

$cardName = (!empty($_POST['card_name']) ? $_POST['card_name'] : "");
$cardNumber = (!empty($_POST['card_number']) ? $_POST['card_number'] : "");
$expiryDate = (!empty($_POST['expiry_date']) ? $_POST['expiry_date'] : "");
$cardcvc = (!empty($_POST['card_cvc']) ? $_POST['card_cvc'] : "");

$name = (!empty($_POST['recipient_name']) ? $_POST['recipient_name'] : "");
$phone = (!empty($_POST['recipient_phone']) ? $_POST['recipient_phone'] : "");
$street = (!empty($_POST['city']) ? $_POST['city'] : "");
$city = (!empty($_POST['card_cvc']) ? $_POST['card_cvc'] : "");
$province = (!empty($_POST['province']) ? $_POST['province'] : "");
$country = (!empty($_POST['country']) ? $_POST['country'] : "");
$code = (!empty($_POST['postal_code']) ? $_POST['postal_code'] : "");

$username = $_SESSION['username'];

$idsql = "select users.user_id from `users` where users.username = '$username';";

$idresult = mysqli_query($conn, $idsql);

while ($row1 = mysqli_fetch_array($idresult)) {
    $id = $row1['user_id'];
}

if (isset($_POST["palce_an_order"])) {
    $sql_orders = "INSERT INTO `orders` (order_date)
    VALUES ('" . date('Y-m-d H:i:s') . "'); ";
    $result = mysqli_query($conn, $sql_orders);

    $sql = "SELECT order_id FROM orders order by order_id DESC limit 1";
    $result = mysqli_query($conn, $sql);
    $order_id = mysqli_fetch_assoc($result)["order_id"];

    $sql_payment_required = "INSERT INTO `payment_required` (order_id,card_name, card_number, expiry_date, card_cvc)
                     VALUES ('$order_id','$cardName','$cardNumber','$expiryDate','$cardcvc'); ";
    $result_payment_required = mysqli_query($conn, $sql_payment_required);

    $sql_delivery_required = "INSERT INTO `delivery_required` (order_id,create_time,recipient_name,recipient_phone, street_address, city,province,country,postal_code)
                     VALUES ('$order_id','" . date('Y-m-d H:i:s') . "','$name','$phone','$street','$city','$province','$country','$code'); ";
    $result_delivery_required = mysqli_query($conn, $sql_delivery_required);


    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        $product_id = $values["item_id"];
        $product_quantity = $values["item_quantity"];
        $product_unit_price = $values["item_price"];

        $sql_order_detail = "INSERT INTO `order_detail` (order_id, product_id, quantity, unit_price)
                VALUES ('$order_id', '$product_id','$product_quantity', '$product_unit_price'); ";
        $result_order_detail = mysqli_query($conn, $sql_order_detail);

        $sql_manage_order = "INSERT INTO `manage_order`(order_id,user_id)
                VALUES('$order_id','$id')";
        $result_manage_order  = mysqli_query($conn,  $sql_manage_order);
    }

    $_SESSION["shopping_cart"] = array();

    if ($result_order_detail) {
        $sucessful = '
        <div class="container text-center" style="margin:5em auto;">

            <h1>Thank you for shopping with us!</h1>

            <p>Your order number is <em>#' . $order_id . '</em>. We have received your order and will process it immediately.</p>
            <p>You will see the order detail in your account.</p>

            <h3>Please feel free to continue shoppping at any time.</h3>

            <p><a class="btn btn-secondary w-25 mt-3" href="payment.php" role="button">CONTINUE SHOPPING &raquo;</a></p>

        </div>
        ';
    } else {
        echo "<p>Error: " . $sql . "</p>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESHOP</title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="membersLogin.php">Account</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="cart.php">Cart</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">

        <h3>
            <?php
            if (!empty($_SESSION["shopping_cart"])) {
                echo "Your Cart";
            } else {
                echo "Your Cart is Empty!";
            }
            ?>
        </h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th width="40%">Item Name</th>
                    <th width="10%">Quantity</th>
                    <th width="20%">Price</th>
                    <th width="15%">Total</th>
                    <th width="5%">Delete</th>
                </tr>
                <?php
                if (!empty($_SESSION["shopping_cart"])) {
                    $total = 0;
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                ?>
                        <tr>
                            <td><?php echo $values["item_name"]; ?></td>
                            <td><?php echo $values["item_quantity"]; ?></td>
                            <td>$ <?php echo $values["item_price"]; ?></td>
                            <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                            <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                        </tr>
                    <?php
                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                    }
                    ?>
                <?php
                }
                ?>
            </table>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (CAD)</span>
                    <strong>$
                        <?php
                        if (!empty($_SESSION["shopping_cart"])) {
                            echo number_format($total, 2);
                        } else {
                            echo "0";
                        }
                        ?>
                    </strong>
                </li>
            </ul>
        </div>
        <?php echo "$sucessful"; ?>
        <form method="post" action="cart.php?action=add&id=<?php echo $values["item_id"]; ?>">
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

                </div>

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
                    <input type="submit" name="palce_an_order" class="btn btn-secondary mt-3 float-right mt-3" value="Place An Order">
                </div>

                <hr class="mb-4">
            </div>
        </form>
    </div>



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

    </main>


    <!-- Jquery js file-->
    <script src="js/jquery.3.5.1.js"></script>

    <!-- Boostrap js file-->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>