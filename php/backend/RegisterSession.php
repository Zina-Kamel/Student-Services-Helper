<?php

    $event_id =  $_POST['eventid'];

    require_once __DIR__ . '/vendor/autoload.php';

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $sessions_collection = $client->student_services_db->sessions;

    session_start();
    if (isset($_SESSION["useremail"])){
    
        $cursor = $sessions_collection->find(
            array(
                '_id' => new \MongoDB\BSON\ObjectID($event_id)
            )
        );
    
        $cursor2array = iterator_to_array($cursor)[0];

        $email = $_SESSION['useremail'];
            $exist = 0;

                foreach($cursor2array['Participants_Emails'] as $val){
                    if($val==$email){
                        $exist = 1;

                        //echo "<script> location.href='Profile.php'; </script>";
                    }
                }
    if($exist==1){
        echo  "already registered";
        die();
    }else{
        error_reporting(E_ALL);
        ini_set('display_errors', 1); 
        $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update([ '_id' => new \MongoDB\BSON\ObjectID($event_id) ], [ '$push' => [ 'Participants_Emails' => $email ]]);
        $manager->executeBulkWrite($sessions_collection, $bulk);

        $users_events_collection = $client->student_services_db->users_events;
        $userinfo = $users_events_collection->find(['Email_Address' => $email]);

        $cur_user = iterator_to_array($userinfo)[0];

        $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update([ 'Email_Address' => $email ], [ '$push' => [ 'Registered_Sessions' => $event_id ]]);
        $manager->executeBulkWrite($users_events_collection, $bulk);

        echo "Registered Successfully, you can find the session in your dashboard";
    }

    }else{
    
        echo "<script> location.href='login.php'; </script>";
    }



?>