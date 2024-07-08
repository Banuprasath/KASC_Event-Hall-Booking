<!DOCTYPE html>
<html>
<?php
include 'conn.php';
?>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin-event-hall-view-details.css">
</head>

<body>
    <div class="heading">
        <h1>Booking Details</h1>
    </div>
    <?php
                        if(isset($_GET['id'])){
                            session_start();


                                                    function convertTo12HourFormat($inputTime) {
                                                        
                                                        $dateTime = new DateTime($inputTime);
                                                        $formattedTime = $dateTime->format('h:i A');

                                                        return $formattedTime;
                                                    }



                        $id=$_GET['id'];

                        $sql="select * from booking WHERE bkid = '$id' ";
                        $result=$conn->query($sql);
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){

                                                       $ename=$row['ename'];
                                                       $etype=$row['etype'];
                                                       $about=$row['about'];
                                                       $dep=$row['dep'];
                                                       $fn=$row['fname'];
                                                       $sno=$row['sno'];
                                                       $hall=$row['hall'];
                                                       $sdate=$row['sdate'];
                                                       $inputTime1 = $row['stime'];
                                                        $inputTime2 = $row['etime'];
                                                        $stime12 = convertTo12HourFormat($inputTime1);
                                                        $etime12= convertTo12HourFormat($inputTime2);
                            }
                        }

                        }

    ?>

    <div class="main-container">
        <div class="row 1">
            <div class="col 1 ">
                <table class="table1">
                    <tr>
                        <td>
                            <h5>Event Name</h5>
                        </td>
                        <td>
                            <p><?php echo $ename;?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Event Type</h5>
                        </td>
                        <td>
                            <p><?php echo $etype;?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Faculty Name</h5>
                        </td>
                        <td>
                            <p><?php echo $fn;?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Event Hall</h5>
                        </td>
                        <td>
                            <p><?php echo $hall;?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Department</h5>
                        </td>
                        <td>
                            <p><?php echo $dep;?></p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col 2 ">
                <div>
                    <table class="table2">
                        <tr>
                            <td>
                                <h5>Event Date</h5>
                            </td>
                            <td>
                                <p><?php echo $sdate;?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Event Timings</h5>
                            </td>
                            <td>
                                <p><?php echo $stime12. "-" .$etime12;?> </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Event Details</h5>
                            </td>
                            <td>
                                <p><?php echo $about; ?></p>
                            </td>
                        </tr>


                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="button1">
        <a href="bookingview.php" ><button><span>GO BACK</span></button></a>
    </div>


</body>

</html>