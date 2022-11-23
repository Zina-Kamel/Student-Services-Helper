<!DOCTYPE html>
<html>

<head>
    <met charset="uft-8"></met>
    <Title>Club Board Member Request</Title>
    <link rel="stylesheet" href="../../css/sessionStyles.css">
    <link rel="icon" type="image/x-icon" href="../logos/favicon.ico">
    <script src="../js/script.js"></script>
    
</head>

<!--Contact Us Form to submit questions/suggestions-->

<body class="body-style">
    <?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1); 

    require_once __DIR__ . '/vendor/autoload.php';

    session_start();
    $email = $_SESSION['useremail'];

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $users_collection = $client->student_services_db->users;

    $userinfo = $users_collection->find(['Email_Address' => $email]);
    $cur_user = iterator_to_array($userinfo)[0];

    $club_name = $_COOKIE["club"];
    $club_position = $_COOKIE["club_pos"];
    $desc = $_COOKIE["desc"];

    print("<div style='color: #173042; margin-bottom: 16px; position: relative; top: 2%;'><strong>Thank you for submitting! Here's what we received</strong></div>");
    print("<div style='color: #173042; margin-bottom: 16px; position: relative; top: 2%;'>A member from our admins will review you request and get in touch with you</div>");
    
    print("<p style='color: #173042;'>");
    print("<strong>Club Name: </strong>".$club_name);
    print("</p>");

    print("<p style='color: #173042;'>");
    print("<strong>Club Position: </strong>".$club_position);
    print("</p>");

    print("<p style='color: #173042;'>");
    print("<strong>Description: </strong>".$desc);
    print("</p>");
    
    print("<a href='DisplayProfile.php' ><input type='button' value='Back to Profile'></a>");

    // $to = $email;
    // $subject = "Your Club Board Member Validation";
    
    // $message = "<p style='color: #173042;'>";
    // $message .= "<strong>Club Name: </strong>".$club_name;
    // $message .= "</p>";

    // $message .= "<p style='color: #173042;'>";
    // $message .= "<strong>Club Position: </strong>".$club_position;
    // $message .= "</p>";

    // $message .= "<p style='color: #173042;'>";
    // $message .= "<strong>Description: </strong>".$desc;
    // $message .= "</p>";

    // $header = "From:zina.kamel@lau.edu \r\n";
    // $header .= "MIME-Version: 1.0\r\n";
    // $header .= "Content-type: text/html\r\n";


    ?>

</body>


</html>
