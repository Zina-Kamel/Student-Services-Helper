<!DOCTYPE html>
<html>

<head>
    <met charset="uft-8"></met>
    <Title>Admin Log in</Title>
    <link rel="stylesheet" href="../../css/sessionStyles.css">
    <link rel="icon" type="image/x-icon" href="../logos/favicon.ico">

</head>

<!--Login Page-->
<?php


require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$admins_collection = $client->student_services_db->admins;
$admins_login_collection = $client->student_services_db->admin_login;

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
        $result = $admins_login_collection->find(['Email_Address' => $email]);
        
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
        $passresult = $admins_login_collection->find(['Email_Address' => $email]);
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
        echo "<script> location.href='AdminMainPage.php'; </script>";
        die(); 
    }
}

print("<div style='position: relative; top: 4%; color: #173042;'><strong>Welcome to Student Services Helper! Please login to continue using the services</strong></div>");

print("<form class='logIn' style='position: relative; top: 8%; height:300px;' action='AdminLoginPage.php' method='POST'>");
print("<img src='../../assets/Services/icons8-admin-91.png' class='acc'>");

if ( $iserror )                                              
{                  
    if($formerrors["email"] || $formerrors["password"]){
        print( "<p style='color: white; font-size:14px; position:relative;'>Error! All fields need to be filled.</p>" );
    }else if($formerrors["emaildoesntexist"]){
        if($formerrors[ "emaildoesntexist" ]){
            print("<p style='color: white; font-size:14px;'>Email does not exist.</p>");
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


print("</form></body></html>");

?>


</body>

</html>