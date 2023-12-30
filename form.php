<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 

    <style>
table, th, td {
  border:1px solid;
  border-collapse: collapse;
  padding:5px;
}
</style>
</body>

  <form name='myform' method='POST' >
    <br>
    <br>
    <br>
    <br>
    <center>
<table >
    <tr>
        <td>Event Type</td>
        <td><input type='text' name='etype'></td>
    </tr>
    <tr>
        <td>Event Name</td>
        <td><input type='text' name='ename'></td>
    </tr>
    <tr>
        <td>About the Event</td>
        <td><textarea name='event'></textarea></td>
    </tr>
    <tr>
        <td>Department</td>
        <td><input type='text' name='dep'></td>
    </tr>
    <tr>
        <td>Faculty Name</td>
        <td><input type='text' name='fname'></td>
    </tr>
   
    <tr>
        <td>Select Hall</td>
        <td><select id="hall" name="hall">
                    <option value="UV">U.V Hall</option>
                    <option value="RJ">Ramanujam Hall</option>
                    <option value="PG">PG Seminar Hall</option>
                    <option value="SJ">Silver Jubliee Hall</option>
            </select>
</td>
    </tr>

    

    <tr>
        <td>Event Date</td>
        <td><input type="date" name="edate" required></td>
    </tr>
    
    <tr>
        <td>From</td>
        <td><input type='time' name='stime'></td>
    </tr>
    <tr>
        <td>To</td>
        <td><input type='time' name='etime'></td>
    </tr>
    <tr>
        <td></td>
        <td><input type='reset' name='reset'> &nbsp <input type='submit' value='submit' name='submit'></td>
    </tr>
</table>
</center>
  </form>
  </html>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventmanagement";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{ echo "";}

if(isset($_POST['submit'])){
   

    $etype = $_POST['etype'];
    $ename = $_POST['ename'];
    $abt = $_POST['event'];
   $dep = $_POST['dep'];
    $fname = $_POST['fname'];
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

         echo "This hall is already booked for the specified date and time. Please choose a different date or time.<br>";
 
     }

     else{
        $sqlInsert = "INSERT INTO booking (etype,ename,about,dep,fname,hall,sdate,stime,etime) VALUES ('$etype','$ename','$abt','$dep','$fname','$hall','$edate','$stime','$etime')";

        if ($conn->query($sqlInsert) === TRUE) {
            echo "Record inserted successfully<br>";
                } else {
                    echo "Error inserting record: " . $conn->error . "<br>";
                }
    }
  //  echo "Hello";
}
    else{
        $sqlInsert = "INSERT INTO booking (etype,ename,about,dep,fname,hall,sdate,stime,etime) VALUES ('$etype','$ename','$abt','$dep','$fname','$hall','$edate','$stime','$etime')";

        if ($conn->query($sqlInsert) === TRUE) {
            echo "Record inserted successfully<br>";
                } else {
                    echo "Error inserting record: " . $conn->error . "<br>";
                }
    }

}
$conn->close();




//     $sqlCheckDuplicate = "SELECT COUNT(*) as count FROM booking  WHERE hall = '$hall'  AND sdate = '$edate' AND stime >= '$stime' AND etime >= '$etime'";
//     $result1 = $conn->query($sqlCheckDuplicate);



//     $sqlCheckDuplicate2 = "SELECT COUNT(*) as count FROM booking  WHERE hall = '$hall'  AND sdate = '$edate' AND stime <= '$stime' AND etime <= '$etime'";
//     $result2 = $conn->query($sqlCheckDuplicate2);

//     $sqlCheckDuplicate3 = "SELECT COUNT(*) as count FROM booking  WHERE hall = '$hall'  AND sdate = '$edate' AND stime >= '$stime' AND etime <= '$etime'";
//     $result3 = $conn->query($sqlCheckDuplicate3);

//     $sqlCheckDuplicate4 = "SELECT COUNT(*) as count FROM booking  WHERE hall = '$hall'  AND sdate = '$edate' AND stime <= '$stime' AND etime >= '$etime'";
//     $result4 = $conn->query($sqlCheckDuplicate4);

// if($result1 || $result2 || $result3 || $result4){
//     $row = $result1->fetch_assoc();
//      $count1 = $row['count'];

//      $row2 = $result2->fetch_assoc();
//      $count2 = $row2['count'];


//      $row3 = $result3->fetch_assoc();
//      $count3 = $row3['count'];

//      $row4  = $result4->fetch_assoc();
//      $count4 = $row4['count'];
//      //echo $count;
//      if ($count1  > 0 || $count2 > 0 || $count3 > 0 || $count4 >0) {

//          // Duplicate entry
//          echo $count1;
//          echo $count2;
//          echo $count3;
//          echo $count4;
//          echo "This hall is already booked for the specified date and time. Please choose a different date or time.<br>";
//      }

?>


