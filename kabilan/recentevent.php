
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

function convertTo12HourFormat($inputTime) {
    
    $dateTime = new DateTime($inputTime);
    $formattedTime = $dateTime->format('h:i A');

    return $formattedTime;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/a364e8076a.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/recentevent.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script src="js/recentevent.js"></script>

</head>

<body>
    <div>
        <div class="nav-bars">
            <header class="header">
                <h1><a href="#" class="blog" target="_self">KASC</a></h1>
                <i class="des-menu fa-solid fa-bars" style="color: #fff;" id="menu-icon"></i>
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
                                <span class="nav-items">HOME</span>
                            </a></li>
                        <li><a href="personal.html" target="_self">
                                <i class="des fa-solid fa-user" style="color: #fff;"></i>
                                <span class="nav-items">PERSONAL</span>
                            </a></li>
                        <li><a href="hallbookingform.html" target="_self">
                                <i class="des fa-solid fa-chalkboard" style="color: #fff;"></i>
                                <span class="nav-items">HALL</span>
                            </a></li>
                        <li><a href="recentevent.html" target="_self">
                                <i class="des fa-regular fa-calendar-check" style="color: #fff;"></i>
                                <span class="nav-items">EVENTS</span>
                            </a></li>
                        <li><a href="hall_complaint_reg.html" target="_self">
                                <i class="des fa-regular fa-file" style="color: #fff;"></i>
                                <span class="nav-items">QUERY</span>
                            </a></li>
                        <li><a href="ComplaintTable.html" target="_self">
                                <i class="des fa-solid fa-clipboard-question" style="color: #fff;"></i>
                                <span class="nav-items">VIEW QUERIES</span>
                            </a></li>
                        <li><a href="#" class="logout" target="_self">
                                <i class="des fa-solid fa-arrow-right-from-bracket" style="color: #fff;"></i>
                                <span class="nav-items">LOGOUT</span>
                            </a></li>
                    </ul>
                </nav>

            </div>
        </div>



        <div class="event">
            <div>
                <h1 class="event_form_heading">Recent Events</h1>
            </div>
            <div class="event-view">
                <form method='GET'>
                    <table>
                        <tr>
                            <td><input type='text' name='hall' placeholder='Hall'></td>
                            <td><input type='text' name='dep' placeholder='dep'></td>
                            <td><input type='submit' name='submit' value='submit'></td>
                        </tr>
                    </table>
                </form>
            </div>


            <div class="event_form">
                <div>
                    <table>
                        <tr>
                            <th>Event Type</th>
                            <th>Event Name</th>
                            <th>About</th>
                            <th>Dept</th>
                            <th>Hall</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th colspan='2' class="tablehead">Actions</th>
                        </tr>
     <?php                  
if(!isset($_GET['submit']))
{
    $sql="select * from booking order by sdate DESC";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){

                                echo "<tr>";
                                $id= $row['bkid'];
                            echo "<td>".$row['etype']."</td>";
                            echo "<td>".$row['ename']."</td>";
                            echo "<td>".$row['about']."</td>";
                            echo "<td>".$row['dep']."</td>";
                           // echo "<td>".$row['fname']."</td>";
                            echo "<td>".$row['hall']."</td>";
                            echo "<td>".$row['sdate']."</td>";
                            $inputTime1 = $row['stime'];
                            $inputTime2 = $row['etime'];
                            $stime12 = convertTo12HourFormat($inputTime1);
                            $etime12= convertTo12HourFormat($inputTime2);
                            echo "<td>".$stime12." - ".$etime12."</td>";
                            echo " <td><button class='edit'>Edit</button></td>";
                            echo "   <td><button class='delete'><a href='delete.php' target='_blank'>Delete</a></button></td>";
                           
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
    $sql = "SELECT * FROM booking WHERE  hall  LIKE '%$hall%' AND dep LIKE '%$dep%' ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row=$result->fetch_assoc()){
                            $id= $row['bkid'];

                        echo "<tr>";

                        echo "<td>".$row['etype']."</td>";
                        echo "<td>".$row['ename']."</td>";
                        echo "<td>".$row['about']."</td>";
                        echo "<td>".$row['dep']."</td>";
                      //  echo "<td>".$row['fname']."</td>";
                        echo "<td>".$row['hall']."</td>";
                        echo "<td>".$row['sdate']."</td>";
                        $inputTime1 = $row['stime'];
                        $inputTime2 = $row['etime'];
                        $stime12 = convertTo12HourFormat($inputTime1);
                        $etime12= convertTo12HourFormat($inputTime2);
                        echo "<td>".$stime12." - ".$etime12."</td>";
                        echo " <td><button class='edit'>Edit</button></td>";
                         echo "   <td><button class='delete'><a href='delete.php' target='_blank'>Delete</a></button></td>";
                        
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
    
    
        ?>
                    </table>
                </div>

            </div>

        </div>
    </div>
</body>

</html>