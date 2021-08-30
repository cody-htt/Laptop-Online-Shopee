<?php
ob_start();
//include header.php file
include('header.php');
?>

<?php
/*include _banner.php file */
include('Template/_banner-area.php');

/*include _top-sale.php file */
include('Template/_top-sale.php');

/*include _special-price.php file */
include('Template/_special-price.php');

/*include _banner-ads.php file */
include('Template/_banner-ads.php');

/*include _new-laptop.php file */
include('Template/_new-laptop.php');

/*include _blogs.php file */
include('Template/_blogs.php');
?>

<?php
//include footer.php file
include('footer.php');
?>