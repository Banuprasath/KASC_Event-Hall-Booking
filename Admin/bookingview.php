<?php
include 'conn.php';
session_start();
function convertTo12HourFormat($inputTime) {
    
    $dateTime = new DateTime($inputTime);
    $formattedTime = $dateTime->format('h:i A');

    return $formattedTime;
}

?>


<!-- KABILAN CODE -->

<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://kit.fontawesome.com/a364e8076a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="AdminEventView.css">
    <title>ADMIN BOOKINGS VIEW</title>
    <style>

    </style>

</head>
<?php
if (isset($_SESSION['login'])){

                
    
    $shall = $_SESSION['sno'];


include 'navbar.php';
?>
<body>

    <div class="event">
        <div>
            <h1 class="event_form_heading">Events Booked</h1>
        </div>
        <div class="event-view">
            <form method='post'>
                <table>
                    <tr>
                        <td><input type='text' name='hall' placeholder='Hall'></td>
                        <td><input type='text' name='dep' placeholder='dep'></td>
                        <td><input type='submit' name='submit'></td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="event_form">
            <div>
            <table>
<?php


            if(!isset($_POST['submit'])){

              


                echo "<tr>";
                echo "<th>Event Type</th>";
               // echo "<!--<th>Event Name</th>-->";
                echo "<th colspan='2'>About</th>";
                echo "<th>Dept</th>";
               // echo "<!--<th>Faculty Name</th>-->";
                echo "<th>Hall</th>";
                echo "<th colspan='2'>Date</th>";
                echo "<th colspan='2'>Time</th>";
                echo "<th colspan='2' class='tablehead'>Actions</th>";
                echo "</tr>";


                
    $sql="select * from booking WHERE hall = '$shall' order by sdate DESC ";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){

                                echo "<tr>";
                                $id= $row['bkid'];
                                echo '<tr class="td-value">';
                                echo '<td>'.$row['etype'].'</td>';
                                echo '<td colspan="2">'.$row['about'].'</td>';
                                echo '<td>'.$row['dep'].'</td>';
                                echo '<td>'.$row['hall'].'</td>';
                                echo '<td colspan="2">'.$row['sdate'].'</td>';
                                $inputTime1 = $row['stime'];
                                $inputTime2 = $row['etime'];
                                $stime12 = convertTo12HourFormat($inputTime1);
                                $etime12= convertTo12HourFormat($inputTime2);
                                echo '<td colspan="2">'.$stime12.' - '.$etime12.'</td>';
                                

                            
                            
                       echo " <td><button class='edit'><a href='bkeveview.php?id=$id' target='_self'>View</a></button></td>";
                    echo "<td><button class='delete'><a href='bkdelete.php?id=$id' >Delete</a></button></td>";
                            
                            
                           // echo "<td><a href='edit.php?id=$id' class='btn btn-success btn-sm'>Edit</td>";
                           // echo "<td><a href='delete.php?id=$id' class='btn btn-success btn-sm'>Delete</td>";
                          //  echo "<td>".$etime12."</td>";

                            echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No data found</td></tr>";
}
}

if(isset($_POST['submit']))
{
    echo "<tr>";
                echo "<th>Event Type</th>";
               // echo "<!--<th>Event Name</th>-->";
                echo "<th colspan='2'>About</th>";
                echo "<th>Dept</th>";
               // echo "<!--<th>Faculty Name</th>-->";
                echo "<th>Hall</th>";
                echo "<th colspan='2'>Date</th>";
                echo "<th colspan='2'>Time</th>";
                echo "<th colspan='2' class='tablehead'>Actions</th>";
                echo "</tr>";



    $hall = $_POST['hall'];
   // echo $hall;
    $dep = $_POST['dep'];
    $sql = "SELECT * FROM booking WHERE  hall  LIKE '%$hall%' AND dep LIKE '%$dep%' order by sdate DESC ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row=$result->fetch_assoc()){
                            $id= $row['bkid'];
                           
                            $id= $row['bkid'];
                            echo '<tr class="td-value">';
                            echo '<td>'.$row['etype'].'</td>';
                            echo '<td colspan="2">'.$row['about'].'</td>';
                            echo '<td>'.$row['dep'].'</td>';
                            echo '<td>'.$row['hall'].'</td>';
                            echo '<td colspan="2">'.$row['sdate'].'</td>';
                            $inputTime1 = $row['stime'];
                            $inputTime2 = $row['etime'];
                            $stime12 = convertTo12HourFormat($inputTime1);
                            $etime12= convertTo12HourFormat($inputTime2);
                            echo '<td colspan="2">'.$stime12.' - '.$etime12.'</td>';
                            

                        
                        
                   echo ' <td><button class="edit"><a href="edit.php?=$id" target="_blank">View</a></button></td>';
                    echo '<td><button class="delete"><a href="delete.php" target="_blank">Delete</a></button></td>';
                        
                        
                       // echo "<td><a href='edit.php?id=$id' class='btn btn-success btn-sm'>Edit</td>";
                       // echo "<td><a href='delete.php?id=$id' class='btn btn-success btn-sm'>Delete</td>";
                      //  echo "<td>".$etime12."</td>";

                        echo "</tr>";
                        }
       }
       else
    {
        echo '<tr class="td-value">';
        echo '<td colspan="8">No data Found</td>';
        echo '</tr>';
        ?>
        
        <!-- <style>
            #no{
                color:red;

                text-align: center;
                padding:30px;
            }

td{
    text-align:center;
    font-size:23px;
}
        </style>
            <tr id="no">
              <b>  <td colspan="7" >No Record Found</td>
        </b>        </tr> -->
        <?php
    }

    }
    

?>
















                
                    
                    
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
<!-- Kabilan Code -->


















































    
</form> 
<?php
if(isset($_SESSION['sno'])){

    $shall=$_SESSION['sno'];













}
}
else{
    echo "Please verify before Login";
}

    ?>
    



