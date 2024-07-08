
<?php
include 'conn.php';
if(isset($_GET['id'])){

    $id=$_GET['id'];
    $insertQuery = "UPDATE complaint set isVf = 'not-verified' where id ='$id' ";
        
        if ($conn->query($insertQuery) === TRUE) {
           echo '<script>alert("Complaint Verified Succesfully");</script>';
           echo '<script> window.location.href = ‘verifiedcomplaints.php’;</script>';
           
        } else {
            echo "Error inserting record into the database: " . $conn->error;
        }
}



        ?>