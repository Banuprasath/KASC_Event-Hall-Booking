const menuIcon = document.querySelector('#menu-icon');
const sideBar = document.querySelector(".side-bar");

menuIcon.addEventListener('click', () => {
    menuIcon.classList.toggle("fa-xmark");
    sideBar.classList.toggle("active");
});

function validateForm() {


    var user = document.myform.sname.value;
    var reg = document.myform.sregno.value;
    var capt = document.myform.cp.value;
    var halls = document.myform.hall.value;
    var about = document.myform.abt.value;

    // validation for image//
    var fileInput = document.getElementById('image');
    var file = fileInput.files[0];


    if (user === "") {
        alert("Enter the user name");
        return false;
    }
    if (user === "Null" || user === "null") {
        alert("Invalid User Name");
        alert("Enter a valid User Name");
        document.myform.sname.value = "";
        return false;
    }
    if (reg === "") {
        alert("Enter the Register Number");
        return false;
    }
    if (reg === "Null" || reg === "null") {
        alert("Invalid Reg No");
        alert("Re-enter a Valid Reg No");
        document.myform.sregno.value = "";
        return false;
    }
    if (capt === "") {
        alert("Enter the Caption");
        return false;
    }
    if (capt === "Null" || capt === "null") {
        alert("Invalid Caption");
        alert("Re-enter the Captiom");
        document.myform.cp.value = "";
        return false;
    }
    if (halls === "") {
        alert("Select the Respective Hall");
        return false;
    }
    if (about === "") {
        alert("Enter abut the issues");
        return false;
    }
    if (about === "Null" || about === "null") {
        alert("Invalid Details");
        alert("Re-enter the Details");
        document.myform.abt.value = "";
        return false;
    }
    if (file) {
        // Check if the file type is allowed (you can adjust this list)
        var allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (allowedTypes.indexOf(file.type) === -1) {
            alert('Invalid file type. Please choose a valid image file.');
            fileInput.value = null;
            return false;
        }

        // Check if the file size is within limits (adjust as needed)
        var maxSizeInBytes = 5 * 1024 * 1024; // 5MB
        if (file.size > maxSizeInBytes) {
            alert('File size exceeds the allowed limit. Please choose a smaller file.');
            fileInput.value = null;
            return false;
        }

        // If all validations pass, you can submit the form or perform other actions
    } else {
        // No file selected
        alert('Please select a file.');
        return false;
    }

    alert("Complaint Registered");
    return true;
}