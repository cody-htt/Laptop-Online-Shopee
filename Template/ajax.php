<?php
//MySQL Connection
require('../Database/DBController.php');

//Call Product.php
require('../Database/Product.php');

//Initial DBController object
$db = new DBController();

//Initial Product object
$product = new Product($db);

if (isset($_POST['itemid'])) {
    $result = $product->getProductFromCart($_POST['itemid']);
    echo json_encode($result);
}