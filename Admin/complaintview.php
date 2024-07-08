
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN COMPLAINT VIEW</title>
   
</head>
<body>

<!-- Your HTML content here -->

</body>
</html>
<?php
include 'conn.php';


function convertTo12HourFormat($inputTime) {
    
    $dateTime = new DateTime($inputTime);
    $formattedTime = $dateTime->format('h:i A');

    return $formattedTime;
}

?>
<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://kit.fontawesome.com/a364e8076a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="AdminComplView.css"></link>

</head>

<body>
    

<?php
session_start();
if (isset($_SESSION['login'])){

                
    
    $shall = $_SESSION['sno'];
    include 'navbar.php';


?>

<div class="event">
            <div>
                <h1 class="event_form_heading">Complaints Registered</h1>
            </div>
            
            <div class="event-view">
                <form method='post'>
                    <table>
                        <tr>
                            <td><input type='text' name='hall' placeholder='Staff Name'></td>
                            <td><input type='text' name='dep' placeholder='dep'></td>
                            <td><input type='submit' name='submit'></td>
                        </tr>
                    </table>
                </form>
            </div>

<?php

echo "<table>";
echo "<tr>";
echo "<th>Faculty Name</th>";
echo "<th>Caption</th>";
echo "<th>Hall</th>";
echo "<th>Details</th>";
echo "<th colspan='3' class='tablehead'>Actions</th>";
echo "</tr>";

if(!isset($_POST['submit']))
{


$sql="select * from complaint WHERE hall = '$shall' AND isVf != 'verified'";
$result=$conn->query($sql);
if($result !== false &&  $result->num_rows>0){
while($row=$result->fetch_assoc()){

                        echo "<tr>";
                        $id= $row['id'];
                    echo "<td>".$row['sname']."</td>";
                    echo "<td>".$row['capt']."</td>";
                    echo "<td>".$row['hall']."</td>";
                    echo "<td>".$row['details']."</td>";
                    //echo "<td><img style='width: 100px; height: 100px; object-fit: cover;' src='../complaints/". $row['img'] ." ' alt='Complaint Image'></td>";
                    

        
                    
                    
                    
                    echo "<td><button class='edit'><a href='c-view.php?id=$id' class='btn btn-primary btn-sm'>View</a></button></td>";
                    echo "<td><button class='delete'><a href='delete.php?id=$id' class='btn btn-success btn-sm'>Delete</a></button></td>";
                    if($row['isVf']=='verified'){
                        $state= "<p style='color: green;'>Problem Verified</p>";
                        $cls="btn-disabled";

                    }
                    else{
                        $state= "Verify";
                        $cls="btn-enabled";
                    }

                    echo "<td><button class='verify' ><a href='verifycomplaint.php?id=$id' class='$cls'>$state</button></td>";
                    //echo "<td>".$row['isVf']."</td>";
                  //  echo "<td>".$etime12."</td>";


                    echo "</tr>";
}
} else {
echo "<tr><td colspan='6'>No data found</td></tr>";
}
}


if(isset($_POST['submit']))
{

$hall = $_POST['hall'];
// echo $hall;
$dep = $_POST['dep'];
$sql = "SELECT * FROM complaint WHERE hall= '$shall' AND  sname  LIKE '%$hall%'  ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row=$result->fetch_assoc()){
                
                    $id= $row['id'];

                    echo "<tr>";
                        $id= $row['id'];
                    echo "<td>".$row['sname']."</td>";
                    echo "<td>".$row['capt']."</td>";
                    echo "<td>".$row['hall']."</td>";
                    echo "<td>".$row['details']."</td>";
                    //echo "<td><img style='width: 100px; height: 100px; object-fit: cover;' src='../complaints/". $row['img'] ." ' alt='Complaint Image'></td>";
                    

        
                    
                    
                   
                    echo "<td><button class='edit'><a href='c-view.php?id=$id' class='btn btn-primary btn-sm'>View</a></button></td>";
                    echo "<td><button class='delete'><a href='delete.php?id=$id' class='btn btn-success btn-sm'>Delete</a></button></td>";
                    if($row['isVf']=='verified'){
                        $state= "<p style='color: green;'>Problem Verified</p>";
                        $cls="btn-disabled";

                    }
                    else{
                        $state= "Verify";
                        $cls="btn-enabled";
                    }

                    echo "<td><button class='verify' ><a href='verifycomplaint.php?id=$id' class='$cls'>$state</button></td>";
                  //  echo "<td>".$etime12."</td>";


                    echo "</tr>";
                    
}

}
else{
    echo "<td colspan='8'>No Record Found</td>";
}
}
?>


