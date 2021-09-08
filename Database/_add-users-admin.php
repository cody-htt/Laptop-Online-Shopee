<?php

require ('_validate-helper.php');
 
    // error variable
$error = array();
$firstname = validate_input_text($_POST['first_name']);
if(empty($firstname)){
    $error[] = "Please enter your Product Brand!!!";
}

$lastname = validate_input_text($_POST['last_name']);
if(empty($lastname)){
    $error[] = "Please enter your Name Product !!!";
}


$user = validate_input_text($_POST['user']);
if(empty($user)){
    $error[] = "Please enter your price!!!";
}

$password = validate_input_text($_POST['password']);
if(empty($password)){
    $error[] = "Please enter your Discount price!!!";
}

// //Create demo profile
// $fileImage = $_FILES['profileUpload'];
// $profileImage = upload_profile('../assets/product-image/',$fileImage);

if(empty($error)){



    echo($firstname);

        // //Get connect SQL
    try{
        $connect = $db->con;
    } catch (ErrorException $er) {
        print "Error: ". $er->getMessage();
    }
 
       // Insert table user
       $sql = "INSERT INTO admin (admin_id, first_name, last_name, ad_user, ad_password, register_date) 
       VALUES ('', '$firstname', '$lastname', '$user', '$password', NOW() )";

        

       if ($connect->query($sql) === TRUE) {
        print "New record created successfully";
        header("location: ../admin/_view-users-admin.php");
        exit();
       } else {
        print "Error: " . $sql . "<br>" . $connect->error;
       }

}
else {
    echo 'Not validated';
}
