<!-- Shopping Cart Section -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-cart-submit'])) {
        $delete_record = $cart->deleteCart($_POST['item_id']);
    }

    //add to wish-list
    if (isset($_POST['wishlist-submit'])) {
        $cart->moveToWishList($_POST['item_id']);
    }
}
?>

<section id="cart" class="py-3 mb-4">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!-- Shopping Cart Item -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($product->getData('cart') as $item):
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
                                <div class="qty d-flex pt-2">
                                    <div class="d-flex font-roboto w-25">
                                        <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><em
                                                    class="fas fa-angle-up"></em></button>
                                        <input type="text" class="qty-input border px-2 mw-100 bg-light"
                                               data-id="<?php echo $item['item_id'] ?? '0'; ?>" disabled value="1" placeholder="1">
                                        <button class="qty-down border bg-light" data-id="<?php echo $item['item_id'] ?? '0' ?>"><em
                                                    class="fas fa-angle-down"></em></button>
                                    </div>
                                </div>
                                <div class="d-flex pt-1">
                                    <form method="POST">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                        <button type="submit" name="delete-cart-submit"
                                                class="btn font-roboto text-danger px-2 border-right">Delete
                                        </button>
                                    </form>
                                    <form method="POST">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                        <button type="submit" name="wishlist-submit" class="btn font-roboto text-danger px-2 border-right">
                                            Save latter
                                        </button>
                                    </form>
                                </div>
                                <!-- !product quantity -->
                            </div>
                            <div class="col-sm-2 text-right">
                                <div class="font-size-20 text-danger font-roboto">
                                    $<span class="product-price" data-id="<?php echo $item['item_id'] ?? '0'; ?>">
                                <?php echo $item['item_price'] ?? 0 ?>
                            </span>
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
            <!-- Subtotal section -->
            <div class="col-sm-3">
                <div class="sub-total border text-center  mt-2">
                    <h6 class="font-size-12 font-roboto text-success py-3"><em class="fas fa-check"></em> Your order is eligible for FREE
                        Delivery</h6>
                    <div class="border-top py-4">
                        <h5 class="font-roboto font-size-16">Subtotal (<?php echo isset($subtotal) ? count($subtotal) : 0; ?> items):&nbsp;
                            <span class="text-danger">$<span class="text-danger" id="deal-price">
                                    <?php echo isset($subtotal) ? $cart->calculateSubtotal($subtotal) : 0; ?>
                                </span>
                            </span>
                        </h5>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to buy</button>
                    </div>
                </div>
            </div>
            <!-- !Subtotal section -->
        </div>
        <!-- !Shopping Cart Item -->
    </div>
</section>
<!-- !Shopping Cart Section -->