// animating the sections

function animate() {
  var animation = document.querySelectorAll(".animate-up"); // getting all the animated elements

  for (var i = 0; i < animation.length; i++) { //triggering the animation only when the element comes into view
    var windowHeight = window.innerHeight; // height of the viewport
    var elementTop = animation[i].getBoundingClientRect().top; // distance from the top of the viewport 
    var elementShown = 150;

    if (elementTop < windowHeight - elementShown) {
      animation[i].classList.add("active");
    } else {
      animation[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", animate);

let stu_count=setInterval(student_increment_count);
let maximum=0;
function student_increment_count(){
    var counts_students= document.getElementById("student-counter");
    counts_students.innerHTML=++maximum;
    if(maximum===1000)
    {
        clearInterval(stu_count);
    }
}

let classrooms_count=setInterval(class_increment_count);
let maximum_class=0;
function class_increment_count(){
    var counts_class= document.getElementById("class-counter");
    counts_class.innerHTML=++maximum_class;
    if(maximum_class===1000)
    {
        clearInterval(classrooms_count);
    }
}