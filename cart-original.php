<?php
ob_start();
//include header.php file
include('header.php')
?>

<?php
/*include _cart-template.php file if cart is not empty */
count($product->getData('cart')) ? include('Template/_cart-template.php') : include('Template/notFound/_cart_notFound.php');

/*include _wishlist_template.php file if wish list is not empty */
count($product->getData('wishlist')) ? include('Template/_wishlist_template.php') : include('Template/notFound/_wishlist_notFound.php');

/*include _top-sale.php file */
include('Template/_new-laptop.php');
?>

<?php
//include footer.php file
include('footer.php')
?>
