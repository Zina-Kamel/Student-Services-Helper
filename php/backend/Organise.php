<html>

<head>
    <met charset="uft-8"></met>
    <title>Organize a session</title>
    <link rel="stylesheet" href="../../css/sessionStyles.css">
    <link rel="icon" type="image/x-icon" href="../logos/favicon.ico">
</head>

<header class="body-style">
    <center>
        <h1 style="color: #173042;">Booking a classroom form</h1>
    </center>
</header>

<!--Booking a classroom form-->

<!-- <img style="background: url(../assets/Services/joinEdit.jpg);background-size: cover; background-repeat: no-repeat;" -->
<!-- <form id="organize" method="post" action="../project/Student-Services-Helper-main/html/ConfirmationForm.html"> -->
<form id="organize" method="post" action="">
    <center class="organizeInformation">

        <body>
            <form class="organizeInformation">


                <p>What are you planning to do?
                    
                    <input type="radio" name="type" value="study" />Study 
                    <input type="radio" name="type" value="other"/>Other<br>
                    <br>


                <p>Study mode preference:
                    <input type="radio" name="mode" value="Individual">Individual <input type="radio" name="mode" value="Shared"/>Shared
                </p>

                <p>Please enter the date
                    <input type="date" name="date" />
                    <span id="date-time"></span>
                </p>

                <p>Please specify the time
                    from: <input type="time" name="time1" min="07:00:00" max="22:00:00"/> till: <input type="time" name="time2" min="07:00:00" max="20:00:00"/><br>
                <h5 class="note">Note: You are allowed to stay for 2 hours per session!</h5>
                </p>



                <label>Choose the Building</label>
                <!-- <select name="LAU Buildings" class="options" name ="building" id="buildings"> -->
                <select class="options" name ="LAUbuildings" id="buildings">
                    
                    <option value="000" selected> </option>
                    <option value="101">Sage Hall</option>
                    <option value="102">WKSC-Wadad Said Khoury Build.</option>
                    <option value="103">Nicol Hall</option>
                    <option value="104">Safadi Fine Arts</option>
                    <option value="110">AKSOB</option>
                    <option value="113">Gezairi</option>
                    <option value="155">Atiyah Building</option>
                    </select>
                </p>


                <label>Available Rooms</label> 
                 <select style="display:none"  class="options" id="SageHall" name="LAUclasses">
                   
                    <option></option>
                    <option>201</option>
                    <option>202</option>
                    <option>203</option>
                    <option>204</option>
                    <option>205</option>
                    <option>206</option>
                </select>
                <select style="display:none"  class="options"  id="wksc" >
                    <option></option>
                    <option>201</option>
                    <option>204</option>
                    <option>205</option>
                  
                </select>

                <select style="display:none"  class="options" id="nicol" name="LAUclasses"  >
                    <option></option>
                    <option>120</option>
                    <option>215</option>
                    <option>216</option>
                    <option>217</option>
                    <option>218</option>
                    <option>304</option>
                    <option>305</option>
                    <option>306</option>
                    <option>307</option>
                    <option>312</option>
                    <option>313</option>
                    <option>318</option>
                    <option>403</option>
                    <option>404</option>
                    <option>408</option>
                    <option>409</option>
                    <option>417</option>
                    <option>418</option>
                </select>

                <select style="display:none"  class="options" id="safadi" name="LAUclasses"  >
                    
                    <option></option>
                    <option>106</option>
                    <option>107</option>
                    <option>109</option>
                    <option>605</option>
                    <option>606</option>
                    <option>607</option>
                    <option>608</option>
                </select>

                <select  style="display:none"  class="options" id="aksob"   name="LAUclasses">
                    <option></option>
                    <option>0903</option>
                    <option>0904</option>
                    <option>0905</option>
                    <option>1003</option>
                    <option>1004</option>
                    <option>1005</option>
                    <option>1006</option>
                    <option>1007</option>
                    <option>1107</option>
                    <option>1108</option>
                    <option>1109</option>
                    <option>1110</option>
                    <option>1207</option>
                    <option>1208</option>
                    <option>1209</option>
                    <option>1210</option>
                    <option>1211</option>
                    <option>1307</option>
                    <option>1308</option>
                    <option>1309</option>
                </select>

               
                <select style="display:none"  class="options" id="gezairi"  name="LAUclasses" >
                    <option></option>
                    <option>1001</option>
                    <option>1002</option>
                    <option>1101</option>
                    <option>1104</option>
                    <option>1107</option>
                    <option>403</option>
                    <option>404</option>
                    <option>801</option>
                    <option>802</option>
                    <option>901</option>
                    <option>902</option>
                </select>

                <select style="display:none"  class="options" id="atiyah"  name="LAUclasses" >
                   
                    <option></option>
                    <option>0302</option>
                    <option>0303</option>
                    <option>0304</option>
                    <option>0305</option>
                    <option>0306</option>
                    </select>


                <h5 class="note">Note: You will not be able to modify the mode of study later</h5>

        
                
                <script src="../js/index.js"></script>


                <center>
                    <p>
                        <a href="../html/ConfirmationForm.html"><button class="button">Submit</button></a>
                        <input type="reset" value="Reset" class="button" />
                    </p>
                </center>
            </form>
