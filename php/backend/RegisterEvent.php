<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Student Services Helper</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="icon" type="image/x-icon" href="../logos/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
    <div class="navbar" id="navbarid">
        <a class="active" href="index.html">Home</a>
        <a href="EventsGridDisplay.html" target="_blank">Events</a>
        <a href="Booking.html">Booking</a>
        <a href="ClubBoardMember.html">Club Members</a>
    
        <div class="right-nav">
            <a class="login-icon"  href="Profile.php"><img src="../../assets/login-icon.png"></a>
            <a href="https://elearn.lau.edu.lb/ultra" target=”_blank”>Blackboard</a>
            <a href="https://myportal.lau.edu.lb/Pages/studentPortal.aspx" target=”_blank”>Portal</a>
        </div>
      </div>
    <br>
    <div class="center">
        Registration Details
    </div>

    <p class="title-p-intro" style = "text-align: center" >
        Are you sure you want to register for the below event?
    </p>

    <?php 
    error_reporting(E_ALL);
ini_set('display_errors', 1); 
        $eventid =  $_COOKIE["eventclicked"];
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


    <div style="display: flex; align-items: center;justify-content: center;">
    <img src='../../assets/event-photos/<?php echo $cursor2array['Poster']; ?>.jpg' style="width:400px; height:300px;">


        <p style="text-align: center;margin:10px; padding: 20px; background-color:#173042; color: white;
     border-color: #1d976c; border-style: solid 2px; border-radius:15px; position: relative; top: 30%; width:300px; height:100px;"> <strong>Name:</strong> 
     <?php echo $cursor2array['Event_Name']; ?>
             <br><br>
            <strong>Date:</strong> <?php echo substr($cursor2array['Date']['date'], 0, 11); ?> <br><br>
            <strong>Description:</strong> <?php echo $cursor2array['Event_Description']; ?>
        </p>

    </div>
    
    <div class="btn-block">
        <button id="submitevent" type="submit" href="#" onclick="myAjax()" style="margin-bottom: 20px;">SUBMIT</button>
    </div>

    <div id='ajaxreply'>

</div>

    <script>

function myAjax() {
      $.ajax({
           type: "POST",
           url: 'EventSubmission.php',
           data:{action:'submit_register'},
           success:function(html) {
             $("#ajaxreply").html(html);
           }

      });
 }

    </script>


</body>

</html>