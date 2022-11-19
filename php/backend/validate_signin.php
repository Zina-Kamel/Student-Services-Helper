<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1); 

require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$users_collection = $client->student_services_db->users;
$login_collection = $client->student_services_db->login;

session_start();
if (isset($_SESSION["useremail"])){
    echo "<script> location.href='Profile.php'; </script>";
}else{
    echo "<script> location.href='login.php'; </script>";
}

?>