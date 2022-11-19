//function to create a new object if the admin chooses to quick add an event
window.addEventListener("load", start, false);

var events_list;
var i = 0;

function start(){
    var addEvent = document.getElementById("addnew");
    events_list = document.getElementById("list_events");
    addEvent.addEventListener("click", createEvent, false);
    document.addEventListener("click", deleteEvent, false);
    var delEvent = document.getElementById("deleteBtn");
    delEvent.addEventListener("click", deleteEvent, false);
}

function createEvent(event) {
        event.preventDefault();

        var n = document.getElementById("add_name").value;
        var d = document.getElementById("add_date").value;
        var t = document.getElementById("add_time").value;
        var org = document.getElementById("add_org").value;
        var time_date = t + " " + d;
        console.log(time_date);

        var new_event = document.createElement("div");
        new_event.setAttribute("id", "neweventid"+n);
        new_event.innerHTML = "Name of the event: " + n + "<br>" + "Date and Time: " + time_date + "<br> Organizers: " + org + "<br>" + "-----------------------------------<br>";
        events_list.appendChild(new_event);
        i += 1;
}

function deleteEvent(e){
    e.preventDefault();
    var deln = document.getElementById("delete_name").value;
    var del_element = document.getElementById("neweventid"+deln);
    if(del_element!=null){
        del_element.remove();
    }
}

window.onload = function barGraph() {
    var bar_graph = new CanvasJS.Chart("chartDrawing", {
        animationEnabled: true,

        title: {
            text: "Number of Events Per Month"
        },
        axisX: {
            interval: 1
        },
        axisY: {
            title: "Events",
            gridColor: "#173042"

        },
        data: [{

            type: "bar",
            name: "events",
            color: "#1d976c",
            dataPoints: [
                { y: 4, label: "Jan" },
                { y: 6, label: "Feb" },
                { y: 8, label: "Mar" },
                { y: 12, label: "Apr" },
                { y: 7, label: "May" },
                { y: 7, label: "Jun" },
                { y: 11, label: "Jul" },
                { y: 16, label: "Aug" },
                { y: 7, label: "Sep" },
                { y: 7, label: "Oct" },
                { y: 15, label: "Nov" },
                { y: 32, label: "Dec" }
            ]
        }]
    });
    bar_graph.render();

}

window.addEventListener("load", function bar_graph_class() {
    var bar_graph_class = new CanvasJS.Chart("chartDrawingClass", {
        animationEnabled: true,

        title: {
            text: "Number of Classes Per Building"
        },
        axisX: {
            interval: 1
        },
        axisY: {
            title: "Rooms per Building",
            gridColor: "#173042"

        },
        data: [{

            type: "bar",
            name: "rooms",
            color: "#1d976c",
            dataPoints: [
                { y: 14, label: "Aksob" },
                { y: 6, label: "Gezairi" },
                { y: 8, label: "Nicol" },
                { y: 12, label: "Orme-Gray" },
                { y: 7, label: "Safadi" },
                { y: 1, label: "Sage" },
                { y: 31, label: "Shanon" },

            ]
        }]
    });
    bar_graph_class.render();

});