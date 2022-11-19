var name = "NAME";

window.addEventListener("load", start, false);

/* This will be used to dynamically display the user's name after Login */

function start(){
    var welcomeh1 = document.getElementById("welcome");
    if(welcomeh1!=null){
        welcomeh1.innerHTML = "Welcome" + "!";
    }

    document.addEventListener("click", removeBooking, false);
}

/* Canceling the booking */

function removeBooking(e){
    if(e.target.getAttribute("id") == "cancelbut"){
        if(confirm("Are you sure you want to cancel this booking? This action can't be undone")){
            e.target.parentNode.parentNode.remove();
        }
    }
}