<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Student Services Helper</title>
  <meta name="keywords" content="student, HTML, Javascript, helper, services, lau">
  <meta name="description" content="Upcoming events page">
  <link rel="stylesheet" href="../../css/ClubMemberFormcss.css">
  <link rel="icon" type="image/x-icon" href="../logos/favicon.ico">

  <!-- JS Script alert when the user submits -->

  <script>
    function showSubmission() {
      alert("Your form has been submitted!");
      window.location.href="../../html/SubmittedEvent.html";
    }
  </script>

</head>

<body>

  <!-- Responsive navbar-->
  <div class="navbar" id="navbarid">
            <a href="Index.php">Home</a>
            <a  href="EventsDisplay.php" target=”_blank">Events</a>
            <a href="../../html/Booking.html">Booking</a>
            <a class="active" href="validate_clubmember.php">Club Members</a>

            <div class="right-nav"> 
                <a href="https://elearn.lau.edu.lb/ultra" target=”_blank”>Blackboard</a>
                <a href="https://myportal.lau.edu.lb/Pages/studentPortal.aspx" target=”_blank”>Portal</a>
                <a href="validate_signin.php" ><img src="../../assets/login-icon.png" class="dropbtn"></a>
            </div>
            
        </div>

  <br><br>

  <!--Club Board Member Form-->

  <div class="testbox">
    <form enctype="multipart/form-data" action='ClubMemberEvent.php' method='POST'>
      <div class="banner">
        <h1>Club Board Member Details</h1>
      </div>
      <p><em>Student Information</em></p>

<?php

        error_reporting(E_ALL);
        ini_set('display_errors', 1); 

        require_once __DIR__ . '/vendor/autoload.php';

        session_start();
        $email = $_SESSION['useremail'];

        $client = new MongoDB\Client("mongodb://localhost:27017");
        $users_collection = $client->student_services_db->users;
        $board_events_requests_collection = $client->student_services_db->board_events_requests;

        $eventname = isset($_POST[ "eventname" ]) ? $_POST[ "eventname" ] : "";
        $desc = isset($_POST[ "desc" ]) ? $_POST[ "desc" ] : "";
        $isclass = isset($_POST[ "isclass" ]) ? $_POST[ "isclass" ] : "";
        $posterfile = isset($_FILES[ "posterFile" ]) ? $_FILES["posterFile"]["name"] : "";
        $eventdate = isset($_POST[ "eventdate" ]) ? $_POST[ "eventdate" ] : "";
        $eventtime = isset($_POST[ "eventtime" ]) ? $_POST[ "eventtime" ] : "";

if(isset($_FILES['posterFile'])){
$target_dir = "../../assets/event-photos/";
$target_file = $target_dir . basename($_FILES["posterFile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["posterFile"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["posterFile"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["posterFile"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["posterFile"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

}

        $userinfo = $users_collection->find(['Email_Address' => $email]);
        $cur_user = iterator_to_array($userinfo)[0];

        $iserror = false;
        $formerrors = 
        array( "eventname" => false, "desc" => false, "isclassroom"=>false, "posterfile"=>false, "eventdate"=>false, "eventtime"=>false, "Club"=>false);

        if ( isset( $_POST["submit"] ) )
        {
            if ( $eventname == "" )                   
           {
              $iserror = true;                   
           }

           if ( $desc == "" )                   
           {
              $iserror = true;                   
           }

           if ( $isclass == "" )                   
           {
              $iserror = true;                   
           }
           

            if ( !$iserror )  
            {   
                $board_events_requests_collection->insertOne( [ 'Student_ID'=> $cur_user['Student_ID'],'Event_Name' => $eventname, 'isclassroom' => $isclass, 'Description' => $desc, 'Date' => $eventdate, 'Time' => $eventtime, 'Poster' =>  $posterfile, "Club"=>$cur_user["Club_Name"]] );
                echo '<script>alert("Form Submitted")</script>';
                echo "<script> location.href='../../html/SubmittedEvent.html'; </script>";
                die(); 
            }

        }
        
        if ( $iserror )                                              
        {      
            print( "<p style='color: red; font-size:14px; position:relative;'>Error! All fields need to be filled</p>" );
        } 

        print("<div class='item'>");
        print("<label for='name'><strong>Name</strong></label>");
        print("<p>".$cur_user['First_Name']." ".$cur_user['Last_Name']."</p>");
        print("</div>");

        print("<div class='item'>");
        print("<label for='email'><strong>Email Address</strong></label>");
        print("<p>".$cur_user['Email_Address']."</p>");
        print("</div>");

        print("<div class='item'>");
        print("<label for='email'><strong>Student ID</strong></label>");
        print("<p>".$cur_user['Student_ID']."</p>");
        print("</div>");

?>
      <div class="item">
        <label for="event_name">Event Name</label>
        <input id="event_name" type="text" name="eventname" required  />
      </div>

      <div class="item">
        <label for="short-desc">Enter a description:</label>
        <br>
        <textarea id="freeform" name="desc" rows="5" cols="50" ></textarea>
      </div>

      <div class="question">
        <label>Do you need to book a classroom?</label>
        <div class="question-answer">
          <div>
            <input type="radio" id="radio_1" name="isclass" value="yes"/>
            <label for="radio_1" class="radio" ><span>Yes</span></label>
          </div>
          <div>
            <input type="radio" id="radio_2" name="isclass" value="no"/>
            <label for="radio_2" class="radio"><span>No</span></label>
          </div>

        </div>
      </div>

      <div class="item">
        <label for="posterFile">Upload your poster</label><br>
        <input type="file" id="posterFile" name="posterFile" style="width : 20%; " required>
      </div>


      <div class="item">
        <label for="event_date">Enter date of event</label><br>
        <input id="event_date" type="date" name="eventdate" style="width : 20%; " required />

      </div>

      <div class="item">
        <label for="event_date">Enter time of event</label><br>
        <input id="event_date" type="time" name="eventtime" style="width : 20%; " required />

      </div>

      <div class="btn-block">
        <button type="submit" href="#" name="submit">SUBMIT</button>
      </div>
    </form>
  </div>
</body>

</html>