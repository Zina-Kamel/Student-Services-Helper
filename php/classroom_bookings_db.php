<?php

require_once __DIR__ . '/vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$classroom_reservations_collection = $client->student_services_db->classroom_reservations;

       error_reporting(E_ALL);
       ini_set('display_errors', 1); 

$reservations = [
        [
            "Reservation type "=> "study",
            "Study_Mode" => "Individual",
            "Date" => json_decode(json_encode(new \DateTime("2022-09-23")),true),
            "Building" => "Sage Hall",
            "Classroom_Number" => "201",
            "End_Time" => "12:10",
            "Start_Time" => "10:10"
        ],
        [
            "Reservation type "=> "other",
            "Study_Mode" => "Shared",
            "Date" => json_decode(json_encode(new \DateTime("2022-12-22")),true),
            "Building" => "Safadi-Fine Arts",
            "Classroom_Number" => "608",
            "End_Time" => "18:14",
            "Start_Time" => "17:14"
        ],
        [
            "Reservation type "=> "study",
            "Study_Mode" => "Individual",
            "Date" => json_decode(json_encode(new \DateTime("2022-12-23")),true),
            "Building" => "Safadi-Fine Arts",
            "Classroom_Number" => "608",
            "End_Time" => "12:10",
            "Start_Time" => "10:10"
        ],
        [
            "Reservation type "=> "study",
            "Study_Mode" => "Individual",
            "Date" => json_decode(json_encode(new \DateTime("2023-01-02")),true),
            "Building" => "Sage Hall",
            "Classroom_Number" => "201",
            "End_Time" => "11:10",
            "Start_Time" => "10:10"
        ],
    ];


$insertManyResult = $classroom_reservations_collection->insertMany($reservations);
echo "<h3>Inserted " . $insertManyResult->getInsertedCount() . " new classroom bookings</h3>";
echo "<br>";

?>