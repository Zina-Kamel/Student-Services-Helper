<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Services Helper</title>
        <link rel="stylesheet" href="../../css/mainStyles.css">
        <link rel="stylesheet" href="../../css/profileStyles.css">
        <link rel="stylesheet" href="../../css/editProfile.css">
        <link rel="icon" type="image/x-icon" href="../../logos/favicon.ico">
        <script src="../../js/Profile.js"></script>
    </head>

<body>

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
        
        
        <div class="main-content">   
        <center>
            <h1 class="editText">Edit Profile</h1>
</center> 
         <div class="rectangle1"> 

    <p class="text">Change Password <input type="password" class="textBox" placeholder="password"></p> 
    <hr>
    <p class="text">Reenter your password <input type="password" class="textBox2" placeholder="password"></p> 
</div>
</div>
<button class="button" onclick="showSubmission()">Submit Changes</button>

<script>
function showSubmission() {
    alert("Password Successfully changed");
  }

</script>
    </body>
</html>