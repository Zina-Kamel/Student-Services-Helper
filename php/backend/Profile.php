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
            <a class="active" href="Profile.html">Classes Booked</a>
            <a href="../../html/EventsProfile.html">Events</a>
            <a href="../../html/History.html">History</a>
            <a href="../../html/ContactUs.html">Help</a>
            <a href="../../html/index.html">Main Page</a>
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
                <details>
                    <summary>Nicol Hall 502 - Tuesday 25 October</summary>
                    <div class="profile-class-desc">
                        <p>Time: 5pm - 6pm</p>
                        <p>Description: Private Study Session</p>
                        <input id="cancelbut" type="button" value="Cancel Booking">
                    </div>
                </details>

                <details>
                    <summary>AKSOB 1009 - Tuesday 29 October</summary>
                    <div>
                        <input id="cancelbut" type="button" value="Cancel Booking">
                    </div>
                </details>

                <details>
                    <summary>Nicol Hall 402 - Monday 30 October</summary>
                    <div class="profile-class-desc">
                        <p>Time: 5pm - 6pm</p>
                        <p>Description: Public Study Session</p>
                        <input id="cancelbut" type="button" value="Cancel Booking">
                    </div>
                </details>

                <details>
                    <summary>AKSOB 1105 - Wednesday 31 October</summary>
                    <div>
                        <input id="cancelbut" type="button" value="Cancel Booking">
                    </div>
                </details>
            </p>

            <p>
                Previously Booked:
                <details>
                    <summary>Nicol Hall 502 - Tuesday 25 September</summary>
                    <div class="profile-class-desc">
                        <p>Time: 5pm - 6pm</p>
                        <p>Description: Private Study Session</p>
                    </div>
                </details>

                <details>
                    <summary>AKSOB 1009 - Tuesday 29 September</summary>
                    <div class="profile-class-desc">
                        <p>Time: 5pm - 6pm</p>
                        <p>Description: Private Study Session</p>
                    </div>
                </details>

                <details>
                    <summary>Nicol Hall 402 - Monday 30 September</summary>
                    <div class="profile-class-desc">
                        <p>Time: 5pm - 6pm</p>
                        <p>Description: Public Study Session</p>
                    </div>
                </details>

                <details>
                    <summary>Nicol Hall 308 - Wednesday 31 August</summary>
                    <div class="profile-class-desc">
                        <p>Time: 5pm - 6pm</p>
                        <p>Description: Individual Classroom</p>
                    </div>
                </details>
            </p>

            <a href="../../html/StudentService.html">
                <div>
                    Book new classrooms?
                </div>
            </a>
        </div>
    </body>
</html>