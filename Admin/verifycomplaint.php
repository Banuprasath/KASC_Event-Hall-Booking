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


if(isset($_GET['id'])){

    $id=$_GET['id'];
    $insertQuery = "UPDATE complaint set isVf = 'verified' where id ='$id' ";
        
        if ($conn->query($insertQuery) === TRUE) {
           echo '<script>alert("Complaint Verified Succesfully");</script>';
           
        } else {
            echo "Error inserting record into the database: " . $conn->error;
        }
}



        ?>