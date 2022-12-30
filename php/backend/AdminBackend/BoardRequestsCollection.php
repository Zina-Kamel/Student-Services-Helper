<?php
//for students who want to run for a club board
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$club_board_requests_collection = $client->student_services_db->club_board_requests;

        error_reporting(E_ALL);
        ini_set('display_errors', 1); 

$club_board_requests = [
    [
        'Student_ID' => 1,
        'Club_Name' => 'Cooking',
        'Position' => "Vice President",
        'Description' => 'I am responsible and interested in economics',
        
    ],

    [
        'Student_ID' => 2,
        'Club_Name' => 'Data Analytics',
        'Position' => "President",
        'Description' => 'I have a lot of experience with data science',
    ],

    [
        'Student_ID' => 3,
        'Club_Name' => 'Music',
        'Position' => "Vice President",
        'Description' => ' v v v v v v v v v v  v v v v v v v v v v v v v v v',
    ],

    [
        'Student_ID' => 4,
        'Club_Name' => 'Economics',
        'Position' => "Treasurer ",
        'Description' => 'I am good at treasury things ',
    ],

    [
        'Student_ID' => 5,
        'Club_Name' => 'Gender and Sexuality',
        'Position' => "Secretary ",
        'Description' => 'I can take the club to the next level',
    ],

];

$insertManyResult = $club_board_requests_collection->insertMany($club_board_requests);
echo "<h3>Inserted " . $insertManyResult->getInsertedCount() . " new events </h3>";
echo "<br>";


    
?>

