<?php

require ('_validate-helper.php');
 
    // error variable
$error = array();
$productbrand = validate_input_text($_POST['brand']);
if(empty($productbrand)){
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

    // //register a new use
    // // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // //Create Query
    // $query_string = "INSERT INTO product (item_id, item_brand, item_name, item_price, item_image, item_register, discount_price) 
    //                     VALUES ('', ?, ?, ?, ?, NOW(), ? );";

    // //Initial a MySQL statement
    // try{
    //     $init_statement = $db->con->stmt_init();
    // } catch (ErrorException $er) {
    //     print "Error: ". $er->getMessage();
    // }
    // //Prepare SQL statement
    // try{
    //     $init_statement->prepare($query_string);
    // } catch (ErrorException $er) {
    //     print "Error: ". $er->getMessage();
    // }
    // //Bind Value
    // try{
    //     $init_statement->bind_param("sssss", $item_brand, $item_name, $item_price, $item_image, $discount_price);
    // } catch (Error $er) {
    //     print "Error: ". $er->getMessage();
    //     printf($init_statement->error);
    // }
    // //Execute SQL statement
    // try{
    //     $init_statement->execute();
    // } catch (Error $er) {
    //     print "Error: ". $er->getMessage();
    // }

    // if($init_statement->affected_rows == 1){
    //     $init_statement->close();
    //     // header('location:login.php');

    //     print "Added product";
    //     exit();
    // }
    // else {
    //     print "Error while registration...!!!";
    // }



        // //Get connect SQL
    try{
        $connect = $db->con;
    } catch (ErrorException $er) {
        print "Error: ". $er->getMessage();
    }

       // Insert table user
       $sql = "INSERT INTO product (item_id, item_brand, item_name, item_price, item_image, item_register, discount_price) 
       VALUES ('', '$productbrand', '$nameproduct', '$price', '$imageproduct', NOW(), '$discountprice' )";

       if ($connect->query($sql) === TRUE) {
        print "New record created successfully";
       } else {
        print "Error: " . $sql . "<br>" . $connect->error;
       }

}
else {
    echo 'Not validated';
}
