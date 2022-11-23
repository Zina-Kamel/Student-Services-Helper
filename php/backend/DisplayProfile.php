<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Services Helper</title>
        <link rel="stylesheet" href="../../css/mainStyles.css">
        <link rel="stylesheet" href="../../css/profileStyles.css">
        <link rel="icon" type="image/x-icon" href="../../logos/favicon.ico">
        <script src="../../js/Profile.js"></script>
    </head>
    
    <body>
    
        <!--Sidebar-->
        <div class="sidebar">
            <img src="../../logos/logo_transparent.png">
            <a class="active" href="DisplayProfile.php">Profile</a>
            <a class="" href="Profile.php">Classes Booked</a>
            <a class="" href="Profile.php">Registered Sessions</a>
            <a href="../../html/EventsProfile.html">Events</a>
            <a href="../../html/History.html">History</a>
            <a href="../../html/ContactUs.html">Help</a>
            <a href="../../html/index.html">Main Page</a>
            <a href="signout.php">Sign Out</a>
        </div>

        <!--Booked Classes Summary in Dashboard-->

        <div class="main-content">    
            
            <?php 
        error_reporting(E_ALL);
        ini_set('display_errors', 1); 

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

            $userinfo = $users_collection->find(['Email_Address' => $email]);
            $cur_user = iterator_to_array($userinfo)[0];

            print("<br>");

            print("<p style='color: #173042;'>");
            print("<strong>First Name: </strong>".$cur_user['First_Name']);
            print("</p>");

            print("<p style='color: #173042;'>");
            print("<strong>Middle Name: </strong>".$cur_user['Middle_Name']);
            print("</p>");

            print("<p style='color: #173042;'>");
            print("<strong>Last Name: </strong>".$cur_user['Last_Name']);
            print("</p>");

            print("<p style='color: #173042;'>");
            print("<strong>Email Address: </strong>".$cur_user['Email_Address']);
            print("</p>");

            print("<p style='color: #173042;'>");
            if($cur_user['Is_Club_Member']==0){
                print("<p style='color: #173042;'>");
                print("<strong>Club Board Member Status: </strong>You are not a club board member. <a href='ClubMemberRequest.php'></a>");
                print("<br>");
                print("<a href='ClubMemberRequest.php' ><input type='button' value='Submit a club memeber verification request?' style='radius:10px; position:relative; top:20px;'></a>");
                print("</p>");
            }else if($cur_user['Is_Club_Member']==1){
                print("<p style='color: #173042;'>");
                print("<strong>Club Board Member Status: </strong>You are a club board member.");
                print("</p>");
            }
            print("</p>");


            

            ?>
        </div>
    </body>
</html>