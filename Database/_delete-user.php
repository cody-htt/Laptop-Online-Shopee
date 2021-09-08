<?php

require ('_validate-helper.php');
 
    // error variable
$error = array();
$user_firstname = validate_input_text($_POST['firstname']);
if(empty($user_firstname)){
    $error[] = "Please enter your First Name!!!";
}

$user_id = validate_input_text($_POST['iduser']);
if(empty($user_id)){
    $error[] = "Please enter your id!!!";
}

$user_lastname = validate_input_text($_POST['lastname']);
if(empty($user_lastname)){
    $error[] = "Please enter your Last Name !!!";
}

$user_email = validate_input_text($_POST['email']);
if(empty($user_email)){
    $error[] = "Please enter your Email !!!";
}




if(empty($error)){




        // //Get connect SQL
    try{
        $connect = $db->con;
        print "$user_id ";
    } catch (ErrorException $er) {
        print "Error: ". $er->getMessage();
    }

       // update table user

        
       $sql = " DELETE FROM user WHERE user_id = $user_id";
        

       if ($connect->query($sql) === TRUE) {
        print "New record created successfully";
        header("location: ../admin/_view-users.php");
            exit();
       } else {
        print "Error: " . $sql . "<br>" . $connect->error;
       }

}
else {
    echo 'Not validated';
}
