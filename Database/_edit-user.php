<?php

require('_validate-helper.php');

// error variable
$error = array();
$user_firstname = validate_input_text_admin_site($_POST['firstname']);
if (empty($user_firstname)) {
    $error[] = "Please enter your First Name!!!";
}

$user_id = validate_input_text_admin_site($_POST['iduser']);
if (empty($user_id)) {
    $error[] = "Please enter your id!!!";
}

$user_lastname = validate_input_text_admin_site($_POST['lastname']);
if (empty($user_lastname)) {
    $error[] = "Please enter your Last Name !!!";
}

$user_email = validate_input_text_admin_site($_POST['email']);
if (empty($user_email)) {
    $error[] = "Please enter your Email !!!";
}


if (empty($error)) {


    // //Get connect SQL
    try {
        $connect = $db->con;
    } catch (ErrorException $er) {
        print "Error: " . $er->getMessage();
    }

    // update table user


    $sql = "UPDATE user SET first_name='$user_firstname', last_name='$user_lastname' WHERE " . "user_id" . " = $user_id";


    if ($connect->query($sql) === TRUE) {
        print "New record created successfully";
        header("location: ../admin/_view-users.php");
    } else {
        print "Error: " . $sql . "<br>" . $connect->error;
    }

} else {
    echo 'Not validated';
}
