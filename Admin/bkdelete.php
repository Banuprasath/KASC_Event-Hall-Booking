<?php
include 'conn.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sqlInsert = "DELETE from booking where bkid = '$id'";


    if ($conn->query($sqlInsert) === TRUE) {
        echo "Record delete successfully<br>";
          header('Location: bookingview.php');
            } else {
                echo "Error inserting record: " . $conn->error . "<br>";
            }
}

?>

