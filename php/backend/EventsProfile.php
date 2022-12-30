<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Services Helper</title>
        <link rel="stylesheet" href="../../css/mainStyles.css">
        <link rel="icon" type="image/x-icon" href="../../logos/favicon.ico">
        <link rel="stylesheet" href="../../css/styles.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="../../js/Profile.js"></script>
        <link rel="stylesheet" href="../../css/profileStyles.css">
    </head>
    
    <body style="background-color: #cfdfda;">

        <!--Sidebar-->
        <div class="sidebar">
        <img src="../../logos/logo_transparent.png">
            <a href="DisplayProfile.php">Profile</a>
            <a class="" href="Profile.php">Classes Booked</a>
            <a  href="SessionsProfile.php">Sessions</a>
            <a  class="active" href="EventsProfile.php">Events</a>
            <?php
             session_start();
                $email = $_SESSION['useremail'];
                require_once __DIR__ . '/vendor/autoload.php';

                $client = new MongoDB\Client("mongodb://localhost:27017");
                $users_collection = $client->student_services_db->users;
                $userinfo = $users_collection->find(['Email_Address' => $email]);
                $cur_user = iterator_to_array($userinfo)[0];
                if($cur_user['Is_Club_Member']==true){
                    print("<a href='boardEventsDisplay.php'>View Organised Events</a>");
                }
            ?> 
            <!-- <a href="../../html/History.html">History</a> -->
            <a href="ContactUs.php">Help</a>
            <a href="Index.php">Main Page</a>
            <!-- <a href="editProfile.php">Edit Profile</a> -->
            <a href="signout.php">Sign Out</a>
        </div>

        <!--Booked Classes Summary in Dashboard-->

        <div class="main-content">    
            
            <?php 
        // error_reporting(E_ALL);
        // ini_set('display_errors', 1); 

            session_start();
            $email = $_SESSION['useremail'];
            require_once __DIR__ . '/vendor/autoload.php';

            $client = new MongoDB\Client("mongodb://localhost:27017");
            $users_collection = $client->student_services_db->users;
            $login_collection = $client->student_services_db->login;

            $userinfo = $users_collection->find(['Email_Address' => $email]);


            print("<h1 style='color: #173042;'>");
            print("Welcome ".iterator_to_array($userinfo)[0]['First_Name']."!");
            print("</h1>");
            ?>
            
            <?php

                error_reporting(E_ALL);
                ini_set('display_errors', 1); 

                require_once __DIR__ . '/vendor/autoload.php';

                $client = new MongoDB\Client("mongodb://localhost:27017");

                // $users_collection = $client->student_services_db->users;
                // $users_collection->insertOne( [ 'Student_ID'=> iterator_to_array($lastuser)[0]['Student_ID']+1,'First_Name' => $firstname, 'Last_Name' => $lastname, 'Email_Address'=>$email, 'Date_Registered'=>new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000), 'Is_Club_Member'=>false ] );
                $users_events_collection = $client->student_services_db->users_events;
                $events_collection = $client->student_services_db->events;

                $email = $_SESSION['useremail'];
                $userinfo = $users_events_collection->find(['Email_Address' => $email]);
                $cur_user = iterator_to_array($userinfo)[0];
                

            ?>




  
  

<?php 
$curdate = new \DateTime();

foreach ($cur_user['Registered_Events'] as $e){ 
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        
        
        $cursor = $events_collection->find(
            array(
                '_id' => new \MongoDB\BSON\ObjectID($e)
            )
        );

        $eventarr = iterator_to_array($cursor);

        if(!($eventarr)==NULL){    
            $doc = $eventarr[0];
            if(strtotime($doc["Date"]["date"])>=strtotime($curdate->format('Y-m-d H:i:s'))){
            ?>
            <img class='event-info img-grid' data-id='<?php echo $doc['_id']; ?>' src='../../assets/event-photos/<?php echo $doc['Poster']; ?>.jpg' alt='<?php echo $doc['Event_Description']; ?>' style="position:relative; left:10%; padding: 15px">
        
        <?php } ?>


<?php } }?>

</div>

<script type='text/javascript'>
    
            $(document).ready(function(){              
                $('.event-info').click(function(){
                    var eventid = $(this).data('id');
                    $.ajax({
                        url: 'EventsAjax.php',
                        type: 'post',
                        data: {eventid: eventid},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#empModal').modal('show'); 
                        }
                    });
                });


            });
            </script>
        <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Event Info</h4>
                          <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
        </div>

        </div>
    </body>
</html>