<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname= "special_project";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 
//echo "Connected successfully";
?>

<?php

try {
    $connection = new PDO('mysql:host=localhost;dbname=special_project', 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOEXCEPTION $e){
    die('There is an error in the database connection: '.$e->getMessage());
}