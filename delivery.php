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
    <main>
        <div class="container">
            <form class="needs-validation" method="post" action="">
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
                    <div class="col-md-4 mb-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" name="country" placeholder="Canada" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="address">Province</label>
                        <input type="text" class="form-control" name="province" placeholder="BC" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="address">City</label>
                        <input type="text" class="form-control" name="city" placeholder="Surrey" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" name="postal_code" placeholder="xxxxxx" required>
                </div>

                <hr class="mb-4">

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                </div>

                <hr class="mb-4">

                <button class="btn btn-dark btn-lg" type="submit">Place Order</button>
            </form>
            <?php
            require('db.php');

            $recipientName = (!empty($_POST['recipient_name']) ? $_POST['recipient_name'] : "");
            $recipientPhone = (!empty($_POST['recipient_phone']) ? $_POST['recipient_phone'] : "");
            $streetAddress = (!empty($_POST['street_address']) ? $_POST['street_address'] : "");
            $country = (!empty($_POST['country']) ? $_POST['country'] : "");
            $province = (!empty($_POST['province']) ? $_POST['province'] : "");
            $city = (!empty($_POST['city']) ? $_POST['city'] : "");
            $postalCode = (!empty($_POST['postal_code']) ? $_POST['postal_code'] : "");

            $sql = "INSERT INTO `delivery` (recipient_name, recipient_phone, street_address, country, province, city, postal_code)
                     VALUES ('$recipientName',' $recipientPhone','$streetAddress','$country', ' $province', '$city', '$postalCode') ON DUPLICATE KEY UPDATE deliverey_id= '$recipientPhone'+1 ; ";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo  '
                <p>Submit Successfully</p>
                <p><a class="btn btn-secondary w-25" href="order.php" role="button">Next Step&raquo;</a></p>
                ';
            } else {
                echo '
                <button class="btn btn-dark btn-lg" type="submit"  name="submit" value ="submit">Submit</button>
                ';
            }
            mysqli_close($conn);

            ?>
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