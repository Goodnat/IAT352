<?php 
    include("auth_sessionNotActiveCheck.php");
    require('db.php'); //connection to db code

    /* SQL query to get results from database */
    $promotion_val=$_GET["promotion"];
    
    $sql = "UPDATE users SET promotion=$promotion_val WHERE username='". $_SESSION["username"]."'";
    echo($sql);
    
    $result = $conn->query($sql);
    $conn->close();
?>