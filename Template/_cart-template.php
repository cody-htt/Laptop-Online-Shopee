<!-- Shopping Cart Section -->
<?php
require('php/component.php');
?>


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
                $product_id = array_column($_SESSION['cart'], 'product_id');
                $subtotal[] = array();
                $i = 0;
                $result = $product->getProductInCart();
                while ($row = mysqli_fetch_assoc($result)) {
                    foreach ($product_id as $id) {
                        if ($row['item_id'] == $id) {
                            cartElement($row['item_image'], $row['item_name'], $row['item_brand'], $row['item_price'], $row['item_id']);
                            $subtotal[$i] = $row['item_price'];
                            $i++;
                            print_r($subtotal);
                        }
                    }
                }
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
                        <button type="submit" class="btn btn-warning mt-3">Place Order</button>
                    </div>
                </div>
            </div>
            <!-- !Subtotal section -->
        </div>
        <!-- !Shopping Cart Item -->
    </div>
</section>
<!-- !Shopping Cart Section -->