<?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1); 

$eventid = $_POST['eventid'];
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$events_collection = $client->student_services_db->events;

    $cursor = $events_collection->find(
        array(
            '_id' => new \MongoDB\BSON\ObjectID($eventid)
        )
    );

    $cursor2array = iterator_to_array($cursor)[0];

    $events_collection->deleteOne( array( '_id' =>  new \MongoDB\BSON\ObjectID($eventid)) );
?>
