<?php

//Validate input text
function validate_input_text($textValue): string
{
    if(!empty($textValue)){
        $trim_text=trim($textValue);

        // Remove illegal characters
        return filter_var($trim_text, FILTER_SANITIZE_STRING);
    }
    return '';
}

function validate_input_email($emailValue): string
{
    if(!empty($emailValue)){
        $trim_text=trim($emailValue);

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

    if(!empty($fileName)){

        //Allow certain file format
        $allowType = array('jpg', 'png', 'jpeg', 'gif');

        if(in_array($fileType, $allowType)){
            //Update file to the server
            if(move_uploaded_file($file['tmp_name'], $targetFilePath)){
                return $targetFilePath;
            }
        }
    }

    //Return the default image
    return $path . $default;

}








