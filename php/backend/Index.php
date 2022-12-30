<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title>Student Services Helper</title>
        <link rel="stylesheet" href="../../css/mainStyles.css">
        <script src="../../js/script.js"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
        <link rel="icon" type="image/x-icon" href="../../logos/favicon.ico">
    </head>
    
    <body>
        <div class="navbar" id="navbarid">
            <a class="active" href="index.php">Home</a>
            <a href="EventsDisplay.php" target=”_blank">Events</a>
            <a href="../../html/Booking.html">Booking</a>
            <a href="validate_clubmember.php">Club Members</a>

            <div class="right-nav"> 
                <a href="https://elearn.lau.edu.lb/ultra" target=”_blank”>Blackboard</a>
                <a href="https://myportal.lau.edu.lb/Pages/studentPortal.aspx" target=”_blank”>Portal</a>
                <a href="validate_signin.php" ><img src="../../assets/login-icon.png" class="dropbtn"></a>
            </div>
            
        </div>


        <section class="intro-tite">
            <img class="intro-img" src="../../assets/landingpagepic.png" alt="students landing page picture">
            <p class="title-p-intro"> <b>Student Services Helper</b></p>
        </section>

        <section class="animate-up">
            <h1 class="center">About</h1>
            
            <div class="stu_count">
                <h2>Number of students benefited</h2>
                <div id="student-counter"></div>
            </div>

            <div class="class_count">
                <h2>Number of classes optimised</h2>
                <div id="class-counter"></div>
            </div>

        </section>

        <section class="animate-up">
            <h1 class="center">Book a Room</h1>
            <img class="event_room" src="../../assets/studying/book_room.png" width="500" height="500">
            <div class="event_room_desc">
                <h2>Interested in reserving a classroom for a group or individual study?</h2>
                <a href="../../html/Booking.html">
                <input type="button" onclick="" value="Reserve your spot here!" />
                </a>
            </div>
        </section>

        <section class="animate-up">
            <h1 class="center">Upcoming Events</h1>
            <marquee behavior="sliding" direction="left" scrollamount="110" scrolldelay="1000">

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

                    $curdate = new \DateTime();

                    $count = 0 ;

                    foreach ($cursor as $doc){ 
                        if($count==5){
                            break;
                        }
                      if(strtotime($doc["Date"]["date"])>=strtotime($curdate->format('Y-m-d H:i:s'))){ 

                        $count += 1;
  
                        ?>
                      
                          <a href="EventsDisplay.php" target=”_blank"><img src='../../assets/event-photos/<?php echo $doc['Poster']; ?>.jpg' width="450" height="400" alt='<?php echo $doc['Event_Description']; ?>'></a>
                      
                      
                         <?php 
                        } }
                ?>
            </marquee>
        </section>

        <section class="club-member animate-up">
            <h1 class="center">Are you a club board member?</h1>
            <img src="../../assets/club/club.png" width="300" height="300">
            <div class="book_room_desc">
                <h2>Organise your event and let the students know about it!</h2>
                <a href="validate_clubmember.php">
                    <input type="button" onclick="" style="position: relative; right: 0%;" value="Post your event here!" />
                </a>
            </div>
        </section>

        <section class="animate-up">
            <h1 class="center">Get to know your campus!</h1>
            <div>
                <h2 style="font-size:16px; position:relative; left:30%">You can now click on the buidling name below to view its facilities</h2>
            </div>
            <div style="    position: relative;
            text-align: center;">
            <input type = "radio" name ="Books" value = "AKSOB" 
            id = "AKSOB"> AKSOB 
            <input type = "radio" name = "Books" value = "Nicol_Hall" 
                id = "Nicol_Hall"> Nicol Hall
            <input type = "radio" name = "Books" value = "Sage_Hall" 
                id = "Sage_Hall"> Sage Hall 
            <input type = "radio" checked name = "Books" value = "none"
                id = "none"> None 
            <div id = "facilities"></div>
            <div style="border: 1px solid black; padding: 10px; width: 300px; left: 38%;position: relative;display: none;" id = "contentArea">click on a facility to get its description</div>
        </div>
        </section>

        <section class="animate-up">
            <h1 class="center">FAQs</h1>
            <details>
                <summary>How do I book a class?</summary>
                <div class="faqs">
                    Inorder to book a class, you can go to the <em>"Booking"</em> tab and 
                    follow the instructions there. You can either book individual or shared study classrooms.
                </div>
            </details>

            <details>
                <summary>Can I cancel a booking?</summary>
                <div class="faqs">
                    Yes, you can cancel a booking by going to your dashboard (top right) and choose the booking you want to cancel
                </div>
            </details>

            <details>
                <summary>What is the limit to the bookings per person?</summary>
                <div class="faqs">
                    Currently, there is no limit to the bookings per person. However, in order to give a chance for as many people 
                    as possible to use the classrooms, you are only allowed to book a class for more then 2 hours.
                </div>
            </details>

            <details>
                <summary>How can I view the upcoming events?</summary>
                <div class="faqs">
                    You can view all the upcoming events by going to the <em>"Events"</em> tab and browse the available events.
                </div>
            </details>

        </section>

        <script>
            // sticking the navbar on scroll

            var navbar = document.getElementById("navbarid");
            var sticknav = navbar.offsetTop;
            window.onscroll = function() {sticked()};
            function sticked() {
            if (window.pageYOffset >= sticknav) { // when the navbar exceeds viewport
                navbar.classList.add("sticknav")
            } else {
                navbar.classList.remove("sticknav");
            }
            }
        </script>

