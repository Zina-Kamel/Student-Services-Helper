<!DOCTYPE html>
<html>

<head>
    <met charset="uft-8"></met>
    <Title>Help Page</Title>
    <link rel="stylesheet" href="../../css/sessionStyles.css">

    <link rel="icon" type="image/x-icon" href="../../logos/favicon.ico">
    <script src="../../js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <style>
        .err {
            position: absolute;
            color: red;
            font-size: 15px;
        }
    </style>

</head>
<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
// $complaints_collection = $client->student_services_db->complaints;
$users_collection = $client->student_services_db->users;
$complaints_collection = $client->student_services_db->complaints;



session_start();
if (isset($_SESSION['useremail'])) {
    $email = $_SESSION['useremail'];

    $userinfo = $users_collection->find(['Email_Address' => $email]);
    $cur_user = iterator_to_array($userinfo)[0]; 
    
                // Check if the form has been submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                   ?> <script>
        $(document).ready(function() {

            $('#myForm').submit(function(e) {
                e.preventDefault();

                var message = $('#message').val();

                $(".error").remove();


                if (message.length < 1) {
                    $('#message').after('<span>Message is required</span>');
                }

            });

        });
    </script><?php

                    $fname = $cur_user['First_Name'];
                    $lname =  $cur_user['Last_Name'];
                    $email = $cur_user["Email_Address"];
                    $message = $_POST["message"];

                    $form_data = array(
                        "First_Name" => $fname,
                        "Last_Name" => $lname,
                        "Email_Address" => $email,
                        "Date_Sent" => new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000),
                        "Text" => $message
                    );

                    $complaints_collection->insertOne($form_data);
                }
                ?>

    <!--Contact Us Form to submit questions/suggestions-->

    <body class="body-style">
        <div style="color: #173042; margin-bottom: 16px; position: relative; top: 2%;"><strong>Thank you for your interest to contact us! Kindly fill the below form with your request</strong></div>
        <input type="button" value="Go back!" onclick="history.back()" style="background-color:#1d976c;" class="button">
        <form novalidate class="logIn" style="position: relative; top: 5%;" action="" method="POST" id="myForm">

            <img src="../../assets/Services/contactus.jpg" alt="contact" class="acc">

            <p>Message
            <p>: <textarea id="message" name="message" placeholder="Tell us your issue.." class="textarea" id="message"></textarea><br>
                <br>
                <input type="submit" class="button" value="submit" style="background-color:#1d976c" id="submitButton">

        </form>
    </body>
<?php
} else { ?>

    <?php
    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <script>
            $(document).ready(function() {
                $('#myForm').submit(function(e) {
                    e.preventDefault();
                    var name = $('#name').val();
                    var fname = $('#fname').val();

                    var email = $('#email').val();
                    var message = $('#message').val();

                    $(".err").remove();

                    if (name.length < 1) {
                        $('#name').after('<span class="err" >Name is required</span>');
                    }
                    if (fname.length < 1) {
                        $('#fname').after('<span class="err" >Family name is required</span>');
                    }
                    if (email.length < 1) {
                        $('#email').after('<span class="err">Email is required</span>');
                    } else {
                        var validMail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
                        var validEmail = validMail.test(email);
                        if (!validEmail) {
                            $('#email').after('<span class = "err">Enter a valid email</span>');
                        }
                    }
                    if (message.length == '') {
                        $('#message').after('<span class="err">Message is required</span>');
                    }

                });



            });
        </script><?php
                    $name = $_POST["name"];
                    $fname = $_POST["fname"];

                    $email = $_POST["email"];
                    $message = $_POST["message"];

                    $form_data = array(
                        "First_Name" => $name,
                        "Last_Name" => $fname,
                        "Email_Address" => $email,
                        "Date_Sent" => new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000),
                        "Text" => $message
                    ); ?>
        
    <?php $complaints_collection->insertOne($form_data);
    }
    ?>

    <!--Contact Us Form to submit questions/suggestions-->

    <body class="body-style">
        <div style="color: #173042; margin-bottom: 16px; position: relative; top: 2%;"><strong>Thank you for your interest to contact us! Kindly fill the below form with your request</strong></div>
        <input type="button" value="Go back!" onclick="history.back()" style="background-color:#1d976c;" class="button">
        <form novalidate class="logIn" style="position: relative; top: 5%;" action="" method="POST" id="myForm">

            <img src="../../assets/Services/contactus.jpg" alt="contact" class="acc">
            <p>First Name <input type="text" name="name" id="name" placeholder="Enter your name" class="textBox2"></p>
            <p>Last Name <input type="text" name="fname" id="fname" placeholder="Enter your name" class="textBox2"></p>

            <p>Email <input type="email" name="email" id="email" placeholder="Enter your email" class="textBox2"></p><br>
            <textarea name="message" placeholder="Tell us your issue.." class="textarea" id="message"></textarea><br>

            <input type="submit" class="button" value="submit" style="background-color:#1d976c" id="submitButton">

        </form>
    </body><?php
        }