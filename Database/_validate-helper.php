<?php

//Validate input text
function validate_input_text($textValue): string
{
    if (!empty($textValue)) {
        $trim_text = trim($textValue);

        // Remove illegal characters
        return filter_var($trim_text, FILTER_SANITIZE_STRING);
    }
    return '';
}

function validate_input_email($emailValue): string
{
    if (!empty($emailValue)) {
        $trim_text = trim($emailValue);

        // Remove illegal characters
        return filter_var($trim_text, FILTER_SANITIZE_EMAIL);
    }
    return '';
}

//Get profile image

function upload_profile($path, $file): string
{
    $targetDir = $path;
    $default = "demo-avatar.png";

    //Get file name
    $fileName = basename($file['name']);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (!empty($fileName)) {

        //Allow certain file format
        $allowType = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowType)) {
            //Update file to the server
            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                return $targetFilePath;
            }
        }
    }

    //Return the default image
    return $path . $default;

}


//Get user info
function get_admin_info($con, $admin_id): bool|array
{


    $query = "SELECT first_name, last_name, ad_user FROM admin WHERE admin_id=?";

    try
    {
        $init_statement_getInfo = $con->stmt_init();
    }
    catch (ErrorException $er) {
        print "Error: " . $er->getMessage();
    }
    //Prepare SQL statement
    $init_statement_getInfo->prepare($query);
    //Bind Value
    $init_statement_getInfo->bind_param('i', $admin_id);
    //Execute SQL Statement
    $init_statement_getInfo->execute();

    $result = mysqli_stmt_get_result($init_statement_getInfo);
    $row = mysqli_fetch_array($result);

    return empty($row) ? false : $row;
}








