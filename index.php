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
    <?php
    include("auth.php");
    ?>

    <header class="header_area">
        <!-- code source from https://getbootstrap.com/docs/4.5/components/navbar/ -->
        <div class="main-menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <h1>ESHOP</h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Account: <?php echo $_SESSION['username']; ?></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <section class="slides-area">
            <!-- code source from https://getbootstrap.com/docs/4.5/components/carousel/ -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="imgs/slide1.jpg" class="d-block w-100" alt="1">
                    </div>
                    <div class="carousel-item">
                        <img src="imgs/slide2.jpg" class="d-block w-100" alt="2">
                    </div>
                    <div class="carousel-item">
                        <img src="imgs/slide1.jpg" class="d-block w-100" alt="1">
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
        </section>

        <!-- shop area start -->
        <section class="product-area">
            <div class="container">
                <div class="project-title pb-5">
                    <h1 class="text-uppercase title-h1">New Products</h1>
                    <h1 class="text-uppercase title-h1">Best Sales</h1>
                </div>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="button-group">
                    <button type="button" class="active" id="btn1" data-filter="*">All</button>
                    <button type="button" data-filter=".computer">Computers</button>
                    <button type="button" data-filter=".phone">Phones</button>
                    <button type="button" data-filter=".camera">Cameras</button>
                    <button type="button" data-filter=".audio">Audios</button>
                </div>

                <div class="row grid">
                    <div class="col-lg-4 col-md-6 col-sm-12 element-item phone">
                        <div class="our-product">
                            <div class="img">
                                <a class="test-popup-link" href="">
                                    <img src="imgs/1.jpg" alt="product-1" class="img-fluid">
                                </a>
                            </div>
                            <div class="title py-4">
                                <h4 class="text-uppercase">Minimul Desing</h4>
                                <span class="text-secondary">phone, product</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 element-item computer">
                        <div class="our-product">
                            <div class="img">
                                <a class="test-popup-link" href="">
                                    <img src="imgs/2.jpg" alt="product-2" class="img-fluid">
                                </a>
                            </div>
                            <div class="title py-4">
                                <h4 class="text-uppercase">Paint Wall</h4>
                                <span class="text-secondary">computer, product</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 element-item computer">
                        <div class="our-product">
                            <div class="img">
                                <a class="test-popup-link" href="">
                                    <img src="imgs/3.jpg" alt="product-3" class="img-fluid">
                                </a>
                            </div>
                            <div class="title py-4">
                                <h4 class="text-uppercase">Female light</h4>
                                <span class="text-secondary">computer, product</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 element-item audio">
                        <div class="our-product">
                            <div class="img">
                                <a class="test-popup-link" href="">
                                    <img src="imgs/4.jpg" alt="product-4" class="img-fluid">
                                </a>
                            </div>
                            <div class="title py-4">
                                <h4 class="text-uppercase">Fourth Air</h4>
                                <span class="text-secondary">audio, product</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 element-item audio">
                        <div class="our-product">
                            <div class="img">
                                <a class="test-popup-link" href="">
                                    <img src="imgs/5.jpg" alt="product-5" class="img-fluid">
                                </a>
                            </div>
                            <div class="title py-4">
                                <h4 class="text-uppercase">Muliple fown</h4>
                                <span class="text-secondary">audio, product</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 element-item camera">
                        <div class="our-product">
                            <div class="img">
                                <a class="test-popup-link" href="">
                                    <img src="imgs/6.jpg" alt="product-6" class="img-fluid">
                                </a>
                            </div>
                            <div class="title py-4">
                                <h4 class="text-uppercase">Together sign</h4>
                                <span class="text-secondary">camera, product</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 element-item camera">
                        <div class="our-product">
                            <div class="img">
                                <a class="test-popup-link" href="">
                                    <img src="imgs/7.jpg" alt="product-7" class="img-fluid">
                                </a>
                            </div>
                            <div class="title py-4">
                                <h4 class="text-uppercase">Green Heaven</h4>
                                <span class="text-secondary">camera, product</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 element-item camera">
                        <div class="our-product">
                            <div class="img">
                                <a class="test-popup-link" href="">
                                    <img src="imgs/8.jpg" alt="product-8" class="img-fluid">
                                </a>
                            </div>
                            <div class="title py-4">
                                <h4 class="text-uppercase">Fly Male</h4>
                                <span class="text-secondary">camera, product</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 element-item audio">
                        <div class="our-product">
                            <div class="img">
                                <a class="test-popup-link" href="">
                                    <img src="imgs/9.jpg" alt="product-9" class="img-fluid">
                                </a>
                            </div>
                            <div class="title py-4">
                                <h4 class="text-uppercase">Camera Lens</h4>
                                <span class="text-secondary">audio, product</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-area">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12">
                        <div class="about-title">
                            <h1 class="text-uppercase title-h1">About US</h1>
                            <p class="para">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus, deleniti recusandae. Esse incidunt rem repellendus ab voluptates maxime? Nemo, numquam! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus, deleniti recusandae.
                                Esse incidunt rem repellendus ab voluptates maxime? Nemo, numquam! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus, deleniti recusandae. Esse incidunt rem repellendus ab voluptates maxime? Nemo, numquam!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer>
            <div class="container">
                <div class="">
                    <div class="social text-center">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                    <div class="copyrights text-center">
                        <p class="para">
                            Copyright ©2019 All rights reserved
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </main>


    <!-- Jquery js file-->
    <script src="js/jquery.3.5.1.js"></script>

    <!-- Boostrap js file-->
    <script src="js/bootstrap.min.js"></script>

    <!--  my js file  -->
    <script src="js/product.js"></script>

    <!--  isotope js library  -->
    <script src="js/isotope.min.js"></script>

</body>

</html>