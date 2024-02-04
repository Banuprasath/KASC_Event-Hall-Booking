<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css" />

    <title>Your Form</title>
</head>

<body>
    <div class="form-cont">
        <h1 class="heading">registration</h1>
        <form method="post" action="">
            <label for="staffName">Staff Name:</label>
            <input type="text" name="sname" required>

            <label for="depart">Department:</label>
            <input type="text" name="dept" required>

            <label for="no">Staff Reg No:</label>
            <input type="text" name="reg" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit" name='submit'>Register</button>
            <button type="reset" class="reset-button">Reset</button>
        </form>
    </div>
</body>

</html>




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


            header('Location: login.php');

}
?>
