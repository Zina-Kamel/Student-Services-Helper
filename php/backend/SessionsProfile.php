<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Services Helper</title>
        <link rel="stylesheet" href="../../css/mainStyles.css">
        <link rel="stylesheet" href="../../css/profileStyles.css">
        <link rel="icon" type="image/x-icon" href="../../logos/favicon.ico">
        <link rel="stylesheet" href="../../css/styles.css">
        <link rel="stylesheet" href="../../css/indexStyles.css" >
        <script src="../../js/Profile.js"></script>
    </head>
    
    <body>

        <!--Sidebar-->
        <div class="sidebar">
        <img src="../../logos/logo_transparent.png">
            <a href="DisplayProfile.php">Profile</a>
            <a class="" href="Profile.php">Classes Booked</a>
            <a class="active" href="SessionsProfile.php">Sessions</a>
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
            
            <?php

                error_reporting(E_ALL);
                ini_set('display_errors', 1); 

                require_once __DIR__ . '/vendor/autoload.php';

                $client = new MongoDB\Client("mongodb://localhost:27017");

                // $users_collection = $client->student_services_db->users;
                // $users_collection->insertOne( [ 'Student_ID'=> iterator_to_array($lastuser)[0]['Student_ID']+1,'First_Name' => $firstname, 'Last_Name' => $lastname, 'Email_Address'=>$email, 'Date_Registered'=>new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000), 'Is_Club_Member'=>false ] );
                $users_events_collection = $client->student_services_db->users_events;
                $sessions_collection = $client->student_services_db->sessions;

                $email = $_SESSION['useremail'];
                $userinfo = $users_events_collection->find(['Email_Address' => $email]);
                $cur_user = iterator_to_array($userinfo)[0];
                

            ?>

<div class="gridsession-body" style="left:13%">

<?php foreach ($cur_user['Registered_Sessions'] as $e){ 
    error_reporting(E_ALL);
    ini_set('display_errors', 1); 
    
    $cursor = $sessions_collection->find(
        array(
            '_id' => new \MongoDB\BSON\ObjectID($e)
        )
    );
    $doc = iterator_to_array($cursor)[0];
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
            </div>
<?php } }?>

</div>

</div>

        </div>


<style>
.profilesession-gridJoin{
    width:280px;
    height: 280px;
    object-fit: cover;
    object-position: center;
    padding: 3px;
    background-color: #173042;
    margin-top: 2px;
    
    border-radius:10px;
    text-align: left;
    text-align-last: left;
    font-size: 12px;
    color: #cfdfda;
    padding-left: 15px;
    padding-top: 25px;
    overflow-y: scroll;
    overflow: hidden;
    
}

.gridsession-body{
    position: absolute;
    justify-content: center;
    align-items: center;
    margin:10px;
    width : 100vw;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 400px));
    column-gap: 20px;
    row-gap:20px;
    padding: 10px;
}
</style>

    </body>
</html>