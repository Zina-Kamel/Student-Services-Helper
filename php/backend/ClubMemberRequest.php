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
    $board_requests_collection = $client->student_services_db->club_board_requests;

    $userinfo = $users_collection->find(['Email_Address' => $email]);
    $cur_user = iterator_to_array($userinfo)[0];

    if ( isset( $_POST["submit"] ) )
    {   
        $club_name = $_POST["club"];
        $club_position = $_POST["club_pos"];
        $desc = htmlspecialchars($_POST['desc']);
        $board_requests_collection->insertOne( [ 'Student_ID'=> $cur_user['Student_ID'],'Club_Name' => $club_name, 'Position' => $club_position, 'Description' => $desc ] );
        define( "FIVE_DAYS", 60 * 60 * 24 * 5 );
        setcookie( "club", $club_name, time() + FIVE_DAYS );    
        setcookie( "club_pos", $club_position, time() + FIVE_DAYS );
        setcookie( "desc", $desc, time() + FIVE_DAYS );  
        echo "<script> location.href='ConfirmSubmissionBoardMember.php'; </script>";
        die(); 
    }

    print("<div style='color: #173042; margin-bottom: 16px; position: relative; top: 2%;'><strong>Club Board Member Verification Form</strong></div>");
    print("<input type='button' value='Go back!' onclick='history.back()'>");
    print("<form class='logIn' style='position: relative; top: 5%; height:400px; text-align: left; ' action='ClubMemberRequest.php' method='POST'>");
    print("<p><strong>Name: </strong>".$cur_user['First_Name']." ".$cur_user['Last_Name']."</p>");
    print("<p><strong>Email: </strong> ".$cur_user['Email_Address']);
    print("
    <p><strong>Club Name: </strong><input type='' id='' class='textBox2' name = 'club' required></p>
    <p><strong>Position: </strong><input type='' id='' class='textBox2' name = 'club_pos' required></p>
    <textarea placeholder='Anything else we need to know?'  name = 'desc' class='textarea' id='textid' style='padding:5px;' required></textarea>
    <br>
    <button class='button' style='position: relative; left:25%; top:5%;' name='submit';>Submit</button>
   
    </form>
    ")
    ?>

</body>


</html>
