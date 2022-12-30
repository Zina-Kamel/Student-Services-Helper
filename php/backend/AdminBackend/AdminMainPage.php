<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1); 

session_start();
$email = $_SESSION['useremail'];

$_SESSION["useremail"] =  $email;


require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$admins_collection = $client->student_services_db->admins;
$admins_login_collection = $client->student_services_db->admin_login;

$admin_info = $admins_collection->find(['Email_Address' => $email]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="adminStyles.css">
    <link rel="stylesheet" href="profileStyles.css">
    <link rel="icon" type="image/x-icon" href="../../../logos/favicon.ico">

    <script src="../../../js/AdminScript.js"></script>

   
    
</head>

<body>

<div class="sidebar">
        <img src="../../../logos/logo_transparent.png">
        <a href="AdminViewCurrentEvents.php">Current Events</a>
        <a href="AdminCheckPastEvents.php">Past Events</a>
        <a href="AdminVerifyEvents.php">Verify Events</a>
        <a href="ViewSessions.php">Manage Sessions</a>
        <a href="ApproveBoardMember.php">Verify Club Members</a>
        <a href="EditStudentStatus.php">Edit Student Status</a>
        <a href="CheckComplaints.php">View Messages</a>
        <a href="ManageClassrooms.php">Manage Classrooms</a>
        <a href="ViewSessions.php">Manage Sessions</a>
        <a href="EmailAddress.html">Add Admins</a>
        <a href="AdminSignout.php">Sign Out</a>
    </div>
    
    <title> Admin Dashboard</title>
    <?php
    print("<h1 style='color: #173042; text-align:center;'>");
    print("Welcome " . iterator_to_array($admin_info)[0]['First_Name'] . "!");
    print("</h1>");
    ?>

    


    <div class="main-div">


        <div class="left-div">
            <!-- <form action="#" name="eventForm" id="eventForm"> -->


            <!-- number of current bookings -->
            <div class="rectangle" style="height: 4em; width:5em;">
                <div style="border-radius:15px;">
                    <p class="p-text">Current Class Bookings</p>
                </div>
                <div style = "color: white; text-align:center">45</div>

            </div>
            <!-- </form> -->



            <!-- list events -->
            <div class="rectangle" style="height: 4em; width:5em; ">
                <div class="div-list">
                    <p class="p-text">Current Events</p>

                    <div style = "color: white; text-align:center">7</div>
                </div>
            </div>

            <div id="chartDrawingClass" style="height: 20em; width: 20em; ">
            <!--used this to draw the bargraph-->
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></div>


        </div>

        <div class="right-div">

            <!-- number of unread messages sent to admin -->

            <div class="rectangle" style="height: 4em;width:5em;">
                <!-- <form action="#" name="eventForm2" id="eventForm2"> -->
                <p class="p-text">Unread Admin Messages</p>
                <!-- <br>
                    <input type="text" name="name" id="delete_name" placeholder="Name: " autofocus required>

                    <input type="submit" class="deleteBtn" value="Delete Event" id="deletevent">
                </form> -->
                <div style = "color: white; text-align:center">12</div>
            </div>

            <!-- list bookings -->
            <div class="rectangle" style="height: 4em;width:5em; ">
                <div class="div-list">
                    <p class="p-text">Registered Users</p>
                    <!-- <p style="color:white;" id="list_bookings" class="p-list"> -->
                    <div style = "color: white; text-align:center; ">17</div>
                    </p>
                </div>
            </div>




            <div id="chartDrawing" style="height: 20em; width: 20em; ">test</div>

            <!--used this to draw the bargraph-->
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

        </div>
    </div>

   
</body>


</html>