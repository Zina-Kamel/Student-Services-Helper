<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Join a session</title>
      <meta name="keywords" content="student, HTML, Javascript, helper, services, lau">
      <meta name="description" content="Upcoming events page">
      <link rel="stylesheet" href="../../css/indexStyles.css" >
      <link rel="icon" type="image/x-icon" href="../logos/favicon.ico">
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
      <script>
         function showSubmission() {
           alert("Click ok to go to register");
           window.location.href="../../html/SubmittedEvent.html";
         }
      </script>
   </head>
   <body>
      <!-- Responsive navbar-->
      <div class="navbar" id="navbarid">
            <a href="Index.php">Home</a>
            <a  href="EventsDisplay.php">Events</a>
            <a class="active"  href="../../html/Booking.html">Booking</a>
            <a href="validate_clubmember.php">Club Members</a>

            <div class="right-nav"> 
                <a href="https://elearn.lau.edu.lb/ultra" target=”_blank”>Blackboard</a>
                <a href="https://myportal.lau.edu.lb/Pages/studentPortal.aspx" target=”_blank”>Portal</a>
                <a href="validate_signin.php" ><img src="../../assets/login-icon.png" class="dropbtn"></a>
            </div>
            
        </div>

      <form id="join" method = "post">
         <br><br>
         <div class="center">
            Available Sessions
         </div>
         <br>

         <?php
    require_once __DIR__ . '/vendor/autoload.php';

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $sessions_collection = $client->student_services_db->sessions;

    error_reporting(E_ALL);
    ini_set('display_errors', 1); 

    $filter = array();
    $options = array(
        "sort" => array("Timestamp" => 1),
    );

    $cursor = $sessions_collection->find($filter, $options);

         ?>

<a href="../../html/CreateSession.html" style="position:relative; left:42%;">Organise a Session Instead</a>

<div class="grid-body">

<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1); 

foreach ($cursor as $doc){ 
    $curdate = new \DateTime();
    if(strtotime($doc["Timestamp"]["date"])>=strtotime($curdate->format('Y-m-d H:i:s'))){
  
  ?>

            <div class="profilesession-gridJoin" style="font-size:15px; height:300px" data-id='<?php echo $doc['_id']; ?>' >
                <strong style="color:#bbb; font-size:18px">Topic: </strong><em><?php echo $doc['Topic']; ?></em> 
               <br><br>
               <strong style="color:#bbb; font-size:18px">Location: </strong> <em><?php echo $doc['Location']; ?></em> <br>
               <strong style="color:#bbb; font-size:18px">Month: </strong> <em><?php echo $doc['Month']; ?></em> <br>
               <strong style="color:#bbb; font-size:18px">Day: </strong> <em><?php echo $doc['Day']; ?></em> <br>
               <strong style="color:#bbb; font-size:18px">Start Time: </strong><?php echo $doc['Start_Time']; ?>
               <br>
               <strong style="color:#bbb; font-size:18px">End Time: </strong><?php echo $doc['End_Time']; ?>
               <br>
               <strong style="color:#bbb; font-size:18px">Description: </strong> <em><?php echo $doc['Activity']; ?></em> <br>
               <input type="submit" value="Join" class="joinbutton" style="margin-bottom:40px;" data-id='<?php echo $doc['_id']; ?>'>
            </div>
   <?php 
  } }
  ?>

</div>

    <script type='text/javascript'>
            $(document).ready(function(){
                $('.profilesession-gridJoin').click(function(){
                    var eventid = $(this).data('id');
                    $.ajax({
                        url: 'RegisterSession.php',
                        type: 'post',
                        data: {eventid: eventid},
                        success: function(response){ 
                            alert(response);
                            
                        }
                    });
                });
            });

    </script> 


            <br>

            <br>


    </form>

    <!-- <div>
               <div class="OrganizeYours">
                <strong>Didn't find what you are looking for? Organize your own study session! </strong><br>
                <a href="../../html/CreateSession.html"><input class="button" value="Organize Session"></input></a>
                </div>
        </div> -->


 
   </body>



   <style>

.OrganizeYours{
    color: #173042;
    position: relative;
    right: 80%;
   
   }

    </style>

   <footer>
   
</footer>
</html>