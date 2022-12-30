<?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1); 

$eventid = $_POST['eventid'];
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$events_collection = $client->student_services_db->events;

    $cursor = $events_collection->find(
        array(
            '_id' => new \MongoDB\BSON\ObjectID($eventid)
        )
    );

    $cursor2array = iterator_to_array($cursor)[0];
?>

<img src='../../assets/event-photos/<?php echo $cursor2array['Poster']; ?>.jpg' style="width:250px; height:200px;">
<p style="margin-top:5px;"><strong>Name:</strong> <?php echo $cursor2array['Event_Name']; ?></p>
<p><strong>Date:</strong> <?php echo substr($cursor2array['Date']['date'], 0, 11); ?></p>
<p><strong>Description:</strong> <?php echo $cursor2array['Event_Description']; ?></p>
<p><strong>Participants:</strong> 
<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1); 
foreach($cursor2array['Participants_Emails'] as $em){
    print("<div>$em</div>");
} 


?></p>