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
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="membersLogin.php">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="membersLogin.php">Cart</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <?php
    include("db.php");
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM `product` INNER JOIN `category` ON product.category_id = category.category_id WHERE product.product_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo '
        <!-- set a container to store the product pic and detail information -->                        
        <div class="container detail" > 
                    <div class="row justify-content-center align-items-center" >
                        <div class="col-md-6 col-sm-12" >
                            <div class="img">
                                <a class="test-popup-link" href="">
                                    <img src="imgs/' . $row['product_id'] . '.PNG" class="img-fluid">
                                </a>
                            </div>
                            <div class="py-5">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="title py-5" >
                                <h1 class="text-uppercase">' . $row['category_name'] . ' $' . $row['price'] . '</h1>
                                <h5 class="text-uppercase">' . $row['name'] . '</h5>                            
                                <button type="button" class="btn btn-dark btn-lg mt-5">ADD TO CART</button>   
                                <div class="mt-5">
                                    <p ><strong>Sold and shipped by ESHOP</strong></p> 
                                    <h3>Overview:</h3>
                                    <p class="">"' . $row['description'] . '"</p>      
                                </div>                                             
                            </div>
                        </div>
                    </div>
                    <hr>
                    </div>
                </div>
         </div>';
    }

    ?>
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