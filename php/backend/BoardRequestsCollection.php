<?php
//for students who want to run for a club board
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$board_events_requests = $client->student_services_db->board_events_requests;

        error_reporting(E_ALL);
        ini_set('display_errors', 1); 

$club_board_requests = [
    [
        'Student_ID' => 1,
        'Event_Name' => 'Mepi roles',
        'isclassroom' => true,
        'Description' => 'teach students',
        'Date' => json_decode(json_encode(new \DateTime("2023-11-09")),true),
        'Time' => '00:16',
        'Poster' => 'changingroles',
        'Club' => "Love Birds"
    ],
    [
        'Student_ID' => 4,
        'Event_Name' => 'Mathematics quiz',
        'isclassroom' => true,
        'Description' => 'richness in math',
        'Date' => json_decode(json_encode(new \DateTime("2023-11-09")),true),
        'Time' => '00:16',
        'Poster' => 'changingroles',
        'Club' => "Math and CS"
    ],
    [
        'Student_ID' => 2,
        'Event_Name' => 'Studying',
        'isclassroom' => false,
        'Description' => 'teach students important things',
        'Date' => json_decode(json_encode(new \DateTime("2023-12-30")),true),
        'Time' => '5:15',
        'Poster' => 'internationalprograms',
        'Club' => "Nerds"
    ],
    [
        'Student_ID' => 5,
        'Event_Name' => 'Programs',
        'isclassroom' => false,
        'Description' => 'international things',
        'Date' => json_decode(json_encode(new \DateTime("2023-05-05")),true),
        'Time' => '5:15',
        'Poster' => 'internationalprograms',
        'Club' => "Nerds"
    ],
];

    
$insertManyResult = $board_events_requests->insertMany($club_board_requests);
echo "<h3>Inserted " . $insertManyResult->getInsertedCount() . " new events </h3>";
echo "<br>";


    
?>

