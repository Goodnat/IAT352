<?php
include("auth_sessionNotActiveCheck.php");
if (isset($_POST["action"])) {
    if ($_POST["action"] == "add") {
        $item_id = $_POST["item_id"];
        $item_name =  $_POST["item_name"];
        $item_price = $_POST["item_price"];
        $item_quantity =  $_POST["item_quantity"];

        if (isset($_SESSION["shopping_cart"])) {
            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
            if (!in_array($item_id, $item_array_id)) {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'item_id'           => $item_id,
                    'item_name'         => $item_name,
                    'item_price'        => $item_price,
                    'item_quantity'     => $item_quantity
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
            } else {
                echo '<script>alert("Item Already Added")</script>';
            }
        } else {
            $item_array = array(
                'item_id'           => $item_id,
                'item_name'         => $item_name,
                'item_price'        => $item_price,
                'item_quantity'     => $item_quantity
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }

    //if click delete the item will be delete and alert Item Removed
    if ($_POST["action"] == "remove") {
        $item_id = $_POST["item_id"];
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $item_id) {
                unset($_SESSION["shopping_cart"][$keys]);
            }
        }
    }

}
