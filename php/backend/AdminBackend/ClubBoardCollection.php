<?php

require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://localhost:27017");
$club_board_collection = $client->student_services_db->club_board;


$club_board = [
[
'First_Name' => 'Alalala',
'Last_Name' => 'nananana',
'Club' => 'Hiking',
'Email_Address' => 'alala.nanana@lau.edu',
'Position' => 'Treasurer',
],

[
    'First_Name' => 'Miam',
    'Last_Name' => 'Vieradsd',
    'Club' => 'Cycling',
    'Email_Address' => 'miam.veirsdsd@lau.edu',
    'Position' => 'President',

],

[
    'First_Name' => 'Papa',
    'Last_Name' => 'Apap',
    'Club' => 'Dancing',
    'Email_Address' => 'papa.apap@lau.edu',
    'Position' => 'Vice President',

],
];

$insertClubBoard = $club_board_collection->insertMany($club_board);
print_r($club_board);
?>
