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

// let stu_count=setInterval(student_increment_count);
// let maximum=0;
// function student_increment_count(){
//     var counts_students= document.getElementById("student-counter");
//     if(counts_students!=null){
//       counts_students.innerHTML=++maximum;
//     }
    
//     if(maximum===39)
//     {
//         clearInterval(stu_count);
//     }
// }

let classrooms_count=setInterval(class_increment_count);
let maximum_class=0;
function class_increment_count(){
    var counts_class= document.getElementById("class-counter");
    if(counts_class!=null){
      counts_class.innerHTML=++maximum_class;
    }
    
    if(maximum_class===15)
    {
        clearInterval(classrooms_count);
    }
}

// let class_shared_count=setInterval(shared_increment_count);
// let maximum_class_shared=0;
// function shared_increment_count(){
//     var counts_shared_class= document.getElementById("class-shared-counter");
//     if(counts_shared_class!=null){
//       counts_shared_class.innerHTML=++maximum_class_shared;
//     }
//     if(maximum_class_shared===15)
//     {
//         clearInterval(class_shared_count);
//     }
// }

// Contact Us form Submission

// window.addEventListener("load", start, false);

// function start(){
//   var submitButton = document.getElementById("submitButton");
//   if(submitButton!=null){
//     submitButton.addEventListener("click", submit);
//   }
// }

// function submit(){
//     if(confirm("Thank you for contacting us! We will get back to you as soon as possible")){
//       location.href="../html/Profile.html";
//     }

}
