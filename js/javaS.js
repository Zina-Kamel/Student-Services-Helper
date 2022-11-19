const date = new Date();

//visualizing the calendar
const renderCal = () => {
   date.setDate(1);

  const monthDays = document.querySelector(".days");

  //this defines the ending date of each month + the previous and next day
  const lastDayOfMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

  //to be able to display the previous month's days
  const prevLastDay = new Date(date.getFullYear(), date.getMonth(), 0).getDate();

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

  //press days to go to events
  
  let days = "";

  //this will display the previous days of the past month if needed on the calendar
  for (let z = firstDayAddress; z > 0; z--) {
    days += `<div class="prev-date">${prevLastDay - z + 1}</div>`;
  }

  //prints out the days of the month (1 -> 31 or 30 or 28)
  for (let i = 1; i <= lastDayOfMonth; i++) {
    if (i === new Date().getDate() && date.getMonth() === new Date().getMonth()) {
      days += `<div class="today">${i}</div>`;
    }


    else {
      days += `<div>${i}</div>`;
    }
  }

  if (upcomingDays > 0) {
    for (let j = 1; j <= upcomingDays; j++) {
      days += `<div class="next-date">${j}</div>`;
      monthDays.innerHTML = days;
    }
  } else {
    monthDays.innerHTML = days;
  }

};

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

