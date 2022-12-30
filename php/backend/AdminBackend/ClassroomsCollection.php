<?php

require_once __DIR__ . '/vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$classrooms_collection = $client->student_services_db->classrooms;

       error_reporting(E_ALL);
       ini_set('display_errors', 1); 

$classrooms = [
    [
    "Building_Code"=> 101,
    "Building_Name"=> "SageHall",
    "Room"=> 201,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 101,
    "Building_Name"=> "SageHall",
    "Room"=> 202,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 101,
    "Building_Name"=> "SageHall",
    "Room"=> 203,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 101,
    "Building_Name"=> "SageHall",
    "Room"=> 204,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 101,
    "Building_Name"=> "SageHall",
    "Room"=> 205,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 101,
    "Building_Name"=> "SageHall",
    "Room"=> 206,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 102,
    "Building_Name"=> "Wadad",
    "Room"=> 201,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 102,
    "Building_Name"=> "Wadad",
    "Room"=> 204,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 102,
    "Building_Name"=> "Wadad",
    "Room"=> 205,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 120,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 215,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 216,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 217,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 218,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 304,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 305,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 306,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 307,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 312,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 313,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 318,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 403,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 404,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 408,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 409,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 417,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 103,
    "Building_Name"=> "NicolHall",
    "Room"=> 418,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 104,
    "Building_Name"=> "Safadi-Fine-Arts",
    "Room"=> 106,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 104,
    "Building_Name"=> "Safadi-Fine-Arts",
    "Room"=> 107,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 104,
    "Building_Name"=> "Safadi-Fine-Arts",
    "Room"=> 109,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 104,
    "Building_Name"=> "Safadi-Fine-Arts",
    "Room"=> 605,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 104,
    "Building_Name"=> "Safadi-Fine-Arts",
    "Room"=> 606,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 104,
    "Building_Name"=> "Safadi-Fine-Arts",
    "Room"=> 607,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 104,
    "Building_Name"=> "Safadi-Fine-Arts",
    "Room"=> 608,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 104,
    "Building_Name"=> "Safadi-Fine-Arts",
    "Room"=> 106,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 104,
    "Building_Name"=> "Safadi-Fine-Arts",
    "Room"=> 107,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 104,
    "Building_Name"=> "Safadi-Fine-Arts",
    "Room"=> 109,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 104,
    "Building_Name"=> "Safadi-Fine-Arts",
    "Room"=> 605,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 104,
    "Building_Name"=> "Safadi-Fine-Arts",
    "Room"=> 606,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 104,
    "Building_Name"=> "Safadi-Fine-Arts",
    "Room"=> 607,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 104,
    "Building_Name"=> "Safadi-Fine-Arts",
    "Room"=> 608,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 903,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 904,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 905,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1003,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1004,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1005,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1006,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1007,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1008,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1009,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1110,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1207,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ], 
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1208,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1209,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1210,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1211,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1307,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1308,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 110,
    "Building_Name"=> "AKSOB",
    "Room"=> 1309,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 113,
    "Building_Name"=> "Gezairi",
    "Room"=> 403,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 113,
    "Building_Name"=> "Gezairi",
    "Room"=> 404,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 113,
    "Building_Name"=> "Gezairi",
    "Room"=> 801,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 113,
    "Building_Name"=> "Gezairi",
    "Room"=> 802,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 113,
    "Building_Name"=> "Gezairi",
    "Room"=> 901,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 113,
    "Building_Name"=> "Gezairi",
    "Room"=> 902,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 113,
    "Building_Name"=> "Gezairi",
    "Room"=> 1107,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 113,
    "Building_Name"=> "Gezairi",
    "Room"=> 1104,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 113,
    "Building_Name"=> "Gezairi",
    "Room"=> 1002,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 113,
    "Building_Name"=> "Gezairi",
    "Room"=> 1101,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ], "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 155,
    "Building_Name"=> "Atiyah",
    "Room"=> 302,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 155,
    "Building_Name"=> "Atiyah",
    "Room"=> 303,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ], "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 155,
    "Building_Name"=> "Atiyah",
    "Room"=> 304,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      
    ],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 155,
    "Building_Name"=> "Atiyah",
    "Room"=> 305,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [],
    "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ],[
    "Building_Code"=> 155,
    "Building_Name"=> "Atiyah",
    "Room"=> 306,
    "Room_Category"=> "Classroom",
    "Booking_ID"=> [
      ""
    ], "AC_Status"=> true,
    "Availability"=> true,
    "Elec_Status"=> true
  ]
  ]
  ;


$insertManyResult = $classrooms_collection->insertMany($classrooms);
echo "<h3>Inserted " . $insertManyResult->getInsertedCount() . " new events </h3>";
echo "<br>";


?>