<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$events_collection = $client->student_services_db->events;

        error_reporting(E_ALL);
        ini_set('display_errors', 1); 

$events = [
    [
        'Date' => json_decode(json_encode(new \DateTime("2022-09-13")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname1',
        'Event_Description' => 'eventdesc1',
        'Club_Name' => 'clubname1'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-09-14")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname2',
        'Event_Description' => 'eventdesc2',
        'Club_Name' => 'clubname2'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-09-14")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname3',
        'Event_Description' => 'eventdesc3',
        'Club_Name' => 'clubname3'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-09-23")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname4',
        'Event_Description' => 'eventdesc4',
        'Club_Name' => 'clubname4'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-09-24")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname5',
        'Event_Description' => 'eventdesc5',
        'Club_Name' => 'clubname5'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-09-25")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname6',
        'Event_Description' => 'eventdesc6',
        'Club_Name' => 'clubname6'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-09-26")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname7',
        'Event_Description' => 'eventdesc7',
        'Club_Name' => 'clubname7'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-09-27")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname8',
        'Event_Description' => 'eventdesc8',
        'Club_Name' => 'clubname8'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-09-13")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname9',
        'Event_Description' => 'eventdesc9',
        'Club_Name' => 'clubname9'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-07-13")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname10',
        'Event_Description' => 'eventdesc10',
        'Club_Name' => 'clubname10'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-06-13")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname11',
        'Event_Description' => 'eventdesc11',
        'Club_Name' => 'clubname11'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-06-06")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname12',
        'Event_Description' => 'eventdesc12',
        'Club_Name' => 'clubname12'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-08-13")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname13',
        'Event_Description' => 'eventdesc13',
        'Club_Name' => 'clubname13'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-11-13")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname14',
        'Event_Description' => 'eventdesc14',
        'Club_Name' => 'clubname14'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-10-13")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname15',
        'Event_Description' => 'eventdesc15',
        'Club_Name' => 'clubname15'
    ],
    [
        'Date' => json_decode(json_encode(new \DateTime("2022-12-13")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname16',
        'Event_Description' => 'eventdesc16',
        'Club_Name' => 'clubname16'
    ],
    [
        'Date' => json_decode(json_encode(new \DateTime("2022-12-12")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname17',
        'Event_Description' => 'eventdesc17',
        'Club_Name' => 'clubname17'
    ],
    [
        'Date' => json_decode(json_encode(new \DateTime("2022-12-10")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname18',
        'Event_Description' => 'eventdesc18',
        'Club_Name' => 'clubname18'
    ],
    [
        'Date' => json_decode(json_encode(new \DateTime("2022-12-01")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname19',
        'Event_Description' => 'eventdesc19',
        'Club_Name' => 'clubname19'
    ],
    [
        'Date' => json_decode(json_encode(new \DateTime("2022-12-03")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname20',
        'Event_Description' => 'eventdesc20',
        'Club_Name' => 'clubname20'
    ],
];

$insertManyResult = $events_collection->insertMany($events);
echo "<h3>Inserted " . $insertManyResult->getInsertedCount() . " new events </h3>";
echo "<br>";


    
?>

