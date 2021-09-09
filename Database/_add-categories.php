<?php

// error variable
$error = array();
$name_category = validate_input_text_admin_site($_POST['namecategories']);
if (empty($name_category)) {
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
    $sql = "INSERT INTO category (brand_id, brand_name) VALUES ('', '$name_category')";

    if ($connect->query($sql) === TRUE) {
        print "New record created successfully";
        header("location: ../admin/_view-categories.php");
    } else {
        print "Error: " . $sql . "<br>" . $connect->error;
    }

} else {
    echo 'Not validated';
}
