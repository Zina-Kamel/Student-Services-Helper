<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$sessions_collection = $client->student_services_db->sessions;

        error_reporting(E_ALL);
        ini_set('display_errors', 1); 

$sessions = [
    [
        'Session_ID'=>'1',
        'Timestamp' => json_decode(json_encode(new \DateTime("2022-09-23")),true),
        'Day' => '23',
        'Participants_Emails' => [],
        'Month' => '09',
        'Topic' => 'Web Development Revision Session',
        'Location' => 'AKSOB 1004',
        'Activity' => 'Preparing for the final. We will go over JQuery, Ajax and SQL',
        'Start_Time' => '2 pm',
        'End_Time' => '4 pm',
    ],
    [
        'Session_ID'=>'2',
        'Timestamp' => json_decode(json_encode(new \DateTime("2022-11-23")),true),
        'Day' => '23',
        'Month' => '11',
        'Participants_Emails' => [],
        'Location' => 'AKSOB 1004',
        'Topic' => 'Biology Revision Session',
        'Activity' => 'We will revise Human Systems and Genetics',
        'Start_Time' => '2 pm',
        'End_Time' => '4 pm',
    ],
    [
        'Session_ID'=>'3',
        'Timestamp' => json_decode(json_encode(new \DateTime("2022-10-04")),true),
        'Day' => '04',
        'Month' => '10',
        'Location' => 'Nicol 1006',
        'Participants_Emails' => [],
        'Topic' => 'Chemistry Competition Preparation',
        'Activity' => 'Preparing for the annual chemistry competition. We will solve problems together',
        'Start_Time' => '4 pm',
        'End_Time' => '6 pm',
    ],
    [
        'Session_ID'=>'1',
        'Timestamp' => json_decode(json_encode(new \DateTime("2022-09-23")),true),
        'Day' => '23',
        'Month' => '09',
        'Topic' => 'Music Rehearsals',
        'Participants_Emails' => [],
        'Location' => 'AKSOB 1010',
        'Activity' => 'Rehearsing for the performance on October 5th',
        'Start_Time' => '9 pm',
        'End_Time' => '11 pm',
    ],
];

$insertManyResult = $sessions_collection->insertMany($sessions);
echo "<h3>Inserted " . $insertManyResult->getInsertedCount() . " new sessions </h3>";
echo "<br>";


    
?>

