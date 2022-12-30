<?php

use MongoDB\BSON\ObjectId;

// session_start();
// $email = $_SESSION['useremail'];

require_once __DIR__ . '/vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$club_board_requests_collection = $client->student_services_db->club_board_requests;


$club_board_requests_collection->deleteOne(['_id' =>new MongoDB\BSON\ObjectID($_GET['id'])]);

header('location:ApproveBoardMember.php');

