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

$sql="UPDATE complaint SET isVf = 'verified' where id = $id ";

$result=$conn->query($sql);
if($result){
    header("Location: c-admin.php");
}
else{
    echo "Not Verified";
}
}
?>