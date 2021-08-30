<!-- Top Sale -->
<?php
shuffle($product_import);

//request POST method
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['top-sale-submit'])) {
        //Call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
?>
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr>
        <!-- Owl Carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_import as $item) { ?>
                <div class="item px-3 py-2">
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
                            <form method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <?php
                                if (in_array($item['item_id'], $cart->getCartId($product->getData('cart')) ?? [])) {
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                } else {
                                    echo '<button type="submit" name="top-sale-submit" class="btn btn-warning font-size-12">Add to Cart</button>';
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
<!-- !Top Sale -->
