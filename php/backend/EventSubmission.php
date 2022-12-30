<?php 
            session_start();
            $email = $_SESSION['useremail'];
                error_reporting(E_ALL);
                ini_set('display_errors', 1); 
                    $eventid =  $_COOKIE["eventclicked"];
                    require_once __DIR__ . '/vendor/autoload.php';

                $client = new MongoDB\Client("mongodb://localhost:27017");
                $events_collection = $client->student_services_db->events;

                // $cursor2array = iterator_to_array($cursor)[0];
                $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update([ '_id' => new \MongoDB\BSON\ObjectID($eventid) ], [ '$push' => [ 'Participants_Emails' => $email ]]);
                $manager->executeBulkWrite($events_collection, $bulk);

                // adding the event to the user's list in the users_events collection. 
                // this will help retreive for the user their registered events on dashboard

                $users_events_collection = $client->student_services_db->users_events;
                $userinfo = $users_events_collection->find(['Email_Address' => $email]);

                $cur_user = iterator_to_array($userinfo)[0];

                $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->update([ 'Email_Address' => $email ], [ '$push' => [ 'Registered_Events' => $eventid ]]);
                $manager->executeBulkWrite($users_events_collection, $bulk);

                echo '<script>alert("Registered Successfully")</script>';

                echo "<script> location.href='EventsDisplay.php'; </script>";
  
            ?>