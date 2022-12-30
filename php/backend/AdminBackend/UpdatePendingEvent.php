<?php

use MongoDB\BSON\ObjectId;

error_reporting(E_ALL);
ini_set('display_errors', 1); 

session_start();
$email = $_SESSION['useremail'];
//$id = $_SESSION['_id'];

require_once __DIR__ . '/vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$board_event_request_collection = $client->student_services_db->board_events_requests;
$events_collection = $client->student_services_db->events;
$id = $_GET['id2'];

$cursor = $board_event_request_collection->find((['Event_Name' => $id]));

foreach ($cursor as $document) {
    $stid = $document["Student_ID"];
    $ename = ($document["Event_Name"]);
    $class =  $document["isclassroom"];
    $desc = $document["Description"];
    $date = $document["Date"];
    $time =  $document["Time"];
    $club =  $document["Club"];
    $post = $document["Poster"];

    // $get_club = $board_event_request_collection ->find((['Student_ID' => $id]));
    // foreach ($get_club as $doc) {
    //     $cname = $doc["Club_Name"];


        $new = array(
            "Date" => $date,
            "Participant_Emails" => [],
            "Event_Name" => $ename,
            "Club_Name" => $club,
            "Poster" => $post,
            "Event_Description" => $desc,
            "Day" => date('w', strtotime($date["date"])),
            "Month" =>date('j', strtotime($date["date"])),
        );


        $events_collection->insertOne($new);
        //$test = true;
    }
    // $users_collection->updateOne(['Student_ID' => $id], ['$set' => ['Is_Club_Member' => true]]);
    // $users_collection->updateOne(['Student_ID' => $id], ['$set' => ['Position' => $pos]]);




    $board_event_request_collection->deleteOne(['Event_Name' => $id]);
header('location:AdminVerifyEvents.php');
