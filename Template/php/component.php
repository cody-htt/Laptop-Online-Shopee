<?php

function cartElement($productImg, $productName, $productBrand, $productPrice, $productid) {
$element = "
    <form>
        <div class=\"row border-top py-3 mt-3\">
            <div class=\"col-sm-2\">
                <img src=$productImg style=\"height: 120px;\" alt=\"item1\" class=\"img-fluid\">
            </div>
            <div class=\"col-sm-8\">
                <h5 class=\"font-baloo font-size-20\">$productName</h5>
                <small>$productBrand</small>
                <!-- rating -->
                <div class=\"d-flex\">
                    <div class=\"rating text-warning font-size-12\">
                        <span><em class=\"fas fa-star\"></em></span>
                        <span><em class=\"fas fa-star\"></em></span>
                        <span><em class=\"fas fa-star\"></em></span>
                        <span><em class=\"fas fa-star\"></em></span>
                        <span><em class=\"far fa-star\"></em></span>
                    </div>
                    <a href=\"#\" class=\"px-2 font-roboto font-size-14\">5,231 ratings</a>
                </div>
                <!-- !rating -->

                <!-- product quantity -->
                <div class=\"qty d-flex pt-2\">
                    <div class=\"d-flex font-roboto w-25\">
                        <button class=\"qty-up border bg-light\" data-id=$productid><em
                                    class=\"fas fa-angle-up\"></em></button>
                        <input type=\"text\" class=\"qty-input border px-2 mw-100 bg-light\"
                               data-id=$productid disabled value=\"1\" placeholder=\"1\">
                        <button class=\"qty-down border bg-light\" data-id=$productid><em
                                    class=\"fas fa-angle-down\"></em></button>
                    </div>
                </div>
                <div class=\"d-flex pt-1\">
                    <form method=\"POST\">
                        <input type=\"hidden\" name=\"item_id\" value=$productid>
                        <button type=\"submit\" name=\"delete-cart-submit\"
                                class=\"btn font-roboto text-danger px-2 border-right\">Delete
                        </button>
                    </form>
                    <form method=\"POST\">
                        <input type=\"hidden\" name=\"item_id\" value=$productid>
                        <button type=\"submit\" name=\"wishlist-submit\" class=\"btn font-roboto text-danger px-2 border-right\">
                            Save latter
                        </button>
                    </form>
                </div>
                <!-- !product quantity -->
            </div>
            <div class=\"col-sm-2 text-right\">
                <div class=\"font-size-20 text-danger font-roboto\">
                    $<span class=\"product-price\" data-id=$productid>$productPrice</span>
                </div>
            </div>
        </div>
    </form>
    ";

echo $element;
}