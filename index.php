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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
                            <a class="nav-link" href="login.php">Account</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main>

        <section class="slides-area container">

            <!-- code source from https://getbootstrap.com/docs/4.5/components/carousel/-->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="about-title">
                                        <img src="imgs/Sony Camera.PNG" class="d-block w-50" alt="1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="about-title mx-auto my-5">
                                        <h1 class="text-uppercase title-h1">Sony</h1>
                                        <p class="para">
                                            Sony,a7 III Full-Frame Mirrorless Camera with 28-70mm OSS Lens Kit,2799,Black
                                        </p>
                                        <a href="#">Learned More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="about-title">
                                        <img src="imgs/Samsung Smart TV.PNG" class="d-block w-50" alt="1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="about-title mx-auto my-5">
                                        <h1 class="text-uppercase title-h1">Samsung</h1>
                                        <p class="para">
                                            Samsung,65" 4K UHD HDR LED Tizen Smart TV (UN65TU8500FXZC),1199,Black
                                        </p>
                                        <a href="#">Learned More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="about-title">
                                        <img src="imgs/Beats Headphones.PNG" class="d-block w-50" alt="1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="about-title mx-auto my-5">
                                        <h1 class="text-uppercase title-h1">Beats</h1>
                                        <p class="para">
                                            Beats,by Dr. Dre Solo3 Icon On-Ear Sound Isolating Bluetooth Headphones,249,Rose Gold
                                        </p>
                                        <a href="#">Learned More</a>
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

        </section>

        <!-- shop area start -->
        <section class="product-area">
            <div class="container">
                <div class="project-title pb-5">
                    <h1 class="text-uppercase title-h1">New Products</h1>
                    <h1 class="text-uppercase title-h1">Best Sales</h1>
                </div>
                <div>
                    <form action="index.php" method="get">
                        <?php
                        if (isset($_GET['product'])) {
                            if ($_GET['product'] == "all") {
                                $product = array("audio", "camera", "computer", "TV");
                            } else {
                                $product = array($_GET['product']);
                            }
                        } else {
                            $product = array("audio", "camera", "computer", "TV");
                        }
                        if (count($product) > 1) {
                            echo " 
                            <input type='radio' name='product' value='all' selected> All 
                            <input type='radio' name='product' value='audio'> Audio   
                            <input type='radio' name='product' value='camera'> Camera           
                            <input type='radio' name='product' value='computer'> Computer  
                            <input type='radio' name='product' value='TV'>TV";
                        } else if ($product[0] == 'audio') {
                            echo " 
                            <input type='radio' name='product' value='all'> All 
                            <input type='radio' name='product' value='audio' selected> Audio   
                            <input type='radio' name='product' value='camera'> Camera           
                            <input type='radio' name='product' value='computer'> Computer  
                            <input type='radio' name='product' value='TV'> TV";
                        } else if ($product[0] == 'camera') {
                            echo " 
                            <input type='radio' name='product' value='all'> All 
                            <input type='radio' name='product' value='audio'> Audio   
                            <input type='radio' name='product' value='camera' selected> Camera           
                            <input type='radio' name='product' value='computer'> Computer  
                            <input type='radio' name='product' value='TV'> TV";
                        } else if ($product[0] == 'computer') {
                            echo " 
                            <input type='radio' name='product' value='all'> All 
                            <input type='radio' name='product' value='audio'> Audio   
                            <input type='radio' name='product' value='camera'> Camera           
                            <input type='radio' name='product' value='computer' selected> Computer  
                            <input type='radio' name='product' value='TV'> TV";
                        } else if ($product[0] == 'TV') {
                            echo " 
                            <input type='radio' name='product' value='all'> All 
                            <input type='radio' name='product' value='audio'> Audio   
                            <input type='radio' name='product' value='camera'> Camera           
                            <input type='radio' name='product' value='computer'> Computer  
                            <input type='radio' name='product' value='TV' selected> TV";
                        }

                        ?>
                        <input type="submit" value="  Search  " />
                    </form>
                </div>

                <div class="grid">

                    <?php

                    $file = 'productsList.txt';

                    if ($handle = fopen($file, 'r')) {
                        while (!feof($handle)) {
                            $aLine = explode(",", trim(fgets($handle)));
                            if (!in_array($aLine[0], $product)) {
                                continue;
                            }

                            if ($aLine[0] == 'audio') {
                                if ($aLine[1] == 'Beats') {
                                    $imgName = 'Beats Headphones.PNG';
                                }
                            }
                            if ($aLine[0] == 'audio') {
                                if ($aLine[1] == 'Sony') {
                                    $imgName = 'Sony Headphones.PNG';
                                }
                            }
                            if ($aLine[0] == 'audio') {
                                if ($aLine[1] == 'Bose') {
                                    $imgName = 'Bose Headphones.PNG';
                                }
                            }
                            if ($aLine[0] == 'camera') {
                                if ($aLine[1] == 'Fujifilm') {
                                    $imgName = 'Fujifilm Camera.PNG';
                                }
                            }
                            if ($aLine[0] == 'camera') {
                                if ($aLine[1] == 'Sony') {
                                    $imgName = 'Sony Camera.PNG';
                                }
                            }
                            if ($aLine[0] == 'camera') {
                                if ($aLine[1] == 'Nikon') {
                                    $imgName = 'Nikon Camera.PNG';
                                }
                            }
                            if ($aLine[0] == 'computer') {
                                if ($aLine[1] == 'Dell') {
                                    $imgName = 'Dell G5 Gaming PC.PNG';
                                }
                            }
                            if ($aLine[0] == 'computer') {
                                if ($aLine[1] == 'ASUS') {
                                    $imgName = 'ASUS VivoBook.PNG';
                                }
                            }
                            if ($aLine[0] == 'computer') {
                                if ($aLine[1] == 'HP') {
                                    $imgName = 'HP Gaming Laptop.PNG';
                                }
                            }
                            if ($aLine[0] == 'TV') {
                                if ($aLine[1] == 'Samsung') {
                                    $imgName = 'Samsung Smart TV.PNG';
                                }
                            }
                            if ($aLine[0] == 'TV') {
                                if ($aLine[1] == 'Sony') {
                                    $imgName = 'Sony Smart TV.PNG';
                                }
                            }
                            if ($aLine[0] == 'TV') {
                                if ($aLine[1] == 'LG') {
                                    $imgName = 'LG Smart TV.PNG';
                                }
                            }
                            $trans=$aLine[0] . '@' . $aLine[1] . '@' . $aLine[2] . '@' . $aLine[3] ;

                            echo '

                                
                                <div class="our-product">
                                    <div class="img">
                                        <a class="test-popup-link" href="detail.php?id='.$trans.'">
                                             <img src="imgs/' . $imgName . '" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="title py-4">
                                        <h4 class="text-uppercase">' . $aLine[1] . ' $' . $aLine[3] . '</h4>
                                        <span class="text-secondary">' . $aLine[0] . ', ' . $aLine[2] . '</span>
                                        <div class="text-secondary"><a href="detail.php?id='.$trans.'">Detail info</a></div>
                                    </div>
                                </div>
                            
                        ';
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="row ">
                            <div class="col-6">

                                <div class="text">
                                    <h5>Categories</h5>
                                    <ul class="list-unstyled text-small">
                                        <li><a class="text-muted" href="">Audio</a></li>
                                        <li><a class="text-muted" href="">Camera</a></li>
                                        <li><a class="text-muted" href="">Computer</a></li>
                                        <li><a class="text-muted" href="">TV</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text">
                                    <h5>Services</h5>
                                    <ul class="list-unstyled text-small">
                                        <li><a class="text-muted" href="login.php">Login</a></li>
                                        <li><a class="text-muted" href="login.php">Register</a></li>
                                        <li><a class="text-muted" href="login.php">My Cart</a></li>
                                        <li><a class="text-muted" href="login.php">Checkout</a></li>
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
                                    <p>xxx-xxx-xxxx</p>
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