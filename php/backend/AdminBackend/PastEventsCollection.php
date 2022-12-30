<?php
require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://localhost:27017");
$past_events_collection = $client->student_services_db->past_events;

$past_events = [

[
"Event_Name" =>'Nameme',
"Date" => json_decode(json_encode(new \DateTime("2022-09-23")),true),
"Club" => 'Beiruti',
"Email_Addresses" => ['roula.ghaleb01@lau.edu', 'anyone.anyone@lau.edu']
],


[
    "Event_Name" =>'Marathon',
    "Date" => json_decode(json_encode(new \DateTime("2022-01-23")),true),
    "Club" => 'Running',
    "Email_Addresses" => ['test.ghaleb01@lau.edu', 'anyone.anyone@lau.edu', 'teste.tr@lau.edu']
],
[
    "Event_Name" =>'Nap',
    "Date" => json_decode(json_encode(new \DateTime("2021-11-19")),true),
    "Club" => 'Community Service',
    "Email_Addresses" => ['test.ghaleb01@lau.edu', 'anyone.anyone@lau.edu', 'teste.tr@lau.edu']
],
];

$insertCurrentEvents = $past_events_collection->insertMany($past_events);

print_r($past_events);
