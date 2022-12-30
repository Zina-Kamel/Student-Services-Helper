<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Manage Events</title>
    <link rel="stylesheet" href="../../../css/indexStyles.css">
    <link rel="stylesheet" href="../../../css/profileStyles.css">
    <link rel="stylesheet" href="../../../css/adminFunctionStyles.css">

    <link rel="icon" type="image/x-icon" href="../../../logos/favicon.ico">
</head>

<body>
   
    <div>
        <?php
        require_once __DIR__ . '/vendor/autoload.php';
        $client = new MongoDB\Client("mongodb://localhost:27017");

      
        $users_collection = $client->student_services_db->users;


        $cursor = $users_collection->find();


   ?>
   <div >
      <p>Search For By Email: <input id = "searchInput"></p>
      <div> </div>
   </div>
   
   
</body>
</html>


    