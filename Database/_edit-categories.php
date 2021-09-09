<?php

$error = array();

$name_category = validate_input_text_admin_site($_POST['namecategories']);
if (empty($name_category)) {
    $error[] = "Please enter your Product Brand!!!";
}

$category_id = validate_input_text_admin_site($_POST['idcategories']);
if (empty($category_id)) {
    $error[] = "Please enter your Product Brand!!!";
}

if (empty($error)) {


    // //Get connect SQL
    $connect = $db->con;

    $item_id = $_GET['item_id'] ?? 1;

    // update table product

    $sql = "UPDATE category SET brand_name = '$name_category' WHERE brand_id= $category_id";


    if ($connect->query($sql) === TRUE) {
        print "New record created successfully";
        header("location: ../admin/_view-categories.php");
    } else {
        print "Error: " . $sql . "<br>" . $connect->error;
    }

} else {
    echo 'Not validated';
}
