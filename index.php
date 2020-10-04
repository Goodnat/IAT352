<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P</title>
    <!-- Boostrap css file-->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- font awesome icon-->
    <link rel="stylesheet" href="./css/all.min.css">

    <!--<link rel="stylesheet" href="./css/style.css"> css file-->

    <!--Main css file-->
    <link rel="stylesheet" href="./css/main.css">

    <!-- responsive css file-->
    <link rel="stylesheet" href="./css/responsive.css">

</head>
<body>
  <?php 
    echo "
    <header>
        <div class='container'>
          <nav class='navbar navbar-expand-lg navbar-light bg-light'>
              <a class='navbar-brand' href='#'>Navbar</a>
              <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo02' aria-controls='navbarTogglerDemo02' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
            
              <div class='collapse navbar-collapse' id='navbarTogglerDemo02'>
                <ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
                  <li class='nav-item active'>
                    <a class='nav-link' href='#'>Home <span class='sr-only'>(current)</span></a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='#'>Link</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link disabled' href='#' tabindex='-1' aria-disabled='true'>Disabled</a>
                  </li>
                </ul>
                <form class='form-inline my-2 my-lg-0'>
                  <input class='form-control mr-sm-2' type='search' placeholder='Search'>
                  <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
                </form>
              </div>
            </nav>
          </div>
    </header>";
    



    echo "   
    <!-- Jquery js file-->
    <script src='js/jquery.3.5.1.js'></script>

    <!-- Boostrap js file-->
    <script src='js/bootstrap.min.js'></script>

    <!--  my js file  -->
    <script src='./js/main.js'></script>
    ";
  ?>
</body>
</html>