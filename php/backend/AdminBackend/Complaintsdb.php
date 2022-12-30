<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$complaints_collection = $client->student_services_db->complaints;

$complaints = [
    [
        'First_Name' => 'Man',
        'Last_name' => 'Mani',
        'Email_Address' => 'man.mani@lau.edu',
        'Date_Sent' => new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000),
        'Text' => "Bad website",
    ],
    [
        'First_Name' => 'Mango',
        'Last_name' => 'Man',
        'Email_Address' => 'mango.man@lau.edu',
        'Date_Sent' => new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000),
        'Text' => "Very slow admin response time",
    ],
    [
        'First_Name' => 'Mageda',
        'Last_name' => 'Algorithm',
        'Email_Address' => 'mageda.algorithm@lau.edu',
        'Date_Sent' => new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000),
        'Text' => "fjgbfgdui hsdjfsjdjishgdsijgbsi gjsfjgbfd",
    ],
    [
        'First_Name' => 'Roula',
        'Last_name' => 'Ghaleb',
        'Email_Address' => 'roula.ghaleb@lau.edu',
        'Date_Sent' => new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000),
        'Text' => ":testt etste stet st et estest et et est ",
    ],


];

$insertComplaints = $complaints_collection->insertMany($complaints);

print_r($complaints);
