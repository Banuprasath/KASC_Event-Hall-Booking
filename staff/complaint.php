<?php

include 'conn.php';
session_start();
if(isset($_SESSION['login'])){
   

    $sno=$_SESSION['sno'];
    //echo $_SESSION['sno'];

?>


<!-- KABILAN CODE  -->









<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/a364e8076a.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../kabilan/css/ComplaintTable.css">
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
    <script src="../kabilan/js/ComplaintTable.js"></script>
    <title>STAFF REG QUERIES</title>
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
                    <!-- <li><a href="#" target="_self">
                            <i class="des fa-solid fa-house" style="color: #fff;"></i>
                            <span class="nav-items">HOME</span>
                        </a></li> -->
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
                            <span class="nav-items">RISE QUERIES</span>
                        </a></li>
                    <li><a href="ComplaintTable.html" target="_self">
                            <i class="des fa-solid fa-clipboard-question" style="color: #fff;"></i>
                            <!--fa-beat-fade-->
                            <span class="nav-items">MY QUERIES</span>
                        </a></li>
                    <li><a href="#" class="logout" target="_self">
                            <i class="des fa-solid fa-arrow-right-from-bracket" style="color: #fff;"></i>
                            <!--fa-beat-fade-->
                            <span class="nav-items">LOGOUT</span>
                        </a></li>
                </ul>
            </nav>
        </div>

        </div>



        <div class="complaint">
            <div>
                <h1 class="complaint_form_heading">Recent Complaints</h1>
            </div>
            <div class="complaint-view">
                <form method='POST'>
                    <table>
                        <tr>
                            <td><input type='text' name='hall' placeholder='Hall'></td>
                            <td><input type='text' name='dep' placeholder='dept'></td>
                            <td><input type='submit' name='submit'></td>
                        </tr>
                    </table>
                </form>
            </div>


            <div class="complaint_form">
                <div>
                    <table>
                    <tr>
                            <th>Sname</th>
                            <th>Dept</th>
                            <th>Hall</th>
                            <th>Details</th>
                            <th>Proof</th>
                            <th colspan='2' class="tablehead">Actions</th>
                            <th>Status</td>
                        </tr>
                        


                    <?php

                            

if(!isset($_POST['submit']))
{
$sql="select * from complaint where sno='$sno'";

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
                    

        
                    
                    
                   $ct="";
                    echo "<td><a href='c-view.php?id=$id' class='btn btn-primary btn-lg'>View</a></td>";
                    echo "<td><a href='delete.php?id=$id' class='btn btn-danger btn-sm'>Delete</a></td>";
                    if($row['isVf']!='verified'){
                        echo $row['isVf'];
                        $ct="btn btn-warning btn-lg";

                        $state= "Not Verified";

                    }
                    else{
                        $ct="btn btn-success btn-lg";
                        $state= "Verified";
                    }
                echo "<td><a href='c-view.php?id=$id' class='$ct'>".$state."</a></td>";
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
$sql = "SELECT * FROM complaint WHERE  hall  LIKE '%$hall%' AND capt LIKE '%$dep%' AND sno = '$sno'";
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
              
                
               
               
                echo "<td><a href='c-view.php?id=$id' class='btn btn-primary btn-lg'>View</td>";
                    echo "<td><a href='delete.php?id=$id' class='btn btn-success btn-sm'>Delete</td>";
                    if($row['isVf']=='verified'){
                        $state= "Problem Verified";

                    }
                    else{
                        $state= "Verify";
                    }
                    echo "<td>".$state."</td>";
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














<!-- KABILAN CODE -->












