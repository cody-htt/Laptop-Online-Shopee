<?php

require ('_validate-helper.php');
 
    // error variable
$error = array();
$productbrand = validate_input_text($_POST['brand']);
if(empty($productbrand)){
    $error[] = "Please enter your Product Brand!!!";
}

$productid = validate_input_text($_POST['idproduct']);
if(empty($productid)){
    $error[] = "Please enter your Product Brand!!!";
}

$nameproduct = validate_input_text($_POST['nameproduct']);
if(empty($nameproduct)){
    $error[] = "Please enter your Name Product !!!";
}

$imageproduct = validate_input_text($_POST['image']);
if(empty($imageproduct)){
    $error[] = "Please enter your Image product !!!";
}

$price = validate_input_text($_POST['price']);
if(empty($price)){
    $error[] = "Please enter your price!!!";
}

$discountprice = validate_input_text($_POST['discountprice']);
if(empty($discountprice)){
    $error[] = "Please enter your Discount price!!!";
}


if(empty($error)){




        // //Get connect SQL
    try{
        $connect = $db->con;
    } catch (ErrorException $er) {
        print "Error: ". $er->getMessage();
    }

    $item_id = $_GET['item_id'] ?? 1;

       // update table product

        $sql = "UPDATE Product SET item_brand='$productbrand', item_name='$nameproduct', item_price='$price', item_image='$imageproduct',  discount_price='$discountprice' WHERE item_id=$productid";

        

       if ($connect->query($sql) === TRUE) {
        print "New record created successfully";
       } else {
        print "Error: " . $sql . "<br>" . $connect->error;
       }

}
else {
    echo 'Not validated';
}
