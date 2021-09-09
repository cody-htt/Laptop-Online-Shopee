<?php

require('_validate-helper.php');


// error variable
$error = array();
$product_brand = validate_input_text_admin_site($_POST['brand']);
if (empty($product_brand)) {
    $error[] = "Please enter your Product Brand!!!";
}

$name_product = validate_input_text_admin_site($_POST['nameproduct']);
if (empty($name_product)) {
    $error[] = "Please enter your Name Product !!!";
}

$decriptionProduct = validate_input_text_admin_site($_POST['description']);
if (empty($decriptionProduct)) {
    $error[] = "Please enter your Name Product !!!";
}

$name_product = validate_input_text_admin_site($_POST['nameproduct']);
if (empty($name_product)) {
    $error[] = "Please enter your Name Product !!!";
}

$memoryproduct = validate_input_text_admin_site($_POST['memory']);
if (empty($memoryproduct)) {
    $error[] = "Please enter your Name Product !!!";
}

$cpuproduct = validate_input_text_admin_site($_POST['cpu']);
if (empty($cpuproduct)) {
    $error[] = "Please enter your Name Product !!!";
}

$gpuproduct = validate_input_text_admin_site($_POST['gpu']);
if (empty($gpuproduct)) {
    $error[] = "Please enter your Name Product !!!";
}

$driveproduct = validate_input_text_admin_site($_POST['drive']);
if (empty($driveproduct)) {
    $error[] = "Please enter your Name Product !!!";
}

$moniterproduct = validate_input_text_admin_site($_POST['moniter']);
if (empty($moniterproduct)) {
    $error[] = "Please enter your Name Product !!!";
}

$osproduct = validate_input_text_admin_site($_POST['os']);
if (empty($osproduct)) {
    $error[] = "Please enter your Name Product !!!";
}


$price = validate_input_text_admin_site($_POST['price']);
if (empty($price)) {
    $error[] = "Please enter your price!!!";
}

$discountprice = validate_input_text_admin_site($_POST['discountprice']);
if (empty($discountprice)) {
    $error[] = "Please enter your Discount price!!!";
}

//Create demo profile
$fileImage = $_FILES['profileUpload'];
$profileImage = upload_profile('../assets/product-image/', $fileImage);

if (empty($error)) {


    // //Get connect SQL
    try {
        $connect = $db->con;
    } catch (ErrorException $er) {
        print "Error: " . $er->getMessage();
    }
    // Insert table user
    $sql = "SELECT * FROM category WHERE brand_name = '$product_brand' ";


    if ($connect->query($sql) === TRUE) {
        // $brandId = mysqli_fetch_array($connect->query($sql));
    } else {
        print "Error: " . $sql . "<br>" . $connect->error;
    }

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $brandId = $row['brand_id'];
        }
    } else {
        printf('No record found.<br />');
    }


    // Insert table user
    $sql = "INSERT INTO product (item_id, brand_id, item_brand, item_name, item_desc, item_memory, 
       item_cpu, item_gpu, item_drive, item_monitor, item_os, item_price, item_image, item_register, discount_price) 
       VALUES ('', $brandId, '$product_brand', '$name_product', '$decriptionProduct','$memoryproduct',
       '$cpuproduct','$gpuproduct','$driveproduct','$moniterproduct','$osproduct','$price', '$profileImage', NOW(), '$discountprice' )";


    if ($connect->query($sql) === TRUE) {
        print "New record created successfully";
        header("location: ../admin/_view-products.php");
    } else {
        print "Error: " . $sql . "<br>" . $connect->error;
    }

} else {
    echo 'Not validated';
}


