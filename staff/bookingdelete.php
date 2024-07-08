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
    
$sql = "DELETE from booking where bkid = $id";
$result = $conn->query($sql);

if ($result) {
   //echo "Deleted Succesfully";
   // $fileName = $row['img'];
    header("Location: view.php");
}
else{
    echo "Not Deleted";
}


    
}

?>


