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
  

<?php

                    $file = 'productsList.txt';
                    $currentProduction= $_GET['id'];

                    $info = explode('@', $currentProduction);
                       if($info[0] == 'audio'){
                          if($info[1]=='Beats'){
                          $type='audio';
                          $brand='Beats';
                          $imgName = 'Beats Headphones.PNG';
                         }
                        }
                        if($info[0] == 'audio'){
                          if($info[1]=='Sony'){
                          $type='audio';
                          $brand='Sony';
                          $imgName = 'Sony Headphones.PNG';
                         }
                        }
                        if($info[0] == 'audio'){
                          if($info[1]=='Beats'){
                          $type='audio';
                          $brand='Beats';
                          $imgName = 'Beats Headphones.PNG';
                         }
                        }
                        if($info[0] == 'audio'){
                          if($info[1]=='Bose'){
                          $type='audio';
                          $brand='Bose';
                          $imgName = 'Bose Headphones.PNG';
                         }
                        }
                        if($info[0] == 'camera'){
                          if($info[1]=='Fujifilm'){
                          $type='camera';
                          $brand='Fujifilm';
                          $imgName = 'Fujifilm Camera.PNG';
                         }
                        }
                        if($info[0] == 'camera'){
                          if($info[1]=='Sony'){
                          $type='camera';
                          $brand='Sony';
                          $imgName = 'Sony Camera.PNG';
                         }
                        }
                        if($info[0] == 'camera'){
                          if($info[1]=='Nikon'){
                          $type='camera';
                          $brand='Nikon';
                          $imgName = 'Nikon Camera.PNG';
                         }
                        }
                         if($info[0] == 'computer'){
                          if($info[1]=='Dell'){
                          $type='computer';
                          $brand='Dell';
                          $imgName = 'Dell G5 Gaming PC.PNG';
                         }
                        }
                         if($info[0] == 'computer'){
                          if($info[1]=='ASUS'){
                          $type='computer';
                          $brand='ASUS';
                          $imgName = 'ASUS VivoBook.PNG';
                         }
                        }
                         if($info[0] == 'computer'){
                          if($info[1]=='HP'){
                          $type='computer';
                          $brand='HP';
                          $imgName = 'HP Gaming Laptop.PNG';
                         }
                        }
                         if($info[0] == 'TV'){
                          if($info[1]=='Samsung'){
                          $type='TV';
                          $brand='Samsung';
                          $imgName = 'Samsung Smart TV.PNG';
                         }
                        }
                        if($info[0] == 'TV'){
                          if($info[1]=='Sony'){
                          $type='TV';
                          $brand='Sony';
                          $imgName = 'Sony Smart TV.PNG';
                         }
                        }
                        if($info[0] == 'TV'){
                          if($info[1]=='LG'){
                          $type='TV';
                          $brand='LG';
                          $imgName = 'LG Smart TV.PNG';
                         }
                        }

                
echo'
                            
    <div class="container">
                <div class="row justify-content-center align-items-center" >
                    <div class="col-6 ">
                         <div class="img">
                           
                                        <a class="test-popup-link" href="">
                                             <img src="imgs/' . $imgName . '" class="img-fluid">
                                        </a>
                                    </div>
                    </div>
                    <div class="col-4">
                    <div class="title py-5 " >
                                        <h5 class="text-uppercase text-center" style="color:gray"> '.$info[0]. '</h5>
                                        <h2 class="text-uppercase text-center">'.$info[1].'</h2>
                                        <h4 class="text-secondary text-center"> $'. $info[3].'</h4>

                                        <br><h5 class=" text-center" style="color:gray">"'.$info[2].'"</h5>
                                        <br>
                                        <div class="row justify-content-center align-items-center">
                                        <br><button class="btn btn-info btn-lg">BUY</button>
                                        </div>
                                        
                                    </div>
                    </div>
                </div>
            </div>';
            ?>
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