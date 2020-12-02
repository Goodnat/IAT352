<?php
include("auth_sessionNotActiveCheck.php");
$output = '
<div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Item Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Price</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
            </tr>
            ';
if (!empty($_SESSION["shopping_cart"])) {
    $total = 0;
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        $output .= '
        <tr>
            <td>' . $values["item_name"] . '</td>
            <td>' . $values["item_quantity"] . '</td>
            <td>' . $values["item_price"] . '</td>
            <td>$' . number_format($values["item_quantity"] * $values["item_price"], 2) . '</td>
            <td><button name="delete" class="btn btn-danger btn-xs delete" id="' . $values["item_id"] . '">Remove</button></td>
        </tr>
    ';
        $total = $total + ($values["item_quantity"] * $values["item_price"]);
    }
}

$output .= '</table>';

$order_price = "";
if (!empty($_SESSION["shopping_cart"])) {
    $order_price = number_format($total, 2);
} else {
    $order_price = "0";
}

$output .= '
    <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between">
            <span>Total (CAD)</span>
            <strong>$ ' . $order_price . '</strong>
        </li>
    </ul>
</div>';

echo $output;
