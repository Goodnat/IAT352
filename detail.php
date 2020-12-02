<?php
require('db.php');
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
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="membersLogin.php">Account</a>
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
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM `product` INNER JOIN `category` ON product.category_id = category.category_id WHERE product.product_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo '
        <!-- set a container to store the product pic and detail information -->                        
                <div class="container detail" > 
                    <form method="post" action="detail.php?id=' . $id . '">
                        <div class="row justify-content-center align-items-center" >
                            <div class="col-md-6 col-sm-12" >
                                <div class="img">
                                    <a class="test-popup-link" href="">
                                        <img src="imgs/' . $row['product_id'] . '.PNG" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="title py-5" >
                                    <h5>' . $row['name'] . '</h5>   
                                    <h1 class="text-uppercase">' . $row['category_name'] . ' $' . $row['price'] . '</h1>                      
                                    <div class="mt-5">
                                        <input type="number" name="item_quantity" id="item_quantity" class="form-control" value="1" />  
                                        <input type="hidden" name="item_id" id="item_id" value="'  . $row['product_id'] . '" > 
                                        <input type="hidden" name="item_name" id="item_name" value="' . $row['name'] . '" >
                                        <input type="hidden" name="item_price" id="item_price" value="' . $row['price'] . '" >
                                        <input type="button" class="btn btn-secondary mt-5" name="add_to_cart" id="add_to_cart" value="ADD TO CART">                            
                                        <input type="button" class="btn btn-secondary mt-5" value="GO TO CART" onclick="location.href=\'cart.php\';" />
                                    </div>
                                    <div class="mt-5">
                                        <em>Sold and shipped by ESHOP</em> 
                                        <h3>Overview:</h3>
                                        <p class="">"' . $row['description'] . '"</p>      
                                    </div>                                             
                                </div>
                            </div>
                        </div>
                    </form>                    
                    <hr>
                </div>
    ';
    }
    mysqli_close($conn);
    ?>


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

            $('#add_to_cart').on("click", function() {
                var action = "add";

                var test = {
                    item_id: $("#item_id").val(),
                    item_name: $("#item_name").val(),
                    item_quantity: $("#item_quantity").val(),
                    item_price: $("#item_price").val(),
                    action: action,
                };
                console.log(test);
                
                $.ajax({
                    url: "detail_action.php",
                    method: "POST",
                    data: {
                        item_id: $("#item_id").val(),
                        item_name: $("#item_name").val(),
                        item_quantity: $("#item_quantity").val(),
                        item_price: $("#item_price").val(),
                        action: action,
                    },
                    success: function(data) {
                        alert("Item has been added!");
                    }
                });

            });
        });
    </script>

    </main>

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

</html>