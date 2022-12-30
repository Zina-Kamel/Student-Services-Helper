<?php
   require_once __DIR__ . '/vendor/autoload.php';

   $client = new MongoDB\Client("mongodb://localhost:27017");
   $events_collection = $client->student_services_db->events;

   error_reporting(E_ALL);
   ini_set('display_errors', 1); 

   if(isset($_POST['input'])){

    $input = $_POST['input'];
        $cursor = $events_collection->find(['Event_Name' => new \MongoDB\BSON\Regex( preg_quote($input),"i")]);
    
    ?>
 
 <?php foreach ($cursor as $doc){ ?>
     <img class='event-info img-grid' data-id='<?php echo $doc['_id']; ?>' src='../../assets/event-photos/<?php echo $doc['Poster']; ?>.jpg' alt='<?php echo $doc['Event_Description']; ?>' style="position:relative; left:10%">
 <?php } ?>

<?php   } else{
    $cursor = $events_collection->find(); ?>

<?php foreach ($cursor as $doc){ ?>
     <img class='event-info img-grid' data-id='<?php echo $doc['_id']; ?>' src='../../assets/event-photos/<?php echo $doc['Poster']; ?>.jpg' alt='<?php echo $doc['Event_Description']; ?>' style="position:relative; left:10%">
 <?php } ?>
    
<?php }
?>


