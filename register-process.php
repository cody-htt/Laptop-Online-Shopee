<?php

//Call for register-helper
require ('register-helper.php');

// error variable
$error = array();
$firstName = validate_input_text($_POST['firstName']);
if(empty($firstName)){
    $error[] = "Please enter your First name!!!";
}

$lastName = validate_input_text($_POST['lastName']);
if(empty($lastName)){
    $error[] = "Please enter your Last name!!!";
}

$email = validate_input_email($_POST['email']);
if(empty($email)){
    $error[] = "Please enter your Last name!!!";
}

$password = validate_input_text($_POST['password']);
if(empty($password)){
    $error[] = "Please enter your password!!!";
}

$confirm_pwd = validate_input_text($_POST['confirm-pwd']);
if(empty($confirm_pwd)){
    $error[] = "Please enter your confirm password!!!";
}

//Create demo profile
$fileImage = $_FILES['profileUpload'];
$profileImage = upload_profile('./assets/user_avatar/',$fileImage);

if(empty($error)){

    //register a new use
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //Create Query
    $query_string = "INSERT INTO user (user_id, first_name, last_name, user_email, user_password, profile_image, register_date) 
                     VALUES ('', ?, ?, ?, ?, ?, NOW());";

    //Initial a MySQL statement
    try{
        $init_statement = $db->con->stmt_init();
    } catch (ErrorException $er) {
        print "Error: ". $er->getMessage();
    }
    //Prepare SQL statement
    try{
        $init_statement->prepare($query_string);
    } catch (ErrorException $er) {
        print "Error: ". $er->getMessage();
    }
    //Bind Value
    try{
        $init_statement->bind_param("sssss", $firstName, $lastName, $email, $hashed_password, $profileImage);
    } catch (Error $er) {
        print "Error: ". $er->getMessage();
        printf($init_statement->error);
    }
    //Execute SQL statement
    try{
        $init_statement->execute();
    } catch (Error $er) {
        print "Error: ". $er->getMessage();
    }

    if($init_statement->affected_rows == 1){
        $init_statement->close();
        header('location:login.php');
        exit();
    }
    else {
        print "Error while registration...!!!";
    }
}
else {
    echo 'Not validated';
}









