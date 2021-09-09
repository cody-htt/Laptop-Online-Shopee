<?php

$error = array();

$email = validate_input_email($_POST['email']);
if (empty($email)) {
    $error[] = "Please enter your Last name!!!";
}

$password = validate_input_text($_POST['password']);
if (empty($password)) {
    $error[] = "Please enter your password!!!";
}

if (empty($error)) {


    //Query for user information
    $query_string = "SELECT * FROM admin WHERE ad_user=?";

    //Initial a MySQL statement
    try {
        $init_statement_login = $db->con->stmt_init();
    } catch (ErrorException $er) {
        print "Error: " . $er->getMessage();
    }
    //Prepare SQL statement
    try {
        $init_statement_login->prepare($query_string);
    } catch (ErrorException $er) {
        print "Error: " . $er->getMessage();
    }
    //Bind Value
    try {
        $init_statement_login->bind_param("s", $email);
    } catch (Error $er) {
        print "Error: " . $er->getMessage();
        printf($init_statement_login->error);
    }
    //Execute SQL statement
    try {
        $init_statement_login->execute();
    } catch (Error $er) {
        print "Error: " . $er->getMessage();
    }

    $query_result = $init_statement_login->get_result();
    $row = mysqli_fetch_array($query_result, MYSQLI_ASSOC);

    // echo($password);
    // echo($row['ad_password']);

    if (!empty($row)) {
        //verify user password


        if ($password == $row['ad_password']) {


            $_SESSION['admin_id'] = $row['admin_id'];

            header("location: index.php");
            exit();
        } else {
            print "You are not a member, please register";
        }
    }
} else {
    echo "Please fill your email and password to login...!";
}