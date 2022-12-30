<?php

error_reporting(E_ALL);
ini_set('display_errors', 1); 

$eventid = $_POST['eventid'];
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$users_collection = $client->student_services_db->users;
$login_collection = $client->student_services_db->login;
$events_collection = $client->student_services_db->events;

session_start();
if (isset($_SESSION["useremail"])){
    
    $cursor = $events_collection->find(
        array(
            '_id' => new \MongoDB\BSON\ObjectID($eventid)
        )
    );

    $cursor2array = iterator_to_array($cursor)[0];


    // session_start();
            $email = $_SESSION['useremail'];
            $exist = 0;

                foreach($cursor2array['Participants_Emails'] as $val){
                    if($val==$email){
                        $exist = 1;
                        echo "<script>alert($val);</script>";

                        //echo "<script> location.href='Profile.php'; </script>";
                    }
                }
    if($exist==1){
        echo "<script>alert('already registered');</script>";
        die();
    }else{
        define( "FIVE_DAYS", 60 * 60 * 24 * 5 );
        setcookie( "eventclicked", $eventid, time() + FIVE_DAYS );    
        echo "<script> location.href='RegisterEvent.php'; </script>";
    }

}else{
    
    echo "<script> location.href='login.php'; </script>";
}

?>