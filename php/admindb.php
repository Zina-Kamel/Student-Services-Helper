<?php

require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://localhost:27017");
$admins_collection = $client->student_services_db->admins;

$admins = [
    [
        'Admin_ID' => '1',
        'First_Name' => 'Rhea',
        'Last_name' => 'Kruskal',
        'Email_Address' => 'rhea.kruskal@lau.edu',
        'Password' => 'Rxyez123#',
    ],
    [
        'Admin_ID' => '2',
        'First_Name' => 'Prim',
        'Last_name' => 'Simple',
        'Email_Address' => 'prim.simple01@lau.edu',
        'Password' => 'Verygoodpass1$',
    ],
    [
        'Admin_ID' => '3',
        'First_Name' => 'Mageda',
        'Last_name' => 'Algorithm',
        'Email_Address' => 'mageda.algorithm@lau.edu',
        'Password' => 'Tracecode5@',
    ],
    [
        'Admin_ID' => '4',
        'First_Name' => 'Roula',
        'Last_name' => 'Ghaleb',
        'Email_Address' => 'roula.ghaleb@lau.edu',
        'Password' => 'Password999!',
    ],


];

$insertAdmins = $admins_collection->insertMany($admins);

print_r($admins);
