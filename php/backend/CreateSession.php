<!DOCTYPE html>
<html>

<head>
    <met charset="uft-8"></met>
    <title>Create Your Session</title>
    
    <link rel="stylesheet" href="../css/sessionStyles.css">
    <link rel="icon" type="image/x-icon" href="../logos/favicon.ico">
</head>

<header class="body-style">
    <center>
        <h1 style="color: #173042;">Lets create a study session :)</h1>
    </center>
</header>

<!--Form to Organise a Study Session (Public or Private)-->


<!-- <form id="organize" method="post" action="JoinConfirmationForm.html"> -->
<form id="organize" method="post" action="">
    <center  class="organizeInformation">
        <body style="background: url(../assets/Services/joinEdit.jpg);background-size: cover; background-repeat: no-repeat;">  
            
            <form class="organizeInformation" >  

                
                <p>Topic <input type="text" class="textBox" name="topic"></p> 
                <p>Activity <input type="text" class="textBox" name="activitydesc"></p>   
                <br>

                <p>Select a Month
                <select class="options" name ="months" id="months">
                <option value="" selected> </option>
                    <option value="January" selected>January </option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                    </select>
                </p>
                <p>Select a Day
                <select class="options" name ="day" id="day">
                <option value="" selected> </option>
                    <option value="1" selected>1 </option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    </select>
                </p>
    
                <p>Please specify the time
                    from: <input type="time" id="timePicker" name="start_time" /> till: <input type="time" id="timePicker"
                        name="end_time" /><br>
                    <!-- <h5 class="note">Note: You are allowed to stay for 2 hours per session!</h5> -->
                </p>
    
                <h5 class="note">Note: You will not be able to modify the mode of study later</h5>
        
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
            <p>

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
                    <input type="reset" value="Reset" class="button"  />
                </p>

            </center>
            </form>
        </form>
</body>

<?php 

require_once _DIR_ . '/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$sessions_collection = $client->student_services_db->sessions;

        error_reporting(E_ALL);
        ini_set('display_errors', 1); 

$topic="";
$activity="";
$date ="";
$days="";
$time1="";
$time2="";
$bookingInfo="";
$building="";
$buildingName="";
$ClassesLAU="";
$activity="";


if(isset($_POST['type'])){
$typeOfreservations = $_POST['type'];  
$typeOfreservation=$typeOfreservations;
}
if(isset($_POST['mode'])){
    $studyModes = $_POST['mode'];  
    $studyMode=$studyModes;
    }

    if(isset($_POST['activitydesc'])){
        $activityde = $_POST['activitydesc'];  
        $activity=$activityde;
        }

        if(isset($_POST['months'])){
            $months = $_POST['months'];  
            $date=$moths;
            }
            if(isset($_POST['day'])){
                $days = $_POST['day'];  
                $day=$days;
                }

    if(isset($_POST['topic'])){
        $topics = $_POST['topic'];  
        $topic=$topics;
        }


    if(isset($_POST['date'])){
        $dates = $_POST['date'];  
        $date=$dates;

        }
        if(isset($_POST['start_time'])){
            $times1 = $_POST['start_time'];   
            $time1=$times1;
            }
            if(isset($_POST['end_time'])){
                $times2 = $_POST['end_time'];  
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

             
                
                    $sessions = [
                    "Activity "=>$activity,
                    "Topic "=>$topic,
                    "Month "=>$date,
                    "Day" =>$days,
                    "Participant Email"=>[],
                    "Start Time "=>$time1,
                    "End Time "=>$time2,
                    "Location "=>$buildingName,
                     "Class "=>$ClassesLAU
                    ];
                    //$insertSessions = $sessions_collection->insertOne($sessions);
                    

?>

</html>