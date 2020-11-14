<?php
include("auth_sessionNotActiveCheck.php");
require('db.php');

if (isset($_POST["submit"])) {
    $item_id = intval($_GET['id']);
    $name =  $_POST["hidden_name"];
    $price = $_POST["hidden_price"];
    $quantity =  $_POST["quantity"];

    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($item_id, $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'           => $item_id,
                'item_name'         => $name,
                'item_price'        => $price,
                'item_quantity'     => $quantity
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
        }
    } else {
        $item_array = array(
            'item_id'           => $item_id,
            'item_name'         => $name,
            'item_price'        => $price,
            'item_quantity'     => $quantity
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}


if (isset($_GET["action"])) {
    $item_id = intval($_GET['id']);
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $item_id) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="detail.php?id=' . $item_id . '"</script>';
            }
        }
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
                                        <input type="number" name="quantity" class="form-control" value="1" />  
                                        <input type="hidden" name="hidden_name" value="' . $row['name'] . '" >
                                        <input type="hidden" name="hidden_price" value="' . $row['price'] . '" >
                                        <input type="submit" class="btn btn-secondary mt-5" name="submit"  value="ADD TO CART">                                      
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
                    <th width="5%">Action</th>
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
                            <td><a href="detail.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                        </tr>
                    <?php
                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                    }
                    ?>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

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



    <!-- Jquery js file-->
    <script src="js/jquery.3.5.1.js"></script>

    <!-- Boostrap js file-->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>