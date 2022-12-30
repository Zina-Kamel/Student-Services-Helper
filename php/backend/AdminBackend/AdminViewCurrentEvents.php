<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Manage Events</title>
    <link rel="stylesheet" href="../../../css/indexStyles.css">
    <link rel="stylesheet" href="../../../css/profileStyles.css">
    <link rel="stylesheet" href="../../../css/adminFunctionStyles.css">

    <link rel="icon" type="image/x-icon" href="../../../logos/favicon.ico">
    <script src="../../../js/Profile.js"></script>
</head>

<body>


    <div>
        <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1); 

        require_once __DIR__ . '/vendor/autoload.php';
        $client = new MongoDB\Client("mongodb://localhost:27017");

        $events_collection = $client->student_services_db->events;
        $past_events_collection = $client->student_services_db->past_events;


        // Retrieve the current date and time
        // $current_date = new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000);
        // // echo $current_date;

        // // Search the database for entries with a date that has passed
        // $expired_entries = $events_collection->find(array("Date" => array('$lt' => $current_date)));
        // foreach ($expired_entries as $doc) {
        //     $name = $doc["Event_Name"];
        //     $date = $doc["Date"];
        //     $club = $doc["Club_Name"];
        //     $part = $doc["Participant_Emails"];

        //     $past_ev = array(
        //         "Event_Name" => $name,
        //         "Date" => $date,
        //         "Club" => $club,
        //         "Email_Addresses" => $email,
        //     );


        //     $past_events_collection->insertOne($past_ev);
        //     //$test = true;
        //     // Delete the past entries from the database
        //     $events_collection->deleteOne($expired_entries);
        // }
        // Connect to MongoDB


        // Get the current date and time
 // Get the current date and time
        $current_time = time();
        $expired_events = $events_collection->find(['Date' => ['$lt' => $current_time]]);

        // Delete the expired events
        foreach ($expired_events as $event) {
            $events_collection->deleteOne(['_id' => $event['_id']]);
                $past_ev = array(
                "Event_Name" => $name,
                "Date" => $date,
                "Club" => $club,
                "Email_Addresses" => $email,
            );
            $past_events_collection->insertOne(['_id' => $past_ev]);

        }

        ?>





        <?php


        $cursor = $events_collection->find();


        // print_r($cursor);

        ?>
        <table class="table-main">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Participants</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Club</th>
                    <th>Poster</th>


                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($cursor as $document) { ?>
                    <tr>
                        <td><?php echo $document['_id'] ?></td>

                        <td><?php $d = json_encode(iterator_to_array($document['Date']));
                            echo mb_substr($d, 9, 19, 'utf-8') ?></td>

                        <td style="overflow-y:scroll;">
                            <?php
                            foreach ($document['Participants_Emails'] as $x => $y) {
                                echo ($y . "<br>");
                                // echo "hi";
                            }
                            ?></td>

                        <td><?php echo $document['Event_Name'] ?></td>
                        <td><?php echo $document['Event_Description'] ?></td>
                        <td><?php echo $document['Club_Name'] ?></td>
                        <td><?php echo $document['Poster'] ?></td>



                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>