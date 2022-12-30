<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Student Services Helper</title>
  <meta name="keywords" content="student, HTML, Javascript, helper, services, lau">
  <meta name="description" content="Upcoming events page">
  <link rel="icon" type="image/x-icon" href="../logos/favicon.ico">
  <link rel="stylesheet" href="../../css/indexStyles.css" >
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../../css/eventsStyles.css" >


  <script>
    function showSubmission() {
      alert("Click ok to go to register");
      window.location.href="SubmittedEvent.html";
    }
  </script>

</head>

<body>

    <style>
      a:hover{
        text-decoration: none;
      }
    </style>

  <!-- Responsive navbar-->
  <div class="navbar" id="navbarid">
            <a href="Index.php">Home</a>
            <a class="active" href="EventsDisplay.php" target=”_blank">Events</a>
            <a href="../../html/Booking.html">Booking</a>
            <a href="validate_clubmember.php">Club Members</a>

            <div class="right-nav"> 
                <a href="https://elearn.lau.edu.lb/ultra" target=”_blank”>Blackboard</a>
                <a href="https://myportal.lau.edu.lb/Pages/studentPortal.aspx" target=”_blank”>Portal</a>
                <a href="validate_signin.php" ><img src="../../assets/login-icon.png" class="dropbtn"></a>
            </div>
            
        </div>



  <!--<h1 ><Strong>Upcoming Events</Strong></h1>-->
  <br><br>
  <div class="center">
    View the Upcoming events
    
</div>
  </h1>
  <br>

<div class="box" style="position:relative; left:10%">

<input id='searchInput' type="text" class="search_text" placeholder="&#x1F50D;" name="txt" onmouseout="this.value = ''; this.blur();">

</div>

<br>
<br>

<div>
  <br>
  <br>
  <a href="Calendar.php" class="events-filter">Filter by Day?</a>
  <Button style="display: block;" onclick='ResetFilter()' class="events-filter">Reset Filter</Button>
 
  &nbsp;   &nbsp;

  <!-- <input type='' id='searchInput' class='textBox2' name = 'search' placeholder="search.." style="left: 10% ;position: relative;"> -->


</div> 

<script>

function ResetFilter(){
  
  window.location.href="deletecookie.php";
}



</script>


  <!-- Trigger the Modal -->

  <!-- The Modal -->
  <div id="myModal" class="modal">

    <!-- The Close Button -->
    <span class="close">&times;</span>

    <!-- Modal Content -->
    <img class="modal-content" id="img01">

    <!-- Modal Caption  -->
    <div id="caption"></div>
  </div>

  <div>

  <?php

    require_once __DIR__ . '/vendor/autoload.php';

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $events_collection = $client->student_services_db->events;

    error_reporting(E_ALL);
    ini_set('display_errors', 1); 

    $filter = array();
    $options = array(
        "sort" => array("Date" => 1),
    );

    $cursor = $events_collection->find($filter, $options);

    ?>

<div id="searchresults">


<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1); 

if(isset($_COOKIE["eventday"])){
  $months = array("January"=>"01", "February"=>"02", "March"=>"03", "April"=>"04", "May"=>"05", "June"=>"06", "July"=>"07", "August"=>"08", "September"=>"09", "October"=>"10", "November"=>"11", "December"=>"12");
  $cursor = $events_collection->find(['Day' => $_COOKIE["eventday"], 'Month' => $months[$_COOKIE["eventmonth"]]]);
}

$curdate = new \DateTime();

foreach ($cursor as $doc){ 

  if(strtotime($doc["Date"]["date"])>=strtotime($curdate->format('Y-m-d H:i:s'))){
  
  ?>

  
    <img class='event-info img-grid' data-id='<?php echo $doc['_id']; ?>' src='../../assets/event-photos/<?php echo $doc['Poster']; ?>.jpg' alt='<?php echo $doc['Event_Description']; ?>' style="position:relative; left:10%">


   <?php 
  } 
}
  ?>

  </div>



</div>

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
                          <button type="button" class="register btn btn-default" >Register</button> 
                        </div>
                    </div>
                </div>
        </div>

<script>

</script>

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
                            $('.register').click(function(){
                              $.ajax({
                                  url: 'validate_event_signin.php',
                                  type: 'post',
                                  data: {eventid: eventid},
                                  success: function(response){ 
                                      $('footer').html(response); 
                                      // $('#empModal').modal('show'); 
                                  }
                              });
                          });
                        }
                    });
                });


            });
            </script>


        <style>

          .modal-title{
            text-align: center;
          }

          .modal-body{
            text-align: center;
          }

        </style>

        <script>

            $(document).ready(function(){

                $("#searchInput").keyup(
                  function(){
                    var input = $(this).val();

                    if(input=="" && !(event.getModifierState && event.getModifierState( 'CapsLock' ))){
                      location.reload(true);
                    }
                    
                    if(input!=""){
                      $.ajax({
                        url: "searchlive.php",
                        method:"POST",
                        data:{input:input},

                        success:function(data){
                          $("#searchresults").html(data);
                        }
                      });
                    }

                  });
            });

        </script>

</body>

<footer>
</footer>

</html>

