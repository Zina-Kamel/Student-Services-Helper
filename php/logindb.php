<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$login_collection = $client->student_services_db->login;

$logins = [
    [
        'Email_Address' => 'zina.kamel@lau.edu',
        'Password' => 'mypassword'
    ],
];

$insertManyResult = $login_collection->insertMany($logins);
echo "<h3>Inserted " . $insertManyResult->getInsertedCount() . " new logins </h3>";
echo "<br>";

$login_collection->createIndex(['Email_Address' => 1]);
    
?>

