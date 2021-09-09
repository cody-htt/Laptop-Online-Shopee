<!-- Product -->
<?php
//request POST method
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['product-submit'])) {
        //Call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

//Save item_id in $_SESSION['Cart']
if(isset($_POST['product-submit'])){
    //  print_r($_POST['item_id']);
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "product_id");

        //Check if item is already added to cart
        if(in_array($_POST['item_id'], $item_array_id)){
            echo "<script>window.alert('Product is already in the cart')</script>";
            echo "<script>window.localtion = 'index.php'</script>";
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['item_id']
            );

            $_SESSION['cart'][$count] = $item_array;
            $link = "http" . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            //reload current page
            if ($link == "http://localhost:81/Project-php/Laptop%20Online%20Shopee/product.php?" . "item_id={$_POST['item_id']}") {
                header($link);
            } else {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
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

$item_id = $_GET['item_id'] ?? 1;
foreach ($product->getData() as $item):
    if ($item['item_id'] == $item_id):
        ?>
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?php echo $item['item_image'] ?? "./assets/Alienware/19365-4zu3_alienware_15_r3_maxq.jpg"; ?>"
                             alt="product1" class="img-fluid">
                        <div class="form-row pt-4 font-size-16 font-baloo">
                            <div class="col">
                                <button type="submit" class="btn btn-danger form-control">Proceed to buy</button>
                            </div>
                            <div class="col">
                                <form method="POST">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? '1'; ?>">
                                    <?php
                                    if (in_array($item['item_id'], $cart->getCartId($product->getData('cart')) ?? [])) {
                                        echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In the Cart</button>';
                                    } else {
                                        echo '<button type="submit" name="product-submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Default"; ?></h5>
                        <small><?php echo $item['item_brand'] ?? "Default Brand"; ?></small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><em class="fas fa-star"></em></span>
                                <span><em class="fas fa-star"></em></span>
                                <span><em class="fas fa-star"></em></span>
                                <span><em class="fas fa-star"></em></span>
                                <span><em class="far fa-star"></em></span>
                            </div>
                            <a href="#" class="px-2 font-roboto font-size-14">5,231 ratings | 500+ answered questions</a>
                        </div>
                        <hr class="m-0">

                        <!-- Product Price -->
                        <table class="my-3">
                            <tr class="font-roboto font-size-14">
                                <td>M.R.P:</td>
                                <td><strike>$<?php echo $item['discount_price'] ?? "0"; ?></strike></td>
                            </tr>
                            <tr class="font-roboto font-size-14">
                                <td>Deal Price:</td>
                                <td class="font-size-20 text-danger">
                                    $<span><?php echo $item['item_price'] ?? "0"; ?></span>
                                    <small class="text-dark font-size-12">&nbsp;&nbsp;inclusive of all taxes</small>
                                </td>
                            </tr>
                            <tr class="font-roboto font-size-14">
                                <td>SAVING:</td>
                                <td><span class="font-size-16 text-danger">$100</span></td>
                            </tr>
                        </table>
                        <!-- !Product Price -->

                        <!-- Policy -->
                        <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center mr-5">
                                    <div class="font-size-16 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-roboto font-size-12">10 Days<br>Replacement</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-16 my-2 color-second">
                                        <span class="fas fa-truck border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-roboto font-size-12">Store<br>Delivered</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-16 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-roboto font-size-12">1 year<br>Warranty</a>
                                </div>
                            </div>
                        </div>
                        <!-- !Policy -->
                        <hr>

                        <!-- Order Detail -->
                        <div class="order-details" class="font-rale d-flex flex-column text-dark">
                            <small>Delivery by : Sep 5 - Oct 5</small><br>
                            <small>Sold by <a href="#">Tech King</a>&nbsp;(4 out of 5 | 3,834 ratings)</small><br>
                            <small><em class="fas fa-map-marker-alt color-primary"></em>&nbsp;&nbsp;Deliver to Customer - ID220010</small>
                        </div>
                        <!-- !Order Detail -->

                        <div class="row">
                            <div class="col-sm-8">
                                <!-- Product color -->
                                <div class="color my-3">
                                    <div class="d-flex justify-content-around w-60">
                                        <h6 class="font-roboto">Color:</h6>
                                        <div class="p-2 color-gold-bg rounded-circle">
                                            <button class="btn font-size-14"></button>
                                        </div>
                                        <div class="p-2 color-grey-bg rounded-circle">
                                            <button class="btn font-size-14"></button>
                                        </div>
                                        <div class="p-2 color-dark-bg rounded-circle">
                                            <button class="btn font-size-14"></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- !Product color -->
                            </div>
                            <!-- Product quantity section -->
                            <div class="col-sm-8">
                                <div class="qty d-flex">
                                    <h6 class="font-roboto">Quantity</h6>
                                    <div class="px-2 d-flex font-roboto"></div>
                                    <button class="qty-up border bg-light" data-id="pro1"><em class="fas fa-angle-up"></em></button>
                                    <input type="text" class="qty-input border px-2 w-5 bg-light" data-id="pro1" disabled value="1"
                                           placeholder="1">
                                    <button class="qty-down border bg-light" data-id="pro1"><em class="fas fa-angle-down"></em></button>
                                </div>
                            </div>
                            <!-- !Product quantity section -->
                        </div>

                    </div>
                    <!-- Laptop Specification-->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-5 col-md-6">
                                <h6 class="font-baloo">Memory Size:</h6>
                                <div class="d-flex justify-content-around w-70 pt-1">
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-roboto font-size-14">8GB DDR4 Ram</button>
                                    </div>
                                    <div class="font-rubik bg-info border p-2">
                                        <button class="btn p-0 text-light font-roboto font-size-14"><?php echo $item['item_memory'] ?? "8Gb Memory"; ?></button>
                                    </div>
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-roboto font-size-14">32GB DDR4 Ram</button>
                                    </div>
                                </div>
                                <h6 class="font-baloo m-1">Processor:</h6>
                                <div class="d-flex justify-content-around w-70 pt-1">
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-roboto font-size-14">Intel Core i5</button>
                                    </div>
                                    <div class="font-rubik bg-info border p-2">
                                        <button class="btn p-0 text-light font-roboto font-size-14"><?php echo $item['item_cpu'] ?? "Intel i3"; ?></button>
                                    </div>
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-roboto font-size-14">AMD Ryzen 7</button>
                                    </div>
                                </div>
                                <h6 class="font-baloo m-1">Graphic Card:</h6>
                                <div class="d-flex justify-content-around w-70 pt-1">
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-roboto font-size-14">Nvidia GTX 2070</button>
                                    </div>
                                    <div class="font-rubik bg-info border p-2">
                                        <button class="btn p-0 text-light font-roboto font-size-14"><?php echo $item['item_gpu'] ?? "Not Have"; ?></button>
                                    </div>
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-roboto font-size-14">Radeon RX 6800</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                                <h6 class="font-baloo">Hard Drive:</h6>
                                <div class="d-flex justify-content-around w-70 pt-1">
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-roboto font-size-14"><?php echo $item['item_drive'] ?? "500Gb HDD"; ?></button>
                                    </div>
                                    <div class="font-rubik bg-warning border p-2">
                                        <button class="btn p-0 font-roboto font-size-14">2x 500GB Nvme</button>
                                    </div>
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-roboto font-size-14">1x 1TB Nvme</button>
                                    </div>
                                </div>
                                <h6 class="font-baloo m-1">Monitor:</h6>
                                <div class="d-flex justify-content-around w-70 pt-1">
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-roboto font-size-14">FHD (300FPS)</button>
                                    </div>
                                    <div class="font-rubik bg-warning border p-2">
                                        <button class="btn p-0 font-roboto font-size-14"><?php echo $item['item_monitor'] ?? "FHD-60Fps"; ?></button>
                                    </div>
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-roboto font-size-14">UHD (60FPS)</button>
                                    </div>
                                </div>
                                <h6 class="font-baloo m-1">Operating System:</h6>
                                <div class="d-flex justify-content-around w-70 pt-1">
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-roboto font-size-14">Free DOS</button>
                                    </div>
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-roboto font-size-14">Win10 Home</button>
                                    </div>
                                    <div class="font-rubik bg-warning border p-2">
                                        <button class="btn p-0 font-roboto font-size-14"><?php echo $item['item_os'] ?? "Free Dos"; ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- !Laptop Specification-->
                    <div class="col-12 pt-4">
                        <h6 class="font-baloo"> Product Description</h6>
                        <hr>
                        <p class="font-roboto font-size-16 p-text-color text-justify">
                            <?php echo $item['item_desc'] ?? "Not Update Yet"; ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product -->
    <?php
    endif;
endforeach;
?>