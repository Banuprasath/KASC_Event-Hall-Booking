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

    $sqlInsert = "DELETE from complaint where id = $id";


    if ($conn->query($sqlInsert) === TRUE) {
        echo "Record delete successfully<br>";
          header('Location: complaintview.php');
            } else {
                echo "Error inserting record: " . $conn->error . "<br>";
            }
}

?>


