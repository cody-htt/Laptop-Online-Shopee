$(document).ready(
    function () {

        //Banner Owl Carousel
        $("#banner-area .owl-carousel").owlCarousel({
            autoplay: true,
            autoplayTimeout: 5000,
            loop: true,
            dots: true,
            items: 1,
        });

        //Top sale Owl Carousel
        $("#top-sale .owl-carousel").owlCarousel({
            autoplay: true,
            autoplayTimeout: 1500,
            autoplayHoverPause: true,
            loop: true,
            nav: true,
            dots: false,
            responsive: {
                0: {items: 1},
                600: {items: 3},
                1000: {items: 5}
            }
        });

        //Isotope Filter
        var $grid = $(".grid").isotope({
            itemSelector: '.grid-item',
            layoutMode: 'fitRows'
        });

        //filter items on button click
        $(".button-group").on("click", "button", function () {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({filter: filterValue});
        });

        //New Laptops Owl Carousel
        $("#new-laptops .owl-carousel").owlCarousel({
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            loop: true,
            nav: false,
            dots: true,
            responsive: {
                0: {items: 1},
                600: {items: 3},
                1000: {items: 5}
            }
        });

        //Blogs Owl carousel
        $('#blogs .owl-carousel').owlCarousel({
            loop: true,
            nav: false,
            dots: true,
            responsive: {
                0: {items: 1},
                800: {items: 2},
                1000: {items: 3},
            }
        });

        //Product quantity section
        let $qty_up = $(".qty .qty-up");
        let $qty_down = $(".qty .qty-down");
        let $deal_price = $("#deal-price");
        let $default_val = 1;
        let $max_val = 14;

        //Click on qty up button
        $qty_up.click(function (e) {
            let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
            let $price = $(`.product-price[data-id='${$(this).data("id")}']`);

            //Change product in cart price using ajax call
            $.ajax({
                url: "template/ajax.php", type: 'POST',
                data: {itemid: $(this).data("id")},
                success: function (result) {
                    let obj = JSON.parse(result);
                    let item_price = obj[0]['item_price'];

                    if ($input.val() >= $default_val && $input.val() <= $max_val) {
                        $input.val(function (i, oldval) {
                            return ++oldval;
                        });

                        // increase price of the product
                        $price.text(parseInt(item_price * $input.val()).toFixed(2));

                        // increase subtotal of the cart
                        let subtotal = parseInt($deal_price.text()) + parseInt(item_price)
                        $deal_price.text(subtotal.toFixed(2));
                    }
                }

            })
        });

        // click on qty down button
        $qty_down.click(function (e) {
            let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
            let $price = $(`.product-price[data-id='${$(this).data("id")}']`);

            //Change product in cart price using ajax call
            $.ajax({
                url: "template/ajax.php", type: 'POST',
                data: {itemid: $(this).data("id")},
                success: function (result) {
                    let obj = JSON.parse(result);
                    let item_price = obj[0]['item_price'];

                    if ($input.val() > $default_val && $input.val() <= $max_val + 1) {
                        $input.val(function (i, oldval) {
                            return --oldval;
                        });

                        // increase price of the product
                        $price.text(parseInt(item_price * $input.val()).toFixed(2));

                        // increase subtotal of the cart
                        let subtotal = parseInt($deal_price.text()) - parseInt(item_price)
                        $deal_price.text(subtotal.toFixed(2));
                    }
                }

            })
        });

    });