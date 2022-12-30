<?php

use MongoDB\BSON\ObjectId;

// session_start();
// $email = $_SESSION['useremail'];

require_once __DIR__ . '/vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$users_collection = $client->student_services_db->users;
$board_collection = $client->student_services_db->club_board;


$id = ($_GET['id']);

$users_collection->updateOne(['Student_ID' => $id], ['$set' => ['Is_Club_Member' => false]]);
$users_collection->updateOne(['Student_ID' => $id], ['$set' => ['Club_Name' => ""]]);

$board_collection->deleteOne(['Student_ID' => $id]);


header('location:EditStudentStatus.php');