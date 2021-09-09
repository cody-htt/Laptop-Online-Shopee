<?php

require('_validate-helper.php');

// error variable
$error = array();
$firstname = validate_input_text($_POST['firstname']);
if (empty($firstname)) {
    $error[] = "Please enter your Product Brand!!!";
}

$lastname = validate_input_text($_POST['lastname']);
if (empty($lastname)) {
    $error[] = "Please enter your Name Product !!!";
}

$userId = validate_input_text($_POST['iduser']);
if (empty($userId)) {
    $error[] = "Please enter your price!!!";
}

$user = validate_input_text($_POST['user']);
if (empty($user)) {
    $error[] = "Please enter your price!!!";
}

$password = validate_input_text($_POST['password']);
if (empty($password)) {
    $error[] = "Please enter your Discount price!!!";
}


if (empty($error)) {


    echo($firstname);

    // //Get connect SQL
    try {
        $connect = $db->con;
    } catch (ErrorException $er) {
        print "Error: " . $er->getMessage();
    }

    // update table user


    $sql = "UPDATE admin SET first_name='$firstname', last_name='$lastname', ad_user='$user',ad_password='$password'  WHERE " . "admin_id" . " = $userId";


    if ($connect->query($sql) === TRUE) {
        print "New record created successfully";
        header("location: ../admin/_view-users-admin.php");
        exit();

    } else {
        print "Error: " . $sql . "<br>" . $connect->error;
    }

} else {
    echo 'Not validated';
}
