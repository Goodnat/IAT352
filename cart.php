<!--
    This cart.php implemet the order function and bind delivery and payment information
-->
<?php
//check log in 
include("auth_sessionNotActiveCheck.php");
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
    <link rel="stylesheet" type="text/css" href="css/mainStyle.css">

    <!-- Jquery js file-->
    <script src="js/jquery.3.5.1.js"></script>

    <!-- Boostrap js file-->
    <script src="js/bootstrap.min.js"></script>
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
            <!-- if cart is empty show "Your Cart is Empty!" -->
            <?php
            if (!empty($_SESSION["shopping_cart"])) {
                echo "Your Cart";
            } else {
                echo "Your Cart is Empty!";
            }
            ?>
        </h3>

        <div class="panel-body" id="shopping_cart">

        </div>

        <!-- show the Shipping input -->
        <form method="post" action="cart.php?action=add&id=<?php echo $values["item_id"]; ?>">
            <div class="row">
                <div class="col-7 mt-5 cart">

                    <h4 class="mb-3">Shipping address</h4>
                    <div class="mb-3">
                        <label for="name">Recipient Name</label>
                        <input type="text" class="form-control" name="recipient_name" id="recipient_name" placeholder="Nick_Peter" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="recipient_phone" id="recipient_phone" placeholder="xxxxxxxxxx" required>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="street_address" id="street_address" placeholder="1234 Main St" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="address">City</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="Surrey" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="address">Province</label>
                            <input type="text" class="form-control" name="province" id="province" placeholder="BC" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="country" id="country" placeholder="Canada" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="xxxxxx" required>
                        </div>
                    </div>


                </div>

                <!-- show the payment input -->
                <div class="col-md-5 mt-5">
                    <h4 class="mb-3">Payment</h4>

                    <div class="mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" class="form-control" name="card_name" id="card_name" required>
                        <small class="text-muted">Full name as displayed on card</small>
                    </div>

                    <div class="mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" name="card_number" id="card_number" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="date" class="form-control" name="expiry_date" id="expiry_date" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input class="form-control" type="number" maxlength="3" pattern="([0-9]|[0-9]|[0-9])" name="card_cvc" id="card_cvc" required>
                        </div>
                    </div>


                    <hr class="mt-5 mb-5">

                    <!-- input for place the order -->
                    <input type="button" class="btn btn-secondary mt-3 float-right mt-3" name="palce_an_order" id="palce_an_order" value="Place An Order">
                </div>

                <hr class="mb-4">
            </div>
        </form>
    </div>


    <script>
        $(document).ready(function() {
            load_cart_data();

            function load_cart_data() {
                $.ajax({
                    url: "fetch_cart.php",
                    method: "POST",
                    success: function(data) {
                        $('#shopping_cart').html(data);
                    }
                });
            }

            $(document).on('click', '.delete', function() {
                var item_id = $(this).attr("id");
                var action = 'remove';
                var test = {
                    item_id: item_id,
                    action: action,
                };
                console.log(test);

                if (confirm("Are you sure you want to remove this product?")) {
                    $.ajax({
                        url: "detail_action.php",
                        method: "POST",
                        data: {
                            item_id: item_id,
                            action: action
                        },
                        success: function(data) {
                            load_cart_data();
                            alert("Item has been removed from Cart");
                        }
                    })
                } else {
                    return false;
                }
            });

            $('#palce_an_order').on("click", function() {

                var action = "insert";

                $.ajax({
                    url: "cart_action.php",
                    method: "POST",
                    data: {
                        recipient_name: $("#recipient_name").val(),
                        recipient_phone: $("#recipient_phone").val(),
                        street_address: $("#street_address").val(),
                        province: $("#province").val(),
                        country: $("#country").val(),
                        postal_code: $("#postal_code").val(),
                        card_name: $("#card_name").val(),
                        card_number: $("#card_number").val(),
                        expiry_date: $("#expiry_date").val(),
                        card_cvc: $("#card_cvc").val(),
                        action: action,
                    },
                    success: function(data) {
                        load_cart_data();
                        alert("Order has been placed!");
                    }
                });

            });
        });
    </script>

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

</body>

</html>