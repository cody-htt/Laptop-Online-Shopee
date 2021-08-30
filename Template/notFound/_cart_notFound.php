<!-- Shopping Cart Section -->

<section id="cart" class="py-3 mb-4">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!-- Shopping Cart Item -->
        <div class="row border-top py-3 mt-3">
            <div class="col-sm-9 text-center py-2">
                <!-- Empty Cart -->
                <div class="row">
                    <div class="col-sm-12">
                        <img src="./assets/emptycart.png" alt="Empty cart" class="img-fluid" style="height: 250px;">
                        <p class="font-rubik font-size-20 pt-2 p-text-color">Empty Cart</p>
                    </div>
                </div>
                <!-- !Empty Cart -->
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