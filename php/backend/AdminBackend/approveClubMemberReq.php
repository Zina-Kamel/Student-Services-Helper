<?php

use MongoDB\BSON\ObjectId;

// session_start();
// $email = $_SESSION['useremail'];

require_once __DIR__ . '/vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$club_board_collection = $client->student_services_db->club_board;
$club_board_requests_collection = $client->student_services_db->club_board_requests;
$users_collection = $client->student_services_db->users;



//$club_board_collection->insertOne(['_id' =>new MongoDB\BSON\ObjectID($_GET['id2'])]);

$id2 = (int)$_GET['id2'];

echo $id2;


$cursor = $users_collection->find((['Student_ID' => $id2]));
//print_r($cursor);
//echo $users_collection->findOne(['Student_ID' => $id2]);
//    if (is_array($cursor) || is_object($cursor)) {
foreach ($cursor as $document) {
        //$studentid = $document["Student_ID"];
        $fname = ($document["First_Name"]);
        $lname =  $document["Last_Name"];
        $email = $document["Email_Address"];
        $isClMmbr = $document["Is_Club_Member"];
        $pos =  $document["Position"];
        echo  $pos;

        $get_club = $club_board_requests_collection->find((['Student_ID' => $id2]));
        foreach ($get_club as $doc) {
                $cname = $doc["Club_Name"];


                $new_member = array(
                        "First_Name" => $fname,
                        "Last_Name" => $lname,
                        "Club" => $cname,
                        "Email_Address" => $email,
                        "Position" => $pos
                );


                $club_board_collection->insertOne($new_member);
                //$test = true;
        }
        $users_collection->updateOne(['Student_ID' => $id2], ['$set' => ['Is_Club_Member' => true]]);
        $users_collection->updateOne(['Student_ID' => $id2], ['$set' => ['Position' => $pos]]);

}


//delete it from the requests page to signify it has been reviewed

// $club_board_requests_collection->deleteOne((['Student_ID' => $id2]));
$to_del = $club_board_requests_collection->find((['Student_ID' => $id2]));
$club_board_requests_collection->deleteOne($to_del);


header('location:ApproveBoardMember.php');
