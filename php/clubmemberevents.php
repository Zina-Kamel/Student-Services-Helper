<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$club_events_requests_collection = $client->student_services_db->club_events_requests;

        error_reporting(E_ALL);
        ini_set('display_errors', 1); 

$events = [
    [
        'Date' => json_decode(json_encode(new \DateTime("2022-09-23")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname1',
        'Event_Description' => 'eventdesc1',
        'Club_Name' => 'clubname1',
        'Poster' => 'geekexpressrecruitmentpresentation',
        'Day' => '23',
        'Month' => '09'
    ],
];

$insertManyResult = $club_events_requests_collection->insertMany($events);
echo "<h3>Inserted " . $insertManyResult->getInsertedCount() . " new events </h3>";
echo "<br>";


    
?>

