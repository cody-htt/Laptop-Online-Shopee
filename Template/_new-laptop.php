<!-- New Laptop -->
<?php
shuffle($product_import);

//request POST method
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['new-laptop-submit'])) {
        //Call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

//Save item_id in $_SESSION['Cart']
if (isset($_POST['new-laptop-submit'])) {
    //  print_r($_POST['item_id']);
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "product_id");

        //Check if item is already added to cart
        if (in_array($_POST['item_id'], $item_array_id)) {
            echo "<script>window.alert('Product is already in the cart')</script>";
            echo "<script>window.localtion = 'index.php'</script>";
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['item_id']
            );

            $_SESSION['cart'][$count] = $item_array;
            header("Location:" . $_SERVER['PHP_SELF']);
            //print_r($_SESSION['cart']);
        }

    } else {
        $item_array = array(
            'product_id' => $_POST['item_id']
        );

        //Create Session variable
        $_SESSION['cart'][0] = $item_array;
        //print_r($_SESSION['cart']);
    }
}
?>
<section id="new-laptops">
    <div class="container">
        <h4 class="font-rubik font-size-20">New Laptops</h4>
        <hr>
        <!-- Owl Carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_import as $item) { ?>
                <div class="item px-3 py-2 bg-light">
                    <div class="product font-roboto">
                        <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>">
                            <img src="<?php echo $item['item_image'] ?? "./assets/Alienware/19365-4zu3_alienware_15_r3_maxq.jpg"; ?>"
                                 alt="product1" class="img-fluid">
                        </a>
                        <div class="text-center py-4">
                            <p class="font-size-14 font-roboto"><?php echo $item['item_name'] ?? "Default"; ?></p>
                            <div class="rating text-warning font-size-12">
                                <span><em class="fas fa-star"></em></span>
                                <span><em class="fas fa-star"></em></span>
                                <span><em class="fas fa-star"></em></span>
                                <span><em class="fas fa-star"></em></span>
                                <span><em class="far fa-star"></em></span>
                            </div>
                            <div class="price py-2">
                                <span class="font-rubik">$ <?php echo $item['item_price'] ?? "0"; ?></span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? '1'; ?>">
                                <?php
                                if (in_array($item['item_id'], $cart->getCartId($product->getData('cart')) ?? [])) {
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                } else {
                                    echo '<button type="submit" name="new-laptop-submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } //closing foreach function?>
        </div>
        <!-- !Owl Carousel -->
    </div>
</section>
<!-- !New Laptop -->