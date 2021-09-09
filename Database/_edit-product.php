<?php

require('_validate-helper.php');

// error variable
$error = array();
$productbrand = validate_input_text_admin_site($_POST['brand']);
if (empty($productbrand)) {
    $error[] = "Please enter your Product Brand!!!";
}

$nameproduct = validate_input_text_admin_site($_POST['nameproduct']);
if (empty($nameproduct)) {
    $error[] = "Please enter your Name Product !!!";
}

$decriptionProduct = validate_input_text_admin_site($_POST['description']);
if (empty($decriptionProduct)) {
    $error[] = "Please enter your Name Product !!!";
}

$nameproduct = validate_input_text_admin_site($_POST['nameproduct']);
if (empty($nameproduct)) {
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

$profileImage1 = validate_input_text_admin_site($_POST['profileUpload2']);
if (empty($profileImage1)) {
    $error[] = "Please enter your Discount price!!!";
}

$productid = validate_input_text_admin_site($_POST['idproduct']);
if (empty($productid)) {
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

    $item_id = $_GET['item_id'] ?? 1;

    // update table product


    // Insert table user
    $sql = "SELECT * FROM category WHERE brand_name = '$productbrand' ";


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

    if ($profileImage != null) {
        $sql = "UPDATE Product SET 
            brand_id = $brandId, item_brand ='$productbrand' , item_name = '$nameproduct', item_desc = '$decriptionProduct', item_memory='$memoryproduct',
            item_cpu = '$cpuproduct', item_gpu= '$gpuproduct', item_drive= '$driveproduct', item_monitor= '$moniterproduct', item_os='$osproduct', item_price= '$price', 
            item_image = '$profileImage', item_register= NOW(), discount_price ='$discountprice'
            WHERE item_id= $productid";
        echo($sql);
    } else {
        $sql = "UPDATE Product SET 
            brand_id = $brandId, item_brand ='$productbrand' , item_name = '$nameproduct', item_desc = '$decriptionProduct', item_memory='$memoryproduct',
            item_cpu = '$cpuproduct', item_gpu= '$gpuproduct', item_drive= '$driveproduct', item_monitor= '$moniterproduct', item_os='$osproduct', item_price= '$price', 
            item_image = '$profileImage1', item_register= NOW(), discount_price ='$discountprice'
            WHERE item_id=$productid";
        echo($sql);
    }


    if ($connect->query($sql) === TRUE) {
        print "New record created successfully";
        header("location: ../admin/_view-products.php");
    } else {
        print "Error: " . $sql . "<br>" . $connect->error;
    }

} else {
    echo 'Not validated';
}
