<!-- Shopping Cart Section -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-cart-submit'])) {
        $delete_record = $cart->deleteWishList($_POST['item_id']);
    }

    if (isset($_POST['cart-submit'])) {
        $cart->moveToWishList($_POST['item_id'], 'cart', 'wishlist');
    }
}
?>

<section id="cart" class="py-3 mb-4">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Wish list</h5>

        <!-- Shopping Cart Item -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($product->getData('wishlist') as $item):
                    $product_in_cart = $product->getProductFromCart($item['item_id']);
                    $subtotal[] = array_map(function ($item) {
                        ?>
                        <!-- Cart Item -->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $item['item_image'] ?? "./assets/HP/hp-pavilion-15-cs3014tu.jpg" ?>"
                                     style="height: 120px;"
                                     alt="item1" class="img-fluid">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Default" ?></h5>
                                <small><?php echo $item['item_brand'] ?? "Default Brand" ?></small>
                                <!-- rating -->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><em class="fas fa-star"></em></span>
                                        <span><em class="fas fa-star"></em></span>
                                        <span><em class="fas fa-star"></em></span>
                                        <span><em class="fas fa-star"></em></span>
                                        <span><em class="far fa-star"></em></span>
                                    </div>
                                    <a href="#" class="px-2 font-roboto font-size-14">5,231 ratings</a>
                                </div>
                                <!-- !rating -->

                                <!-- product quantity -->
                                <div class="d-flex pt-2">
                                    <form method="POST">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                        <button type="submit" name="delete-cart-submit"
                                                class="btn font-roboto text-danger pl-0 pr-3 border-right">Delete
                                        </button>
                                    </form>
                                    <form method="POST">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                        <button type="submit" name="cart-submit" class="btn font-roboto text-danger">Add to cart</button>
                                    </form>
                                </div>
                                <!-- !product quantity -->
                            </div>
                            <div class="col-sm-2 text-right">
                                <div class="font-size-20 text-danger font-roboto">
                                    $<span class="product-price"
                                           data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] ?? 0 ?></span>
                                </div>
                            </div>
                        </div>
                        <!-- !Cart Item -->
                        <?php
                        return $item['item_price'];
                    }, $product_in_cart); //close array_map function
                endforeach;
                ?>
            </div>
        </div>
        <!-- !Shopping Cart Item -->
    </div>
</section>
<!-- !Shopping Cart Section -->