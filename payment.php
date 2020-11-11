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
                        <li class="nav-item  active">
                            <a class="nav-link" href="membersLogin.php">Cart<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row">

            <div class="col-md-5 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$20</strong>
                    </li>
                </ul>
            </div>

            <div class="col-md-7">

                <form class="needs-validation" method="post" action="cart.php">
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
                    <button class="btn btn-dark btn-lg" type="submit" name="submit" value="submit">Submit</button>
                    <hr class="mb-4">
                    <?php
                    require('db.php');

                    $cardName = (!empty($_POST['card_name']) ? $_POST['card_name'] : "");
                    $cardNumber = (!empty($_POST['card_number']) ? $_POST['card_number'] : "");
                    $expiryDate = (!empty($_POST['expiry_date']) ? $_POST['expiry_date'] : "");
                    $cardCvc = (!empty($_POST['card_cvc']) ? $_POST['card_cvc'] : "");

                    $sql = "INSERT INTO `payment` (card_name, card_number, expiry_date, card_cvc)
                     VALUES ('$cardName','$cardNumber','$expiryDate','$cardCvc'); ";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        echo "
                        <div class='container text-center'>
                            <h2>Submit Successfully</h2>
                            <h2><a href='delivery.php'>Go to Next Step</a></h2>
                        </div>";
                    } else {
                        echo "<p>Error: " . $sql . "</p>" . mysqli_error($conn);
                    }

                    // if ($result) {
                    //     echo  '
                    //     <p>Submit Successfully</p>
                    //     <p><a class="btn btn-secondary w-25" href="delivery.php" role="button">Next Step&raquo;</a></p>
                    //     ';
                    // } else {
                    //     echo '
                        
                    //     ';
                    // }
                    mysqli_close($conn);

                    ?>

                </form>


            </div>

        </div>
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
                                    <li><a class="text-muted" href="membersLogin.php">Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text">
                                <h5>Services</h5>
                                <ul class="list-unstyled text-small">
                                    <li><a class="text-muted" href="login.php">Login</a></li>
                                    <li><a class="text-muted" href="register.php">Register</a></li>
                                    <li><a class="text-muted" href="membersLogin.php">My Cart</a></li>
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
</body>

</html>