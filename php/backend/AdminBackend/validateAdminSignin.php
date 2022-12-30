<?php


require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$admins_collection = $client->student_services_db->admins;
$login_collection = $client->student_services_db->admin_login;

session_start();
if (isset($_SESSION["useremail"])){
    echo "<script> location.href='AdminMainPage.php'; </script>";
}else{
    echo "<script> location.href='AdminLoginPage.php'; </script>";
}

?>