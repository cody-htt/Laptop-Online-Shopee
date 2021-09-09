<?php

require ('_validate-helper.php');
 
    // error variable
    $error = array();
    $namecategories = validate_input_text($_POST['namecategories']);
    if(empty($namecategories)){
        $error[] = "Please enter your Product Brand!!!";
    }

    $idcategories = validate_input_text($_POST['idcategories']);
    if(empty($idcategories)){
        $error[] = "Please enter your Product Brand!!!";
    }


if(empty($error)){




        // //Get connect SQL
    try{
        $connect = $db->con;
    } catch (ErrorException $er) {
        print "Error: ". $er->getMessage();
    }

    

       // delete table product

        $sql = "DELETE FROM category WHERE brand_id=$idcategories";

        

       if ($connect->query($sql) === TRUE) {

        print "New record created successfully";
        header("location: ../admin/_view-categories.php");
            exit();

       } else {
        print "Error: " . $sql . "<br>" . $connect->error;
       }

}
else {
    echo 'Not validated';
}
