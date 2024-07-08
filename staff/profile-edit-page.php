<?php
include 'conn.php';

 if(isset($_GET['id'])){
  $sid=$_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-b4gt3JR1PzfTjAOFz8LmJsU8U+U0OOJ3fVKvLT8QC4pU6P1aAAws3aP6FSSxUjDO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a364e8076a.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="profile-edit-page.css">
</head>

<body>
    <section>
        <div class="complaint">

            <div>
                <h1 class="complaint_form_heading">Profile Editing</h1>
            </div>

            <div class="complaint_form">
                <form name='myform' method='post' enctype='multipart/form-data' onsubmit="return validateForm()">
                    <table>
                        <tr>
                            <td><label for='sname'>Name:</label></td>
                            <td><input type='text' name='sname' id='sname' autofocus require></td>
                        </tr>
                        <tr>
                            <td><label for='smail'>E-mail</label></td>
                            <td><input type='email' name='smail' id='smail' autofocus require></td>
                        </tr>
                        <tr>
                            <td><label for='uname'>Username:</label></td>
                            <td><input type='text' name='uname' id='uname' autofocus require></td>
                        </tr>
                        <tr>
                            <td><label for='pass'>Password:</label></td>
                            <td><input type='password' name='pass' id='pass' autofocus require></td>
                        </tr>
                        <tr>
                            <td><label for='sno'>Register-ID:</label></td>
                            <td><input type="text" name='sno' id='sno' autofocus require></td>
                        </tr>
                        <tr>
                            <td><label for='dep'>Department:</label></td>
                            <td>
                                <select id='dep' name='dept' autofocus require>
                                    <option value=''></option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="English">English</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="PG Computer Science">PG Computer Science</option>
                                    <option value="UG Computer Science">PG Computer Science</option>
                                    <option value="Computer Applications">Computer Applications</option>
                                    <option value="Computer Science & Applications">Computer Science & Applications</option>
                                    <option value="Computer Technology and Information Technology">Computer Technology and Information Technology</option>
                                    <option value="Mathematics">Mathematics</option>
                                    <option value="Costume Design and Fashion">Costume Design and Fashion</option>
                                    <option value="Biochemistry">Biochemistry</option>
                                    <option value="Biotechnology">Biotechnology</option>
                                    <option value="Catering Science & Hotel Management">Catering Science & Hotel Management</option>
                                    <option value="Physics">Physics</option>
                                    <option value="Psychology">Psychology</option>
                                    <option value="Management Science PG">Management Science PG</option>
                                    <option value="Business Administration">Business Administration</option>
                                    <option value="Business Administration (CA)">Business Administration (CA)</option>
                                    <option value="Commerce & Banking and Insurance">Commerce & Banking and Insurance</option>
                                    <option value="Commerce CA">Commerce CA</option>
                                    <option value="Controller of Examinations">Controller of Examinations</option>
                                    <option value="Exam Section">Exam Section</option>
                                    <option value="Library">Library</option>
                                    <option value="Physical Education">Physical Education</option>
                                    <option value="Supporting Staff">Supporting Staff</option>
                                </select>
                            </td>
                        </tr>

                        
                        <tr>
                            <td><input type='reset' name='reset' value='Reset'></td>
                            <td><input type='submit' name='submit' value='Submit'></td>
                            
                        </tr>
                        <tr>
                        <td><button><a href="spersonal.php">
                        <i class="des fa-solid fa-arrow-left" style="color: #fff;"></i>
                        </a><button></td>
                        </tr>
                    </table>
                </form>
            </div>

    </section>
</body>

</html>
<?php

if(isset($_POST['submit'])){
    $sname=$_POST['sname'];
    $dep=$_POST['dept'];
    $reg=$_POST['sno'];
    $em=$_POST['smail'];
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];


    $sqlInsert = "UPDATE staff 
    SET sname = '$sname', dep = '$dep', sno = '$reg', smail = '$em', uname = '$uname', pass = '$pass' 
    WHERE sid = '$sid';
    ";

    if ($conn->query($sqlInsert) === TRUE)
            {
         echo "<script> alert('Record updated successfully');</script><br>";
         echo '<script> window.location.href = "http://localhost/fp/staff/sadmin.php";</script>';
        //header('Location: sadmin.php');    
        } else {
                echo "Error inserting record: " . $conn->error . "<br>";
            }


            //header('Location: sadmin.php');

}
//0.}
?>