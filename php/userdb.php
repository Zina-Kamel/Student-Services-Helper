<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$users_collection = $client->student_services_db->users;

$users = [
    [
    'Student_ID' => 1, 
    'First_Name' => 'Zina',
    'Last_Name' => 'Kamel',
    'Middle_Name' => 'Abdlrahim',
    'Email_Address' => 'zina.kamel@lau.edu',
    'Date_Registered' => new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000),
    'Is_Club_Member' => true,
    
    ],
    
    [
    'Student_ID' => 2, 
    'First_Name' => 'Antoun',
    'Last_Name' => 'Atallah',
    'Middle_Name' => 'Khaleel',
    'Email_Address' => 'zina.kamel01@lau.edu',
    'Date_Registered' => new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000),
    'Is_Club_Member' => false,
    ],
];

$insertManyResult = $users_collection->insertMany($users);
echo "<h3>Inserted " . $insertManyResult->getInsertedCount() . " new users </h3>";
echo "<br>";

$users_collection->createIndex(['Student_ID' => 1]);
    
?>

