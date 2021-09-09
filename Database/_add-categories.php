<?php

require('_validate-helper.php');

// error variable
$error = array();
$namecategories = validate_input_text_admin_site($_POST['namecategories']);
if (empty($namecategories)) {
    $error[] = "Please enter your Product Brand!!!";
}


if (empty($error)) {


    // //Get connect SQL
    try {
        $connect = $db->con;
    } catch (ErrorException $er) {
        print "Error: " . $er->getMessage();
    }

    // Insert table user
    $sql = "INSERT INTO category (brand_id, brand_name) 
       VALUES ('', '$namecategories')";

    if ($connect->query($sql) === TRUE) {
        print "New record created successfully";
        header("location: ../admin/_view-categories.php");
    } else {
        print "Error: " . $sql . "<br>" . $connect->error;
    }

} else {
    echo 'Not validated';
}
