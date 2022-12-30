<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$events_collection = $client->student_services_db->events;

        error_reporting(E_ALL);
        ini_set('display_errors', 1); 

$events = [
    [
        'Date' => json_decode(json_encode(new \DateTime("11 Dec 2022")),true),
        'Participants_Emails' => ["sdfbhb@lau.edu"],
        'Event_Name' => 'eventname1',
        'Event_Description' => 'eventdesc1',
        'Club_Name' => 'clubname1',
        'Poster' => 'geekexpressrecruitmentpresentation',
        'Day' => '23',
        'Month' => '09'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("05 Nov 2022")),true),
        'Participants_Emails' => ["hjsd7@lau.edu","dfbs@lau.edu", "adjda.fdsknhns@lau.edu", "fsjhdnjdsf@lau.edu"],
        'Event_Name' => 'eventname2',
        'Event_Description' => 'eventdesc2',
        'Club_Name' => 'clubname2',
        'Poster' => '10thannualcreativewritingcompetition',
        'Day' => '14',
        'Month' => '09'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("29 Dec 2022")),true),
        'Participants_Emails' => ["lololol@lau.edu", "teststtss@lau.edu"],
        'Event_Name' => 'eventname3',
        'Event_Description' => 'eventdesc3',
        'Club_Name' => 'clubname3',
        'Poster' => 'jobsearchstrategies',
        'Day' => '01',
        'Month' => '08'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("11 Sep 2002")),true),
        'Participants_Emails' => ["babababa@lau.edu"],
        'Event_Name' => 'eventname4',
        'Event_Description' => 'eventdesc4',
        'Club_Name' => 'clubname4',
        'Poster' => 'welcometocampus',
        'Day' => '02',
        'Month' => '09'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("16 October 2002")),true),
        'Participants_Emails' => ["dsbfds@lau.edu", "djksdnf@lau.edu", "batman2@lau.edu", "mamama@lau.edu", "wiwoiwo@lau.edu"],
        'Event_Name' => 'eventname5',
        'Event_Description' => 'eventdesc5',
        'Club_Name' => 'clubname5',
        'Poster' => 'projectmanagementwwebinar',
        'Day' => '24',
        'Month' => '09'
    ],

];

$insertManyResult = $events_collection->insertMany($events);
echo "<h3>Inserted " . $insertManyResult->getInsertedCount() . " new events </h3>";
echo "<br>";


    
?>

