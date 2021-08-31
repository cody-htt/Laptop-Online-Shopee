$(document).ready(
    function (e) {

        // Banner Owl Carousel
        $("#banner-area .owl-carousel").owlCarousel({
            autoplay: true,
            autoplayTimeout: 5000,
            loop: true,
            dots: true,
            items: 1,
        });

        // Top sale Owl Carousel
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

        // Isotope Filter
        var $grid = $(".grid").isotope({
            itemSelector: '.grid-item',
            layoutMode: 'fitRows'
        });

        // Filter items on button click
        $(".button-group").on("click", "button", function () {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({filter: filterValue});
        });

        // New Laptops Owl Carousel
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

        // Blogs Owl carousel
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

        // Product quantity section
        let $qty_up = $(".qty .qty-up");
        let $qty_down = $(".qty .qty-down");
        let $deal_price = $("#deal-price");
        let $default_val = 1;
        let $max_val = 14;

        // Click on qty up button
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

        // Click on qty down button
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

        // Validation user register information
        $("#reg-form").submit(function (event) {

            let emailReg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;;
            let $email = $("#email");
            let $email_error = $("#email-error");
            let $password = $("#password");
            let $error_pwd = $("#password-error");
            let $confirm = $("#confirm-pwd");
            let $confirm_error = $("#confirm-error");

            //validate email field
            if(!emailReg.test($email.val())){
                $email_error.text("Please enter a valid email")
                event.preventDefault();
            } //validate password field
            else if ($password.val().length < 6 || $password.val().length > 15) {
                $error_pwd.text("Password must be between 6 to 12 letters");
                event.preventDefault();
            }
            else if ($password.val() != $confirm.val()) {
                $confirm_error.text("Password is not match");
                event.preventDefault();
            }
            else {
                return true;
            }
        });

        //Upload profile avatar
        let $uploadFile = $('#register .upload-profile-image input[type="file"]');
        $uploadFile.change(function (){
            readURL(this);
        });

    });

// Create readURL function to let user upload image
function readURL(input){
    let $chooseFile = $("#register .upload-profile-image .img");
    let $camera_icon = $("#register .upload-profile-image .camera-icon");
    let $avatar_text = $("#register .upload-profile-image #avatar-text");
    if(input.files && input.files[0]){
        let reader = new FileReader();
        reader.onload = function(e){
            $chooseFile.attr('src', e.target.result);
            $camera_icon.css({display:"none"});
            $avatar_text.text('You are cute!!!');
        }

        reader.readAsDataURL(input.files[0]);
    }
}