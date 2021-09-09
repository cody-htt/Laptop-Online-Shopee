<?php
//MySQL Connection
require('Database/DBController.php');

//Call Product.php
require('Database/Product.php');

//Call Cart.php
require('Database/Cart.php');

//Call Users.php
require('Database/Users.php');


//Call Categories.php
require('Database/Categories.php');

//Call User-Admin.php
require('Database/User-Admin.php');

//Initial DBController object
$db = new DBController();

//Initial Product object
$product = new Product($db);
$product_import = $product->getData();
//$product_in_cart = $product->getProductFromCart();
$item_brand = $product->getItemBrand();

//Initial Cart object
$cart = new Cart($db);

//Initial Users object
$user = new Users($db);
$user_import = $user->getData();


//Initial Categories object
$categories = new Categories($db);
$categories_import = $categories->getData();


//Initial User-Admin object
$usersAdmin = new UsersAdmin($db);
$usersAdmin_import = $usersAdmin->getData();