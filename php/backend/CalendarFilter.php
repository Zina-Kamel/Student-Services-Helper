<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1); 
    
    $json = file_get_contents('php://input');

    $data = json_decode($json, true)['curday'];
    $month = json_decode($json, true)['curmonth'];

    echo $data;

    // echo var_dump($json);

    define( "FIVE_DAYS", 60 * 60 * 24 * 5 ); // define constant
    setcookie( "eventday", $data, time() + FIVE_DAYS ); 
    setcookie( "eventmonth", $month, time() + FIVE_DAYS ); 

    foreach ($_COOKIE as $key => $value )
  print( "<p>$key: $value</p>" );
    
    //echo '<script>alert("Welcome to Geeks for Geeks")</script>';

   // echo "<script> location.href='EventsDisplay.php'; </script>";

?>