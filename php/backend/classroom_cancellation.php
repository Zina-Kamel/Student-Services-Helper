<?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1); 

$ide = $_POST['ide'];
require_once __DIR__ . '/vendor/autoload.php';
session_start();
$client = new MongoDB\Client("mongodb://localhost:27017");
$classroom_reservations_collection = $client->student_services_db->classroom_reservations;
$users_events_collection = $client->student_services_db->users_events;

    $cursor = $classroom_reservations_collection->find(
        array(
            '_id' => new \MongoDB\BSON\ObjectID($ide)
        )
    );


    // $bulk = new MongoDB\Driver\BulkWrite;
    // $bulk->update(["Email_Address" => $_SESSION["useremail"]], [$pull => $ide]);

    // $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
    // $result = $manager->executeBulkWrite($users_events_collection, $bulk);
    
    $users_events_collection->updateMany( 
        array("Email_Address" => $_SESSION["useremail"]),
        array( '$pull' => 
            array(
                "Booked_Classrooms" => $ide
            )
        )
    );

    $cursor2array = iterator_to_array($cursor)[0];

    $classroom_reservations_collection->deleteOne( array( '_id' =>  new \MongoDB\BSON\ObjectID($ide)) );
?>
