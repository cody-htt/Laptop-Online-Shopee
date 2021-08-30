<?php
//MySQL Connection
require('Database/DBController.php');

//Call Product.php
require('Database/Product.php');

//Call Cart.php
require('Database/Cart.php');

//Initial DBController object
$db = new DBController();

//Initial Product object
$product = new Product($db);
$product_import = $product->getData();

//Initial Cart object
$cart = new Cart($db);