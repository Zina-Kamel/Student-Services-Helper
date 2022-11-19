<!DOCTYPE html>

<html>
    <head>
        <met charset="uft-8"></met>
        <Title>Log in</Title>
        <link rel="stylesheet" href="../../css/sessionStyles.css">
        <link rel="icon" type="image/x-icon" href="../../logos/favicon.ico">
    </head>

   <body class="body-style">
    <?php

        // error_reporting(E_ALL);
        // ini_set('display_errors', 1); 

        require_once __DIR__ . '/vendor/autoload.php';

        $client = new MongoDB\Client("mongodb://localhost:27017");
        $users_collection = $client->student_services_db->users;
        $login_collection = $client->student_services_db->login;

        $firstname = isset($_POST[ "firstname" ]) ? $_POST[ "firstname" ] : "";
        $lastname = isset($_POST[ "lastname" ]) ? $_POST[ "lastname" ] : "";
        $email = isset($_POST[ "email" ]) ? $_POST[ "email" ] : "";
        $password = isset($_POST[ "password" ]) ? $_POST[ "password" ] : "";

        $iserror = false;
        $formerrors = 
        array( "email" => false, "password" => false, "firstname"=>false, "lastname"=>false, "emailexists"=>false);

        if ( isset( $_POST["submit"] ) )
        {
           
           if ( $email == "" )                   
           {
              $iserror = true;                   
           }else{
               if(!preg_match( "/.+@lau.edu$/", 
               $email )){
                    $formerrors["email"] = true;
                    $iserror = true;
               }else{
                    $result = $login_collection->find(['Email_Address' => $email]);
                
                    $formerrors["emailexists"] = false;
                        foreach ($result as $entry) {
                            if($entry['Email_Address']==$email){
                                $formerrors["emailexists"] = true;
                                $iserror = true;
                            }
                        }
               }
           }

           if ( $password == "" ) 
           {
              $iserror = true;
           }else{
              if(!preg_match('/^[a-z%]+[_\.@!-?=]+[a-z%]*$/i', $password)){
                $formerrors["password"] = true;
                $iserror = true;
              }
           }

           if ( !$iserror )  
            {   
                $filter  = [];
                $limit = [ 'limit' => 1 ];
                $options = ['sort' => ['_id' => -1]];
                $lastuser = $users_collection->find($filter, $options, $limit);

                $login_collection->insertOne( [ 'Email_Address' => $email, 'Password' => $password ] );
                $users_collection->insertOne( [ 'Student_ID'=> iterator_to_array($lastuser)[0]['Student_ID']+1,'First_Name' => $firstname, 'Last_Name' => $lastname, 'Email_Address'=>$email, 'Date_Registered'=>new \MongoDB\BSON\UTCDateTime(strtotime('yesterday') * 1000), 'Is_Club_Member'=>false ] );
                session_start();
                $_SESSION["useremail"] =  $email;
                echo "<script> location.href='Profile.php'; </script>";
                die(); 
            }
        }

        print("<div style='position: relative; top: 4%; color: #173042;'><strong>Welcome to Student Services Helper! Please signup to continue using the services</strong></div>");

        print("<form class='logIn' style='position: relative; top: 8%; height:350px;' action='signup.php' method='POST'>");
        print("<a href='../../html/index.html'><img src='../assets/back.png' class='BackButton'></a>");
        print("<img src='../../assets/Services/signup2.png' class='acc'>");

        if ( $iserror )                                              
        {                  
            if($formerrors["emailexists"]){
                print( "<p style='color: white; font-size:14px; position:relative;'>Email already exists. Please sign in instead</p>" );
            }else if($formerrors["email"]){
                print( "<p style='color: white; font-size:14px; position:relative;'>Email should end in @lau.edu</p>" );
            }else if($formerrors["password"]){
                print( "<p style='color: white; font-size:14px; position:relative;'>Password should contain special characters</p>" );
            }
            
        } 

        print(
            "<p class='text'><input type='text' class='SignUpInfo' name='firstname' placeholder='First Name' required></p>"
        );

        print(
            "<p class='text'><input type='text' class='SignUpInfo' name='lastname' placeholder='Last Name' required></p>"
        );


        print(
            "<label id='email-label'></label>
            <p class='text'>  <input type='email' spellcheck='false' name='email' id='email-field' class='SignUpInfo' placeholder='Email'></p>
                <span id='email-error'></span>"
        );

        print(
            "<label id='password-field'></label>
            <p class='text'>  <input type='password' spellcheck='false' name='password' id='password-field' class='SignUpInfo' placeholder='Password' required></p>
                <span id='password-error'></span>"
        );

        print("<button class='button' style='position:relative;top:10%;' name='submit'>Signup</button>");

        print("<p class='text1' style='position:relative;top:10%;'>Need help?");
        print("<a class='text' style='position:relative;top:10%;' href='../../html/ContactUs.html'>Ask us!</a> </p>");

        print("<p class='text1' style='position:relative;top:10%;'>Already have an account?");
        print("<a class='text' style='position:relative;top:10%;' href='login.php'>Sign in instead</a> </p>");
        
        print("</form></body></html>");

    ?>