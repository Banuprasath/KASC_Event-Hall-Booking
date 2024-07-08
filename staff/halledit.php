<?php
session_start();
if(isset($_SESSION['login'] ) and isset($_SESSION['sname']) ){
   
    $sname=$_SESSION['sname'];
    $sno=$_SESSION['sno'];
    //echo $_SESSION['login'];
    //echo $_SESSION['sno'];
?>

<!--------------------------------------------------------------- Kabilan code  ------------------------------------------------------------------->
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
    <link rel="stylesheet" href="../kabilan/css/hallbookingform.css">
    <script src="../kabilan/js/hallbookingform.js"></script>
</head>

<body>
    <div>
        <header class="header">
            <h1><a href="#" class="blog">KASC</a></h1>
            <i class="des-menu fa-solid fa-bars " style="color: #fff;" id="menu-icon"></i>
            <!--fa-fade-->
        </header>
        <div class="side-bar">
            <nav>
                <ul>
                    <li><a href="http://www.kasc.ac.in/" class="logo" target="_self">
                            <img src="https://www.naukrimessenger.com/wp-content/uploads/2021/08/kasc.jpg" alt="">
                            <span class=" des nav-items">KASC</span>
                        </a></li>
                    <li><a href="#" target="_self">
                            <i class="des fa-solid fa-house" style="color: #fff;"></i>
                            <!--fa-beat-fade-->
                            <span class="nav-items">HOME</span>
                        </a></li>
                    <li><a href="spersonal.php" target="_self">
                            <i class="des fa-solid fa-user" style="color: #fff;"></i>
                            <span class="nav-items">PERSONAL</span>
                        </a></li>
                    <li><a href="sadmin.php" target="_self">
                            <i class="des fa-solid fa-chalkboard" style="color: #fff;"></i>
                            <!--fa-beat-fade-->
                            <span class="nav-items">BOOK HALL</span>
                        </a></li>
                    <li><a href="view.php" target="_self">
                            <i class="des fa-regular fa-calendar-check " style="color: #fff;"></i>
                            <!--fa-beat-fade-->
                            <span class="nav-items">MY BOOKINGS</span>
                        </a></li>
                    <li><a href="complaint-form.php" target="_self">
                            <i class="des fa-regular fa-file" style="color: #fff;"></i>
                            <!--fa-beat-fade-->
                            <span class="nav-items">RISE COMPLAINTS</span>
                        </a></li>
                    <li><a href="complaint.php" target="_self">
                            <i class="des fa-solid fa-clipboard-question" style="color: #fff;"></i>
                            <!--fa-beat-fade-->
                            <span class="nav-items">MY COMPLAINTS</span>
                        </a></li>
                    <li><a href="logout.php" class="logout" target="_self">
                            <i class="des fa-solid fa-arrow-right-from-bracket" style="color: #fff;"></i>
                            <!--fa-beat-fade-->
                            <span class="nav-items">LOGOUT</span>
                        </a></li>
                </ul>
            </nav>
        </div>


        <div class="booking">
            <div>
                <h1 class="Booking_form_heading">Event Hall Booking</h1>
            </div>
            <div class="booking_form">
                <form name='myform' method='POST' enctype='multipart/form-data' onsubmit="return validateForm()">
                    <table class="table">
                        <tr>
                            <td><label for="dep">Department</label></td>
                            <td>
                                <select id="dep" name="dep">
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
                            </td>
                        </tr>
                        <tr>
                            <td><label for='etype'>Event Type</label></td>
                            <td><input type='text' name='etype' id="etype"></td>
                        </tr>
                        <tr>
                            <td><label for='ename'>Event Name</label></td>
                            <td><input type='text' name='ename' id="ename"></td>
                        </tr>
                        <tr>
                            <td><label for='event'>About Event</label></td>
                            <td><textarea type='text' name='event' id="event"></textarea></td>
                        </tr>

                        <!-- <tr>
                            <td><label for='fname'>Faculty Name</label></td>
                            <td><input type='text' name='fname' id="fname"></td>
                        </tr> -->
                        <tr>
                            <td><label for='hall'>Select Hall</label></td>
                            <td>
                                <select id="hall" name="hall" class="form-select">
                                    <option value=''></option>
                                    <option value="UV">U.V Hall</option>
                                    <option value="RJ">Ramanujam Hall</option>
                                    <option value="PG">PG Seminar Hall</option>
                                    <option value="SJ">Silver Jubliee Hall</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for='edate'>Event Date</label></td>
                            <td><input type="date" name="edate" id="edate"></td>
                        </tr>
                        <tr>
                            <td><label for='stime'>From</label></td>
                            <td><input type='time' name='stime' id="stime" required ></td>
                        </tr>
                        <tr>
                            <td><label for='etime'>To</label></td>
                            <td><input type='time' name='etime' id="etime" required></td>
                        </tr>
                        <tr>
                            <td><input type='reset' name='reset' value='Reset'></td>
                            <td><input type='submit' name='submit' value='Submit' required></td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>
    </div>


</body>

</html>


<!--------------------------------------------------------------- Kabilan code  ------------------------------------------------------------------->



  <script>
  function timecheck(){
  const timeInput = document.querySelector('input[type="time"]');
const time = timeInput.value;

// Split the time into hours and minutes
const [hours, minutes] = time.split(':');

// Convert the hours to a number
const hourNumber = parseInt(hours);

// If the hour is less than 9, show an error message
if (hourNumber < 9) {
  timeInput.setCustomValidity('Please select a time after 9 AM');
} else {
  // The time is valid, so remove the error message
  timeInput.setCustomValidity('');
}
}</script>


<?php

include 'conn.php';

if(isset($_POST['submit'])){
   

    $etype = $_POST['etype'];
    $ename = $_POST['ename'];
    $abt = $_POST['event'];
   $dep = $_POST['dep'];
    $fname = $sname;
    $hall = $_POST['hall'];
    $edate = $_POST['edate'];
   $stime = $_POST['stime'];
    $etime = $_POST['etime'];



// DONT TOUCH THIS
function convertTo12HourFormat($inputTime) {
    
    $dateTime = new DateTime($inputTime);
    $formattedTime = $dateTime->format('h:i A');

    return $formattedTime;
}


$inputTime1 = $stime;
$inputTime2 = $etime;
$stime12 = convertTo12HourFormat($inputTime1);
$etime12= convertTo12HourFormat($inputTime2);


// DONT TOUCH THIS


    ?>
    <?php
// my start time = 9:30 ---  my end time 2:30
    $sqlCheckDuplicate = "SELECT COUNT(*) as count FROM booking  WHERE hall = '$hall'  AND sdate = '$edate'  AND '$stime' BETWEEN stime AND etime ";
    $result1 = $conn->query($sqlCheckDuplicate);



    $sqlCheckDuplicate2 = "SELECT COUNT(*) as count FROM booking  WHERE hall = '$hall'  AND sdate = '$edate'  AND '$etime' BETWEEN stime AND etime ";
    $result2 = $conn->query($sqlCheckDuplicate2);


    $sqlCheckDuplicate3 = "SELECT COUNT(*) as count FROM booking  WHERE hall = '$hall'  AND sdate = '$edate' AND stime >= '$stime' AND etime <= '$etime'";
    $result3 = $conn->query($sqlCheckDuplicate3);


if($result1){
    $row = $result1->fetch_assoc();
     $count1 = $row['count'];
    

      $row2 = $result2->fetch_assoc();
      $count2 = $row2['count'];


      $row3 = $result3->fetch_assoc();
      $count3 = $row3['count'];

    //  $row4  = $result4->fetch_assoc();
    //  $count4 = $row4['count'];
     //echo $count;
     if ($count1  > 0 || $count2 > 0 || $count3 > 0) {

         // Duplicate entry
        // echo $count1;
        // echo $count2;
        // echo $count3;

         echo "<script> alert('This hall is already booked for the specified date and time. Please choose a different date or time');</script>.<br>";
 
     }

     else{
        $sqlInsert = "INSERT INTO booking (etype,ename,about,dep,fname,sno,hall,sdate,stime,etime) VALUES ('$etype','$ename','$abt','$dep','$fname','$sno','$hall','$edate','$stime','$etime')";

        if ($conn->query($sqlInsert) === TRUE) {
            echo "<script> alert('Hall Booked successfully');<br></script>";
                } else {
                    echo "Error inserting record: " . $conn->error . "<br>";
                }
    }
  //  echo "Hello";
}
    else{
        $sqlInsert = "INSERT INTO booking (etype,ename,about,dep,fname,hall,sdate,stime,etime) VALUES ('$etype','$ename','$abt','$dep','$fname','$hall','$edate','$stime','$etime')";

        if ($conn->query($sqlInsert) === TRUE) {
            echo "<script> alert('Record inserted successfully');</script><br>";
            header('Location: view.php');
                } else {
                    echo "Error inserting record: " . $conn->error . "<br>";
                }
    }

}
$conn->close();
//session_destroy();

}
else{
    echo "You are not Verified Staff<br>";
    echo "Please login to view the details"."<a href='login.php'>Click here </a>";
}
?>

