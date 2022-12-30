<?php

use MongoDB\BSON\ObjectId;

// session_start();
// $email = $_SESSION['useremail'];

require_once __DIR__ . '/vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$users_collection = $client->student_services_db->users;

$id = ($_GET['id']);

$users_collection->updateOne(['Student_ID' => $id2], ['$set' => ['Is_Club_Member' => true]]);
// $users_collection->updateOne(['Student_ID' => $id2], ['$set' => ['Position' => ]]);


header('location:EditStudentStatus.php');

