<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Services Helper</title>
        <link rel="stylesheet" href="../../css/mainStyles.css">
        <link rel="stylesheet" href="../../css/profileStyles.css">
        <link rel="icon" type="image/x-icon" href="../../logos/favicon.ico">
        <link rel="stylesheet" href="../../css/styles.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="../../js/Profile.js"></script>
        <link rel="stylesheet" href="../../css/eventsStyles.css" >
    </head>
    
    <body>

        <!--Sidebar-->
        <div class="sidebar">
        <img src="../../logos/logo_transparent.png">
            <a href="DisplayProfile.php">Profile</a>
            <a class="" href="Profile.php">Classes Booked</a>
            <a  href="SessionsProfile.php">Sessions</a>
            <a  href="EventsProfile.php">Events</a>
            <?php
             session_start();
                $email = $_SESSION['useremail'];
                require_once __DIR__ . '/vendor/autoload.php';

                $client = new MongoDB\Client("mongodb://localhost:27017");
                $users_collection = $client->student_services_db->users;
                $userinfo = $users_collection->find(['Email_Address' => $email]);
                $cur_user = iterator_to_array($userinfo)[0];
                if($cur_user['Is_Club_Member']==true){
                    print("<a class='active' href='boardEventsDisplay.php'>View Organised Events</a>");
                }
            ?> 
            <a href="../../html/ContactUs.html">Help</a>
            <a href="../../html/index.html">Main Page</a>
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

                $users_collection = $client->student_services_db->users;
                // $users_collection->insertOne( [ 'Student_ID'=> iterator_to_array($lastuser)[0]['Student_ID']+1,'First_Name' => $firstname, 'Last_Name' => $lastname, 'Email_Address'=>$email, 'Date_Registered'=>new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000), 'Is_Club_Member'=>false ] );
                $users_events_collection = $client->student_services_db->users_events;
                $events_collection = $client->student_services_db->events;

                $email = $_SESSION['useremail'];
                $userinfo = $users_collection->find(['Email_Address' => $email]);
                $cur_user = iterator_to_array($userinfo)[0];

                $clubname = $cur_user["Club_Name"];
                $filter = array();
                $options = array(
                    "sort" => array("Date" => 1),
                );
            
                $cursor = $events_collection->find($filter, $options);

            ?>

<div>


<?php 
$curdate = new \DateTime();

foreach ($cursor as $doc){ 

  if(strtotime($doc["Date"]["date"])>=strtotime($curdate->format('Y-m-d H:i:s'))){
  
    if($doc["Club_Name"]==$clubname){
        ?>

  
        <img class='event-info img-grid' data-id='<?php echo $doc['_id']; ?>' src='../../assets/event-photos/<?php echo $doc['Poster']; ?>.jpg' alt='<?php echo $doc['Event_Description']; ?>' style="position:relative; left:10%">
    
        <?php 
  } 
  ?>
  


   <?php 
  }
  } 
  ?>

  </div>

</div>

<script type='text/javascript'>
            $(document).ready(function(){
                $('.event-info').click(function(){
                    var eventid = $(this).data('id');
                    $.ajax({
                        url: 'BoardEventsRequests.php',
                        type: 'post',
                        data: {eventid: eventid},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#empModal').modal('show'); 
                            $('.cancel').click(function(){
                                if(confirm("Are you sure you want to cancel this event? This action can't be undone")){
                                    $.ajax({
                                  url: 'cancelEvent.php',
                                  type: 'post',
                                  data: {eventid: eventid},
                                  success: function(response){ 
                                      $('.events').html(response); 
                                      alert("canceled succssfully");
                                      location.reload();
                                  }
                              });
                                }

                          });
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
                          <button type="button" class="cancel btn btn-default" >Cancel Event</button> 
                        </div>
                    </div>
                </div>
        </div>

        </div>
    </body>
</html>