<script>

function getImages( url )
   {
      try
      {
         asyncRequest = new XMLHttpRequest(); 
         asyncRequest.addEventListener(
            "readystatechange", processResponse, false); 
         url = "http://127.0.0.1/project/html/" + url; 
         asyncRequest.open( "GET", url); 
         asyncRequest.send(); 
      } 
      catch ( exception )
      {
         alert( "Request Failed" );
      } 
}

function processResponse()
   {
      if ( asyncRequest.readyState == 4 && asyncRequest.status == 200 && 
         asyncRequest.responseXML )
      {
         clearImages(); 

         var facilities = asyncRequest.responseXML.getElementsByTagName(
            "facility" )

        
         var output = document.getElementById( "facilities" );
         
         var imagesUL = document.createElement( "ul" );
         
         for ( var i = 0; i < facilities.length; ++i )
         {
            var facility = facilities.item( i ); 

            console.log(asyncRequest.responseXML);
         
            var image = facility.getElementsByTagName( "image" ).
               item( 0 ).firstChild.nodeValue;

            var imageLI = document.createElement( "li" );
            imageLI.style.listStyle = "none";
            imageLI.style.display = "inline";
            imageLI.style.padding = "10px";
            var imageTag = document.createElement( "img" );
            
            var baseUrl = asyncRequest.responseXML.getElementsByTagName( 
            "baseurl" ).item( 0 ).firstChild.nodeValue;

            console.log(image);
            
            imageTag.setAttribute( "src", baseUrl + image ); 
            imageLI.appendChild( imageTag ); 
            imagesUL.appendChild( imageLI ); 
         } 

         output.appendChild( imagesUL ); 
      }  
   } 

function clearImages()
{
    document.getElementById( "facilities" ).innerHTML = ""; 
    document.getElementById( "contentArea" ).innerHTML = "click on a facility to get its description";
}

var asyncRequest;

function registerListeners()
   {
      document.getElementById( "AKSOB" ).addEventListener(
         "click", function() { getImages( "bb.xml" ); }, false ); 
      document.getElementById( "Nicol_Hall" ).addEventListener(
         "click", function() { getImages( "Nicol_Hall.xml" ); }, false ); 
      document.getElementById( "Sage_Hall" ).addEventListener(
         "click", function() { getImages( "Sage_Hall.xml" ); }, false ); 
      document.getElementById( "none" ).addEventListener(
         "click", clearImages, false ); 
}

window.addEventListener( "load", registerListeners, false );
</script>

<?php
    require_once __DIR__ . '/vendor/autoload.php';

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $users_collection = $client->student_services_db->users;

    $userscount = $users_collection->count();

    $classroom_collection = $client->student_services_db->classrooms;

    $classcount = $classroom_collection->count();
   
?>

<script>

    $(document).ready(function(){

        let class_shared_count=setInterval(shared_increment_count);
        let maximum_class_shared=0;
        var $userscount = <?php echo json_encode($userscount) ?>;
        function shared_increment_count(){
            // if(counts_shared_class!=null){
                $("#student-counter").html(maximum_class_shared+1);
                maximum_class_shared = maximum_class_shared + 1;
            // }
            if(maximum_class_shared===$userscount)
            {
                clearInterval(class_shared_count);
            }
        }
})

$(document).ready(function(){

let classrooms_count=setInterval(class_increment_count);
let maximum_class_shared=0;
var $classcount = <?php echo json_encode($classcount) ?>;
function class_increment_count(){
    // if(counts_shared_class!=null){
        $("#class-counter").html(maximum_class_shared+1);
        maximum_class_shared = maximum_class_shared + 1;
    // }
    if(maximum_class_shared===$classcount)
    {
        clearInterval(classrooms_count);
    }
}
})

</script>
        
    </body>

    <footer>
        <p>Created by Student Services Helper Team &#169; 2022</p>
      </footer>
</html>