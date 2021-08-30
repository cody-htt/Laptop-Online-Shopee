<!-- Special Price -->
<?php
$product_brand = array_map(function ($pro) {
    return $pro['item_brand'];
}, $product_import);
$new_brand = array_unique($product_brand);
sort($new_brand);
shuffle($product_import);

//request POST method
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['special-price-submit'])) {
        //Call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

$in_cart = $cart->getCartId($product->getData('cart'));
?>
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Special Price</h4>
        <div id="filter" class="button-group text-right">
            <button class="btn is-checked font-roboto font-size-14" data-filter="*">All Brands</button>
            <?php
            array_map(function ($product_brand) {
                printf('<button class="btn font-roboto font-size-14" data-filter=".%s">%s</button>', $product_brand, $product_brand);
            }, $new_brand)
            ?>
        </div>

        <!-- Laptop Display Grid -->
        <div class="grid">
            <?php array_map(function ($item) use ($in_cart) { ?>
                <div class="grid-item <?php echo $item['item_brand'] ?? "Brand"; ?> border">
                    <div class="item py-2" style="width: 12em;">
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
                                    <form method="post">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                        <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                        <?php
                                        if (in_array($item['item_id'], $in_cart ?? [])) {
                                            echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                        } else {
                                            echo '<button type="submit" name="special-price-submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }, $product_import) ?>
        </div>
        <!-- !Laptop Display Grid -->

    </div>

</section>
<!-- !Special Price -->