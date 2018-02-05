<?php
    require('connection.php');

    $firstName   =   $_POST['fn'];
    $middleName   =   $_POST['mn'];
    $lastName  =   $_POST['ln'];
    $emailAdd  =   $_POST['ea'];
    $contNum  =   $_POST['cn'];
    $userName  =   $_POST['un'];
    $password  =   $_POST['pw'];

    // $query = $connection->query("SELECT * FROM user_credentials WHERE `username`='$userName'");
    
    // while($x = $query->fetch()) {
    //     $cn = $x['username'];
    //     if(!empty($userName)){
    //         echo "Data is already in the database";
    //     }
    // }

    // if(empty($userName)){
    //     $connection->query("INSERT INTO user_credentials (first_name, middle_name, last_name, email_address, contact_number, username, password) VALUES ('$firstName', '$middleName', '$lastName', '$emailAdd', '$contNum', '$userName','$password')");
    // }
    
    
    $connection->query("INSERT INTO user_credentials (first_name, middle_name, last_name, email_address, contact_number, username, password) VALUES ('$firstName', '$middleName', '$lastName', '$emailAdd', '$contNum', '$userName','$password')");