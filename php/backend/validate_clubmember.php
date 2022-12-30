<?php

error_reporting(E_ALL);
ini_set('display_errors', 1); 

require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$users_collection = $client->student_services_db->users;
$login_collection = $client->student_services_db->login;

session_start();
if (isset($_SESSION["useremail"])){
    $email = $_SESSION['useremail'];
    $userinfo = $users_collection->find(['Email_Address' => $email]);
    $cur_user = iterator_to_array($userinfo)[0];
    if($cur_user['Is_Club_Member']==true){
        echo "<script> location.href='ClubMemberEvent.php'; </script>";
    }else{
        echo "You need to be a club member to access this page ";
        print("<a href='DisplayProfile.php' ><input type='button' value='Back to Profile'></a>");
    }
}else{
    
    echo "<script> location.href='login.php'; </script>";
}

?>