<!--- KABILAN CODE -->





<!-- KABILAN CODE ->




















                    <table>
                        <tr>
                            <td><input type='text' name='hall' placeholder='Hall'></td>
                            <td><input type='text' name='dep' placeholder='staff-name'></td>
                            
                            <td><input type='submit' name='export_excel' value='export_excel'></td>
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
   <?php /* 
if(!isset($_POST['submit']))
{
$sql="select * from complaint";
$result=$conn->query($sql);
if($result !== false &&  $result->num_rows>0){
while($row=$result->fetch_assoc()){

                        echo "<tr>";
                        $id= $row['id'];
                    echo "<td>".$row['sname']."</td>";
                    echo "<td>".$row['capt']."</td>";
                    echo "<td>".$row['hall']."</td>";
                    echo "<td>".$row['details']."</td>";
                    echo "<td><img style='width: 100px; height: 100px; object-fit: cover;' src='../complaints/". $row['img'] ." ' alt='Complaint Image'></td>";
                    

        
                    
                    
                   
                    echo "<td><a href='c-view.php?id=$id' class='btn btn-primary btn-sm'>View</td>";
                    echo "<td><a href='delete.php?id=$id' class='btn btn-success btn-sm'>Delete</td>";
                    if($row['isVf']=='verified'){
                        $state= "<p style='color: green;'>Problem Verified</p>";
                        $cls="btn-disabled";

                    }
                    else{
                        $state= "Verify";
                        $cls="btn-enabled";
                    }

                    echo "<td><button class='$cls' ><a href='verifycomplaint.php?id=$id' class='$cls'>$state</button></td>";
                    //echo "<td>".$row['isVf']."</td>";
                  //  echo "<td>".$etime12."</td>";


                    echo "</tr>";
}
} else {
echo "<tr><td colspan='6'>No data found</td></tr>";
}
}


if(isset($_POST['submit']))
{

$hall = $_POST['hall'];
// echo $hall;
$dep = $_POST['dep'];
$sql = "SELECT * FROM complaint WHERE  hall  LIKE '%$hall%' AND sname LIKE '%$dep%' ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row=$result->fetch_assoc()){
                
                    $id= $row['id'];

                echo "<tr>";

                echo "<td>".$row['sname']."</td>";
                echo "<td>".$row['capt']."</td>";
                echo "<td>".$row['hall']."</td>";
                echo "<td>".$row['details']."</td>";
                echo "<td><img style='width: 100px; height: 100px; object-fit: cover;' src='../complaints/". $row['img'] ." ' alt='Complaint Image'></td>";
              
                
               
               
                echo "<td><a href='c-view.php?id=$id' class='btn btn-primary btn-sm'>View</td>";
                    echo "<td><a href='delete.php?id=$id' class='btn btn-success btn-sm'>Delete</td>";
                    if($row['isVf']=='verified'){
                        $state= "Problem Verified";

                    }
                    else{
                        $state= "Verify";
                    }
                    echo "<td><a href='verifycomplaint.php?id=$id' class='btn btn-success btn-sm'>$state</td>";
                   
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
                    ?>
                        
                    </table>
                </div>

            </div>

        </div>
    </div>
</body>

</html>


*/ }
else{

    echo "Admin not verified";
}?>


