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

        error_reporting(E_ALL);
        ini_set('display_errors', 1); 

        require_once __DIR__ . '/vendor/autoload.php';

        $client = new MongoDB\Client("mongodb://localhost:27017");
        $users_collection = $client->student_services_db->users;
        $login_collection = $client->student_services_db->login;

        $email = isset($_POST[ "email" ]) ? $_POST[ "email" ] : "";
        $password = isset($_POST[ "password" ]) ? $_POST[ "password" ] : "";

        $iserror = false;
        $formerrors = 
        array( "email" => false, "password" => false, "emaildoesntexist"=>false, "incorrectpassword"=>false);

        if ( isset( $_POST["submit"] ) )
        {
           
           if ( $email == "" )                   
           {
              $formerrors[ "email" ] = true;
              $iserror = true;                   
           }else{
                $result = $login_collection->find(['Email_Address' => $email]);
                
                $formerrors["emaildoesntexist"] = true;
                	foreach ($result as $entry) {
                		if($entry['Email_Address']==$email){
                            $formerrors["emaildoesntexist"] = false;
                        }
                	}
           } 

           if ( $password == "" ) 
           {
              $formerrors[ "password" ] = true;
              $iserror = true;
           }else{
                $passresult = $login_collection->find(['Email_Address' => $email]);
                $correctpass = false;

                foreach ($passresult as $entry) {
                    if($entry['Password']==$password){
                        $correctpass = true;
                    }
                }

                if(!$correctpass){
                    $formerrors[ "incorrectpassword" ] = true;
                    $iserror = true;
                }
           }

           if ( !$iserror )  
            {
                session_start();
                $_SESSION["useremail"] =  $email;
                echo "<script> location.href='DisplayProfile.php'; </script>";
                die(); 
            }
        }

        print("<div style='position: relative; top: 4%; color: #173042;'><strong>Welcome to Student Services Helper! Please login to continue using the services</strong></div>");

        print("<form class='logIn' style='position: relative; top: 8%; height:300px;' action='login.php' method='POST'>");
        print("<a href='../../html/index.html'><img src='../../assets/back.png' class='BackButton' style='position:relative; right: 28%;'></a>");
        print("<img src='../../assets/Services/account.png' style='position:relative; right: 10%;' class='acc'>");

        if ( $iserror )                                              
        {                  
            if($formerrors["email"] || $formerrors["password"]){
                print( "<p style='color: white; font-size:14px; position:relative;'>Error! All fields need to be filled.</p>" );
            }else if($formerrors["emaildoesntexist"]){
                if($formerrors[ "emaildoesntexist" ]){
                    print("<p style='color: white; font-size:14px;'>Email does not exist. Please sign up instead</p>");
                }
            }    
            else if($formerrors["incorrectpassword"]){
                print("<p style='color: white; font-size:14px;'>Password does not match email address entered</p>");
            }                                      
           
        } 

        print(
            "<div style='position:relative;top:10%;'>
            <label id='email-label'></label>
            <input name = 'email' type='email' spellcheck='false' id='email-field' class='logInStyle' placeholder='Email'>
            <span id='email-error'></span>

            </div>"
        );



        print(
            "<div style='position:relative;top:10%;'>
            <label id='email-label'></label>
            <input name = 'password' type='password' spellcheck='false' id='password-field' class='logInStyle' placeholder='Password'>
            <span id='email-error'></span>

            </div>"
        );

        print("<button class='button' style='position:relative;top:10%;' name='submit'>LogIn</button>");

        print("<p class='text1' style='position:relative;top:10%;'>Don't have an account?");
        print("<br>");
        print("<a class='text' style='position:relative;top:10%;' href='signup.php'>Create One!</a> </p>");
        
        print("</form></body></html>");

    ?>