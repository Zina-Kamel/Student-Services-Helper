<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calendar</title>
    <link rel="stylesheet" href="../../css/calendarStyles.css" />
    <link rel="icon" type="image/x-icon" href="../../logos/favicon.ico">

    <!--favicon-->
    <link rel="icon" type="image/x-icon" href="../Resources/icons8-calendar-16.png">

    <!--will be used to import the 2 buttons for the months on the calendar-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />

    <!--to be redirected to the events-->
    <script type="text/javascript">
        function redirect(){
            //window.location.href="../php/backend/EventsDisplay.php";
        }
    </script>

</head>

<body>
    <!-- Responsive navbar-->
    <div class="navbar" id="navbarid">
            <a href="Index.php">Home</a>
            <a class="active" href="EventsDisplay.php" target=”_blank">Events</a>
            <a href="../../html/Booking.html">Booking</a>
            <a href="validate_clubmember.php">Club Members</a>

            <div class="right-nav"> 
                <a href="https://elearn.lau.edu.lb/ultra" target=”_blank”>Blackboard</a>
                <a href="https://myportal.lau.edu.lb/Pages/studentPortal.aspx" target=”_blank”>Portal</a>
                <a href="validate_signin.php" ><img src="../../assets/login-icon.png" class="dropbtn"></a>
            </div>
            
        </div>

    <br>

    <div class="center">

        Upcoming Events for the Academic Year of 2022
        
    </div>
    
    <div class="container">
        
        <div class="eventsCalendar">
            <div class="month">
                <p class="tooltip">&#9432;
                    <span class="tooltip-text">Hover over days to  view events that day.
                              <br>Press on the day you want to view.</span>
                </p>
                <i class="fas fa-angle-left prev"></i>
                
                <div class="date">
                    
                    <!--The JS methods will insert the date here-->
                    <h1></h1>
                    <p></p>
                </div>
                <i class="fas fa-angle-right next"></i>
            </div>

            <!--the 7 days of the week-->
            <div class="weekdays">
                
                <div>U</div><div>M</div><div>T</div><div>W</div><div>TR</div><div>F</div><div>S</div>
            </div>
            <div class="days" id="days" onClick="redirect(); return false;"></div>
        </div>
    </div>
   
    <!-- <script src="../../js/CalendarScript.js"></script> -->

    <script>
        const date = new Date();

//visualizing the calendar
const renderCal = () => {

   date.setDate(1);

  const monthDays = document.querySelector(".days");


    //to be able to display the previous month's days
    const prevLastDay = new Date(date.getFullYear(), date.getMonth(), 0).getDate();


  //this defines the ending date of each month + the previous and next day
  const lastDayOfMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();



  const firstDayAddress = date.getDay();

  const lastDayAddress = new Date(
    date.getFullYear(), date.getMonth() + 1, 0).getDay();

  const upcomingDays = 7 - lastDayAddress - 1;

  //array of 12 month
  const month = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];



  //display current month in h1
  //will be displayed dynamically
  document.querySelector(".date h1").innerHTML = month[date.getMonth()];

  //dsiplays current date
  document.querySelector(".date p").innerHTML = new Date().toDateString();

  console.log(month[date.getMonth()]);

  //press days to go to events
  
  let days = "";

  //this will display the previous days of the past month if needed on the calendar
  for (let z = firstDayAddress; z > 0; z--) {
    days += "<div id='daychosen' class='prev-date'>"+parseInt(prevLastDay - z + 1) + "</div>";
  }

  //prints out the days of the month (1 -> 31 or 30 or 28)
  for (let i = 1; i <= lastDayOfMonth; i++) {
    if (i === new Date().getDate() && date.getMonth() === new Date().getMonth()) {
      days += "<div id='daychosen' class='today'> "+ i + "</div>";
    }


    else {
      days += "<div id='daychosen'>"+ i + "</div>";
    }
  }

  if (upcomingDays > 0) {
    for (let j = 1; j <= upcomingDays; j++) {
      days += "<div id='daychosen' class='next-date'>"+ j +"</div>";
      monthDays.innerHTML = days;
    }
  } else {
    monthDays.innerHTML = days;
  }

};

function setCookie(c_name, value, exdays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
    document.cookie = c_name + "=" + c_value;
}

function selectday(e){
    if(e.target.getAttribute("id") == "daychosen"){

        var curday = e.target.innerHTML;
        var FIVE_DAYS = 60 * 60 * 24 * 5 ; // define constant
        var curmonth = document.querySelector(".date h1").innerHTML;

        setCookie("eventday", curday, FIVE_DAYS);
        setCookie("eventmonth", curmonth, FIVE_DAYS);

        
//         var curday = e.target.innerHTML;

//         var jsonObj = {
//        "curday" : curday,
//    };
//    var date = JSON.stringify(jsonObj); 

//         try
//    {
//       var asyncRequest = new XMLHttpRequest(); // create request
   
//       // set up callback function and store it
//       asyncRequest.addEventListener("readystatechange",
//          function() { 
//             if (asyncRequest.readyState === 4 && asyncRequest.status === 200)   console.log(asyncRequest.responseText); //alert(asyncRequest.responseText);
//             }, false);


//       // send the asynchronous request
//       asyncRequest.open( "POST", "http://127.0.0.1//project/php/backend/CalendarFilter.php", true ); 
//       asyncRequest.setRequestHeader("Content-Type", "application/json" ); 
//       asyncRequest.send(date); // send request        
//    } // end try
//    catch ( exception ) 
//    {
//       alert ( "Request Failed" );
//    } // end catch 
        
  window.location.href="EventsDisplay.php";

    }
}

document.addEventListener("click", selectday, false);

//prev month
document.querySelector(".prev").addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  renderCal();
});

//next month // added plus 1 to reach correct date
document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCal();
});

renderCal();
    </script>

</body>

</html>