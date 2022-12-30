<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$events_collection = $client->student_services_db->events;

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

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-09-14")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname2',
        'Event_Description' => 'eventdesc2',
        'Club_Name' => 'clubname2',
        'Poster' => '10thannualcreativewritingcompetition',
        'Day' => '14',
        'Month' => '09'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-08-01")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname3',
        'Event_Description' => 'eventdesc3',
        'Club_Name' => 'clubname3',
        'Poster' => 'jobsearchstrategies',
        'Day' => '01',
        'Month' => '08'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-09-02")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'eventname4',
        'Event_Description' => 'eventdesc4',
        'Club_Name' => 'clubname4',
        'Poster' => 'welcometocampus',
        'Day' => '02',
        'Month' => '09'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2022-12-28")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'Project Management',
        'Event_Description' => 'Learn how to manage variety of project types',
        'Club_Name' => 'ITM Club',
        'Poster' => 'projectmanagementwwebinar',
        'Day' => '28',
        'Month' => '12'
    ],

        [
        'Date' => json_decode(json_encode(new \DateTime("2022-12-24")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'Christmas Evening',
        'Event_Description' => 'A christmas to remember',
        'Club_Name' => 'Activities Club',
        'Poster' => 'christmas',
        'Day' => '24',
        'Month' => '12'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2023-01-04")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'Stock Prediction',
        'Event_Description' => 'Predicting Stocks in Python',
        'Club_Name' => 'Computer Science Club',
        'Poster' => 'stockprediction',
        'Day' => '04',
        'Month' => '01'
    ],

    [
        'Date' => json_decode(json_encode(new \DateTime("2023-01-14")),true),
        'Participants_Emails' => [],
        'Event_Name' => 'Media Literacy',
        'Event_Description' => 'Become more skilled in media',
        'Club_Name' => 'Activities Club',
        'Poster' => 'medialiteracy',
        'Day' => '14',
        'Month' => '01'
    ],

    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-09-25")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname6',
    //     'Event_Description' => 'eventdesc6',
    //     'Club_Name' => 'clubname6',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],

    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-09-26")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname7',
    //     'Event_Description' => 'eventdesc7',
    //     'Club_Name' => 'clubname7',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],

    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-09-27")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname8',
    //     'Event_Description' => 'eventdesc8',
    //     'Club_Name' => 'clubname8',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],

    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-09-13")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname9',
    //     'Event_Description' => 'eventdesc9',
    //     'Club_Name' => 'clubname9',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],

    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-07-13")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname10',
    //     'Event_Description' => 'eventdesc10',
    //     'Club_Name' => 'clubname10',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],

    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-06-13")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname11',
    //     'Event_Description' => 'eventdesc11',
    //     'Club_Name' => 'clubname11',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],

    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-06-06")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname12',
    //     'Event_Description' => 'eventdesc12',
    //     'Club_Name' => 'clubname12',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],

    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-08-13")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname13',
    //     'Event_Description' => 'eventdesc13',
    //     'Club_Name' => 'clubname13',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],

    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-11-13")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname14',
    //     'Event_Description' => 'eventdesc14',
    //     'Club_Name' => 'clubname14',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],

    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-10-13")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname15',
    //     'Event_Description' => 'eventdesc15',
    //     'Club_Name' => 'clubname15',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],
    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-12-13")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname16',
    //     'Event_Description' => 'eventdesc16',
    //     'Club_Name' => 'clubname16',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],
    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-12-12")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname17',
    //     'Event_Description' => 'eventdesc17',
    //     'Club_Name' => 'clubname17',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],
    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-12-10")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname18',
    //     'Event_Description' => 'eventdesc18',
    //     'Club_Name' => 'clubname18',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],
    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-12-01")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname19',
    //     'Event_Description' => 'eventdesc19',
    //     'Club_Name' => 'clubname19',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],
    // [
    //     'Date' => json_decode(json_encode(new \DateTime("2022-12-03")),true),
    //     'Participants_Emails' => [],
    //     'Event_Name' => 'eventname20',
    //     'Event_Description' => 'eventdesc20',
    //     'Club_Name' => 'clubname20',
    //     'Poster' => 'geekexpressrecruitmentpresentation'
    // ],
];

$insertManyResult = $events_collection->insertMany($events);
echo "<h3>Inserted " . $insertManyResult->getInsertedCount() . " new events </h3>";
echo "<br>";


    
?>

