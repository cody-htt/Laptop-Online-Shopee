<?php
//MySQL Connection
require('../Database/DBController.php');

//Call Product.php
require('../Database/Product.php');

//Require item_id stored in $_SESSION from cart
require('../cart.php');

//Initial DBController object
$db = new DBController();

//Initial Product object
$product = new Product($db);

if (isset($_POST['itemid'])) {

    if(isset($_SESSION['cart'])){

        if(in_array($_POST['itemid'], $_SESSION['cart']['product_id'])){
            $result = $product->getProductFromCart($_POST['itemid']);
            echo json_encode($result);
        }
    }
}