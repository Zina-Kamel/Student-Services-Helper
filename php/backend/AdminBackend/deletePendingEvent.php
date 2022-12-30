<?php

use MongoDB\BSON\ObjectId;

session_start();
$email = $_SESSION['useremail'];
//$id = $_SESSION['_id'];

require_once __DIR__ . '/vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$board_event_request_collection = $client->student_services_db->board_events_requests;
$id = $_GET['id'];

  


    $board_event_request_collection->deleteOne(['Event_Name' => $id]);
header('location:AdminVerifyEvents.php');
