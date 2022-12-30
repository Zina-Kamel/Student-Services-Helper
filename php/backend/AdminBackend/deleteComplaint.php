<?php

use MongoDB\BSON\ObjectId;

// session_start();
// $email = $_SESSION['useremail'];

require_once __DIR__ . '/vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$complaints_collection = $client->student_services_db->complaints;

$id = new MongoDB\BSON\ObjectID($_GET['id']);
$complaints_collection->deleteOne(['_id' =>$id]);

header('location:CheckComplaints.php');