</form>



</body>


<?php 
require_once _DIR_ . '/vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$reservation_collection = $client->student_services_db->reservation_collection;
$classroom_collection = $client->student_services_db->classrooms;

       error_reporting(E_ALL);
       ini_set('display_errors', 1); 

$typeOfreservation="";
$studyMode="";
$date ="";
$time1="";
$time2="";
$bookingInfo="";
$building="";
$buildingName="";
$ClassesLAU="";

if(isset($_POST['type'])){
$typeOfreservations = $_POST['type'];  
$typeOfreservation=$typeOfreservations;
}
if(isset($_POST['mode'])){
    $studyModes = $_POST['mode'];  
    $studyMode=$studyModes;
    }

    if(isset($_POST['date'])){
        $dates = $_POST['date'];  
        $date=$dates;

        }
        if(isset($_POST['time1'])){
            $times1 = $_POST['time1'];   
            $time1=$times1;
            }
            if(isset($_POST['time2'])){
                $times2 = $_POST['time2'];  
                $time2=$times2;
                }

                if(isset($_POST['LAUbuildings'])){
                    $buildingType = $_POST['LAUbuildings'];
                    $building=$buildingType;
                
                // echo $building;
                if($building =="101" ){
                    $buildingName="Sage Hall";
                }

                if($building =="102" ){
                    $buildingName="WKSC-Wadad Said Khoury Build.";
                }
                if($building =="103" ){
                    $buildingName="Nicol Hall";
                }
                if($building =="104" ){
                    $buildingName="Safadi-Fine Arts";
                }
                if($building =="110" ){
                    $buildingName="AKSOB";
                }
                if($building =="113" ){
                    $buildingName="Gezairi";
                }
                if($building =="155" ){
                    $buildingName="Atiyah Building";
                }
            }

                 // if(isset($_POST['class1'])){ 
                    //     $class1 = $_POST['class1']; 
                    //     echo var_dump($class1);
                    //     $classes1=$class1;  
                    //     }
                

                    if(isset($_POST['LAUclasses'])){
                        $class2 = $_POST['LAUclasses']; 
                        $ClassesLAU=$LAUclasses;
                        echo $ClassesLAU;
                        
                        }
                        if(isset($_POST['class3'])){
                            $class3 = $_POST['class3'];   
                            }
                            if(isset($_POST['class4'])){
                                $class4 = $_POST['class4'];  
                            
                                }
                                if(isset($_POST['class5'])){
                                    $class5 = $_POST['class5'];  
                                
                                    }
                                    if(isset($_POST['class6'])){
                                        $class6 = $_POST['class6'];  
                                       
                                        }
                                        if(isset($_POST['class7'])){
                                            $class7 = $_POST['class7'];  
                                            
                                            }
                                            if(isset($_POST['class8'])){
                                                $class8 = $_POST['class8'];  
                                                }
                

                                                
   $buildingAvailable =$classroom_collection->find(['Building_Name'=>$buildingName]);
   $bookingID =$classroom_collection->find(['_id']);
   $startTimeBooked =$reservation_collection->find(['Start_Time  '=>$time1]);

   $cursor = $reservation_collection->find(array('_id' => new \MongoDB\BSON\ObjectID($bookingID)
    )
);

$eventarr = iterator_to_array($cursor);
    foreach ($buildingAvailable as $entry1){
       

        // var_dump($entry);
        if($entry=$buildingName ){
            echo "Already Booked";
    
        };
       
    };
    

        $bookingInfo = ["Reservation type "=>$typeOfreservation,
        "Study Mode "=>$studyMode,
        "Date "=>$date,
        "Time "=>$time1,
        "Time2 "=>$time2,
        "Building "=>$buildingName,
         "Class "=>$ClassesLAU
        ];
        $insertResult = $reservation_collection->insertOne($bookingInfo);

?>

</html>