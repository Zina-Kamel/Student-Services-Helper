<?php

require_once __DIR__ . '/vendor/autoload.php';


if(isset($_COOKIE["eventday"])){
    setcookie("eventday", "", time() - 62 * 60 * 24 * 5);
    
  }

  echo "<script> location.href='EventsDisplay.php'; </script>";
?>
