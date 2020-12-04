<?php
require('db.php');
//initialize condition is ""
$result_array = array();
$condition_arr = array();

// to detect whether the variable has been set and is not NULL.

if (!empty($_POST['categories'])) {
    array_push($condition_arr, " product.category_id IN (" . $_POST['categories'] . ")");
}

//test data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$price1 =  test_input(!empty($_POST['price1']) ? $_POST['price1'] : "");
$price2 =  test_input(!empty($_POST['price2']) ? $_POST['price2'] : "");

//if price not null

if (!empty($price1) && !empty($price2)) {
    array_push($condition_arr, " product.price BETWEEN " . $price1 . " AND " . $price2 . "");
}


if (count($condition_arr) > 0) {
    $condition_str = implode(" and ", $condition_arr);
    $sql = "SELECT product.product_id, product.name, product.price, product.description, category.category_name 
            FROM `product`
            INNER JOIN `category`
            ON product.category_id = category.category_id
            WHERE " . $condition_str;
} else {

    $sql = "SELECT product.product_id, product.name, product.price, product.description, category.category_name 
            FROM `product` 
            INNER JOIN `category` 
            ON product.category_id = category.category_id 
            WHERE product.price BETWEEN 0 AND 4000;";
}

$result = mysqli_query($conn, $sql);

$results_rows = mysqli_num_rows($result);

if ($results_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($result_array, $row);
    }
}

echo json_encode($result_array);

?>