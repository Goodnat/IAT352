<?php
session_start();
require('db.php'); //connection to db code
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle     vigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Shop<span class="sr-only">(current)</span></a>
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

    <main>



        <!-- code source from https://getbootstrap.com/docs/4.5/components/carousel/-->
        <div id="carouselExampleIndicators" class="carousel slide jumbotron" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row text-center align-items-center">
                            <div class="col-6">
                                <div class="about-title">
                                    <img src="imgs/5.PNG" class="d-block w-75" alt="1">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="about-title mx-auto my-5">
                                    <h1 class="text-uppercase title-h1">Sony</h1>
                                    <p class="para">
                                        a7 III Full-Frame Mirrorless Camera with 28-70mm OSS Lens Kit
                                    </p>
                                    <!--move to product area-->
                                    <a href="#product">Learned More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row text-center align-items-center">
                            <div class="col-6">
                                <div class="about-title">
                                    <img src="imgs/10.PNG" class="d-block w-75" alt="1">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="about-title mx-auto my-5">
                                    <h1 class="text-uppercase title-h1">Samsung</h1>
                                    <p class="para">
                                        65" 4K UHD HDR LED Tizen Smart TV (UN65TU8500FXZC)
                                    </p>
                                    <!--move to product area-->
                                    <a href="#product">Learned More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row text-center align-items-center">
                            <div class="col-6">
                                <div class="about-title">
                                    <img src="imgs/1.PNG" class="d-block w-75" alt="1">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="about-title mx-auto my-5">
                                    <h1 class="text-uppercase title-h1">Beats</h1>
                                    <p class="para">
                                        by Dr. Dre Solo3 Icon On-Ear Sound Isolating Bluetooth Headphones
                                    </p>
                                    <!--move to product area-->
                                    <a href="#product">Learned More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <!-- shop area start -->
        <section class="product-area" id="product">
            <div class="container">
                <div class="project-title pb-5">
                    <h1 class="text-uppercase title-h1">New Products</h1>
                    <h1 class="text-uppercase title-h1">Best Sales</h1>
                </div>
                <div>
                    <form method="post" action="index.php">

                        <!-- the filter to show the product -->
                        <!-- all the form checked as when the query has been submitted. -->
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="category" value="1" /> AUDIO
                            </label>

                            <label>
                                <input type="checkbox" class="category" value="2" /> CAMERA
                            </label>

                            <label>
                                <input type="checkbox" class="category" value="3" /> COMPUTER
                            </label>

                            <label>
                                <input type="checkbox" class="category" value="4" /> TV
                            </label>
                        </div>
                        <div>
                            PRICE FROM: <input type="number" name="price1" id="price1" value="<?php echo (isset($_POST['price1']) ? $_POST['price1'] : ''); ?>" />
                            TO: <input type="number" name="price2" id="price2" value="<?php echo (isset($_POST['price2']) ? $_POST['price2'] : ''); ?>" />
                        </div>

                        <input type="button" value="Search" class="searchButton" /><!-- do the search -->
                    </form>


                    <div class='container mt-5'>

                        <div id="result"> </div>

                    </div>
                    <div id="page" class="float-right"></div>

                    <script>
                        var result;
                        var offset = 6;
                        $(document).ready(function() {
                            var categories = [];
                            $('.category').each(function() {
                                if ($(this).is(":checked")) {
                                    categories.push($(this).val());
                                }
                            });
                            categories = categories.toString();

                            var test = {
                                categories: categories,
                                price1: $("#price1").val(),
                                price2: $("#price2").val()
                            };
                            console.log(test);

                            $.ajax({
                                method: "POST",
                                url: "getIndexData.php",
                                data: {
                                    categories: categories,
                                    price1: $("#price1").val(),
                                    price2: $("#price2").val()
                                },

                            }).done(function(data) {
                                console.log(data);
                                result = $.parseJSON(data);
                                console.log(result);
                                if (result.length > 0) {
                                    displayResult(0);
                                } else {
                                    $("#result").html("<h5>No Products Found</h5>");
                                }
                            });
                        });

                        function displayResult(p) {
                            console.log(p);
                            var content = "";
                            var start = p * offset;
                            var stop = p * offset + offset > result.length ? result.length : p * offset + offset;
                            console.log(start + "  " + stop);

                            for (i = start; i < stop; i += 3) {

                                content += "<div class='row'><div class='col-lg-4 col-md-6 col-sm-12 our-product'><div class='img'><a class='test-popup-link' href='detail.php?id=" + result[i].product_id + "'><img src='imgs/" + result[i].product_id + ".PNG' class='img-fluid'></a></div><div class='title py-4'><h3 class='text-uppercase'>" + result[i].category_name + " " + result[i].price + "</h3> <span class='text-secondary'> " + result[i].name + "</span> <div class='text-secondary'><a href='detail.php?id=" + result[i].product_id + "'>Detail info</a></div></div></div>";
                                content += "<div class='col-lg-4 col-md-6 col-sm-12 our-product'><div class='img'><a class='test-popup-link' href='detail.php?id=" + result[i + 1].product_id + "'><img src='imgs/" + result[i + 1].product_id + ".PNG' class='img-fluid'></a></div><div class='title py-4'><h3 class='text-uppercase'>" + result[i + 1].category_name + " " + result[i + 1].price + "</h3> <span class='text-secondary'> " + result[i + 1].name + "</span> <div class='text-secondary'><a href='detail.php?id=" + result[i + 1].product_id + "'>Detail info</a></div></div></div>";
                                content += " <div class='col-lg-4 col-md-6 col-sm-12 our-product'><div class='img'><a class='test-popup-link' href='detail.php?id=" + result[i + 2].product_id + "'><img src='imgs/" + result[i + 2].product_id + ".PNG' class='img-fluid'></a></div><div class='title py-4'><h3 class='text-uppercase'>" + result[i + 2].category_name + " " + result[i + 2].price + "</h3> <span class='text-secondary'> " + result[i + 2].name + "</span> <div class='text-secondary'><a href='detail.php?id=" + result[i + 2].product_id + "'>Detail info</a></div></div></div></div>";

                            }
                            console.log(content);
                            $("#result").html(content);

                            var pages = "";
                            for (i = 0; i < Math.ceil(result.length / offset); i++) {
                                if (p == i) {
                                    pages += " <a href='javascript:void(0)' class='currentPage display-4' onclick='displayResult(" + i + ");'> " + (i + 1) + " </a>";
                                } else {
                                    pages += " <a href='javascript:void(0)'class='display-4' onclick='displayResult(" + i + ");'> " + (i + 1) + " </a>";
                                }
                            }
                            $("#page").html(pages);
                        }

                        $(".searchButton").on("click", function() {

                            var categories = [];
                            $('.category').each(function() {
                                if ($(this).is(":checked")) {
                                    categories.push($(this).val());
                                }
                            });
                            categories = categories.toString();

                            var test = {
                                categories: categories,
                                price1: $("#price1").val(),
                                price2: $("#price2").val()
                            };
                            console.log(test);

                            $.ajax({
                                method: "POST",
                                url: "getIndexData.php",
                                data: {
                                    categories: categories,
                                    price1: $("#price1").val(),
                                    price2: $("#price2").val()
                                },

                            }).done(function(data) {
                                console.log(data);
                                result = $.parseJSON(data);
                                console.log(result);
                                if (result.length > 0) {
                                    displayResult(0);
                                } else {
                                    $("#result").html("<h5>No Products Found</h5>");
                                }
                            });

                        });
                    </script>

                </div>

            </div>
        </section>
    </main>
    
    <!--promotion img-->
    <?php
    if (isset($_SESSION["username"])) {
        $sql="SELECT promotion FROM users WHERE username='".$_SESSION["username"]."'";
        $result = mysqli_query($conn, $sql);
                $results_rows = mysqli_num_rows($result);
                if ($results_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $promotion_value=$row["promotion"];
        if($promotion_value == "1"){
            echo"
            <div class=\"promotion_img1\">
            <img src=\"imgs/promotion1.jpg\" >

            </div>

            <div class=\"promotion_img2\">
            <img src=\"imgs/promotion2.jpg\" >

            </div>
            ";
        }
    }
}
    ?>
    <!--promotion img end-->

    
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
