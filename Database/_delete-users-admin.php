<?php

// error variable
$error = array();
$firstname = validate_input_text_admin_site($_POST['firstname']);
if (empty($firstname)) {
    $error[] = "Please enter your Product Brand!!!";
}

$lastname = validate_input_text_admin_site($_POST['lastname']);
if (empty($lastname)) {
    $error[] = "Please enter your Name Product !!!";
}

$userId = validate_input_text_admin_site($_POST['iduser']);
if (empty($userId)) {
    $error[] = "Please enter your price!!!";
}

$user = validate_input_text_admin_site($_POST['user']);
if (empty($user)) {
    $error[] = "Please enter your price!!!";
}

$password = validate_input_text_admin_site($_POST['password']);
if (empty($password)) {
    $error[] = "Please enter your Discount price!!!";
}


if (empty($error)) {


    echo($firstname);

    // //Get connect SQL
    $connect = $db->con;

    // delete table admin
    $sql = " DELETE FROM admin WHERE admin_id = $userId";

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
