<?php

require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$admins_login_collection = $client->student_services_db->admin_login;

$admin_logins = [
    [
        'Email_Address' => 'rhea.kruskal@lau.edu',
        'Password' => 'Rxyez123#'
    ],
    [
        'Email_Address' => 'prim.simple01@lau.edu',
        'Password' => 'Verygoodpass1$'
    ],
    [
        'Email_Address' => 'mageda.algorithm@lau.edu',
        'Password' => 'Tracecode5@',
    ],
];

$insertManyResult = $admins_login_collection->insertMany($admin_logins);
print_r($admin_logins);

$admins_login_collection->createIndex(['Email_Address' => 1]);
    
?>