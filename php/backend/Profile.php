<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Services Helper</title>
        <link rel="stylesheet" href="../../css/mainStyles.css">
        <link rel="stylesheet" href="../../css/profileStyles.css">
        <link rel="icon" type="image/x-icon" href="../../logos/favicon.ico">
        <!-- <script src="../../js/Profile.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    </head>
    
    <body>

        <!--Sidebar-->
        <div class="sidebar">
        <img src="../../logos/logo_transparent.png">
            <a href="DisplayProfile.php">Profile</a>
            <a class="active"  class="" href="Profile.php">Classes Booked</a>
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
            
            <p>
                Here is a summary of your booked classes:

                <?php
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1); 
                    $users_events_collection = $client->student_services_db->users_events;
                    $classroom_bookings_collection = $client->student_services_db->classroom_reservations;

                    $userinfo = $users_events_collection->find(['Email_Address' => $email]);
                    $cur_user = iterator_to_array($userinfo)[0];

                    foreach ($cur_user['Booked_Classrooms'] as $e){ 
                        $cursor = $classroom_bookings_collection->find(
                            array(
                                '_id' => new \MongoDB\BSON\ObjectID($e)
                            )
                        );
                        $doc = iterator_to_array($cursor)[0];
                        $curdate = new \DateTime();
                        if(strtotime($doc["Date"]["date"])>=strtotime($curdate->format('Y-m-d H:i:s'))){
                        ?>
                <details>
                    <summary><?php echo $doc['Building']." ".$doc["Classroom_Number"]; ?></summary>
                    <div class="profile-class-desc" id='<?php echo $doc['_id'];?>'>
                        <p>Time: <?php echo $doc['Start_Time']?> - <?php echo $doc['End_Time']?></p>
                        <p>Description: <?php echo $doc['Study_Mode']?></p>
                        <input id="cancelbut" type="button" value="Cancel Booking">
                    </div>
                </details>

                <?php
                        }}

                ?>
            </p>

            <p>Previously Booked</p>
            <?php
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1); 
                    $users_events_collection = $client->student_services_db->users_events;
                    $classroom_bookings_collection = $client->student_services_db->classroom_reservations;

                    $userinfo = $users_events_collection->find(['Email_Address' => $email]);
                    $cur_user = iterator_to_array($userinfo)[0];

                    foreach ($cur_user['Booked_Classrooms'] as $e){ 
                        $cursor = $classroom_bookings_collection->find(
                            array(
                                '_id' => new \MongoDB\BSON\ObjectID($e)
                            )
                        );
                        $doc = iterator_to_array($cursor)[0];
                        $curdate = new \DateTime();
                        if(strtotime($doc["Date"]["date"])<strtotime($curdate->format('Y-m-d H:i:s'))){
                        ?>
                <details>
                    <summary><?php echo $doc['Building']." ".$doc["Classroom_Number"]; ?></summary>
                    <div id='<?php echo $doc['_id'];?>' class="profile-class-desc">
                        <p>Time: <?php echo $doc['Start_Time']?> - <?php echo $doc['End_Time']?></p>
                        <p>Description: <?php echo $doc['Study_Mode']?></p>
                    </div>
                </details>

                <?php
                        }}

                ?>
            </p>

            <a href="../../html/Booking.html">
                <div class="book">
                    Book new classrooms?
                </div>
            </a>
        </div>
    </body>


    <script>
        $(document).ready(function(){
            $('#cancelbut').click(function(e){
                if(e.target.getAttribute("id") == "cancelbut"){
                if(confirm("Are you sure you want to cancel this booking? This action can't be undone")){
                    e.target.parentNode.parentNode.remove();
                    var ide = e.target.parentNode.getAttribute("id");
                    $.ajax({
                        url: 'classroom_cancellation.php',
                        type: 'post',
                        data: {ide: ide},
                        success: function(response){ 
                            $('.book').html(response); 
                            alert("success");
                        }
                        });
                }
                }
            });


            });
    </script>
                <a href="../../html/Booking.html">
                <div class="book">
                    Book new classrooms?
                </div>
            </a>
</html>