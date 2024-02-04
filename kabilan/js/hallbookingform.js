const menuIcon = document.querySelector('#menu-icon');
const sideBar = document.querySelector(".side-bar");

menuIcon.addEventListener('click', () => {
    menuIcon.classList.toggle("fa-xmark");
    sideBar.classList.toggle("active");
});



function validateForm() {

    alert("HELLO");

    var dept = document.myform.dep.value;
    var name = document.myform.ename.value;
    var event = document.myform.event.value;
    var fname = document.myform.fname.value;
    var hall = document.myform.hall.value;
    var edate = document.myform.edate.value;
    var stime = document.myform.stime.value;
    var etime = document.myform.etime.value;


    if (dept === "") {
        alert("Select the Respective Department");
        return false;
    }
    if (name === "") {
        alert("Enter the Event Name");
        return false;
    }
    if (name === "null" || name === "Null") {
        alert("Invalid Details");
        alert("Re-enter the Event Name");
        document.myform.ename.value = "";
        return false;
    }
    if (event === "") {
        alert("Enter the Event Details");
        return false;
    }
    if (event === "null" || event === "Null") {
        alert("Invalid Details");
        alert("Re-enter the Event Details");
        document.myform.event.value = "";
        return false;
    }
    if (fname === "") {
        alert("Enter the Faculty Name");
        return false;
    }
    if (fname === "null" || fname === "Null") {
        alert("Invalid Details");
        alert("Re-enter the Faculty Name");
        document.myform.fname.value = "";
        return false;
    }
    if (hall === "") {
        alert("Select the Respective Hall");
        return false;
    }
    if (edate === "") {
        alert("Field in the Event Date");
        return false;
    }
    if (stime === "") {
        alert("INC the Start");
        return false;
    }
    if (etime === "") {
        alert("INC the End Time");
        return false;
    }



    alert("Booking Successful");
    return true;
}