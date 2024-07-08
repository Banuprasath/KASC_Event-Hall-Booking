<?php
session_start();


if(isset($_SESSION['val'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventmanagement";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{ echo "";}

function convertTo12HourFormat($inputTime) {
    
    $dateTime = new DateTime($inputTime);
    $formattedTime = $dateTime->format('h:i A');

    return $formattedTime;
}

?>

    <form name='myform' method='GET'>

 
    <table>
        <tr><td><input type='text' name='hall' placeholder='Hall' ></td>
        <td><input type='text' name='dep' placeholder='dep' ></td> 
        <td><input type='submit' name='submit'  ></td></tr>
        </table>
    
</form> 
<?php

echo "<table border='1px solid'>";
echo "<tr>";
echo "<th>even type</th>";
echo "<th>event name</th>";
echo "<th>About</th>";
echo "<th>Dep</th>";
echo "<th>Faculty Name</th>";
echo "<th>Hall</th>";
echo "<th>Date</th>";
echo "<th> Time </th>";
echo "<th colspan='2'> Action </th>";


if(!isset($_GET['submit']))
{
    $sql="select * from booking order by sdate DESC ";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){

                                echo "<tr>";
                                $id= $row['bkid'];
                            echo "<td>".$row['etype']."</td>";
                            echo "<td>".$row['ename']."</td>";
                            echo "<td>".$row['about']."</td>";
                            echo "<td>".$row['dep']."</td>";
                            echo "<td>".$row['fname']."</td>";
                            echo "<td>".$row['hall']."</td>";
                            echo "<td>".$row['sdate']."</td>";
                            $inputTime1 = $row['stime'];
                            $inputTime2 = $row['etime'];
                            $stime12 = convertTo12HourFormat($inputTime1);
                            $etime12= convertTo12HourFormat($inputTime2);
                            echo "<td>".$stime12." - ".$etime12."</td>";
                            echo "<td><a href='edit.php?id=$id' class='btn btn-success btn-sm'>Edit</td>";
                            echo "<td><a href='delete.php?id=$id' class='btn btn-success btn-sm'>Delete</td>";
                          //  echo "<td>".$etime12."</td>";

                            echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No data found</td></tr>";
}
}


if(isset($_GET['submit']))
{

    $hall = $_GET['hall'];
   // echo $hall;
    $dep = $_GET['dep'];
    $sql = "SELECT * FROM booking WHERE  hall  LIKE '%$hall%' AND dep LIKE '%$dep%' order by sdate DESC ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row=$result->fetch_assoc()){
                            $id= $row['bkid'];

                        echo "<tr>";

                        echo "<td>".$row['etype']."</td>";
                        echo "<td>".$row['ename']."</td>";
                        echo "<td>".$row['about']."</td>";
                        echo "<td>".$row['dep']."</td>";
                        echo "<td>".$row['fname']."</td>";
                        echo "<td>".$row['hall']."</td>";
                        echo "<td>".$row['sdate']."</td>";
                        $inputTime1 = $row['stime'];
                        $inputTime2 = $row['etime'];
                        $stime12 = convertTo12HourFormat($inputTime1);
                        $etime12= convertTo12HourFormat($inputTime2);
                        echo "<td>".$stime12." - ".$etime12."</td>";
                        echo "<td><a href='edit.php?id=$id' class='edit-button'>Edit</td>";
                        echo "<td><a href='delete.php?id=$id' class='delete-button'>Delete</td>";
                        }
       }
       else
    {
        ?>
        
        <style>
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
        </b>        </tr>
        <?php
    }

    }
    
}
else{
    echo "";
}