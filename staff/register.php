<!-- PHP -->
<?php
include 'conn.php';
if(isset($_POST['submit'])){
    $sname=$_POST['sname'];
    $dep=$_POST['dept'];
    $reg=$_POST['reg'];
    $em=$_POST['email'];
    $uname=$_POST['username'];
    $pass=$_POST['password'];


    $sqlInsert = "INSERT INTO staff (sname,dep,sno,smail,uname,pass) VALUES ('$sname','$dep','$reg','$em','$uname','$pass')";

    if ($conn->query($sqlInsert) === TRUE)
            {
            echo "<script> alert('Record inserted successfully');</script><br>";
            } else {
                echo "Error inserting record: " . $conn->error . "<br>";
            }


            header('Location: newlogin.php');

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css" />

    <title>Your Form</title>
    <style>
        *{
            color: #fff;
        }

    </style>
</head>

<body>
    <div class="form-cont">
        <h1 class="heading">registration</h1>
        <form method="post" action="">
            <label for="staffName">Staff Name:</label>
            <input type="text" name="sname" >

            <label for="depart">Department:</label>
            <select id="dep" name="dept" onblur="validateDepartment()" class="select-dep">
                                    <option value=''></option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="English">English</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="PG Computer Science">PG Computer Science</option>
                                    <option value="UG Computer Science">PG Computer Science</option>
                                    <option value="Computer Applications">Computer Applications</option>
                                    <option value="Computer Science & Applications">Computer Science & Applications
                                    </option>
                                    <option value="Computer Technology and Information Technology">Computer Technology
                                        and Information Technology</option>
                                    <option value="Mathematics">Mathematics</option>
                                    <option value="Costume Design and Fashion">Costume Design and Fashion</option>
                                    <option value="Biochemistry">Biochemistry</option>
                                    <option value="Biotechnology">Biotechnology</option>
                                    <option value="Catering Science & Hotel Management">Catering Science & Hotel
                                        Management</option>
                                    <option value="Physics">Physics</option>
                                    <option value="Psychology">Psychology</option>
                                    <option value="Management Science PG">Management Science PG</option>
                                    <option value="Business Administration">Business Administration</option>
                                    <option value="Business Administration (CA)">Business Administration (CA)</option>
                                    <option value="Commerce & Banking and Insurance">Commerce & Banking and Insurance
                                    </option>
                                    <option value="Commerce CA">Commerce CA</option>
                                    <option value="Controller of Examinations">Controller of Examinations</option>
                                    <option value="Exam Section">Exam Section</option>
                                    <option value="Library">Library</option>
                                    <option value="Physical Education">Physical Education</option>
                                    <option value="Supporting Staff">Supporting Staff</option>
                                </select>

            <label for="no">Staff Reg No:</label>
            <input type="text" name="reg" >

            <label for="email">Email:</label>
            <input type="email" name="email" >

            <label for="username">Username:</label>
            <input type="text" name="username" >

            <label for="password">Password:</label>
            <input type="password" name="password" >

            <button type="submit" name='submit'>Register</button>
            <button type="reset" class="reset-button">Reset</button>
        </form>
    </div>
</body>

</html>

<script>

document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent form submission

        // Clear existing error messages
        clearErrorMessages();

        // Validate form inputs
        var sname = document.querySelector('input[name="sname"]').value.trim();
        var dept = document.getElementById('dep').value.trim();
        var reg = document.querySelector('input[name="reg"]').value.trim();
        var email = document.querySelector('input[name="email"]').value.trim();
        var username = document.querySelector('input[name="username"]').value.trim();
        var password = document.querySelector('input[name="password"]').value.trim();

        if (sname === '') {
            displayErrorMessage('Please enter your name.', 'sname');
            return false;
        }

        if (dept === '') {
            displayErrorMessage('Please select a department.', 'dep');
            return false;
        }

        if (reg === '') {
            displayErrorMessage('Please enter your registration number.', 'reg');
            return false;
        }

        if (email === '') {
            displayErrorMessage('Please enter your email address.', 'email');
            return false;
        } else if (!isValidEmail(email)) {
            displayErrorMessage('Please enter a valid email address.', 'email');
            return false;
        }

        if (username === '') {
            displayErrorMessage('Please enter a username.', 'username');
            return false;
        }

        if (password === '') {
            displayErrorMessage('Please enter a password.', 'password');
            return false;
        }

        // If all validations pass, submit the form
        form.submit();
    });

    function displayErrorMessage(message, inputName) {
        var inputField = document.querySelector('input[name="' + inputName + '"]');
        var errorMessage = document.createElement('span');
        errorMessage.className = 'error-message';
        errorMessage.textContent = message;
        inputField.parentNode.appendChild(errorMessage);
    }

    function clearErrorMessages() {
        var errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(function (errorMessage) {
            errorMessage.parentNode.removeChild(errorMessage);
        });
    }

    function isValidEmail(email) {
        // Basic email validation
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }
});


</script>
<!-- <script>
// Validate staff name
function validateStaffName() {
    var staffName = document.getElementsByName('sname')[0].value;
    if (staffName.trim() === '') {
        alert('Please enter your staff name.');
        return false;
    }
    return true;
}

// Validate department selection
function validateDepartment() {
    var department = document.getElementById('dep').value;
    if (department.trim() === '') {
        alert('Please select a department.');
        return false;
    }
    return true;
}

// Validate staff registration number
function validateRegNo() {
    var regNo = document.getElementsByName('reg')[0].value;
    if (regNo.trim() === '') {
        alert('Please enter your registration number.');
        return false;
    }
    return true;
}

// Validate email
function validateEmail() {
    var email = document.getElementsByName('email')[0].value;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert('Please enter a valid email address.');
        return false;
    }
    return true;
}

// Validate username
function validateUsername() {
    var username = document.getElementsByName('username')[0].value;
    if (username.trim() === '') {
        alert('Please enter your username.');
        return false;
    }
    return true;
}

// Validate password
function validatePassword() {
    var password = document.getElementsByName('password')[0].value;
    if (password.trim() === '') {
        alert('Please enter your password.');
        return false;
    }
    return true;
}

// Initialize form validation on submit
document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent form submission

        var isStaffNameValid = validateStaffName();
        var isDepartmentValid = validateDepartment();
        var isRegNoValid = validateRegNo();
        var isEmailValid = validateEmail();
        var isUsernameValid = validateUsername();
        var isPasswordValid = validatePassword();

        if (isStaffNameValid && isDepartmentValid && isRegNoValid && isEmailValid && isUsernameValid && isPasswordValid) {
            form.submit(); // Submit the form
        }
    });
});





</script> -->