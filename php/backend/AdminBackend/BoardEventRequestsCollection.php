<?php

require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://localhost:27017");
$board_event_requests_collection = $client->student_services_db->board_event_requests;


$board_event_requests = [
    [
        'Name' => 'event1',
        'Date_Sent'  => new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000),
        'Date_To_Happen' => '29-06-2022',
        'Club' => 'Music',
        'Uploader_Email' => 'roula.ghaleb@lau.edu',
        'Img' => ''
    ],

    [
        'Name' => 'event2',
        'Date_Sent' => new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000),
        'Date_To_Happen' => '14-03-2022',
        'Club' => 'Cedars',
        'Uploader_Email' => 'sajbfnfsd@lau.edu',
        'Img' => ''
    ],
];

$insertBoardEventRequests = $board_event_requests_collection->insertMany($board_event_requests);
print_r($board_event_requests);
